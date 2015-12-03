<?php
class TramiteInstitucionController extends Controller {
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
                'actions' => array('index', 'viewTramite_Institucion','viewTramite_Accion_Correctiva','accion_correctiva'),
                //'users' => array('admin', 'oacero'),
                'roles' => array('super_admin', 'ciudadano', 'institucion', 'bitacoraaq'),
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
        $model = new TramiteInstitucion();
        $datosgetTramiteInstitucion = $model->getTramiteInstitucion();
        //$datosRankingTramites = $model->getRankingTramite();
        //$datosPublicacionesTramites = $model->getPublicacionesTramites();
        //$datosTarea = $model->getTarea();
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->render('index',compact('datosgetTramiteInstitucion'));
        //$this->render('formulario');
    }
    
    public function actionviewTramite_Institucion() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Dashboard
        $model = new TramiteInstitucion();
        $datosgetTramiteInstitucionDetalle = $model->getTramiteInstitucionDetalle();
       
        $this->layout = 'main-admin_form_caso';
        $this->_datosUser = $modelUser;
        $this->render('viewTramite_Institucion',compact('datosgetTramiteInstitucionDetalle'));
        //$this->render('formulario');
    }

    public function actionviewTramite_Accion_Correctiva() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Dashboard
        $model = new TramiteInstitucion();
        $datoAccioneCorrectiva = $model->getAccioneCorrectiva();
       
        $this->layout = 'main-admin_form_caso';
        $this->_datosUser = $modelUser;
        $this->render('viewTramite_Accion_Correctiva', compact('datoAccioneCorrectiva'));
        //$this->render('formulario');
    }

      public function actionaccion_correctiva() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Bitacora
        $model = new Bitacora();
        $dos = 0;
              
        $this->layout = 'main-admin_form';
        $this->_datosUser = $modelUser;
        $this->renderPartial('accion_correctiva',compact('model'),false,true);
        //$this->render('formulario');
    }
}