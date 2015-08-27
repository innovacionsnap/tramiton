<?php

class BitacoraController extends Controller {

    public $_menuActive;
    public $_datosUser;

    /* public function __construct() {
      $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
      $this->_datosUser = $modelUser;
      } */

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
                'actions' => array('index', 'actividad'),
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
        //$datosTotalTramites = $model->getTotalTramite();
        //$datosRankingTramites = $model->getRankingTramite();
        //$datosPublicacionesTramites = $model->getPublicacionesTramites();
        $this->layout = 'main-admin_form_caso';
        $this->_datosUser = $modelUser;
        $this->render('index');
        //$this->render('formulario');
    }

    public function actionActividad() {

        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);

        //creo una instancia del modelo Dashboard
        $model = new Dashboard();
        $dos = 0;
        //$datosTotalTramites = $model->getTotalTramite();
        //$datosRankingTramites = $model->getRankingTramite();
        //$datosPublicacionesTramites = $model->getPublicacionesTramites();
        $this->layout = 'main-admin_form_caso';
        $this->_datosUser = $modelUser;
        $this->renderPartial('actividad',compact('dos'));
        //$this->render('formulario');
    }

}
