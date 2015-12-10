<?php
class BitacoraController extends Controller {
    public $_menuActive;
    public $_datosUser;
    /* public function __construct() {
      $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
      $this->_datosUser = $modelUser;
      } */
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
                'actions' => array('index', 'actividad','viewActividad','participantes','actividad_detalle','registrocasointerno'),
                //'users' => array('admin', 'oacero'),
                'roles' => array('super_admin', 'ciudadano', 'bitacora'),
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
        //creo una instancia del modelo Dashboard
        $model = new Bitacora();
        //$datosTotalTramites = $model->getTotalTramite();
        //$datosRankingTramites = $model->getRankingTramite();
        //$datosPublicacionesTramites = $model->getPublicacionesTramites();
        $datosTarea = $model->getTarea();
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->render('index',compact('datosTarea'));
        //$this->render('formulario');
    }
    public function actionActividad() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Bitacora
        $model = new Bitacora();
        $dos = 0;
        if(isset($_POST["Bitacora"])){
          //$model->attibutes = $_POST[]
          if ($model->validate()){
            die("ingreso sin errores");  
          }
          
        }
       
        $this->layout = 'main-admin_form2';
        $this->_datosUser = $modelUser;
        $this->render('actividad',compact('model'),false,true);
        //$this->render('formulario');
    }
     public function actionviewActividad() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Ditacora
        $model = new Bitacora();
        $dos = 0;
        
        $datosTarea_Actividad = $model->getTarea_Actividad();
        $datosTarea_Participantes = $model->getTarea_Participantes();
        $datosTarea_Generador = $model->getTarea_Creador();        
        $datosActividad = $model->getActividad();
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin_form_caso';
        
        $this->_datosUser = $modelUser;
        $this->render('viewActividad',compact('datosTarea_Actividad','datosTarea_Participantes', 'datosActividad','datosTarea_Generador'),false,true);
      
    }

     public function actionParticipantes() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Bitacora
        $model = new Bitacora();
        $datosTarea_Participantes = $model->getTarea_Participantes();
        $this->_datosUser = $modelUser;
        $this->render('participantes',compact('datosTarea_Participantes'),false,true);
        //$this->render('formulario');
    }

    public function actionActividad_detalle() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Bitacora
        $model = new Bitacora();
        //$dos = 0;
        $this->layout = 'main-admin_form';
        $datosTarea_Participantes = $model->getTarea_Participantes();
        $this->_datosUser = $modelUser;
        $this->renderPartial('actividad_detalle',compact('datosTarea_Participantes'),false,true);
        //$this->render('formulario');
    }

    // accion 
    public function actionRegistroCasoInterno() {
        $insertar_tarea = $_POST['insertar_tarea'];
        //echo $insertar_tarea;
        

        if (isset($insertar_tarea)) {
            $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
            $id_usuario = $modelUser['usu_id'];

            $id_categoria = $_POST['id_categoria'];
            $id_institucion = $_POST['id_institucion'];
            $id_usuario_responsable = $_POST['id_usuario_responsable'];
            $nombre_tarea = $_POST['nombre_tarea'];
            $descripcion_tarea = $_POST['descripcion_tarea'];
            $start = $_POST['start'];
            $end = $_POST['end'];
            $meta_tarea = $_POST['meta_tarea'];

            //echo $id_categoria;
           

            $hoy = date("Y-m-d");

            $conexion = Yii::app()->db;
            $transaction = $conexion->beginTransaction();
            
            try {
                
                //Datos trámite
                $model_dbitacora = new Tarea();

                
                $model_dbitacora->tar_nombre = $nombre_tarea;
                $model_dbitacora->tar_descripcion = $descripcion_tarea;
                $model_dbitacora->tar_meta = $meta_tarea;
                $model_dbitacora->tar_fechainicio = $start;
                $model_dbitacora->tar_fechafin = $end;
                $model_dbitacora->tar_fecharegistro = $hoy;
                $model_dbitacora->tar_estado = 1;
                $model_dbitacora->ins_id = $id_institucion;
                $model_dbitacora->cat_id = $id_categoria;
                $model_dbitacora->save();
                $tar_id = $model_dbitacora->primaryKey;


                $model_dtarea_usuario = new TareaUsuario();

                $model_dtarea_usuario ->tar_id = $tar_id;
                $model_dtarea_usuario ->taru_estado = 1;
                $model_dtarea_usuario ->usu_id = $id_usuario;
                $model_dtarea_usuario ->taru_creador = 1;
                $model_dtarea_usuario -> save();



                /*


tar_id, tar_nombre, tar_descripcion, tar_meta, tar_fechainicio, 
            tar_fechafin, tar_fecharegistro, tar_estado, ins_id, cat_id,usu_id

                //Empresa_Trámite
                if ($empresa != 0) {
                    $model_empresa = new EmpresaTramite();
                    $model_empresa->emp_id = $empresa;
                    $model_empresa->datt_id = $id_dtramite;
                    $model_empresa->save();
                }

                //Solución
                $model_solucion = new Solucion();
                $model_solucion->datt_id = $id_dtramite;
                $model_solucion->usu_id = $id_usuario;
                $model_solucion->sol_titulo = $titulo_solucion;
                $model_solucion->sol_descripcion = $propuesta_solucion;
                $model_solucion->sol_vistas = 0;
                $model_solucion->sol_fecha = $hoy;
                $model_solucion->sol_estado = 1;
                $model_solucion->save();

                //Problemática
                
                if (strlen($_POST['problematica_otro'])>0) {
                    $model_problema = new ProblemaTramite();
                    $model_problema->prob_id = 41;
                    $model_problema->datt_id = $id_dtramite;
                    $model_problema->prot_estado_ = 0;
                    $model_problema->prot_nombreotroproblema = $problematica_otro;
                    $model_problema->save();
                }
                
                if (isset($_POST['problematica'])) {
                    $optionArray = $_POST['problematica'];
                    for ($i = 0; $i < count($optionArray); $i++) {
                        $model_problema = new ProblemaTramite();
                        $model_problema->prob_id = $optionArray[$i];
                        $model_problema->datt_id = $id_dtramite;
                        $model_problema->prot_estado_ = 0;
                        $model_problema->save();
                    }
                 
                }
                */
                
                $transaction->commit();
                header('Location:'.Yii::app()->baseURL.'/bitacora/index');
                
            } catch (Exception $e) {
                echo $e;
                echo "<div>Hubo un error</div>";
                $transaction->rollBack();
            }
        }
        
    }
}