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
            /*array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            /*array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),*/
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index', 'role'),
                //'users' => array('admin', 'oacero'),
                'roles' => array('super_admin', 'ciudadano'),
            ),
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
        $usuarios = Usuario::model()->findAll();
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
    public function actionRole(){
        $modelRole = new RoleForm;
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin';
        $this->render('role', array('modelRole' => $modelRole));
    }
}
