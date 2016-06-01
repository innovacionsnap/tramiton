<?php

class TramiteController extends Controller {

    public $_menuActive;
    public $_datosUser;

    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index', 'busca'),
                //'users' => array('admin', 'oacero'),
                'roles' => array('super_admin', 'ciudadano', 'bitacoraaq', 'institucion'),
            ),
            array('deny', // deny all users
                #'roles' => array('*'),
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {

        $this->render('index');
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
    /**
     * Acción que permite visualizar los trámites de una institución específica
     */
    public function actionGetTramites(){
       $html='';
       $institucion=$_POST['ins_id'];
       $tramites=  Tramite::model()->getTramites($institucion);
       $html='<option value="">Selecciona un trámite</option>';
       foreach ($tramites as $tramite):
           $html.='<option value="'.$tramite['tra_id'].'">'.$tramite['tra_nombre'].'</option>';
       endforeach;
       echo $html;
       
       
    }
}
