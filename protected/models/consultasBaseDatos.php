<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of consultasBaseDatos
 *
 * @author Oscar
 */
class consultasBaseDatos {

    public $codigoVerificacion;

    //función para actualizar los roles de usuario
    public function updateAuthItem($item, $nombre, $descripcion) {
        $conexion = Yii::app()->db;

        $sqlUpdate = "UPDATE \"AuthItem\" SET " .
                //"name = '$nombre', " .
                "description = '$descripcion' " .
                "WHERE name = '$item';";

        $resultado = $conexion->createCommand($sqlUpdate);
        $resultado->execute();
    }
    
    /**
     * función para verificar que un role no este asignado a un usuario
     */
    public function verificaRoleUser($role) {
        $conexion = Yii::app()->db;
        
        $sqlUserRole = "select * from \"AuthAssignment\" where itemname = '$role'";

        $resultado = $conexion->createCommand($sqlUserRole);
        
        $existe = false;
        $fila = $resultado->query();
        
        foreach ($fila as $registro) {
            $existe = true;
        }
        return $existe;
    }

    /**
     * Función que permite insertar un nuevo registro en la tabla de usuarios
     * 
     * @return true Verdadero si se inserta el nuevo registro correctamente
     * @param string $cedula Cedula de identidad del nuevo usuario
     * @param string $mail Correo electrónico del nuevo usuario
     * @param string $username Nombre de usuario ingresado por el nuevo usuario
     * @param string $password Contraseña ingresada por el usuario para su inicio de sesión
     * @param array $datosCiudadano Datos del nuevo usuario obtenidos del Registro Civil mediante web service
     */
    public function inserta_usuario_registro($cedula, $mail, $username, $password, $datosCiudadano) {

        //conexion a la base de datos
        $conexion = Yii::app()->db;

        //instancia de modelo Usuario para encriptacion de clave
        $userModel = new Usuario;
        //encriptación de la clave ingresada por el usuario
        $password = $userModel->getHash('sha1', $password, HASH_KEY);
        //creacion del dato para generar codigo de verificación
        $datoCodigo = $cedula . $username . $mail . $password . date("m/d/Y h:i:s a", time());
        //genera código de verificación
        $this->codigoVerificacion = $userModel->getHash('md5', $datoCodigo, HASH_KEY);
        
        $imagen = 'default_image_profile.jpg';
        
        if($datosCiudadano->genero === 'MASCULINO'){
            $imagen = 'hombre.png';
        }
        else{
            $imagen = 'mujer.png';
        }

        //construye consulta sql para insertar
        $sqlInsertUser = "INSERT INTO usuario(" .
                "usu_cedula, usu_nombre, usu_direccion, usu_mail, usu_celular, usu_convencional, usu_nombreusuario, " .
                "usu_contrasenia, usu_fechanacimiento, usu_estado, usu_lugar_nacimiento, usu_fecha_registro, usu_genero, " .
                "usu_imagen, usu_codigo_confirmacion)" .
                "values(:cedula, :nombreCiudadano, :direccion, :email, :celular, :convencional, :username, " .
                ":contrasenia, :fechaNacimiento, 1, :lugarNacimiento, now(), :genero, " .
                ":imagen, :codigoConfirmacion)";

        // crea el la instrucción para mandar a la base de datos
        $command = Yii::app()->db->createCommand($sqlInsertUser);

        //ejecuta la instrucción de del insert y manda parámetros para insertar
        $resultado = $command->execute(
                array(
                    ':cedula' => $cedula,
                    ':nombreCiudadano' => $datosCiudadano->nombre_ciudadano,
                    ':direccion' => $datosCiudadano->direccion_ciudadano,
                    ':email' => $mail,
                    ':celular' => '0000000000',
                    ':convencional' => '0000000000',
                    ':username' => $username,
                    ':contrasenia' => $password,
                    ':fechaNacimiento' => $datosCiudadano->fecha_nacimiento,
                    ':lugarNacimiento' => $datosCiudadano->lugar_nacimiento,
                    ':genero' => $datosCiudadano->genero,
                    ':imagen' => $imagen,
                    ':codigoConfirmacion' => $this->codigoVerificacion
                )
        );
    }

    /**
     * función para activar cuenta de usuario
     * 
     * @return string $mensaje Contiene si fue posible o no activar la cuenta
     * @param string $email Correo electrónico del usuario a activar la cuenta
     * @param string $codigoVerificacion Código enviado por email para activación de cuenta
     */
    public function activaCuenta($email, $codigoVerificacion) {

        //instancia a base de datos
        $conexion = Yii::app()->db;

        //variables locales 
        $mensaje = "";
        $codUsuario = -1;
        $existe = FALSE;

        //consulta para verificación de usuario de acuerdo al email y codigo de verificacion enviado
        $sqlVerificaCodigo = "SELECT usu_id, usu_mail, usu_codigo_confirmacion FROM usuario "
                . "WHERE usu_mail = '$email' AND usu_codigo_confirmacion = '$codigoVerificacion'";

        $resultado = $conexion->createCommand($sqlVerificaCodigo);

        $fila = $resultado->query();

        //compueba si hay resultados, cambia el valor de existe y obtiene el codigo del usuario para asiganrle un rol
        foreach ($fila as $registro) {
            $existe = TRUE;
            $codUsuario = $registro['usu_id'];
        }

        //actualiza el estado del usuario a activo
        if ($existe == TRUE) {
            $sqlActivaUser = "UPDATE usuario SET "
                    . "usu_estado = 2 "
                    . "WHERE "
                    . "usu_mail = '$email' AND "
                    . "usu_codigo_confirmacion = '$codigoVerificacion'";

            $resultado = $conexion->createCommand($sqlActivaUser);
            $resultado->execute();

            //asigna rol ciudadano a nueva cuenta para que pueda acceder al sistema
            Yii::app()->authManager->assign('ciudadano', $codUsuario);

            $mensaje = "Tu nueva cuenta de Tramiton.to ha sido activada satisfactoriamente, ya"
                    . " puedes ingresar y registrar los tramites más absurdos del sector público.";
        } else {
            $mensaje = "Lo sentimos, tu nueva cuenta de Tramiton.to no pudo ser activada, por favor intentalo nuevamente";
        }

        return $mensaje;
    }

    /**
     * Verifica si el correo ingresado esta registrado para un usuario,
     * si existe el correo crea una código único de verificación el cual
     * nos permitirá reestablecer la contraseña.
     *
     * @return array $datosUser si la direccion de correo es encontrada devuelve toda la información del usuario
     * @param string $email direccion de correo
     */
    public function verificaEmailUser($email) {
        //instancia a base de datos
        $conexion = Yii::app()->db;

        $existe = FALSE;
        $datoCodigo = "";
        $datosUser = array('existe' => $existe);
        $codUser = 0;

        //consulta para verificación de usuario de acuerdo al email y codigo de verificacion enviado
        $sqlVerificaEmailUser = "SELECT usu_id, usu_nombreusuario, usu_cedula, usu_mail, usu_contrasenia, "
                . "usu_nombre, usu_estado FROM usuario "
                . "WHERE usu_mail = '$email' and usu_estado <> 11";
        
        //echo "<br>consulta: " . $sqlVerificaEmailUser . "<br>";

        $resultado = $conexion->createCommand($sqlVerificaEmailUser);

        $fila = $resultado->query();

        //compueba si hay resultados, cambia el valor de existe y obtiene el codigo del usuario para asiganrle un rol
        foreach ($fila as $registro) {
            //var_dump($registro); Yii::app()->end();
            $existe = TRUE;
            $codUser = $registro['usu_id'];
            $datoCodigo = $registro['usu_cedula'] .
                    $registro['usu_nombreusuario'] .
                    $registro['usu_mail'] .
                    $registro['usu_contrasenia'] .
                    date("m/d/Y h:i:s a", time());
            $datosUser = array(
                'usuId' => $registro['usu_id'],
                'usuCedula' => $registro['usu_cedula'],
                'usuUsername' => $registro['usu_nombreusuario'],
                'usuMail' => $registro['usu_mail'],
                'usuNombre' => $registro['usu_nombre'],
                'usuEstado' => $registro['usu_estado'],
                'existe' => $existe
            );
        }

        if ($existe == TRUE) {
            $userModel = new Usuario;
            $this->codigoVerificacion = $userModel->getHash('md5', $datoCodigo, HASH_KEY);
            
            /*
             * despues de validar que existe el usuario actualiza el codigo de verificació por uno nuevo
             * ese codigo se envía al usuario para continuar el proceso y se actualiza el estado
             * codigo 11 => solicitó cambio de contraseña
             * codigo 12 => se realizó el cambio de contraseña  
             */
            $sqlUpdateUser = "UPDATE usuario SET "
                    . "usu_codigo_confirmacion = '$this->codigoVerificacion',"
                    . "usu_estado = 11 "
                    . "WHERE "
                    . "usu_id = $codUser AND "
                    . "usu_mail = '$email'";
            
            $resultado = $conexion->createCommand($sqlUpdateUser);
            $resultado->execute();
            
        }
        else{
            $sqlEstadoUser = "SELECT usu_estado FROM usuario WHERE usu_mail = '$email'";
            
            $resultado = $conexion->createCommand($sqlEstadoUser);

            $fila = $resultado->query();
            foreach ($fila as $registro) {
                $datosUser['usuEstado'] = $registro['usu_estado'];
            }
        }
        
        return $datosUser;
    }
    
    /**
     * Realiza la acción de reestablecer la contraseña por una nueva ingresada por el usuario
     * debido a que está encriptada el usuario debe ingresar una nueva.
     * 
     * @return true si se realiza la actualización correctamente
     * @param string $email Correo electrónico del usuario para verificar
     * @param string $codigoVerificacion Código de verificación enviado al correo al momento de solicitar restauración de clave
     * @param string $nuevoPassword Nueva contraseña ingresada por el usuario, previamente validada y ser encriptada
     */
    public function cambiaPassword($email, $codigoVerificacion, $nuevoPassword) {
        //conexión al objeto base de datos
        $conexion = Yii::app()->db;
        
        //instancia de modelo Usuario para encriptacion de clave
        $userModel = new Usuario;
        //encriptación de la clave ingresada por el usuario
        $nuevoPassword = $userModel->getHash('sha1', $nuevoPassword, Yii::app()->params['hashKey']);
        
        //Instrucción de actualización de nueva contraseña y estado
        $sqlUpdatePasswd = "UPDATE usuario SET "
                . "usu_contrasenia = '$nuevoPassword',"
                . "usu_estado = 12 "
                . "WHERE "
                . "usu_mail = '$email' AND "
                . "usu_codigo_confirmacion = '$codigoVerificacion' AND "
                . "usu_estado = 11";
        
        //echo $sqlUpdatePasswd; Yii::app()->end();
        
        $resultado = $conexion->createCommand($sqlUpdatePasswd);
        return $resultado->execute();
        //echo "<br><br> retorno update " . $var; Yii::app()->end();
    }
    
    /**
     * Funcion para actualizar el perfil del usuario
     */
    public function updatePerfilUsuario($usrId, $datosPerfil) {
        
        //echo "<br> estoy en el modelo listo para actualizar " . $datosPerfil->nombreUsuario;
        
        //var_dump($datosPerfil);
        //Yii::app()->end();
        $conexion = Yii::app()->db;
        
        $sqlUpdatePerfilUsr = "UPDATE usuario SET "
                . "usu_nombreusuario = :username, "
                . "usu_mail = :email, "
                . "usu_convencional = :fijo, "
                . "usu_celular = :celular, "
                . "usu_direccion = :direccion "
                //. "usu_fechanacimiento = :fechaNac, "
                //. "usu_genero = :genero "
                . "WHERE "
                . "usu_id = :usrId";
        
        $resultado = $conexion->createCommand($sqlUpdatePerfilUsr);
        return $resultado->execute(
                array(
                    ':username' => $datosPerfil->nombreUsuario,
                    ':email' => $datosPerfil->email,
                    ':fijo' => $datosPerfil->telfConvencional,
                    ':celular' => $datosPerfil->telfCelular,
                    ':direccion' => $datosPerfil->direccion,
                    //':fechaNac' => $datosPerfil->fechaNacimiento,
                    //':genero' => $datosPerfil->genero,
                    ':usrId' => $usrId,
                )
            );
    }
    
    public function obtieneUsuario($idUsr) {
        
    }
    
    public function actualizaEstadoAprobado($idUsr) {
        $conexion = Yii::app()->db;

        $sqlUpdateEstado = "UPDATE usuario SET "
                . "usu_estado = 2 "
                . "where usu_id = $idUsr";

        $resultado = $conexion->createCommand($sqlUpdateEstado);
        return $resultado->execute();
    }

    public function insertTemporalRegistro($datosRegistro) {

        echo "<br><br>voy a insertar, estoy en el modelo";
        var_dump($datosRegistro);

        $conexion = Yii::app()->db;

        $userModel = new Usuario;
        //$cedulaCiud = $datosRegistro['cedulaCiudadano'];
        //echo "cedula a encriptar" . $cedulaCiud;
        //Yii::app()->end();

        $codigoVerif = $userModel->getHash('sha1', $datosRegistro['cedulaCiudadano'], Yii::app()->params['hashKey']);

        $sqlInsertTmpRegistro = "INSERT INTO tmp_registro_caso("
                . "cedula, id_institucion, id_tramite, experiencia, titulo_solucion, "
                . "id_canton, unidad_prestadora, verificacion, otro_problema, fecha_registro, "
                . "propuesta_solucion, otro_tramite) "
                . "VALUES ("
                . ":cedula, :idInstitucion, :idTramite, :experiencia, :tituloSolucion, "
                . ":idCanton, :unidadPrestadora, :verificacion, :otroProblema, "
                . "now(), :propuestaSolucion, :otroTramite)";

        // crea el la instrucción para mandar a la base de datos
        $command = $conexion->createCommand($sqlInsertTmpRegistro);

        //ejecuta la instrucción de del insert y manda parámetros para insertar
        $resultado = $command->execute(
                array(
                    ':cedula' => $datosRegistro['cedulaCiudadano'],
                    ':idInstitucion' => $datosRegistro['idInstitucion'],
                    ':idTramite' => $datosRegistro['idTramite'],
                    ':experiencia' => $datosRegistro['experienciaTram'],
                    ':tituloSolucion' => $datosRegistro['tituloSolucion'],
                    ':idCanton' => $datosRegistro['idInstitucion'],
                    ':unidadPrestadora' => $datosRegistro['unidadPrestadora'],
                    ':verificacion' => $codigoVerif,
                    ':otroProblema' => $datosRegistro['otroProblema'],
                    ':propuestaSolucion' => $datosRegistro['propuestaSolucion'],
                    ':otroTramite' => $datosRegistro['otroTramite'],
                )
        );

        $sqlLastValue = "SELECT last_value FROM tmp_registro_caso_id_registro_caso_seq";

        $resultado = $conexion->createCommand($sqlLastValue);

        $lastValue;

        $fila = $resultado->query();
        foreach ($fila as $registro) {
            $lastValue = $registro['last_value'];
        }

        return $lastValue;
    }

    public function insertTemporalProblem($datosProblem) {
        $conexion = Yii::app()->db;

        $sqlInsertTmpProblem = "INSERT INTO tmp_problema_registro_caso("
                . "id_problema, id_registro_caso, otro_problema) "
                . "VALUES (:idProblema, :idRegistroTmp, :otroProblem)";

        $command = $conexion->createCommand($sqlInsertTmpProblem);

        //ejecuta la instrucción de del insert y manda parámetros para insertar
        $resultado = $command->execute(
                array(
                    'idProblema' => $datosProblem['idProblem'],
                    'idRegistroTmp' => $datosProblem['idTmpTramite'],
                    'otroProblem' => $datosProblem['otroProblema'],
                )
        );
    }
    
    public function getTotalParticipantes(){
        $conexion = Yii::app()->db;
        
        $sqlTotalParticipantes = "select count(*) as total_participantes from usuario where usu_estado <> 100";

        $resultado = $conexion->createCommand($sqlTotalParticipantes);
        
        $totalParticipantes;
        $fila = $resultado->query();
        foreach ($fila as $registro) {
            $totalParticipantes = $registro['total_participantes'];
        }
                
        return $totalParticipantes;
    }
    
    public function getTramitesMencionados(){
        $conexion = Yii::app()->db;
        
        $sqlTramitesMencionados = "select count(trai_id) as total_tamites from datos_tramite";

        $resultado = $conexion->createCommand($sqlTramitesMencionados);
        
        $totalTramites;
        $fila = $resultado->query();
        foreach ($fila as $registro) {
            $totalTramites = $registro['total_tamites'];
        }
                
        return $totalTramites;
    }
    
    public function getAccionesCorrectivasTram(){
        $conexion = Yii::app()->db;
        
        $sqlAccionesTramite = "select count(accc_id) as total_acciones from acciones_correctivas";

        $resultado = $conexion->createCommand($sqlAccionesTramite);
        
        $totalAcciones;
        $fila = $resultado->query();
        foreach ($fila as $registro) {
            $totalAcciones = $registro['total_acciones'];
        }
                
        return $totalAcciones;
    }
    
} 
