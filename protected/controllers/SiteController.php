<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
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
        $this->render('index', array("model" => $model, "model_login" => $model_login));
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
                //echo "estoy aqui";
                //echo Yii::app()->user->returnUrl;
                //Yii::app()->end();
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
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

        $model = new ValidarRegistro;
        $msg = '';

        if (isset($_POST['ValidarRegistro'])) {

            $model->attributes = $_POST['ValidarRegistro'];
            if (!$model->validate()) {
                $this->redirect($this->createUrl('site/registro'));
            } else {
                $msg = 'Gracias por registrarse, en breve recibirá un correo electrónico ';
                $msg .= 'con indicaciones para activar su cuenta.';
                //echo $msg;
                $model->unsetAttributes();
            }
        }

        $this->layout = 'main-registro';
        $this->render('registro', array('model' => $model, 'msg' => $msg));

        //$this->render('registro', array('model' => $model, 'msg' => $msg));
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

    public function actionValidaCedula() {
        //echo "estoy en validar cedula";
        //var_dump($_POST);
        //Yii::app()->end();
        $model = new ValidarCedula();
        $msg = '';

        if (isset($_POST['ValidarCedula'])) {

            $model->attributes = $_POST['ValidarCedula'];
            $model->cedula_participacion = $_POST['ValidarCedula']['cedula_participacion'];
            $token = $model->obtieneToken();
            $datos = $model->consultaCedulaRegistroCivil($model->cedula_participacion, $token);
            
            //var_dump($datos);
            
            //echo "valor ya en el modelo... " . $model->cedula_participacion;
            //Yii::app()->end();
            if (!$model->validate()) {
                $this->redirect($this->createUrl('site/index'));
            } else {
                //$this->layout = 'main';
                $this->render('formulario', array('model' => $model));
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

}
