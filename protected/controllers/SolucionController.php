<?php

class SolucionController extends Controller {

    public $_datosUser;

    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index', 'RankingSoluciones', 'procesacomentario'),
                'roles' => array('super_admin', 'ciudadano'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $model_solucion = new Solucion();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        Yii::import('application.controllers.DashboardController');
        $id = $_GET['sol'];
        $solucion = $this->getSolucion($id);
        $experiencia = DatosTramite::model()->find('datt_id=' . $solucion['datt_id']);
        $tramite = $model_solucion->getTramite($experiencia['trai_id']);
        $imagen_usuario = DashboardController::getImagen($solucion['usu_id']);
        $usuario_solucion = DashboardController::getUsuario($solucion['usu_id']);
        $vistas = $this->procesaVista($id);
        $comentario = $this->getComentario($id, 'inicio');
        if (Yii::app()->user->isGuest == 1) {
            $this->layout = 'main';
        } else {
            //$this->layout = 'main-admin';
            //$this->layout = 'main-admin_form_caso';
           // $this->_datosUser = $modelUser;
        }
        $this->render('solucion', array('solucion' => $solucion, 'imagen_usuario' => $imagen_usuario, 'usuario_solucion' => $usuario_solucion, 'comentario' => $comentario, 'vistas' => $vistas, 'experiencia' => $experiencia, 'tramite' => $tramite));
        //$this->renderPartial('solucion', array('solucion' => $solucion, 'imagen_usuario' => $imagen_usuario, 'usuario_solucion' => $usuario_solucion, 'comentario' => $comentario, 'vistas' => $vistas, 'experiencia' => $experiencia, 'tramite' => $tramite),false,true);
    }

    public function actionProcesaComentario() {
        $comentario = new Comentario();
        $comentario_enviado = $_POST['comentario-interno'];
        $solucion = $_POST['solucion'];
        $usuario = Yii::app()->user->id;
        $fecha = date('d/m/y', time());

        $comentario->sol_id = $solucion;
        $comentario->usu_id = $usuario;
        $comentario->com_descripcion = $comentario_enviado;
        $comentario->com_fecha = $fecha;
        if ($comentario->save()) {
            $this->getComentario($solucion, 'comentado');
        }
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

    public function getComentario($solucion, $bandera) {
        $comentarios = Comentario::model()->findAll($condition = 'sol_id=' . $solucion);
        if ($bandera == 'inicio') {
            return $comentarios;
        } else {
            foreach ($comentarios as $dato):
                $usuario = $this->GetUsuario($dato['usu_id']);
                $html = '<div class="row" style="border-top: 1px solid #ffffff;"><p><font style="color:#348fe2;">' . $usuario . '</font><font> ' . $dato['com_descripcion'] . '</font></p></div>';
                echo $html;
            endforeach;
        }

        /**/
    }

    public function getVista($id) {
        $sol = Solucion::model()->find('sol_id=' . $id);
        return $sol->sol_vistas . ' Vistas';
    }

    public function procesaVista($id) {
        $sol = Solucion::model()->find('sol_id=' . $id);
        $vista = $sol->sol_vistas + 1;
        $sol->sol_vistas = $vista;
        if ($sol->update()) {
            $vista = $this->getVista($id);
            return $vista;
        }
    }

    public function actionRankingSoluciones() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $solucion = new Solucion();
        $datosRankingSolucion = $solucion->getRanking();
        //$soluciones = Solucion::model()->findAllByAttributes(array('sol_estado' => 1), array('order' => 'sol_vistas desc', 'limit' => 10));
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->render('ranking', compact('datosRankingSolucion'));
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
