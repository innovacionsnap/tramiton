<?php

class CantonController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionGetCantones() {
        $html = '';
        $provincia = $_POST['pro_id'];
        $cantones = $model= Canton::model()->findAllByAttributes(array('pro_id' => $provincia), array('order' => 'can_nombre asc'));
        $html = '<option value="">Selecciona un cantón</option>';
        foreach ($cantones as $canton):
            $html.='<option value="' . $canton['can_id'] . '">' . $canton['can_nombre'] . '</option>';
        endforeach;
        echo $html;
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
