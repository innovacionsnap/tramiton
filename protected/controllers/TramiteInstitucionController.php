<?php
class TramiteInstitucionController extends Controller {
    public $_casosTmp;
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
                'roles' => array('super_admin', 'ciudadano', 'institucion', 'bitacora'),
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
        $this->layout = 'main-admin-asc';
        $this->_datosUser = $modelUser;
        $this->_casosTmp = $this->getDatosTemporal();
        $this->render('index',compact('datosgetTramiteInstitucion'));
        //$this->render('formulario');
    }
    
    public function actionviewTramite_Institucion($traiId) {
        
        $traiId = Yii::app()->encriptaParam->decodificaParamGet($traiId);
        
        //echo "tramite institucion: " . $traiId; Yii::app()->end();
        
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Dashboard
        $model = new TramiteInstitucion();
        $datosgetTramiteInstitucionDetalle = $model->getTramiteInstitucionDetalle($traiId, $modelUser->usu_id);
       
        $this->layout = 'main-admin_form_caso';
        $this->_datosUser = $modelUser;
        $this->_casosTmp = $this->getDatosTemporal();
        $this->render('viewTramite_Institucion',compact('datosgetTramiteInstitucionDetalle'));
        //$this->render('formulario');
    }

    public function actionviewTramite_Accion_Correctiva($traiId, $traId) {
        
        $traiId = Yii::app()->encriptaParam->decodificaParamGet($traiId);
        $traId = Yii::app()->encriptaParam->decodificaParamGet($traId);
        
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Dashboard
        $model = new TramiteInstitucion();
        $datoAccioneCorrectiva = $model->getAccioneCorrectiva($traiId);
        $rol=$modelUser['rol_id'];
        $this->layout = 'main-admin_form_caso';
        $this->_datosUser = $modelUser;
        $this->_casosTmp = $this->getDatosTemporal();
        $this->render('viewTramite_Accion_Correctiva', compact('datoAccioneCorrectiva','rol'));
        //$this->render('formulario');
    }

      public function actionaccion_correctiva() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Bitacora
        $model = new Bitacora();
        $dos = 0;
              
        $this->layout = 'main-admin_form';
        $this->_datosUser = $modelUser;
        $this->_casosTmp = $this->getDatosTemporal();
        $this->renderPartial('accion_correctiva',compact('model'),false,true);
        //$this->render('formulario');
    }
    
    public function getDatosTemporal() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $modelVerificaTmp = new consultasBaseDatos;
        $verificaTmp = $modelVerificaTmp->verificaCasosTmp($modelUser->usu_cedula);
        return $verificaTmp;
    }
}