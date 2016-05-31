<?php

/**
 *
 */
class BitacoraController extends Controller {

    public $_datosUser;
    public $_casosTmp;

    /* public function __construct() {
      $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
      $this->_datosUser = $modelUser;
      } */

    /**
     * Permite manipular los permisos para el controlador
     * @return void
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Reglas para accesos a las acciones de cotrolador de acuerdo a Roles
     * @return void
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
                'actions' => array('index',
                    'actividad',
                    'viewActividad',
                    'participantes',
                    'actividad_detalle',
                    'registrocasointerno',
                    'RegistroParticipante',
                    'eliminarparticipante',
                    'registroaccion',
                    'IngresaAccion',
                    'ActividadTramite',
                    'actividad_detalle_ver',
                    'interopera',
                    //tramites
                    'indexTramite',
                    'RegistroTramite',
                    'viewActividadTramite',
                    'problemaTramite',
                    'ActividadTramiteEdit',
                    'Indicadores',
                    'Reforma_Legal',
                    'RegistroReforma',
                    'RegistroInteropera',
                    'EliminarInteropera'
                ),
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

    /**
     * Consulta los casos temporales del usuario, obtiene datos de la tarea (bitácora),
     * llama a la vista index de bitacora
     * @return void
     */
    public function actionIndex() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $modelVerificaTmp = new consultasBaseDatos;
        $verificaTmp = $modelVerificaTmp->verificaCasosTmp($modelUser->usu_cedula);
        //creo una instancia del modelo Dashboard
        $model = new Bitacora();
        //$datosTotalTramites = $model->getTotalTramite();
        //$datosRankingTramites = $model->getRankingTramite();
        //$datosPublicacionesTramites = $model->getPublicacionesTramites();
        $datosTarea = $model->getTarea();
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->_casosTmp = $verificaTmp;
        $this->render('index', compact('datosTarea'));
        //$this->render('formulario');
    }

    /**
     * Trae la información del usuario por id
     * Obtiene la información de la tarea
     * Envía la información a la vista indexTramite
     * @return void
     */
    public function actionindexTramite() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Dashboard
        $model = new Bitacora();
        //$datosTotalTramites = $model->getTotalTramite();
        //$datosRankingTramites = $model->getRankingTramite();
        //$datosPublicacionesTramites = $model->getPublicacionesTramites();
        $datosTarea = $model->getTareaTramite();
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->render('indexTramite', compact('datosTarea'));
        //$this->render('formulario');
    }

    /**
     * Trae la información del usuario por id
     * Verifica que se haya enviado vía post los datos de Bitacora
     * Con esta información, renderiza la vista actividad de bitácora
     * @return void
     */
    public function actionActividad() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Bitacora
        $model = new Bitacora();
        $dos = 0;
        if (isset($_POST["Bitacora"])) {
            //$model->attibutes = $_POST[]
            if ($model->validate()) {
                die("ingreso sin errores");
            }
        }

        $this->layout = 'main-admin_form2';
        $this->_datosUser = $modelUser;
        $this->render('actividad', compact('model'), false, true);
        //$this->render('formulario');
    }

    /**
     * Trae la información del usuario por id
     * Crea una instancia del modelo Bitacora
     * Renderiza la vista actividadTramite
     * @return void
     */
    public function actionActividadTramite() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Bitacora
        $model = new Bitacora();
        $dos = 0;
        if (isset($_POST["Bitacora"])) {
            //$model->attibutes = $_POST[]
            if ($model->validate()) {
                die("ingreso sin errores");
            }
        }

        $this->layout = 'main-admin_form2';
        $this->_datosUser = $modelUser;
        $this->render('actividadTramite', compact('model'), false, true);
        //$this->render('formulario');
    }

    /**
     * Obtiene información del usuario por id
     * Trae información de la tarea, actividad
     * Renderiza la vista viewActividadTramite
     * @return void
     */
    public function actionviewActividadTramite() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Ditacora
        $model = new Bitacora();
        $dos = 0;

        $datosTarea_Actividad = $model->getTarea_Actividad();
        $datosTarea_Participantes = $model->getTarea_Participantes();
        $datosTarea_Generador = $model->getTarea_Creador();
        $datosActividad = $model->getActividad();
        $datosInteropera = $model->getInteropera();
        $datosReforma = $model->getReformaLegal();
        $datosPermiso_Participantes = $model->getPermiso_Participantes();
        $datosIndicador = $model->getIndicadores();
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin_form_caso';

        $this->_datosUser = $modelUser;
        $this->render('viewActividadTramite', compact('datosTarea_Actividad', 'datosTarea_Participantes', 'datosActividad', 'datosTarea_Generador'
                        , 'datosPermiso_Participantes', 'datosIndicador', 'datosReforma', 'datosInteropera'), false, true);
    }

    /**
     * Obtiene información del usuario por id
     * Trae información de la tarea, actividad
     * Renderiza la vista datosTarea_Actividad
     * @return void
     */
    public function actionviewActividad() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Ditacora
        $model = new Bitacora();
        $dos = 0;

        $datosTarea_Actividad = $model->getTarea_Actividad();
        $datosTarea_Participantes = $model->getTarea_Participantes();
        $datosInteropera = $model->getInteropera();
        $datosTarea_Generador = $model->getTarea_Creador();
        $datosActividad = $model->getActividad();
        $datosPermiso_Participantes = $model->getPermiso_Participantes();
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin_form_caso';

        $this->_datosUser = $modelUser;
        $this->render('viewActividad', compact('datosTarea_Actividad', 'datosTarea_Participantes', 'datosActividad', 'datosTarea_Generador', 'datosPermiso_Participantes', 'datosInteropera'), false, true);
    }

    /**
     * Obtiene información del usuario por id
     * Trae información de los participantes de una tarea
     * Renderiza la vista participantes
     * @return void
     */
    public function actionParticipantes() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Bitacora
        $model = new Bitacora();
        $datosTarea_Participantes = $model->getTarea_Participantes();
        $this->_datosUser = $modelUser;
        $this->render('participantes', compact('datosTarea_Participantes'), false, true);
        //$this->render('formulario');
    }

    /**
     * Obtiene información del usuario por id
     * Envía la información y renderiza la vista interopera
     * @return void
     */
    public function actionInteropera() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Bitacora
        $model = new Bitacora();
        $datosInteropera = $model->getInteropera();
        $this->_datosUser = $modelUser;
        $this->render('interopera', compact('datosInteropera'), false, true);
        //$this->render('formulario');
    }

    /**
     * Función que permite renderizar una vista de trámites con sus casos
     *
     */
    public function actionProblemaTramite() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Bitacora
        $model = new Bitacora();
        $datosTarea_Participantes = $model->getTarea_Participantes();
        $this->_datosUser = $modelUser;
        $this->render('problemaTramite', compact('datosTarea_Participantes'), false, true);
        //$this->render('formulario');
    }

    /**
     * Acción que permite renderizar la vista con el detalle de las actividades
     */
    public function actionActividad_detalle() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);



        if (empty($_GET)) {
            $model = new Accion();
        } else {
            Empresa::model()->decodificaGet($_SERVER["REQUEST_URI"]);



            if (empty($_GET['acc_id'])) {


                $tar_id = $_GET['tar_id'];
                $model = new Bitacora();

                //$this->render('actividad_detalle', array('model'=>$model, 'tar_id'=>$tar_id));
            } else {

                $id_accion = $_GET['acc_id'];
                $model = Accion::model()->findByPk($id_accion);
                $tar_id = $_GET['tar_id'];

                $this->_datosUser = $modelUser;
                // $this->render('actividad_detalle', array('model'=>$model,'tar_id'=>$tar_id));
            }


            // echo "<pre>";
            // //echo $tar_id;
            // var_dump($tar_id);
            // echo "<pre>";
            // yii::app()->end();
        }
        // echo $tar_id;
        // var_dump($tar_id);
        //yii::app()->end();
        //creo una instancia del modelo Bitacora
        //$model = new Bitacora();
        //$datosTarea_Participantes = $model->getTarea_Participantes();
        //$this->_datosUser = $modelUser;
        $this->render('actividad_detalle', array('model' => $model, 'tar_id' => $tar_id));
        //$this->render('actividad_detalle');
    }

    // bitacora Tramite
    /**
     * Acción que permite los indicadores de una tarea
     */
    public function actionIndicadores() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);



        if (empty($_GET)) {
            $model = new Accion();
        } else {
            Empresa::model()->decodificaGet($_SERVER["REQUEST_URI"]);



            if (empty($_GET['acc_id'])) {


                $tar_id = $_GET['tar_id'];
                $model = new Bitacora();

                //$this->render('actividad_detalle', array('model'=>$model, 'tar_id'=>$tar_id));
            } else {

                $id_accion = $_GET['acc_id'];
                $model = Accion::model()->findByPk($id_accion);
                $tar_id = $_GET['tar_id'];

                $this->_datosUser = $modelUser;
                // $this->render('actividad_detalle', array('model'=>$model,'tar_id'=>$tar_id));
            }


            // echo "<pre>";
            // //echo $tar_id;
            // var_dump($tar_id);
            // echo "<pre>";
            // yii::app()->end();
        }
        // echo $tar_id;
        // var_dump($tar_id);
        //yii::app()->end();
        //creo una instancia del modelo Bitacora
        //$model = new Bitacora();
        //$datosTarea_Participantes = $model->getTarea_Participantes();
        //$this->_datosUser = $modelUser;
        $this->render('Indicadores', array('model' => $model, 'tar_id' => $tar_id));
        //$this->render('actividad_detalle');
    }

    /**
     * Acción que permite renderizar la vista de reformas legales
     */
    public function actionReforma_Legal() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        if (empty($_GET)) {
            $model = new Accion();
        } else {
            Empresa::model()->decodificaGet($_SERVER["REQUEST_URI"]);

            if (empty($_GET['acc_id'])) {
                $tar_id = $_GET['tar_id'];
                $model = new Bitacora();
            } else {

                $id_accion = $_GET['acc_id'];
                $model = Accion::model()->findByPk($id_accion);
                $tar_id = $_GET['tar_id'];

                $this->_datosUser = $modelUser;
            }
        }

        $this->render('reforma_legal', array('model' => $model, 'tar_id' => $tar_id));
    }

    /**
     * Acción que permite renderizar las actividades de un trámite
     */
    public function actionActividadTramiteEdit() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        if (empty($_GET)) {
            $model = new Accion();
        } else {
            Empresa::model()->decodificaGet($_SERVER["REQUEST_URI"]);

            if (empty($_GET['acc_id'])) {
                $tar_id = $_GET['tar_id'];
                $model = new Bitacora();
            } else {

                $id_accion = $_GET['acc_id'];
                $model = Accion::model()->findByPk($id_accion);
                $tar_id = $_GET['tar_id'];

                $this->_datosUser = $modelUser;
            }
        }

        $this->render('ActividadTramiteEdit', array('model' => $model, 'tar_id' => $tar_id));
        //$this->render('actividad_detalle');
    }

    /**
     * Acción que permite renderizar el de talle de las actividades
     */
    public function actionActividad_detalle_ver() {

        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Bitacora
        $model = new Bitacora();
        $datosActividad_Ver = $model->getActividad_Ver();
        $this->_datosUser = $modelUser;
        $this->render('actividad_detalle_ver', compact('datosActividad_Ver'), false, true);
        //$this->render('formulario');
    }

    /**
     * Acción que permite registrar las tareas
     */
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
            $id_importancia = $_POST['id_importancia'];
            //$start = substr("abcdef", -1);
            // echo $start."<br>";
            // echo $dstart = substr($start, 0,2)."<br>";
            // echo $mes_start = substr($start, 3,2)."<br>";
            $d_start = substr($start, 6, 4) . "-" . substr($start, 0, 2) . "-" . substr($start, 3, 2);
            $d_end = substr($end, 6, 4) . "-" . substr($end, 0, 2) . "-" . substr($end, 3, 2);
            //$dia_start = substr($start, 0,2);
            //echo $dia_start;
            //echo $min_start;
            //echo $anio_start;



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
                $model_dbitacora->tar_fechainicio = $d_start;
                $model_dbitacora->tar_fechafin = $d_end;
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

                $model_dtarea_usuario->tar_id = $tar_id;
                $model_dtarea_usuario->taru_estado = 1;
                $model_dtarea_usuario->usu_id = $id_usuario;
                $model_dtarea_usuario->taru_creador = 1;
                $model_dtarea_usuario->save();


                $transaction->commit();
                header('Location:' . Yii::app()->baseURL . '/bitacora/index');
            } catch (Exception $e) {
                echo $e;
                echo "<div>Hubo un error</div>";
                $transaction->rollBack();
            }
        }
    }

    /**
     * Acción que permite el registro de participantes
     */
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

                $model_dtarea_usuario->tar_id = $tar_id;
                $model_dtarea_usuario->taru_estado = 1;
                $model_dtarea_usuario->usu_id = $id_participante;
                $model_dtarea_usuario->taru_creador = 0;
                $model_dtarea_usuario->save();


                $transaction->commit();
                header('Location:' . Yii::app()->baseURL . '/bitacora/participantes?tar_id=' . $tar_id . '');
            } catch (Exception $e) {
                echo $e;
                echo "<div>Hubo un error</div>";
                $transaction->rollBack();
            }
        }
    }

    /**
     * Acción que permite eliminar participantes
     */
    public function actionEliminarParticipante() {
        $eliminar_participante = $_POST['eliminar_participante'];
        $taru_id = $_POST['taru_id'];
        $tar_id = $_POST['tar_id'];


        if (isset($eliminar_participante)) {
            $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);

            $sql1 = "delete from tarea_usuario where taru_id = $taru_id";
            $hoy = date("Y-m-d");

            $conexion = Yii::app()->db;
            $transaction = $conexion->beginTransaction();

            try {

                $conexion->createCommand($sql1)->execute();

                $transaction->commit();
                header('Location:' . Yii::app()->baseURL . '/bitacora/participantes?tar_id=' . $tar_id . '');
            } catch (Exception $e) {
                echo $e;
                echo "<div>Hubo un error</div>";
                $transaction->rollBack();
            }
        }
    }

    /**
     * Acción que permite el registro interoperabilidad
     */
    public function actionRegistroInteropera() {
        $interopera = $_POST['interopera'];
        //echo $interopera;


        if (isset($interopera)) {
            $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
            //$id_usuario = $modelUser['usu_id'];

            $id_institucion = $_POST['id_institucion'];
            $tar_id = $_POST['tar_id'];



            //echo $id_categoria;


            $hoy = date("Y-m-d");

            $conexion = Yii::app()->db;
            $transaction = $conexion->beginTransaction();

            try {



                $model_dtarea_usuario = new TareaInteropera();

                $model_dtarea_usuario->tar_id = $tar_id;
                $model_dtarea_usuario->tarin_estado = 1;
                $model_dtarea_usuario->ins_id = $id_institucion;
                $model_dtarea_usuario->save();


                $transaction->commit();
                header('Location:' . Yii::app()->baseURL . '/bitacora/interopera?tar_id=' . $tar_id . '');
            } catch (Exception $e) {
                echo $e;
                echo "<div>Hubo un error</div>";
                $transaction->rollBack();
            }
        }
    }

    /**
     * Acción que permite eliminar interoperabilidad
     * @return void
     */
    public function actionEliminarInteropera() {
        $eliminar_interopera = $_POST['eliminar_interopera'];
        $tarin_id = $_POST['tarin_id'];
        $tar_id = $_POST['tar_id'];


        if (isset($eliminar_interopera)) {
            $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);

            $sql1 = "delete from tarea_interopera where tarin_id = $tarin_id";
            echo $sql1;
            $hoy = date("Y-m-d");

            $conexion = Yii::app()->db;
            $transaction = $conexion->beginTransaction();

            try {

                $conexion->createCommand($sql1)->execute();

                $transaction->commit();
                header('Location:' . Yii::app()->baseURL . '/bitacora/interopera?tar_id=' . $tar_id . '');
            } catch (Exception $e) {
                echo $e;
                echo "<div>Hubo un error</div>";
                $transaction->rollBack();
            }
        }
    }

    /**
     * Registro de acciones, registra las actividades
     * @return void
     */
    public function actionRegistroAccion() {
        //echo 'Inserta: '.$insertar_accion = ;



        if (isset($_POST['edit'])) {
            $tar_id = $_POST['tar_id'];
            $acc_tipo = $_POST['acc_tipo'];
            $accion_id = $_POST['acc_id'];
            $nivel_actividad = $_POST['nivel_actividad'];
            $descripcion_actividad = $_POST["descripcion_actividad"];
            $estado_actividad = $_POST['estado_actividad'];
            $nombre_actividad = $_POST['nombre_actividad'];

            $sql1 = "update accion set acc_nombre = '$nombre_actividad',acc_descripcion ='$descripcion_actividad', acc_nivel = '$nivel_actividad' , acc_estado = '$estado_actividad' where acc_id =  $accion_id ";

            //echo $sql1;


            $hoy = date("Y-m-d");

            $conexion = Yii::app()->db;

            $transaction = $conexion->beginTransaction();

            try {

                $conexion->createCommand($sql1)->execute();

                $transaction->commit();

                if ($acc_tipo == 1) {

                    header('Location:' . Yii::app()->baseURL . '/bitacora/viewActividad/?tar_id=' . $tar_id);
                }
                if ($acc_tipo == 2) {
                    header('Location:' . Yii::app()->baseURL . '/bitacora/viewActividadTramite/?tar_id=' . $tar_id);
                }
            } catch (Exception $e) {
                echo $e;
                echo "<div>Hubo un error</div>";
                $transaction->rollBack();
            }
        }




        if (isset($_POST['insert'])) {
            $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
            $id_usuario = $modelUser['usu_id'];
            $tar_id = $_POST['tar_id'];

            $nombre_actividad = $_POST["nombre_actividad"];
            $estado_actividad = $_POST["estado_actividad"];
            $descripcion_actividad = $_POST["descripcion_actividad"];
            $nivel_actividad = $_POST["nivel_actividad"];
            $acc_tipo = $_POST['acc_tipo'];



            //echo $id_categoria;


            $hoy = date("Y-m-d");

            $conexion = Yii::app()->db;
            $transaction = $conexion->beginTransaction();

            try {



                $model_accion = new Accion();

                $model_accion->acc_nombre = $nombre_actividad;
                $model_accion->acc_descripcion = $descripcion_actividad;
                $model_accion->acc_fechainicio = $hoy;
                $model_accion->acc_fechafin = $hoy;
                $model_accion->acc_fecharegistro = $hoy;
                $model_accion->acc_estado = $estado_actividad;
                $model_accion->tar_id = $tar_id;
                $model_accion->usu_id = $id_usuario;
                $model_accion->acc_nivel = $nivel_actividad;
                $model_accion->acc_tipo = $acc_tipo;

                $model_accion->save();


                $transaction->commit();
                if ($acc_tipo == 1) {

                    header('Location:' . Yii::app()->baseURL . '/bitacora/viewActividad/?tar_id=' . $tar_id);
                }
                if ($acc_tipo == 2) {
                    header('Location:' . Yii::app()->baseURL . '/bitacora/viewActividadTramite/?tar_id=' . $tar_id);
                }
            } catch (Exception $e) {
                echo $e;
                echo "<div>Hubo un error</div>";
                $transaction->rollBack();
            }
        }
    }

    /**
     * Registro de tar_fecharegistro
     * @return void
     */
    public function actionRegistroTramite() {



        if (isset($_POST['insertar_tarea'])) {
            $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
            $id_usuario = $modelUser['usu_id'];


            $id_institucion = $_POST['id_institucion'];
            $nombre_tarea = $_POST['id_tramite2'];
            $start = $_POST['start'];

            $mes_start = substr($start, 0, 2);
            $dia_start = substr($start, 3, 2);
            $anio_start = substr($start, 6, 4);

            $tar_fechainicio = $anio_start . "-" . $mes_start . "-" . $dia_start;


            $end = $_POST['end'];
            $mes_end = substr($end, 0, 2);
            $dia_end = substr($end, 3, 2);
            $anio_end = substr($end, 6, 4);

            $tar_fin = $anio_end . "-" . $mes_end . "-" . $dia_end;



            $hoy = date("Y-m-d");

            $conexion = Yii::app()->db;
            $transaction = $conexion->beginTransaction();

            try {

                //Datos trámite
                $model_dbitacora = new Tarea();


                $model_dbitacora->tar_nombre = $nombre_tarea;
                //$model_dbitacora->tar_descripcion = $descripcion_tarea;
                //$model_dbitacora->tar_meta = $meta_tarea;
                $model_dbitacora->tar_fechainicio = $tar_fechainicio;
                $model_dbitacora->tar_fechafin = $tar_fin;
                $model_dbitacora->tar_fecharegistro = $hoy;
                $model_dbitacora->tar_estado = 1;
                $model_dbitacora->ins_id = $id_institucion;
                $model_dbitacora->tar_tipo = 2;
                $model_dbitacora->tar_nivel = 1;
                $model_dbitacora->tar_estatus = 0;
                //$model_dbitacora->tar_importancia = $id_importancia;
                $model_dbitacora->cat_id = 1;
                $model_dbitacora->save();
                $tar_id = $model_dbitacora->primaryKey;


                $model_dtarea_usuario = new TareaUsuario();

                $model_dtarea_usuario->tar_id = $tar_id;
                $model_dtarea_usuario->taru_estado = 1;
                $model_dtarea_usuario->usu_id = $id_usuario;
                $model_dtarea_usuario->taru_creador = 1;
                $model_dtarea_usuario->save();


                $transaction->commit();
                header('Location:' . Yii::app()->baseURL . '/bitacora/indexTramite');
            } catch (Exception $e) {
                echo $e;
                echo "<div>Hubo un error</div>";
                $transaction->rollBack();
            }
        }

        if (isset($_POST['editar_tarea'])) {

            $tar_id = $_POST['tar_id'];



            $accion = $_POST['accion'];
            if ($accion == 1) {
                $tar_descripcion = $_POST['tar_descripcion'];
                $sql1 = "update tarea set tar_descripcion ='$tar_descripcion' where tar_id =  $tar_id ";
            }

            // if ($accion==2){
            //      $tar_politica = $_POST['tar_politica'];
            //     $sql1= "update tarea set tar_politica ='$tar_politica' where tar_id =  $tar_id ";
            // }

            if ($accion == 3) {
                $tar_estrategia = $_POST['tar_estrategia'];
                echo $sql1 = "update tarea set tar_estrategia ='$tar_estrategia' where tar_id =  $tar_id ";
            }

            if ($accion == 4) {
                $tar_estandar = $_POST['tar_estandar'];
                echo $sql1 = "update tarea set tar_estandar ='$tar_estandar' where tar_id =  $tar_id ";
            }

            if ($accion == 5) {
                $tar_meta = $_POST['tar_meta'];
                echo $sql1 = "update tarea set tar_meta ='$tar_meta' where tar_id =  $tar_id ";
            }

            if ($accion == 6) {
                $requisito_inicial = $_POST['requisito_inicial'];
                $funcionario_inicial = $_POST['funcionario_inicial'];
                $tiempo_inicial = $_POST['tiempo_inicial'];
                $intera_inicial = $_POST['intera_inicial'];

                $sql1 = "update tarea set
                    tar_requisitos_ini ='$requisito_inicial',
                    tar_funcionarios_ini = '$funcionario_inicial',
                    tar_tiempo_ini = '$tiempo_inicial',
                    tar_intera_ini = '$intera_inicial'
                     where tar_id =  $tar_id ";
            }

            if ($accion == 7) {
                $requisito_fin = $_POST['requisito_fin'];
                $funcionario_fin = $_POST['funcionario_fin'];
                $tiempo_fin = $_POST['tiempo_fin'];
                $intera_fin = $_POST['intera_fin'];

                $sql1 = "update tarea set
                    tar_requisitos_fin ='$requisito_fin',
                    tar_funcionarios_fin = '$funcionario_fin',
                    tar_tiempo_fin = '$tiempo_fin',
                    tar_intera_fin = '$intera_fin'
                     where tar_id =  $tar_id ";
            }



            $conexion = Yii::app()->db;

            $transaction = $conexion->beginTransaction();

            try {

                $conexion->createCommand($sql1)->execute();

                $transaction->commit();
                header('Location:' . Yii::app()->baseURL . '/bitacora/viewActividadTramite?tar_id=' . $tar_id . '');
            } catch (Exception $e) {
                echo $e;
                echo "<div>Hubo un error</div>";
                $transaction->rollBack();
            }
        }
    }

    /**
     * Acción que permite registrar una Reforma Legal
     * @return void
     */
    public function actionRegistroReforma() {
        //echo 'Inserta: '.$insertar_accion = ;



        if (isset($_POST['editar_accion'])) {
            $tar_id = $_POST['tar_id'];
            $accion_id = $_POST['acc_id'];
            $nivel_actividad = $_POST['nivel_actividad'];
            //$_POST['tramite'];


            $descripcion_actividad = $_POST["descripcion_actividad"];
            $estado_actividad = $_POST['estado_actividad'];
            $nombre_actividad = $_POST['nombre_actividad'];

            $sql1 = "update accion set acc_nombre = '$nombre_actividad',acc_descripcion ='$descripcion_actividad', acc_nivel = '$nivel_actividad' , acc_estado = '$estado_actividad' where acc_id =  $accion_id ";

            echo $sql1;


            $hoy = date("Y-m-d");

            $conexion = Yii::app()->db;

            $transaction = $conexion->beginTransaction();

            try {

                $conexion->createCommand($sql1)->execute();

                $transaction->commit();
                if (isset($_POST['tramite'])) {
                    // header('Location:'.Yii::app()->baseURL.'/bitacora/viewActividadTramite?tar_id='.$tar_id.'');
                } else {
                    header('Location:' . Yii::app()->baseURL . '/bitacora/viewActividad?tar_id=' . $tar_id . '');
                }
            } catch (Exception $e) {
                echo $e;
                echo "<div>Hubo un error</div>";
                $transaction->rollBack();
            }
        }




        if (isset($_POST['inserta_reforma'])) {
            $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
            $id_usuario = $modelUser['usu_id'];
            $tar_id = $_POST['tar_id'];

            $cuerpo_legal = $_POST["cuerpo_legal"];
            $motivo_reforma = $_POST["motivo_reforma"];
            $tipo_reforma = $_POST["tipo_reforma"];
            $difusion_reforma = $_POST["difusion_reforma"];



            //echo $id_categoria;


            $hoy = date("Y-m-d");

            $conexion = Yii::app()->db;
            $transaction = $conexion->beginTransaction();

            try {



                $model_accion = new RefLegal();

                $model_accion->rl_cuerpo = $cuerpo_legal;
                $model_accion->rl_fecha = $hoy;
                $model_accion->tar_id = $tar_id;
                $model_accion->rl_tipo = $tipo_reforma;
                $model_accion->rl_motivo = $motivo_reforma;
                $model_accion->rl_difusion = $difusion_reforma;


                $model_accion->save();


                $transaction->commit();
                //header('Location:'.Yii::app()->baseURL.'/bitacora/actividad_detalle?tar_id='.$tar_id.'');
                header('Location:' . Yii::app()->baseURL . '/bitacora/viewActividadTramite/?tar_id=' . $tar_id);
            } catch (Exception $e) {
                echo $e;
                echo "<div>Hubo un error</div>";
                $transaction->rollBack();
            }
        }
    }

}
