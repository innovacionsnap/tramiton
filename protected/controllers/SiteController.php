<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public $_msgSuccess;
    public $_msgerror;

    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                //'backColor' => 0xFFFFFF,
                'backColor' => 0xD9E0E7,
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
        $model = new ValidarCedula;
        $model_login = new LoginForm;
        $this->render('index', array("model" => $model, "model_login" => $model_login, 'msg1' => $this->_msgerror));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
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
                $this->redirect(array('dashboard/index'));
        }
        $this->layout = 'main-login';
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
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
            if ($model->validate()) {
                $this->redirect($this->createUrl('site/registro'));
            } else {
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
                $asunto = utf8_decode('Confirmar Cuenta Tramiton');
                $mensajeEmail = utf8_decode($textoEmail);

                //llamamos la funcion para enviar el correo y pasamos los parametros necesarios
                $mail->enviarMail(
                        array(Yii::app()->params['adminEmail'], Yii::app()->name), array($model->email, $model->nombre_usuario), $asunto, $mensajeEmail
                );

                //creamos el mensaje de notificación para el usuario
                $this->_msgSuccess = $this->creaMensaje(
                        'Gracias por tu registro!', 'En breve recibirás un correo electrónico con un enlace para poder activar tu cuenta'
                );

                //redirigimos a la pagina de success y con el mensaje
                $this->redirect(array('site/success', 'msgSuccess' => $this->_msgSuccess));
            }
        }
        $this->layout = 'main-registro';
        $this->render('registro', array('model' => $model));
    }

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

    /*
     * función que me permite realizar la accion de validación de cedula
     */

    public function actionValidaCedula() {

        $model = new ValidarCedula;
        $model_login = new LoginForm;
        $msg = '';

        if (isset($_POST['ValidarCedula'])) {

            $model->attributes = $_POST['ValidarCedula'];
            $model->cedula_participacion = $_POST['ValidarCedula']['cedula_participacion'];

            if (!$model->validate()) {
                $this->_msgerror = "Número de Cédula incorrecto o no existe, favor ingrese nuevamente";
                $this->render('index', array("model" => $model, "model_login" => $model_login, 'msg1' => $this->_msgerror));
            } else {
                $token = $model->obtieneToken();
                $datos = $model->consultaCedulaRegistroCivil($model->cedula_participacion, $token);
            }
        }
        $this->render('formulario', array('model' => $model));
    }

    /*
     * acción para activar la cuenta del usuario
     */

    public function actionActivarCuenta() {

        $modelActiva = new consultasBaseDatos;

        $email = $_GET['email'];
        $codigoVerificacion = $_GET['codigoVerificacion'];

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

    public function actionSuccess() {
        
        $model_login = new LoginForm;

        $mensajes = $_GET['msgSuccess'];
        $this->render('success', array('msgSuccess' => $mensajes, "model_login" => $model_login));
    }

    public function creaMensaje($titulo, $mensaje, $tituloLink = false, $url = false, $esLink = false) {
        return array(
            'titulo' => $titulo,
            'mensaje' => $mensaje,
            'tituloLink' => $tituloLink,
            'url' => $url,
            'esLink' => $esLink
        );
    }

}
