<?php

class DatosTramiteController extends Controller {

    public $_menuActive;
    public $_datosUser;
    
    public function accessRules() {
        return array(
            
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index','ranking'),
                //'users' => array('admin', 'oacero'),
                'roles' => array('super_admin', 'ciudadano'),
            ),
            array('deny', // deny all users
                #'roles' => array('*'),
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $modelTramite= new DatosTramite();
        $tramites=$modelTramite->getTramite();
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->render('index',compact('tramites'));
    }
    
    public function actionRanking(){
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $modelTramite= new DatosTramite();
        $rankings=$modelTramite->getRanking();
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->render('ranking',compact('rankings'));
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
