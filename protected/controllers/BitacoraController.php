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
                'actions' => array('index', 
                    'actividad',
                    'viewActividad',
                    'participantes',
                    'actividad_detalle',
                    'registrocasointerno',
                    'RegistroParticipante',
                    'eliminarparticipante',
                    'registroaccion',
                    'actividad_detalle_ver'),
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
        $datosPermiso_Participantes = $model ->getPermiso_Participantes();
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin_form_caso';
        
        $this->_datosUser = $modelUser;
        $this->render('viewActividad',compact('datosTarea_Actividad','datosTarea_Participantes', 'datosActividad','datosTarea_Generador','datosPermiso_Participantes'),false,true);
      
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
        //$datosTarea_Participantes = $model->getTarea_Participantes();
        $this->_datosUser = $modelUser;
        $this->render('actividad_detalle');
        //$this->render('formulario');
    }


    public function actionActividad_detalle_ver() {
        
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Bitacora
        $model = new Bitacora();
        $datosActividad_Ver = $model->getActividad_Ver();
        $this->_datosUser = $modelUser;
        $this->render('actividad_detalle_ver',compact('datosActividad_Ver'),false,true);
        //$this->render('formulario');
    }

    // registro de tareas
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
            $id_importancia = $_POST['id_importancia'];
            //$start = substr("abcdef", -1);
            $dia_start = substr($start, 0,2);
            //$dia_start = substr($start, 0,2);
            //echo $dia_start;
            //echo $min_start;
            //echo $anio_start;


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
                $model_dbitacora->tar_fechainicio = $hoy;
                $model_dbitacora->tar_fechafin = $hoy;
                $model_dbitacora->tar_fecharegistro = $hoy;
                $model_dbitacora->tar_estado = 1;
                $model_dbitacora->ins_id = $id_institucion;
                $model_dbitacora->tar_tipo = 1;
                $model_dbitacora->tar_nivel = 1;
                $model_dbitacora->tar_estatus = 0;
                $model_dbitacora->tar_importancia = $id_importancia;
                $model_dbitacora->cat_id = $id_categoria;
                $model_dbitacora->save();
                $tar_id = $model_dbitacora->primaryKey;


                $model_dtarea_usuario = new TareaUsuario();

                $model_dtarea_usuario ->tar_id = $tar_id;
                $model_dtarea_usuario ->taru_estado = 1;
                $model_dtarea_usuario ->usu_id = $id_usuario;
                $model_dtarea_usuario ->taru_creador = 1;
                $model_dtarea_usuario -> save();

                
                $transaction->commit();
                header('Location:'.Yii::app()->baseURL.'/bitacora/index');
                
            } catch (Exception $e) {
                echo $e;
                echo "<div>Hubo un error</div>";
                $transaction->rollBack();
            }
        }
        
    }



    // registro de participantes
    public function actionRegistroParticipante() {
        $insertar_participante = $_POST['insertar_participante'];
        echo $insertar_participante;
        

        if (isset($insertar_participante)) {
            $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
            //$id_usuario = $modelUser['usu_id'];

            $id_participante = $_POST['id_participante'];
            $tar_id = $_POST['tar_id'];

            

            //echo $id_categoria;
           

            $hoy = date("Y-m-d");

            $conexion = Yii::app()->db;
            $transaction = $conexion->beginTransaction();
            
            try {
                
               

                $model_dtarea_usuario = new TareaUsuario();

                $model_dtarea_usuario ->tar_id = $tar_id;
                $model_dtarea_usuario ->taru_estado = 1;
                $model_dtarea_usuario ->usu_id = $id_participante;
                $model_dtarea_usuario ->taru_creador = 0;
                $model_dtarea_usuario -> save();

                
                $transaction->commit();
                header('Location:'.Yii::app()->baseURL.'/bitacora/participantes?tar_id='.$tar_id.'');
                
            } catch (Exception $e) {
                echo $e;
                echo "<div>Hubo un error</div>";
                $transaction->rollBack();
            }
        }
        
    }

    // eliminar participantes
    public function actionEliminarParticipante() {
        $eliminar_participante = $_POST['eliminar_participante'];
        $taru_id = $_POST['taru_id'];
        $tar_id = $_POST['tar_id'];
        

        if (isset($eliminar_participante)) {
            $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
           
            $sql1= "delete from tarea_usuario where taru_id = $taru_id";
            $hoy = date("Y-m-d");

            $conexion = Yii::app()->db;
            $transaction = $conexion->beginTransaction();
            
            try {
            
                $conexion->createCommand($sql1)->execute();
     
                $transaction->commit();
                header('Location:'.Yii::app()->baseURL.'/bitacora/participantes?tar_id='.$tar_id.'');
            
                
            } catch (Exception $e) {
                echo $e;
                echo "<div>Hubo un error</div>";
                $transaction->rollBack();
            }
        }
        
        
    }

    // registro de acciones - actividad
    public function actionRegistroAccion() {
        $insertar_participante = $_POST['insertar_actividad_detalle'];
        echo $insertar_participante;
        

        if (isset($insertar_participante)) {
            $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
            $id_usuario = $modelUser['usu_id'];
            $tar_id = $_POST['tar_id'];

           
            $tar_id = $_POST['tar_id'];
            $nombre_actividad = $_POST["nombre_actividad"];
            $estado_actividad = $_POST["estado_actividad"];
            $descripcion_actividad = $_POST["descripcion_actividad"];
            $nivel_actividad = $_POST["nivel_actividad"];
            

            //echo $id_categoria;
           

            $hoy = date("Y-m-d");

            $conexion = Yii::app()->db;
            $transaction = $conexion->beginTransaction();
            
            try {
                
               

                $model_accion = new Accion();

                $model_accion ->acc_nombre = $nombre_actividad;
                $model_accion ->acc_descripcion = $descripcion_actividad;
                $model_accion ->acc_fechainicio = $hoy;
                $model_accion ->acc_fechafin = $hoy;
                $model_accion ->acc_fecharegistro = $hoy;
                $model_accion ->acc_estado = $estado_actividad;
                $model_accion ->tar_id = $tar_id ;
                $model_accion ->usu_id = $id_usuario;
                $model_accion ->acc_nivel = $nivel_actividad;
                
                $model_accion -> save();

                
                $transaction->commit();
                header('Location:'.Yii::app()->baseURL.'/bitacora/actividad_detalle?tar_id='.$tar_id.'');
                
            } catch (Exception $e) {
                echo $e;
                echo "<div>Hubo un error</div>";
                $transaction->rollBack();
            }
        }
        
    }

   // public function 

}