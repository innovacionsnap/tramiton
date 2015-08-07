<?php

class CiudadanoController extends Controller {
 
   
      public $_menuActive;
    public $_datosUser;

    
    /*public function __construct() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $this->_datosUser = $modelUser;
    }*/
    
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
                'actions' => array('index', 'valor','Usuario_Tramites','viewTramite_Usuario','viewTramite_Usuario_Comentario'),
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
        $this->layout = 'main-admin_form';
        $this->_datosUser = $modelUser;
        $this->render('form_ciudadano', compact('datosTotalTramites', 'datosRankingTramites','datosPublicacionesTramites'));
        //$this->render('formulario');
    
    }
    
	
	public function actionUsuario_Tramites() {
		
    	$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
		$model = new Ciudadano();
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $datosUsuarioTramite = $model->getUsuarioTramite();
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin_form';
        $this->render('usuario_tramites',compact('datosUsuarioTramite'));
    }
	
	public function actionviewTramite_Usuario() {
		
    	$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
		$model = new Ciudadano();
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $datosTramite_Usuario = $model->getTramite_Usuario();
		$datosTramite_Solucion = $model->getTramite_Solucion();
		$this->_datosUser = $modelUser;
        $this->layout = 'main-admin_form';
        $this->render('viewTramite_Usuario',compact('datosUsuarioTramite','datosTramite_Usuario','datosTramite_Solucion'));
    }

    public function actionviewTramite_Usuario_Comentario() {
        
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $model = new Ciudadano();
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        //$datosTramite_Usuario = $model->getTramite_Usuario();
        $datosTramite_Solucion_Comentario = $model->getdatosTramite_Solucion_Comentario();
        //$this->_datosUser = $modelUser;
        //$this->layout = 'main-admin_form';
        $this->renderPartial('viewTramite_Usuario_Comentario',compact('datosTramite_Solucion_Comentario'));
    }
    
   
}
