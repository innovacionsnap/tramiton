<?php

class DatosTramiteController extends Controller {

    public $_casosTmp;
    public $_datosUser;
    
    public function accessRules() {
        return array(
            
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index','ranking'),
                //'users' => array('admin', 'oacero'),
                'roles' => array('super_admin', 'ciudadano', 'bitacoraaq', 'institucion'),
            ),
            array('deny', // deny all users
                #'roles' => array('*'),
                'users' => array('*'),
            ),
        );
    }
/**
 * Acción que permite visualizar la vista de casos registrados
 */
    public function actionIndex() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $modelTramite= new DatosTramite();
        $tramites=$modelTramite->getTramite();
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->_casosTmp = $this->getDatosTemporal();
        $this->render('index',compact('tramites'));
    }
    /**
     * Acción que permite visualizar el ranking de los 10 trámites más mencionados
     */
    public function actionRanking(){
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $modelTramite= new DatosTramite();
        $rankings=$modelTramite->getRanking();
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->_casosTmp = $this->getDatosTemporal();
        $this->render('ranking',compact('rankings'));
    }
    /**
     * Acción que permite buscar un caso específico
     */
    public function actionBusca() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $modelDatosTramite = new DatosTramite();
        $casos = $modelDatosTramite->getCaso($_POST['busca']);
        $this->layout = 'main-admin_form_caso';
        $this->_datosUser = $modelUser;
        $this->_casosTmp = $this->getDatosTemporal();
        $this->render('busca', compact('casos'));
    }
    /**
     * 
     * @return type
     */
    public function getDatosTemporal() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $modelVerificaTmp = new consultasBaseDatos;
        $verificaTmp = $modelVerificaTmp->verificaCasosTmp($modelUser->usu_cedula);
        return $verificaTmp;
    }
    
    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
