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
                'actions' => array('empresa', 'ingresarEmpresa', 'guardarEmpresa'),
                //'users' => array('admin', 'oacero'),
                'roles' => array('super_admin', 'ciudadano', 'bitacoraaq'),
            ),
            array('deny', // deny all users
#'roles' => array('*'),
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $model = new Empresa();
        $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
        $empresas = Empresa::model()->findAllByAttributes(array('usu_id' => ($usuario['usu_id'])));
        $this->layout = 'main-admin_form_caso';
        $this->_datosUser = $usuario;
        $this->render('index', array('empresas' => $empresas));
    }

    public function actionEmpresa() {
        $id_usuario = Yii::app()->user->id;
        $modelUser = Usuario::model()->findByPk($id_usuario);
        $model = new Empresa();
        $empresas = Empresa::model()->findAllByAttributes(array('usu_id' => $id_usuario));
        $this->layout = 'main-admin_form_caso';
        $this->_datosUser = $modelUser;
        $this->render('registro', array('empresas' => $empresas, 'model' => $model));
    }

    public function actionIngresarEmpresa() {
// uncomment the following code to enable ajax-based validation
        $id_usuario = Yii::app()->user->id;
        $modelUser = Usuario::model()->findByPk($id_usuario);
        
        if (empty($_GET)) {
            $model = new Empresa();
        } else {
            Empresa::model()->decodificaGet($_SERVER["REQUEST_URI"]);
            $id_empresa = $_GET['emp'];
            $model = Empresa::model()->findByPk($id_empresa);
            
        }
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->render('nueva_empresa', array('model' => $model, 'id_usuario' => $id_usuario));
    }

    public function actionGuardarEmpresa() {
        $empresa = array();
        $empresa = $_POST['Empresa'];

        if ($empresa['emp_id'] == ''or $empresa['emp_id'] == NULL) {
            //nuevo registro
            $model = new Empresa();
            $model->attributes = $empresa;
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect($this->createUrl('empresa/empresa'));
                };
            }
        } else {
            //Actualiza registro
            $model = Empresa::model()->findByPk($empresa['emp_id']);
            $model->attributes = $empresa;
            if ($model->update()) {
                $this->redirect($this->createUrl('empresa/empresa'));
            }
        }
    }

    public function actionvalidaRuc() {
        $ruc = $_POST['ruc'];
        $empresa = Empresa::model()->findByAttributes(array('emp_ruc' => $ruc));
        $nro_empresas = count($empresa);
        if ($nro_empresas == 0) {
            //validación con SRI
            $model = new Empresa();
            $token = $model->obtieneToken();
            $datos = $model->consultaRucSri($ruc, $token);
            $emp = array();
            $emp['emp_razon'] = $datos->emp_razon;
            $emp['emp_direccion'] = $datos->emp_direccion;
            $emp['emp_telefono1'] = substr($datos->emp_telefono1, 1, 10);
            $emp['emp_fax'] = $datos->emp_fax;
            //enviamos a la vista que solicitó con ajax 
            print_r(json_encode($emp));
        } else {
            echo $nro_empresas;
        }
    }

}
