<?php

class DashboardController extends Controller {
    
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
                'actions' => array('index'),
                'users' => array('admin', 'oacero'),
                #'roles' => array('admin'),
            ),
            array('deny', // deny all users
                #'roles' => array('*'),
                'users' => array('*'),
            ),
        );
    }

    /**
     * Declares class-based actions.
     */
    public function actionIndex() {
        $username = Yii::app()->user->name;
        $modelUser = new Usuario;
        $model = new Dashboard;
        $datosTotalTramites = $model->getTotalTramite();
        $datosRankingTramites = $model->getRankingTramite();
        $datosUsuario = $modelUser->getDatosUsuario($username);
        //var_dump($datosUsuario);
        //Yii::app()->end();
        $this->layout = 'main-admin';
        $this->_datosUser = $datosUsuario;
        $this->render('dashboard_admin', compact('datosTotalTramites', 'datosRankingTramites', 'datosUsuario'));
    }

}