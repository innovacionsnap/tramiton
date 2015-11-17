<?php

class EmpresaController extends Controller {

    public $_menuActive;
    public $_datosUser;

    public function actions() {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                //'backColor' => 0xFFFFFF,
                'backColor' => 0xD9E0E7,
                'testLimit' => 3,
            #'foreColor' => 0xFFFFFF,
            ),
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('empresa'),
                //'users' => array('admin', 'oacero'),
                'roles' => array('super_admin', 'ciudadano', 'bitacora'),
            ),
            array('deny', // deny all users
                #'roles' => array('*'),
                'users' => array('*'),
            ),
        );
    }
    public function actionIndex(){
        $model=new Empresa();
        $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
        $empresas=Empresa::model()->findAllByAttributes(array('usu_id' => ($usuario['usu_id'])));
        $this->layout='main-admin_form';
        $this->_datosUser = $usuario;
        $this->render('index',array('empresas'=>$empresas));
    }
    public function actionEmpresa() {
        $model = new Empresa;
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        // uncomment the following code to enable ajax-based validation
        /*
          if(isset($_POST['ajax']) && $_POST['ajax']==='empresa-empresa-form')
          {
          echo CActiveForm::validate($model);
          Yii::app()->end();
          }
         */

        if (isset($_POST['Empresa'])) {
            $model->attributes = $_POST['Empresa'];
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->render('registro', array('model' => $model));
    }

}
