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
                'actions' => array('index', 'actividad','viewActividad','participantes','actividad_detalle'),
                //'users' => array('admin', 'oacero'),
                'roles' => array('super_admin', 'ciudadano', 'bitacoraaq'),
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
        $model = new Bitacora();
        //$datosTotalTramites = $model->getTotalTramite();
        //$datosRankingTramites = $model->getRankingTramite();
        //$datosPublicacionesTramites = $model->getPublicacionesTramites();
        $datosTarea = $model->getTarea();
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->render('index',compact('datosTarea'));
        //$this->render('formulario');
    }
    public function actionActividad() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Bitacora
        $model = new Bitacora();
        $dos = 0;
        if(isset($_POST["Bitacora"])){
          //$model->attibutes = $_POST[]
          if ($model->validate()){
            die("ingreso sin errores");  
          }
          
        }
       
        $this->layout = 'main-admin_form2';
        $this->_datosUser = $modelUser;
        $this->render('actividad',compact('model'),false,true);
        //$this->render('formulario');
    }
     public function actionviewActividad() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Ditacora
        $model = new Bitacora();
        $dos = 0;
        
        $datosTarea_Actividad = $model->getTarea_Actividad();
        $datosTarea_Participantes = $model->getTarea_Participantes();
        $datosTarea_Generador = $model->getTarea_Generador();        
        $datosActividad = $model->getActividad();
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin_form_caso';
        
        $this->_datosUser = $modelUser;
        $this->render('viewActividad',compact('datosTarea_Actividad','datosTarea_Participantes', 'datosActividad','datosTarea_Generador'),false,true);
      
    }

     public function actionParticipantes() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Bitacora
        $model = new Bitacora();
        //$dos = 0;
        $this->layout = 'main-admin_form';
        $datosTarea_Participantes = $model->getTarea_Participantes();
        $this->_datosUser = $modelUser;
        $this->renderPartial('participantes',compact('datosTarea_Participantes'),false,true);
        //$this->render('formulario');
    }

    public function actionActividad_detalle() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Bitacora
        $model = new Bitacora();
        //$dos = 0;
        $this->layout = 'main-admin_form';
        $datosTarea_Participantes = $model->getTarea_Participantes();
        $this->_datosUser = $modelUser;
        $this->renderPartial('actividad_detalle',compact('datosTarea_Participantes'),false,true);
        //$this->render('formulario');
    }
}