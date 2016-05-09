<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public $_msgSuccess;
    public $_msgerror;
    public $_datosUser;

    public function actions() {
        return array(
// captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                //'backColor' => 0xFFFFFF,
                'backColor' => 0xD9E0E7,
                'testLimit' => 3,
            #'foreColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
// They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
// renders the view file 'protected/views/site/index.php'
// using the default layout 'protected/views/layouts/main.php'
        Yii::import('application.controllers.DashboardController');
        $total_soluciones = DashboardController::getTotalSoluciones();

        $modelEstadisticas = new consultasBaseDatos;

        $totalParticipantes = $modelEstadisticas->getTotalParticipantes();
        $totalTramites = $modelEstadisticas->getTramitesMencionados();
        $totalAcciones = $modelEstadisticas->getAccionesCorrectivasTram();
        
        $totalAccionesnom = $modelEstadisticas->getAccionesCorrectivas10();
        
        $estadisticas = array(
            'totalParticipantes' => $totalParticipantes,
            'totalTramites' => $totalTramites,
            'totalAcciones' => $totalAcciones,
        //    'totalAccionesnum' => $totalAccionesnum,
          //  'totalAccionesnom' => $totalAccionesnom,    
        );

        $model = new ValidarCedula;
        $model_login = new LoginForm;
        $this->layout = 'main-home';
        $this->render('index', array("model" => $model, "model_login" => $model_login, 'msg1' => $this->_msgerror, 'estadisticas' => $estadisticas, 'totalAccionesnom' => $totalAccionesnom));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        //echo "llegue al error"; Yii::app()->end();
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
  
    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

// if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

// collect user input data
        if (isset($_POST['LoginForm'])) {
//var_dump($_POST);
            $model->attributes = $_POST['LoginForm'];
// validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                //$this->redirect(array('dashboard/index'));
                //$this->redirect(array('index'));
                $this->redirect(Yii::app()->user->returnUrl);
        }
        $this->layout = 'main-login';
        $this->render('login', array('model_login' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * accion para insertar nuevos datos de formulario
     */
    public function actionRegistroCasoLogin(){
        $insertar_tramite = $_POST['insertar_tramite'];

        if (isset($insertar_tramite)) {
            $id_institucion = $_POST['id_institucion'];
            $id_provincia = $_POST['id_provincia'];
            $unidad_prestadora = $_POST['unidad_prestadora'];
            $idhijo = $_POST['id_canton'];
            //$idhijo = $_POST['idhijo'];
            //$empresa = $_POST['empresa'];
            $empresa = 0;
            //$id_tramite = isset ($_POST['id_tramite']);

            if (isset($_POST['id_tramite2'])) {
                $id_tramite = $_POST['id_tramite2'];
            } else {
                $id_tramite = 4173;
            }
            $experiencia = $_POST['experiencia'];
            $titulo_solucion = $_POST['titulo_solucion'];


            if (isset($_POST['otro_tramite'])) {
                $otro_tramite = $_POST['otro_tramite'];
            } else {
                $otro_tramite = "n/a";
            }

            $propuesta_solucion = $_POST['propuesta_solucion'];
            $id_usuario = $_POST['id_usuario'];
            //$problematica_otro = $_POST['problematica_otro'];
            $url = $_POST['url'];

            $insertar_tramite = $_POST['insertar_tramite'];

            $hoy = date("Y-m-d");

            $conexion = Yii::app()->db;
            $transaction = $conexion->beginTransaction();
            try {
                //Datos trámite
                $model_dtramite = new DatosTramite();
                $model_dtramite->par_id = 1500;
                $model_dtramite->usu_id = $id_usuario;
                $model_dtramite->trai_id = $id_tramite;
                $model_dtramite->datt_unidadprestadora = $unidad_prestadora;
                $model_dtramite->datt_experiencia = $experiencia;
                $model_dtramite->datt_fechainicio = $hoy;
                $model_dtramite->datt_fechafin = $hoy;
                $model_dtramite->datt_fecharegistro = $hoy;
                $model_dtramite->datt_ipingreso = '0.0.0.0';
                $model_dtramite->datt_edicion = '2015';
                $model_dtramite->datt_codigoconfirmacion = 'N/A';
                $model_dtramite->datt_otronombretramite = $otro_tramite;
                $model_dtramite->datt_calificado = 0;
                $model_dtramite->datt_descripcionbreve = 'prueba decripcion';
                $model_dtramite->datt_estado = 1;
                //$model_dtramite->can_id = 150;
                $model_dtramite->can_id = $idhijo;
                $model_dtramite->datt_otronombreinstitucion = 'N/A';
                $model_dtramite->datt_fecha_actualizacion = $hoy;
                $model_dtramite->save();
                $id_dtramite = $model_dtramite->primaryKey;

                //Empresa_Trámite
                if ($empresa != 0) {
                    $model_empresa = new EmpresaTramite();
                    $model_empresa->emp_id = $empresa;
                    $model_empresa->datt_id = $id_dtramite;
                    $model_empresa->save();
                }

                //Solución
                $model_solucion = new Solucion();
                $model_solucion->datt_id = $id_dtramite;
                $model_solucion->usu_id = Yii::app()->user->id;
                //$model_solucion->usu_id = 2;
                $model_solucion->sol_titulo = $titulo_solucion;
                $model_solucion->sol_descripcion = $propuesta_solucion;
                $model_solucion->sol_vistas = 0;
                $model_solucion->sol_fecha = $hoy;
                $model_solucion->sol_estado = 1;
                $model_solucion->save();

                //Problemática
                /*
                  if (strlen($_POST['problematica_otro'])>0) {
                  $model_problema = new ProblemaTramite();
                  $model_problema->prob_id = 41;
                  $model_problema->datt_id = $id_dtramite;
                  $model_problema->prot_estado_ = 0;
                  $model_problema->prot_nombreotroproblema = $problematica_otro;
                  $model_problema->save();
                  }
                 */
                if (isset($_POST['problematica'])) {
                    $optionArray = $_POST['problematica'];
                    for ($i = 0; $i < count($optionArray); $i++) {
                        $model_problema = new ProblemaTramite();
                        $model_problema->prob_id = $optionArray[$i];
                        $model_problema->datt_id = $id_dtramite;
                        $model_problema->prot_estado_ = 0;
                        $model_problema->save();
                    }
                }


                $transaction->commit();
                //echo '<br><br><h4 align="center">Gracias por ingresar su caso</h4>';
                echo '<br><br><h4>Para revisar mas casos publicados ingrese a su <a href="dashboard/index">escritorio</a></h4>';
                //header('Location:' . Yii::app()->baseURL);
            } catch (Exception $e) {
                echo $e;
                echo "<div>Hubo un error</div>";
                $transaction->rollBack();
            }
        }
    }




    public function actionRegistroCaso() {
        
        //var_dump($_POST); Yii::app()->end();

        if (!isset($_POST) || !isset($_POST['g-recaptcha-response']) || $_POST['g-recaptcha-response'] == '' || count($_POST['g-recaptcha-response']) == 0) {
            echo 0;
        } else {
            $cedula = $_POST['cedula_ciu'];
            $verifica_usuario = $this->verificaUsuario($cedula);

            //************************inicio de insercion de temporales****************
            
            //realiza post de todo el formulario y almacena en variables
            $id_institucion = $_POST['id_institucion'];
            $id_provincia = $_POST['id_provincia'];
            $unidad_prestadora = $_POST['unidad_prestadora'];
            $idhijo = $_POST['id_canton']; // canton de la provincia seleccionada

            if (isset($_POST['id_tramite2'])) {
                $id_tramite = $_POST['id_tramite2'];
            } else {
                $id_tramite = 4173;
            }
            $experiencia = $_POST['experiencia'];
            $titulo_solucion = $_POST['titulo_solucion'];

            if (isset($_POST['otro_tramite'])) {
                $otro_tramite = $_POST['otro_tramite'];
            } else {
                $otro_tramite = "n/a";
            }

            $propuesta_solucion = $_POST['propuesta_solucion'];
            $id_usuario = $_POST['id_usuario'];

            if (isset($_POST['problematica_otro']))
                $problematica_otro = $_POST['problematica_otro'];
            else
                $problematica_otro = '';

            $url = $_POST['url'];

            //echo "Usuario:" . $id_usuario . '<br>';

            $insertar_tramite = $_POST['insertar_tramite'];

            /* echo "Institucion: " . $id_institucion . "<br>";
              echo "Provincia: " . $id_provincia . "<br>";
              echo "canton: " . $idhijo . "<br>";
              echo "Unidad: " . $unidad_prestadora . "<br>";

              echo "otro canton id: " . $idhijo . "<br>";
              echo "Tramite: " . $id_tramite . "<br>";
              echo "Titulo Solucion: " . $titulo_solucion . "<br>";
              echo "Experiencia: " . $experiencia . "<br>";
              echo "Propuesta Solucion: " . $propuesta_solucion . "<br>";
              echo "Otro Problema: " . $problematica_otro . "<br>";
              echo "otro tramite: " . $otro_tramite . "<br>";
              //echo "problematica: ".$problematica."<br>";
              //$hoy = date("Y-m-d");

              echo "<Br>Insertar tramite" . $insertar_tramite; */

            $datosRegistro = array(
                'cedulaCiudadano' => $cedula,
                'idInstitucion' => $id_institucion,
                'idTramite' => $id_tramite,
                'otroTramite' => $otro_tramite,
                'idCanton' => $idhijo,
                'experienciaTram' => $experiencia,
                'tituloSolucion' => $titulo_solucion,
                'unidadPrestadora' => $unidad_prestadora,
                'otroProblema' => $problematica_otro,
                'propuestaSolucion' => $propuesta_solucion
            );

            $modelTemp = new consultasBaseDatos;

            $lastValue = $modelTemp->insertTemporalRegistro($datosRegistro);

            //echo "<br>se inserto el temporal del registro: " . $lastValue . "<br>";

            if (isset($_POST['problematica_otro'])) {

                $datosProblem = array(
                    'idProblem' => 41,
                    'idTmpTramite' => $lastValue,
                    'otroProblema' => $_POST['problematica_otro'],
                );

                $modelTemp->insertTemporalProblem($datosProblem);
            }

            if (isset($_POST['problematica'])) {
                $optionArray = $_POST['problematica'];
                for ($i = 0; $i < count($optionArray); $i++) {
                    $datosProblem = array(
                        'idProblem' => $optionArray[$i],
                        'idTmpTramite' => $lastValue,
                        'otroProblema' => '',
                    );
                    $modelTemp->insertTemporalProblem($datosProblem);
                }
            }

            //echo "<br>se insertaron lor problemas tambien<br>";
        }


        //***********fin de inserción de temporales**********************


        if ($verifica_usuario == 1) {
            echo '<br><br><h4 align="center">para publicar tu caso debe <a href="site/login">Iniciar Sesión</a></h4>';
            echo '<br><br><h3><a href="' . Yii::app()->baseUrl . '">Recargar la página</a></h3>';
          
        } else {
            echo '<br><br><h4>Para poder publicarlo debe <a href="site/registro">Crear una cuenta.</a></h4>';
            echo '<br><br><h3><a href="' . Yii::app()->baseUrl . '">Recargar la página</a></h3>';
         
            //Yii::app()->end();
            //Debe Registrarse
        }
    }

    /**
     * accion para el registro de un nuevo usuario         
     */
    public static function verificaUsuario($cedula) {

        $usuario = Usuario::model()->findAllByAttributes(array('usu_cedula' => $cedula));
        if (count($usuario) > 0) {
            $estado = $usuario[0]['usu_estado'];
            $idUsr = $usuario[0]['usu_id'];
//echo "estado del usuario: " . $estado;
            if ($estado == 2) {
                return 1;
            } else {
                $updateEstado = new consultasBaseDatos;
                $updateEstado->actualizaEstadoAprobado($idUsr);
                return 1;
            }
        } else {
            return 0;
        }
    }

    /**
     * accion para el registro de un nuevo usuario         
     */
    public function actionRegistro() {

//instancia de modelos a utilizar
        $model = new ValidarRegistro;
        $modelDatosCiud = new ValidarCedula;
        $modelInsertUser = new consultasBaseDatos;

//validación ajax del formulario
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'form-registro') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

//comprueba si hay datos en el formulario
        if (isset($_POST['ValidarRegistro'])) {
            $model->attributes = $_POST['ValidarRegistro'];
//$var  = $model->validate();
//echo "valor de la validación: " . $var;
//Yii::app()->end();


            if ($model->validate()) {
//if ($var === false) {
//echo "validacion no fue verdadera " . $var;
//Yii::app()->end();
                $this->redirect($this->createUrl('site/registro'));
            } else {
//echo "validacion fue exitosa " . $var;
//Yii::app()->end();
//obtenemos la cedula del ciudadano a registrar
                $cedulaRegistro = $_POST['ValidarRegistro']['cedula'];
//obtenemos el token de acceso para el webservice
                $token = $modelDatosCiud->obtieneToken();
//obtenemos los datos del ciudadano directamente del registro civil
                $datosCiudadano = $modelDatosCiud->consultaCedulaRegistroCivil($cedulaRegistro, $token);

//insertamos el nuevo registro para crear una cuenta en tramiton
                $modelInsertUser->inserta_usuario_registro(
                        $model->cedula, $model->email, $model->nombre_usuario, $model->password, $modelDatosCiud
                );
//renderizamos una vista para el envío del correo de activación de cuenta
                $textoEmail = $this->renderPartial('_mailSistema', array('model' => $model, 'modelInsertUser' => $modelInsertUser), true);

//instanciamos el modelo para enviar el correo
                $mail = new EnviarCorreo;

//enviamos los parametros necesarios para enviar el correo
                $asunto = utf8_decode('Confirmar Cuenta Tramitón');
                $mensajeEmail = utf8_decode($textoEmail);

//llamamos la funcion para enviar el correo y pasamos los parametros necesarios
                $mail->enviarMail(
                        array(Yii::app()->params['adminEmail'], Yii::app()->name), array($model->email, $model->nombre_usuario), $asunto, $mensajeEmail
                );

                /* if (Yii::app()->session && isset(Yii::app()->session['cCache'])) {
                  // delete the cached captcha values
                  unset(Yii::app()->session['cCache']);
                  } */

//creamos el mensaje de notificación para el usuario
                $this->_msgSuccess = $this->creaMensaje(
                        'Gracias por tu registro!', 'En breve recibirás un correo electrónico con un enlace para poder activar tu cuenta.'
                );

//redirigimos a la pagina de success y con el mensaje
                $this->redirect(array('site/success', 'msgSuccess' => $this->_msgSuccess));
            }
        }

        if (Yii::app()->session && isset(Yii::app()->session['cCache'])) {
// delete the cached captcha values
            unset(Yii::app()->session['cCache']);
        }

        $this->layout = 'main-registro';
        $this->render('registro', array('model' => $model));
    }

    /**
     * Acción para mostrar el administrador
     */
    public function actionAdmin() {
// renders the view file 'protected/views/site/index.php'
// using the default layout 'protected/views/layouts/main.php'
        $this->layout = 'main-admin';
        $this->render('admin');
    }

    public function actionFormulario() {
// renders the view file 'protected/views/site/index.php'
// using the default layout 'protected/views/layouts/main.php'
        $this->render('formulario');
    }

    public function actionRanking_Mas_Mencionados() {
// renders the view file 'protected/views/site/index.php'
// using the default layout 'protected/views/layouts/main.php'
        $this->render('ranking_mas_mencionados');
    }

    /**
     * función que me permite realizar la accion de validación de cedula
     */
    public function actionValidaCedula() {
        $cedula = $_POST['cedula'];
        $model = new ValidarCedula;
        $token = $model->obtieneToken();
        $datos = $model->consultaCedulaRegistroCivil($cedula, $token);
        $nombre = $model->nombre_ciudadano;
        echo $datos . '?' . $nombre;
    }

    /**
     * acción para activar la cuenta del usuario
     */
    public function actionActivarCuenta() {

        $modelActiva = new consultasBaseDatos;

//$email = $_GET['email'];
//$codigoVerificacion = $_GET['codigoVerificacion'];
//echo "email: " . $email . " - codigo: " . $codigoVerificacion;
//Yii::app()->end();

        $mensaje = '';
        if (isset($_GET['email']) && isset($_GET['codigoVerificacion'])) {
            $email = $_GET['email'];
            $codigoVerificacion = $_GET['codigoVerificacion'];

            $validarEmail = new CEmailValidator;
            if (!$validarEmail->validateValue($email)) {
                $mensaje = 'Error de confirmación - correo electrónico electrónico';
                $this->_msgSuccess = $this->creaMensaje(
                        'Lo sentimos ocurrio un inconveniente al activar tu cuenta', $mensaje
                );
            } else if (!preg_match('/^[a-zA-Z0-9]+$/', $codigoVerificacion)) {
                $mensaje = 'Error de confirmación - código de verificación incorrecto';
                $this->_msgSuccess = $this->creaMensaje(
                        'Lo sentimos ocurrio un inconveniente al activar tu cuenta', $mensaje
                );
            } else {
                $mensaje = $modelActiva->activaCuenta($email, $codigoVerificacion);
                $this->_msgSuccess = $this->creaMensaje(
                        'Felicitaciones!!!!', $mensaje, 'Ingresa a Tramiton.to', 'login', true
                );
            }
        }
//redirigimos a la pagina de success y con el mensaje
        $this->redirect(array('site/success', 'msgSuccess' => $this->_msgSuccess));
    }

    /**
     * Accion para mandar mensajes de exito o error
     */
    public function actionSuccess() {

        $model_login = new LoginForm;

        $mensajes = $_GET['msgSuccess'];
        $this->render('success', array('msgSuccess' => $mensajes, "model_login" => $model_login));
    }

    /**
     * Función que permite crear el mensaje
     * @return array Arreglo clave valor que contiene las partes para el mensaje
     * @param string $titulo titulo del mensaje
     * @param string $mensaje texto contenido del mensaje
     * @param boolean $tituloLink true si quiere que el mensaje tenga un link, por defecto false
     * @param string $url cadena que contiene la url para redirigir, por defecto false
     * @param boolean $esLink true si el mensaje tiene link, por defecto false
     */
    public function creaMensaje($titulo, $mensaje, $tituloLink = false, $url = false, $esLink = false) {
        return array(
            'titulo' => $titulo,
            'mensaje' => $mensaje,
            'tituloLink' => $tituloLink,
            'url' => $url,
            'esLink' => $esLink
        );
    }

    /**
     * acción para solicitar recuperación de contraseña
     */
    public function actionRecuperarPassword() {

//echo "voy a recuperar contraseña"; Yii::app()->end();

        $model_reset_pass = new RecuperarPasswordForm;
        $modelVerificaEmail = new consultasBaseDatos;

        $mensaje = "";

//validación ajax del formulario
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'recovery_pass_form') {
            echo CActiveForm::validate($model_reset_pass);
            Yii::app()->end();
        }

        if (isset($_POST['RecuperarPasswordForm'])) {
//echo "entre aqui por post"; Yii::app()->end();
            $model_reset_pass->attributes = $_POST['RecuperarPasswordForm'];
            $var = $model_reset_pass->validate();
            /* if ($var == true) {
              echo "<br>validacion verdadera";
              } else {
              echo "<br>validacion falsa";
              } */
//echo "<br>retorno valida solicitud: " . $var; Yii::app()->end();
//if ($model_reset_pass->validate() == false) {
            if ($var == false) {
//echo "<br>entre aqui datos no validos";
                Yii::app()->end();
                $mensaje = "Error al validar información, intentelo nuevamente";
                $this->_msgSuccess = $this->creaMensaje(
                        'Aviso!!!!', $mensaje, 'Recuperar Contraseña', 'recuperarPassword', true
                );
                $model_reset_pass->unsetAttributes();
//redirigimos a la pagina de success y con el mensaje
                $this->redirect(array('site/success', 'msgSuccess' => $this->_msgSuccess));
            } else {
//echo "<br>entre aqui datos son correctos";
//Yii::app()->end();
                $email = $_POST['RecuperarPasswordForm']['email'];
//echo "<br>correo a buscar: " . $email;
                $datosUser = $modelVerificaEmail->verificaEmailUser($email);
                $existeUser = $datosUser['existe'];
                $estadoUser = $datosUser['usuEstado'];
//var_dump($datosUser);
//Yii::app()->end();
                if ($estadoUser == 1) {
                    $mensaje = "Error al validar información, no ha activado su cuenta todavía, por favor revise su correo electrónico para activar su cuenta";
                    $this->_msgSuccess = $this->creaMensaje(
                            'Aviso!!!!', $mensaje
                    );
//redirigimos a la pagina de success y con el mensaje
                    $this->redirect(array('site/success', 'msgSuccess' => $this->_msgSuccess));
                }
                if ($estadoUser == 11) {
                    $mensaje = "Error al validar información, usted ya envió una solicitud para reestablecer contraseña anteriormente y no la completó, revise su correo electrónico";
                    $this->_msgSuccess = $this->creaMensaje(
                            'Aviso!!!!', $mensaje
                    );
//redirigimos a la pagina de success y con el mensaje
                    $this->redirect(array('site/success', 'msgSuccess' => $this->_msgSuccess));
                }

                if ($existeUser == false) {
                    echo "<br>no encontro usuario";
                    Yii::app()->end();
                    $mensaje = "Error al validar información, correo electrónico no registrado en Tramitón, intentelo nuevamente";
                    $this->_msgSuccess = $this->creaMensaje(
                            'Aviso!!!!', $mensaje, 'Recuperar Contraseña', 'recuperarPassword', true
                    );
//redirigimos a la pagina de success y con el mensaje
                    $this->redirect(array('site/success', 'msgSuccess' => $this->_msgSuccess));
                } else {
//echo "<br>el usuario fue encontrado eurekaaaaa...."; Yii::app()->end();
                    $codigoVerificacion = $modelVerificaEmail->codigoVerificacion;

//echo "codigo nuevo: " . $codigoVerificacion;
//var_dump($datosUser);
//Yii::app()->end();
                    $url = Yii::app()->createAbsoluteUrl('site/resetPassword', array('email' => $datosUser['usuMail'], 'codigoVerificacion' => $codigoVerificacion));

                    $msgEmail = $this->renderPartial('_mailRestablecer', array('datosUser' => $datosUser, 'url' => $url), true);
//instanciamos el modelo para enviar el correo
                    $mail = new EnviarCorreo;

//enviamos los parametros necesarios para enviar el correo
                    $asunto = Yii::app()->name . ": Solicitud de restablecimiento de clave";
                    $msgEmail = utf8_decode($msgEmail);
//$mensajeEmail = utf8_decode($textoEmail);
//llamamos la funcion para enviar el correo y pasamos los parametros necesarios
                    $mail->enviarMail(
                            array(Yii::app()->params['adminEmail'], Yii::app()->name), array($datosUser['usuMail'], $datosUser['usuUsername']), $asunto, $msgEmail
                            // array(Yii::app()->params['adminEmail'], Yii::app()->name), array($datosUser['usuMail'], $datosUser['usuNombre']), $asunto, $msgEmail
                    );

                    $mensaje = "Se ha generado una solicitad de cambio de contraseña, por favor revise su correo electrónico.";
                    $this->_msgSuccess = $this->creaMensaje(
                            'Aviso!!!!', $mensaje
                    );
//redirigimos a la pagina de success y con el mensaje
                    $this->redirect(array('site/success', 'msgSuccess' => $this->_msgSuccess));

//echo "<br><br>mensaje: " . utf8_decode($msgEmail);
//echo "<br><br>mensaje: <br>" . $msgEmail;
//Yii::app()->end();
                }
            }
        }

        if (Yii::app()->session && isset(Yii::app()->session['cCache'])) {
// delete the cached captcha values
            unset(Yii::app()->session['cCache']);
        }


        $this->layout = 'main-registro';
        $this->render('recuperaPassword', array('model_reset_pass' => $model_reset_pass));
    }

    /**
     * Acción para restablecer la contraseña
     */
    public function actionResetPassword() {

        $modelResetPassw = new consultasBaseDatos;
        $modelNuevoPassw = new NuevoPasswordForm;

        $mensaje = '';

//validación ajax del formulario
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'form-reset-pass') {
            echo CActiveForm::validate($modelNuevoPassw);
            Yii::app()->end();
        }

        if (isset($_POST['NuevoPasswordForm'])) {
            $modelNuevoPassw->attributes = $_POST['NuevoPasswordForm'];

            $valida = $modelNuevoPassw->validate();
//echo "retorno validación: " . $valida; Yii::app()->end();

            if (!$modelNuevoPassw->validate()) {
//echo "hubo error y entro aqui: " . $valida;
//Yii::app()->end();
                $mensaje = "Error al validar información, intentelo nuevamente";
                $this->_msgSuccess = $this->creaMensaje(
                        'Aviso!!!!', $mensaje
                );
//$model_reset_pass->unsetAttributes();
//redirigimos a la pagina de success y con el mensaje
                $this->redirect(array('site/success', 'msgSuccess' => $this->_msgSuccess));
            } else {
                $email = $_POST['NuevoPasswordForm']['email'];
                $codigoVerificacion = $_POST['NuevoPasswordForm']['codigoVerificacion'];
//echo "tengo los datos";
//echo "<br>email: " . $email;
//echo "<br>codigo: " . $codigoVerificacion;
//Yii::app()->end();
                $validarEmail = new CEmailValidator;
                if (!$validarEmail->validateValue($email)) {
//echo "<br>no valido el email: " . $email;
//Yii::app()->end();
                    $mensaje = 'Ocurrio un inconveniente en el proceso de restaurar tu contraseña <br>Error de confirmación - correo electrónico y/o código de verificación incorrectos';
                    $this->_msgSuccess = $this->creaMensaje(
                            'Aviso!!!', $mensaje
                    );
                    $this->redirect(array('site/success', 'msgSuccess' => $this->_msgSuccess));
                } else if (!preg_match('/^[a-zA-Z0-9]+$/', $codigoVerificacion)) {
//echo "<br>no valido el codigo: " . $codigoVerificacion;
                    Yii::app()->end();
                    $mensaje = 'Ocurrio un inconveniente en el proceso de restaurar tu contraseña <br>Error de confirmación - correo electrónico y/ocódigo de verificación incorrectos';
                    $this->_msgSuccess = $this->creaMensaje(
                            'Aviso!!!', $mensaje
                    );
                    $this->redirect(array('site/success', 'msgSuccess' => $this->_msgSuccess));
                } else {
                    $nuevoPassword = $_POST['NuevoPasswordForm']['password'];
//echo "<br> todo bien voy a cambiar la clave por la siguiente: " . $nuevoPassword;
//Yii::app()->end();
                    $update = $modelResetPassw->cambiaPassword($email, $codigoVerificacion, $nuevoPassword);
                    if (!$update) {
                        $mensaje = 'Ocurrio un inconveniente en el proceso de restaurar tu contraseña <br> no se envió una solicitud o ya se restableció anteriormente';
                        $this->_msgSuccess = $this->creaMensaje(
                                'Aviso!!!', $mensaje
                        );
                    } else {
                        $mensaje = "Se ha reestablecido tu contraseña correctamente, ya puedes iniciar sesión en Tramitón";
                        $this->_msgSuccess = $this->creaMensaje(
                                'Felicitaciones!!!!', $mensaje, 'Ingresa a Tramitón', 'login', true
                        );
                    }
                    $this->redirect(array('site/success', 'msgSuccess' => $this->_msgSuccess));
                }
            }
        } else {
            if (isset($_GET['email']) && isset($_GET['codigoVerificacion'])) {
                $email = $_GET['email'];
                $codigoVerificacion = $_GET['codigoVerificacion'];

                $validarEmail = new CEmailValidator;
                if (!$validarEmail->validateValue($email)) {
                    $mensaje = 'Ocurrio un inconveniente en el proceso de restaurar tu contraseña <br>Error de confirmación - correo electrónico y/o código de verificación incorrectos';
                    $this->_msgSuccess = $this->creaMensaje(
                            'Aviso!!!!', $mensaje
                    );
                    $this->redirect(array('site/success', 'msgSuccess' => $this->_msgSuccess));
                } else if (!preg_match('/^[a-zA-Z0-9]+$/', $codigoVerificacion)) {
                    $mensaje = 'Ocurrio un inconveniente en el proceso de restaurar tu contraseña <br>Error de confirmación - correo electrónico y/o código de verificación incorrectos';
                    $this->_msgSuccess = $this->creaMensaje(
                            'Aviso!!!!', $mensaje
                    );
                    $this->redirect(array('site/success', 'msgSuccess' => $this->_msgSuccess));
                } else {
                    $this->layout = 'main-registro';
                    $this->render('nuevoPassword', array('modelNuevoPassw' => $modelNuevoPassw, 'email' => $email, 'codigoVerif' => $codigoVerificacion));
                }
            }
        }
    }

    public static function getTwitter() {
        include("themes/tramiton/assets/lib/TwitterAPIExchange.php");

        $settings = array(
            'oauth_access_token' => "2586191070-fO2KoBxKuNObGJ2BsLexjRSTJGD7dOOfs7Yachz",
            'oauth_access_token_secret' => "EpypbVBsjkBANScVnQtMjaXyni05sq3BJkVnsyIz88naw",
            'consumer_key' => "T1fbyn6VosPPuc8RPGXZY0JGr",
            'consumer_secret' => "FTutnqpr0uFk4foeRwY8um0uHvAxnvCHbKVzXvD2BcYmZgfmFS"
        );

        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $getfield = '?screen_name=TramitonEC&count=12';
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $twit = $twitter->setGetfield($getfield)
                ->buildOauth($url, $requestMethod)
                ->performRequest();

//$datos_clientes = file_get_contents("clientes.json");
        $json_clientes = json_decode($twit, true);
        return $json_clientes;
    }
    
    public static function comboInstitucion(){
        $model=  Institucion::model()->findAllByAttributes(array('ins_funcion_ejecutiva' => 1), array('order' => 'ins_nombre asc'));
        return $model;
    }
    public static function comboProvincia(){
        $model= Provincia::model()->findAllByAttributes(array('pro_estado' => 1), array('order' => 'pro_nombre asc'));
        return $model;
    }
    

}
