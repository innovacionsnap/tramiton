<?php

class DashboardController extends Controller {

    public $_menuActive;
    public $_datosUser;
    
   /* public function __construct() {
      //$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
      //$this->_datosUser = $modelUser;
        
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
            /* array('allow', // allow all users to perform 'index' and 'view' actions
              'actions' => array('index', 'view'),
              'users' => array('*'),
              ),
              /*array('allow', // allow authenticated user to perform 'create' and 'update' actions
              'actions' => array('create', 'update'),
              'users' => array('@'),
              ), */
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index', 'valor','totaltramite','ranktramite', 'visitasolucion','votossolucion','procesacomentario', 'getusuario', 'getcomentario',
                    'validalike', 'getLike', 'procesamegusta', 'procesavista'),
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
        $datosSolucion = Solucion::model()->findAllByAttributes(array('sol_estado' => 1), array('order' => 'sol_fecha desc, sol_id desc', 'limit' => 20));
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        //$this->render('dashboard_admin', compact('datosTotalTramites', 'datosRankingTramites', 'datosPublicacionesTramites', 'datosSolucion', 'datosTotalSoluciones', 'datosRankingSolucion','datosRankingLikes'));
        $this->render('dashboard_admin', compact('datosSolucion'));
    }

    public function actionValor() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin';
        //$this->_datosUser = $modelUser;
        //$this->render('ranking_tramites');
    }
    
    public function actionTotalTramite(){
        $model = new Dashboard();
        $datosTotalTramites = $model->getTotalTramite();
        echo $datosTotalTramites[0]['total_tramite'];
    }
    
    public function actionRankTramite(){
        $model = new Dashboard();
        $datosRankingTramites = $model->getRankingTramite();
        $datosTotalTramites = $model->getTotalTramite();
        echo round(($datosRankingTramites[0]['sum_10_tot_tramite']*100/$datosTotalTramites[0]['total_tramite']),2)."%";
    }
    
    public function actionVisitaSolucion(){
        $model = new Dashboard();
        $total_soluciones=  $this->getTotalSoluciones();
        $datosRankingSolucion = $model->getRankingSolucion();
        echo round(($datosRankingSolucion[0]['vistas']*100/$total_soluciones),2)."%";
        
    }
    
    public function actionVotosSolucion(){
        $model = new Dashboard();
        $datosRankingLikes=$model->getRankingLike();
        $total_soluciones=  $this->getTotalSoluciones();
        echo round(($datosRankingLikes[0]['likes']*100/$total_soluciones), 2)."%";
    }
            

    public function getUsuario($usu_id) {
        $usuario = Usuario::model()->findByPk($usu_id);
        $nombre_usuario = $usuario->usu_nombreusuario;
        return $nombre_usuario;
    }

    public function getImagen($usu_id) {
        $usuario = Usuario::model()->findByPk($usu_id);
        $usu_imagen = $usuario->usu_imagen;
        return $usu_imagen;
    }

    public function actionProcesaComentario() {
        $comentario = new Comentario();
        $comentario_enviado = $_POST['comentario_' . $_POST['contador']];
        $solucion = $_POST['solucion'];
        $usuario = Yii::app()->user->id;
        $fecha = date('d/m/y', time());

        $comentario->sol_id = $solucion;
        $comentario->usu_id = $usuario;
        $comentario->com_descripcion = $comentario_enviado;
        $comentario->com_fecha = $fecha;
        if ($comentario->save()) {
            $this->getComentario($solucion);
        }
    }

    public function getComentario($solucion) {
        $comentarios = Comentario::model()->findAll($condition = 'sol_id=' . $solucion);
        foreach ($comentarios as $dato):
            $usuario = $this->GetUsuario($dato['usu_id']);
            $html = '<div class="row" style="border-top: 1px solid #ffffff;"><p><font style="color:#348fe2;">' . $usuario . '</font><font> ' . $dato['com_descripcion'] . '</font></p></div>';
            echo $html;
        endforeach;
    }

    public function validaLike($solucion) {
        $usuario = Yii::app()->user->id;
        $like = Megusta::model()->findAll('sol_id=' . $solucion . 'And usu_id=' . $usuario);
        $contador = count($like);
        if ($contador > 0) {
            foreach ($like as $dato)
                $estado = $dato['mgu_estado'];
            if ($estado == 1) {
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    public function getLike($solucion) {
        $like = Megusta::model()->findAll('sol_id=' . $solucion . 'And mgu_estado=\'1\'');
        $num_likes = count($like);
        return $num_likes;
    }

    public function getTotalSoluciones() {
        $solucion = Solucion::model()->findAll('sol_estado=1');
        $total_soluciones = count($solucion);
        return $total_soluciones;
    }
    
    public function actionProcesaMegusta() {
        $solucion = $_GET['sol'];
        $usuario = Yii::app()->user->id;
        $like = Megusta::model()->find('sol_id=' . $solucion . 'And usu_id=' . $usuario);
        $contador = count($like);

        if ($contador > 0) {
            if ($like->mgu_estado == 1) {
                $like->mgu_estado = 0;
            } else {
                $like->mgu_estado = 1;
            }
            if ($like->update()) {
                echo $this->getLike($solucion);
            };
        } else {
            $nuevo_like = new Megusta();
            $fecha = date('d/m/y', time());
            $nuevo_like->sol_id = $solucion;
            $nuevo_like->mgu_fecha = $fecha;
            $nuevo_like->mgu_estado = 1;
            $nuevo_like->usu_id = $usuario;
            $texto = "Ya no me gusta";
            if ($nuevo_like->save()) {
                echo $this->getLike($solucion);
            }
        }
    }

    public function getVista($id) {
        $sol = Solucion::model()->find('sol_id=' . $id);
        return $sol->sol_vistas . ' Vistas';
    }

    public function actionprocesaVista() {
        $id = $_GET['sol'];

        $sol = Solucion::model()->find('sol_id=' . $id);
        $vista = $sol->sol_vistas + 1;
        $sol->sol_vistas = $vista;
        if ($sol->update()) {
            $vista = $this->getVista($id);
            echo $vista;
        }
    }

    public function getNoticias() {
        $noticias = LogSistema::model()->findAllByAttributes(array('logs_tipo_publicacion'=>"p_usuario"),array('order'=>'logs_fechahora desc, logs_id desc','limit'=>10));
        return $noticias;
    }

}
