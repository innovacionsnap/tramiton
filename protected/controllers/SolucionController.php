<?php

class SolucionController extends Controller {
    public $_datosUser;

    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index'),
                'roles' => array('super_admin', 'ciudadano'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        Yii::import('application.controllers.DashboardController');
        $id = $_GET['sol'];
        $solucion = $this->getSolucion($id);
        $imagen_usuario = DashboardController::getImagen($solucion['usu_id']);
        $usuario_solucion = DashboardController::getUsuario($solucion['usu_id']);
        $vistas=  $this->procesaVista($id);
        $comentario = $this->getComentario($id);
        //echo "<pre>"; print_r($comentario); echo "</pre>";
        //$this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->render('solucion', array('solucion' => $solucion, 'imagen_usuario' => $imagen_usuario, 'usuario_solucion' => $usuario_solucion, 'comentario' => $comentario, 'vistas' => $vistas));
    }

    public function getUsuario($usu_id) {
        $usuario = Usuario::model()->findByPk($usu_id);
        $nombre_usuario = $usuario->usu_nombreusuario;
        return $nombre_usuario;
    }

    public function getSolucion($id) {
        $solucion = Solucion::model()->find('sol_id=' . $id);
        return $solucion;
    }

    public function getComentario($solucion) {
        $comentarios = Comentario::model()->findAll($condition = 'sol_id=' . $solucion);
        return $comentarios;
    }
    
    public function getVista($id){
       $sol=  Solucion::model()->find('sol_id='.$id);
       return $sol->sol_vistas.' Vistas';
    }
    
    public function procesaVista($id){
        $sol=  Solucion::model()->find('sol_id='.$id);
        $vista= $sol->sol_vistas+1;
        $sol->sol_vistas=$vista;
        if ($sol->update()){
            $vista= $this->getVista($id);
            return $vista;
        }
        
        
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
