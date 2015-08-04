<?php

class MegustaController extends Controller {

    public $_datosUser;

    public function actionIndex() {
        $this->render('index');
    }

    public function actionRankingLikes() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $megusta = new Megusta();
        $datosVotosSolucion = $megusta->getVotosSolucion();
        //$soluciones = Solucion::model()->findAllByAttributes(array('sol_estado' => 1), array('order' => 'sol_vistas desc', 'limit' => 10));
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->render('ranking', compact('datosVotosSolucion'));
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
