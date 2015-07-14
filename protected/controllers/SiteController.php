<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
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

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'form-registro') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        
        if (isset($_POST['ValidarRegistro'])) {
            //echo "no valido el form1"; Yii::app()->end();
            $model->attributes = $_POST['ValidarRegistro'];
            if ($model->validate()) {
                $this->redirect($this->createUrl('site/registro'));
            } else {
                //var_dump($_POST['ValidarRegistro']);
                $cedulaRegistro = $_POST['ValidarRegistro']['cedula'];
                //$msg = 'Gracias por registrarse, en breve recibirá un correo electrónico ';
                //$msg .= 'con indicaciones para activar su cuenta.';
                $token = $modelDatosCiud->obtieneToken();
                $datosCiudadano = $modelDatosCiud->consultaCedulaRegistroCivil($cedulaRegistro, $token);
                $modelInsertUser->inserta_usuario_registro(
                        $model->cedula, 
                        $model->email, 
                        $model->nombre_usuario, 
                        $model->password, 
                        $modelDatosCiud
                        );
                
                $mail = new EnviarCorreo;
                $asunto = utf8_decode('Confirmar Cuenta Tramiton');
                $mensaje = utf8_decode('¡Bienvenido(a) a Tramiton, ' . $model->nombre_usuario . ' !<br><br>
                                        Ahora que te has registrado y  creado tu cuenta, sólo tienes que activarla para poder empezar a registrar los trámites mas absurdos del sector público.<br>
                                        <br>
                                        <center>
                                          <div><a href="http://localhost/tramiton2/site/registro/' . $model->email .'&codigoVerificacion=' . $modelInsertUser->codigoVerificacion . '" target="_blank">Activar Cuenta</a></div>
                                        </center>
                                        <br>
                                        <br>
                                         Si no te has registrado para crear una cuenta en Tramiton.to, puedes ignorar este mensaje. Alguien puede haber incluido tu dirección de correo electrónico por accidente.');
                
                $mail->enviarMail(
                        array(Yii::app()->params['adminEmail'], Yii::app()->name), 
                        array($model->email, $model->nombre_usuario), 
                        $asunto, 
                        $mensaje
                        );
                $this->redirect($this->createUrl('site/index'));
                //var_dump($modelDatosCiud);
                //echo "<hr>";
                //var_dump($datosCiudadano);
                //Yii::app()->end();
                
                
                //echo $msg;
                $model->unsetAttributes();
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

    public function actionValidaCedula() {
        //echo "estoy en validar cedula";
        //var_dump($_POST);
        //Yii::app()->end();
        $model = new ValidarCedula;
        $model_login = new LoginForm;
        $msg = '';

        if (isset($_POST['ValidarCedula'])) {

            $model->attributes = $_POST['ValidarCedula'];
            $model->cedula_participacion = $_POST['ValidarCedula']['cedula_participacion'];


            //var_dump($model);
            //echo "valor ya en el modelo... " . $model->cedula_participacion;
            //Yii::app()->end();
            if (!$model->validate()) {
                //echo "entro aqui";
                //Yii::app()->end();
                $this->_msgerror = "Número de Cédula incorrecto o no existe, favor ingrese nuevamente";
                $this->render('index', array("model" => $model, "model_login" => $model_login, 'msg1' => $this->_msgerror));
                //$this->render('index', array('model' => $model, 'msg1' => $this->_msgerror));
                //$this->redirect($this->createUrl('site/index', array('msg' => 'Número de Cédula incorrecto o no existe, favor ingrese nuevamente')));
            } else {
                $token = $model->obtieneToken();
                $datos = $model->consultaCedulaRegistroCivil($model->cedula_participacion, $token);
                //$this->layout = 'main';
                //$this->render('formulario', array('model' => $model));
                //$msg = 'Gracias por registrarse, en breve recibirá un correo electrónico ';
                //$msg .= 'con indicaciones para activar su cuenta.';
                //echo $msg;
                //$model->unsetAttributes();
            }
        }
        $this->render('formulario', array('model' => $model));
        //$this->layout = 'main-registro';
        //$this->render('registro', array('model' => $model, 'msg' => $msg));
    }
    
    //public function actionActivaRegistro($email, ) {
        
    //}

}
