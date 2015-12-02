<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminController
 *
 * @author Oscar
 */
class AdminController extends Controller {

    public $_datosUser;

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    //Reglas para accesos a las acciones de cotrolador de acuerdo a Roles
    public function accessRules() {
        return array(
            /* array('allow', // allow all users to perform 'index' and 'view' actions
              'actions' => array('index', 'view'),
              'users' => array('*'),
              ),
              /*array('allow', // allow authenticated user to perform 'create' and 'update' actions
              'actions' => array('create', 'update'),
              'users' => array('@'),
              ), */
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array(
                    'index',
                    'role',
                    'nuevoRole',
                    'rolesUsuarios',
                    'asignarRol',
                    'activaDesactivaRol',
                    'viewRole',
                    'updateRole',
                    'deleteRole'
                ),
                'roles' => array('super_admin', 'ciudadano'),
            ),
            /* array('allow',
              'actions' => array(
              '*'
              ),
              //'users' => array('admin', 'oacero'),
              'roles' => array('super_admin', 'ciudadano'),
              ), */
            array('deny', // deny all users
                #'roles' => array('*'),
                'users' => array('*'),
            ),
        );
    }

    /**
     * Accion del modulo de administración que muestra la lista de usuarios
     */
    public function actionIndex() {
        //$usuarios = Usuario::model()->findAll();
        $criteria = New CDbCriteria;
        $criteria->condition='usu_estado <> 100';

        $usuarios = Usuario::model()->findAll($criteria);
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin';
        $this->render('index', array('usuarios' => $usuarios));
    }

    /**
     * Accion del modulo de roles que muestra la lista de roles creados
     * adicional a eso envía el modelo del rol a la vista para poder cargar 
     * el formulario en una ventana modal
     */
    public function actionRole() {
        $modelRole = new RoleForm;
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin';
        $this->render('role', array('modelRole' => $modelRole));
    }

    public function actionNuevoRole() {
        $modelRole = new RoleForm;

        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin';

        if (isset($_POST["ajax"]) and $_POST["ajax"] === "role-form") {
            echo CActiveForm::validate($role);
            Yii::app()->end();
        }

        if (isset($_POST["RoleForm"])) {
            $modelRole->attributes = $_POST["RoleForm"];
            if ($modelRole->validate()) {
                Yii::app()->authManager->createRole($modelRole->nombre, $modelRole->descripcion);
                //Yii::app()->authManager->assign($role->name, $id);
                //$this->render('role', array('modelRole' => $modelRole));

                $this->redirect(array("admin/role"));

                //$this->redirect(array("admin/role", "id" => $id));
            }
        }

        $this->render('role', array('modelRole' => $modelRole));
    }

    public function actionRolesUsuarios() {
        $modelRole = new RoleForm;
        $model=new Usuario('search');
        //$usuarios = Usuario::model()->findAll();
        $criteria = New CDbCriteria;
        $criteria->condition='usu_estado <> 100';

        $usuarios = Usuario::model()->findAll($criteria);
        
        $dataProvider=new CActiveDataProvider('Usuario');
		/*$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
        
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin';
        $this->render('roleUsuarios', array(
                    'model' => $model, 
                    'dataProvider' => $dataProvider,
                    'modelRole' => $modelRole,
                    'usuarios' => $usuarios
                ));
    }

    public function actionAsignarRol($usrId) {
        //$usuarios = Usuario::model()->findAll();
        //echo "llegue a asignar";
        //Yii::app()->end();
        $modelUserSelect = Usuario::model()->findByPk($usrId);
        $modelUserSesion = Usuario::model()->findByPk(Yii::app()->user->id);
        $this->_datosUser = $modelUserSesion;
        //var_dump($modelUser);
        //Yii::app()->end();
        $this->layout = 'main-admin';
        $this->render('asignaRoles', array('modelUserSelect' => $modelUserSelect));
    }

    public function actionActivaDesactivaRol($usrId) {
        //echo "voy a activar/desactivar roles";
        //Yii::app()->end();
        if (Yii::app()->authManager->checkAccess($_GET["item"], $usrId))
            Yii::app()->authManager->revoke($_GET["item"], $usrId);
        else
            Yii::app()->authManager->assign($_GET["item"], $usrId);
        $this->redirect(array("asignarRol", "usrId" => $usrId));
    }

    public function actionViewRole($role, $del = FALSE) {
        $existe = false;
        $sw = 0;
        if($del){
            $modelVerificaUsr = new consultasBaseDatos;
            $existe = $modelVerificaUsr->verificaRoleUser($role);
        }
        
        $rolSelect = array();
        foreach (Yii::app()->authManager->getAuthItems() as $data):
            if ($data->name == $role) {
                $rolSelect = array(
                    'nombre' => $data->name,
                    'descripcion' => $data->description,
                    'elimina' => $del,
                    'existe' => $existe
                );
                $sw = 1;
            }
            
        endforeach;
        $modelUserSesion = Usuario::model()->findByPk(Yii::app()->user->id);
        $modelMensajes = new MensajesAplicacion;
        $this->_datosUser = $modelUserSesion;
        $this->layout = 'main-admin';
        $this->render('viewRole', array('rolSelect' => $rolSelect, 'modelMensajes' => $modelMensajes, 'sw' => $sw));
    }

    public function actionUpdateRole($role) {
        $modelRole = new RoleForm;

        $rolSelect = array();
        foreach (Yii::app()->authManager->getAuthItems() as $data):
            if ($data->name == $role) {
                $rolSelect = array(
                    'nombre' => $data->name,
                    'descripcion' => $data->description
                );
            }
        endforeach;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'role-form-update') {
            echo CActiveForm::validate($modelRole);
            Yii::app()->end();
        }


        if (isset($_POST['RoleForm'])) {
            $modelRole->attributes = $_POST['RoleForm'];
            if (!$modelRole->validate()) {
                $this->redirect($this->createUrl('admin/role'));
            } else {
                $editRole = new consultasBaseDatos;
                $editRole->updateAuthItem(
                        $role, $modelRole->nombre, $modelRole->descripcion
                );

                //echo $msg;
                //$modelRole->unsetAttributes();
                $this->redirect($this->createUrl('admin/role'));
            }
        }



        $modelUserSesion = Usuario::model()->findByPk(Yii::app()->user->id);
        $this->_datosUser = $modelUserSesion;
        $this->layout = 'main-admin';
        $this->render("updateRole", array('modelRole' => $modelRole, 'rolSelect' => $rolSelect));
    }

    public function actionDeleteRole($role) {
        Yii::app()->authManager->removeAuthItem($role);

        $modelRole = new RoleForm;
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin';
        $this->render('role', array('modelRole' => $modelRole));
    }

}
