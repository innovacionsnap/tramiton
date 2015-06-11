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
     * Declares class-based actions.
     */
    public function actionIndex() {
  
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);

        //creo una instancia del modelo Dashboard
        $model = new Dashboard();
        $datosTotalTramites = $model->getTotalTramite();
        $datosRankingTramites = $model->getRankingTramite();
        $datosPublicacionesTramites = $model->getPublicacionesTramites();
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->render('dashboard_admin', compact('datosTotalTramites', 'datosRankingTramites','datosPublicacionesTramites'));
    
    }

}