<?php

class ReporteController extends Controller {

    public $_datosUser;

    public function actionIndex() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin';
        $this->render('index');
    }
    
    public function actionInstitucion() {
        
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        
        $datosInstitucion = $modelReporte->topTenInstituciones();
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin';
        $this->render('institucion', array('datosInstitucion' => $datosInstitucion));
        
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
