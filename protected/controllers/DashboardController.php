<?php

class DashboardController extends Controller {

    public $_casosTmp;
    public $_datosUser;

    /* public function __construct() {
      //$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
      //$this->_datosUser = $modelUser;

      } */

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    
    /**
     * Reglas para accesos a las acciones de cotrolador de acuerdo a Roles
     * @return array
     */
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
                'actions' => array('index', 'valor', 'totaltramite', 'timeline', 'ranktramite', 'visitasolucion', 'votossolucion', 'procesacomentario', 'getusuario', 'getcomentario',
                    'validalike', 'getLike', 'procesamegusta', 'procesavista', 'cargatimeline'),
                //'users' => array('admin', 'oacero'),
                'roles' => array('super_admin', 'ciudadano', 'bitacora', 'institucion'),
            ),
            array('deny', // deny all users
                #'roles' => array('*'),
                'users' => array('*'),
            ),
        );
    }

        
    /**
     * Acción que permite renderizar la vista index
     */
    public function actionIndex() {
        
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $modelVerificaTmp = new consultasBaseDatos;
        $verificaTmp = $modelVerificaTmp->verificaCasosTmp($modelUser->usu_cedula);
        
        //var_dump($verificaTmp);
        
        //var_dump($modelUser);
        //Yii::app()->end();
        //$this->layout = 'main-admin';
        $this->layout = 'main-admin_form_caso';
        $this->_datosUser = $modelUser;
        $this->_casosTmp = $verificaTmp;
        $this->render('dashboard_admin', array('verificaTmp' => $verificaTmp, 'modelUser' => $modelUser));
    }
/**
 * Acción que permite renderizar en el dashboard el timeline de casos registrados
 */
    public function actionTimeline() {
        //$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $limite = 0;
        $total = Solucion::model()->count();
        $datosSolucion = Solucion::model()->findAllByAttributes(array('sol_estado' => 1), array('order' => 'sol_fecha desc, sol_id desc', 'limit' => 16, 'offset' => $limite));
        //$this->layout = 'main-admin';
        //$this->_datosUser = $modelUser;
        $this->renderPartial('timeline', compact('datosSolucion', 'total'), false, true);
        //$this->renderPartial('prueba', compact('datosSolucion','total'),false,true);
    }
/**
 * Acción que permite cargar dinámicamente el timeline de casos registrados
 */
    public function actionCargaTimeline() {
        if (isset($_GET['lim'])) {
            $limite = $_GET['lim'];
        } else {
            $limite = 0;
        }
        $html = '';
        $html.='<div class="row">';
        $datosSolucion = Solucion::model()->findAllByAttributes(array('sol_estado' => 1), array('order' => 'sol_fecha desc, sol_id desc', 'limit' => 16, 'offset' => $limite));
        foreach ($datosSolucion as $datoSolucion):
            $html.='<div class="col-contenido-solucion col-xs-6 col-sm-4 col-md-3">';
            $html.='<div class="contenido-solucion center-block">
                        <div class="usuario">
                            <img src="';
            $html.= (Yii::app()->theme->baseUrl) . '/assets/img/users/';
            $html.= $this->getImagen($datoSolucion['usu_id']) . '" alt=""/>';
            $html.='<span>' . $this->GetUsuario($datoSolucion['usu_id']) . '</span></div>';
            $html.='<div class="detalles">
                <span title="Me Gusta"><i class="fa fa-thumbs-o-up fa-fw"></i>' . $this->getLike($datoSolucion['sol_id']) . '</span>
                <span title="Comentarios"><i class="fa fa-comments fa-fw"></i>' . $this->getNumComentarios($datoSolucion['sol_id']) . '</span>
                <span title="Vistas"><i class="fa fa-eye fa-fw"></i>' . $this->getVista($datoSolucion['sol_id']) . '</span>
            </div>
            <div class="compartir">
                    <a href="https://www.facebook.com/sharer.php?u=';
            $id=Empresa::model()->codificaGet('sol='.$datoSolucion['sol_id']);
            $urlShare = Yii::app()->createAbsoluteUrl('solucion/index?'.$id);
            $html.=urlencode($urlShare) . '" target="_blank"><i class="fa fa-adjust fa-facebook facebook"></i></a>
                    <a href="https://twitter.com/share?url=';

            $html.=urlencode($urlShare) . '" target="_blank"><i class="fa fa-adjust fa-twitter twitter"></i></a>
                    <a href="https://plus.google.com/share?url=';
            $html.=urlencode($urlShare) . '" target="_blank"><i class="fa fa-adjust fa-google-plus plus"></i></a>
                </div>
            <hr>
            <div class="cuerpo">
                <p>';

            $sol_descripcion = substr($datoSolucion['sol_descripcion'], 0, 150);
            $html.= $sol_descripcion . '<a href="../solucion/index?' . $id . '" class="solucion-new" target="_blank"> Leer más >></a>
                </p>
            </div>
            <hr>
            <div class="pie">
                <div class="fecha">
                    <span>Publicado el: ' . $datoSolucion['sol_fecha'] . '</span>
                </div>
            </div>
        </div>
        </div>';
        endforeach;
        $html.='</div>';
        echo $html;
    }
/**
 * 
 */
    public function actionValor() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        
        $modelVerificaTmp = new consultasBaseDatos;
        $verificaTmp = $modelVerificaTmp->verificaCasosTmp($modelUser->usu_cedula);
        
        $this->_datosUser = $modelUser;
        $this->_casosTmp = $verificaTmp;
        $this->layout = 'main-admin';
        //$this->_datosUser = $modelUser;
        //$this->render('ranking_tramites');
    }
/**
 * Acción que permite obtener el número total de casos registrados
 */
    public function actionTotalTramite() {
        $model = new Dashboard();
        $datosTotalTramites = $model->getTotalTramite();
        echo $datosTotalTramites[0]['total_tramites'];
    }
/**
 * Acción que permite obtener el porcentaje de los 10 trámites más reportados 
 */
    public function actionRankTramite() {
        $model = new Dashboard();
        $datosRankingTramites = $model->getRankingTramite();
        echo $datosRankingTramites[0]['ranking_tramites'] . ' %';
    }
/**
 * Acción que permite obtener el porcentaje de las 10 soluciones más vsitadas
 */
    public function actionVisitaSolucion() {
        $model = new Dashboard();
        $datosRankingSolucion = $model->getRankingSolucion();
        echo($datosRankingSolucion[0]['visita_solucion'] . ' %');
    }
/**
 * Acción que permite obtener el porcentaje de soluciones con más likes
 */
    public function actionVotosSolucion() {
        $model = new Dashboard();
        $datosRankingLikes = $model->getRankingLike();
        echo ($datosRankingLikes[0]['votos_solucion']);
    }
/**
 * Función que permite obtener el nombre de usuario a partir del id de usuario
 * @param int $usu_id
 * @return string
 */
    public static function getUsuario($usu_id) {
        $usuario = Usuario::model()->findByPk($usu_id);
        $nombre_usuario = $usuario->usu_nombreusuario;
        return $nombre_usuario;
    }
/**
 * Función que permite obtener el nombre de la imagen de un usuario específico
 * @param int $usu_id
 * @return string
 */
    public static function getImagen($usu_id) {
        $usuario = Usuario::model()->findByPk($usu_id);
        $usu_imagen = $usuario->usu_imagen;
        return $usu_imagen;
    }
/**
 * Acción que permite agregar comentarios a un a solución específica
 */
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
/**
 * Función que permite obtener los comentarios de una solución dada
 * @param int $solucion
 */
    public static function getComentario($solucion) {
        $comentarios = Comentario::model()->findAll($condition = 'sol_id=' . $solucion);
        foreach ($comentarios as $dato):
            $usuario = $this->GetUsuario($dato['usu_id']);
            $html = '<div class="row" style="border-top: 1px solid #ffffff;"><p><font style="color:#348fe2;">' . $usuario . '</font><font> ' . $dato['com_descripcion'] . '</font></p></div>';
            echo $html;
        endforeach;
    }
/**
 * Función que permite obtener el número de comentarios de una solución dada
 * @param int $solucion
 * @return int
 */
    public static function getNumComentarios($solucion) {
        $comentarios = Comentario::model()->findAll($condition = 'sol_id=' . $solucion);
        $num_comentarios = count($comentarios);
        return $num_comentarios;
    }
/**
 * Función que permite validar en qué estado se encuentra un like de una solución y un usuario específicos
 * @param int $solucion
 * @return boolean
 */
    public static function validaLike($solucion) {
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
/**
 * Función que permite obtener el número de likes de una solución específica
 * @param int $solucion
 * @return int
 */
    public static function getLike($solucion) {
        $like = Megusta::model()->findAll('sol_id=' . $solucion . 'And mgu_estado=\'1\'');
        $num_likes = count($like);
        return $num_likes;
    }
/**
 * Función que permite obtener el número total de soluciones activas
 * @return int
 */
    public static function getTotalSoluciones() {
        $solucion = Solucion::model()->findAll('sol_estado=1');
        $total_soluciones = count($solucion);
        return $total_soluciones;
    }
/**
 * Acción que permite registrar likes en una solución específica
 */
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
/**
 * Función que permite obtener el número de vistas de una solución específca
 * @param int $id
 * @return int
 */
    public static function getVista($id) {
        $sol = Solucion::model()->find('sol_id=' . $id);
        return $sol->sol_vistas;
    }
/**
 * Acción que permite registrar una vista para una solución específica
 */
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
/**
 * Función que permite obtener las noticias del dashboard
 * @return array
 */
    public static function getNoticias() {
        $noticias = LogSistema::model()->findAllByAttributes(array('logs_tipo_publicacion' => "p_usuario"), array('order' => 'logs_fechahora desc, logs_id desc', 'limit' => 10));
        return $noticias;
    }

}
