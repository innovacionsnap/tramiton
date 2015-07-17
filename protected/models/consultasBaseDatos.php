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
                "name = '$nombre', " .
                "description = '$descripcion' " .
                "WHERE name = '$item';";

        $resultado = $conexion->createCommand($sqlUpdate);
        $resultado->execute();
    }

    //función para insertar una registro de usuarios
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
                    ':imagen' => 'default_image_profile.jpg',
                    ':codigoConfirmacion' => $this->codigoVerificacion
                    )
                );
    }
    
    //función para activar cuenta de usuario
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
        foreach($fila as $registro){
            $existe = TRUE;
            $codUsuario = $registro['usu_id'];
        }
        
        //actualiza el estado del usuario a activo
        if($existe == TRUE){
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
        }
        else{
            $mensaje = "Lo sentimos, tu nueva cuenta de Tramiton.to no pudo ser activada, por favor intentalo nuevamente";
        }
        
        return $mensaje;
        
    }

}
