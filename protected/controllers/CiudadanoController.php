<?php

class CiudadanoController extends Controller {

    //public $_menuActive;
    public $_datosUser;

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
                'actions' => array(
                    'index',
                    'valor',
                    'Usuario_Tramites',
                    'viewTramite_Usuario',
                    'viewTramite_Usuario2',
                    'viewTramite_Usuario_Comentario',
                    'mostrarPerfil',
                    'updatePerfil',
                    'updateImagen',
                    'registrocasointerno'
                ),
                //'users' => array('admin', 'oacero'),
                'roles' => array('super_admin', 'ciudadano', 'institucion'),
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
        if (empty($_GET)) {
            $empresa = 0;
        } else {
            Empresa::model()->decodificaGet($_SERVER["REQUEST_URI"]);
            $empresa = $_GET['emp'];
        }
        //creo una instancia del modelo Dashboard
        $model = new Dashboard();
        $datosTotalTramites = $model->getTotalTramite();
        $datosRankingTramites = $model->getRankingTramite();
        $datosPublicacionesTramites = $model->getPublicacionesTramites();
        $this->layout = 'main-admin_form2';
        $this->_datosUser = $modelUser;
        $this->render('form_ciudadano', compact('datosTotalTramites', 'datosRankingTramites', 'datosPublicacionesTramites', 'empresa'));
        //$this->render('formulario');
    }

    public function actionUsuario_Tramites() {

        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $model = new Ciudadano();
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $datosUsuarioTramite = $model->getUsuarioTramite();
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin_form';
        $this->render('usuario_tramites', compact('datosUsuarioTramite'));
    }

    public function actionviewTramite_Usuario() {

        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $model = new Ciudadano();
        $datosTramite_Usuario = $model->getTramite_Usuario();
        $datosTramite_Solucion = $model->getTramite_Solucion();
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin_form';
        $this->render('viewTramite_Usuario', compact('datosUsuarioTramite', 'datosTramite_Usuario', 'datosTramite_Solucion'));
    }

    public function actionviewTramite_Usuario2() {

        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $model = new Ciudadano();
        $datosTramite_Usuario = $model->getTramite_Usuario();
        $datosTramite_Solucion = $model->getTramite_Solucion();
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin_form_caso';
        $this->render('viewTramite_Usuario2', compact('datosUsuarioTramite', 'datosTramite_Usuario', 'datosTramite_Solucion'));
    }

    public function actionviewTramite_Usuario_Comentario() {

        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $model = new Ciudadano();

        $datosTramite_Solucion_Comentario = $model->getdatosTramite_Solucion_Comentario();

        $this->renderPartial('viewTramite_Usuario_Comentario', compact('datosTramite_Solucion_Comentario'));
    }

    public function actionMostrarPerfil($key) {
        
        //$modelUser = Usuario::model()->findByPk($usrId);
        $modelUser = Usuario::model()->findByAttributes(array('usu_codigo_confirmacion' => $key));
        $modelPerfil = new PerfilUsuario;
        $modelMensaje = new MensajesAplicacion;
        
        //echo "resultado busqueda por codigo encriptado";
        //var_dump($modelUser);
        
        //echo "obtiene error: " . utf8_decode($modelMensaje->getMensaje(102));
        //Yii::app()->end();

        $this->_datosUser = $modelUser;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'update-form') {
            echo CActiveForm::validate($modelPerfil);
            Yii::app()->end();
        }
        if (isset($_POST['PerfilUsuario'])) {
            $modelPerfil->attributes = $_POST['PerfilUsuario'];
            $var = $modelPerfil->validate();
            if ($modelPerfil->validate()) {
                echo "validacion no fue verdadera " . $var;
                Yii::app()->end();
                //$this->redirect($this->createUrl('ciudadano/dashboard'));
            } else {
                $modelUpdateperfil = new consultasBaseDatos;
                $modelUpdateperfil->updatePerfilUsuario($modelUser->usu_id, $modelPerfil);

                $this->layout = 'main-admin_form_caso';
                $this->_datosUser = $modelUser;
                $this->redirect(array('dashboard/index'));
            }
        }
        $this->layout = 'main-admin';
        $this->render('perfilUsuario', array('modelUser' => $modelUser, 'modelPerfil' => $modelPerfil));
    }

    public function actionUpdateImagen($usrId) {

        //echo "voy a actualizar la imagen del avatar";
        //Yii::app()->end();

        $modelUser = Usuario::model()->findByPk($usrId);
        $modelImgUpload = new ImageUploadForm;

        $msgs = array();
        //echo "<br><br><br><br><br><br><br><br>";
        
        //var_dump($modelImgUpload);
        
        //echo "tengo para los mensajes";
        //var_dump(is_null($_POST));
        //var_dump(isset($_POST));
        //var_dump(is_null($_POST['ImageUploadForm']));
        //var_dump($_POST);
        //var_dump($_POST['ImageUploadForm']);
        
        
        //Yii::app()->end();
        if(isset($_POST['ImageUploadForm'])){
        //if(isset($_POST)){
        //if(empty($_POST)){
            echo "<br>tengo algo por post";Yii::app()->end();
            $modelImgUpload->attributes = $_POST['ImageUploadForm'];
            //$modelImgUpload->attributes = $_POST['imagenPerfil'];
            $images = CUploadedFile::getInstancesByName('imagenPerfil');
            
            if(count($images) === 0){
                $msg = array(
                    'mensaje' => 'No has seleccionado ninguna imagen',
                );
            } elseif (!$modelImgUpload->validate()) {
                $msg = array(
                    'mensaje' => 'Error al enviar formulario.',
                );
            } else {
                echo "para creacer carpeta" . $modelUser->usu_cedula;
                Yii::app()->end();
            }
        }

        //Yii::app()->end();

        $this->_datosUser = $modelUser;

        $this->layout = 'main-admin';
        //$this->layout = 'main-admin_form_caso';
        //$this->render('cambiaAvatar', array('modelUser' => $modelUser, 'modelImgUpload' => $modelImgUpload));
        $this->render('cambiaAvatar', array('modelImgUpload' => $modelImgUpload));
        
        
    }

    public function actionUpdatePerfil($usrId) {
        //echo "llegue a actualizar el perfil"; Yii::app()->end();

        echo "usuario a actualizar: " . $usrId;


        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $modelPerfil = new PerfilUsuario;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'update-form') {
            echo CActiveForm::validate($modelPerfil);
            Yii::app()->end();
        }
        echo "llegue a actualizar el perfil"; //Yii::app()->end();
        if (isset($_POST['PerfilUsuario'])) {
            $modelPerfil->attributes = $_POST['PerfilUsuario'];
            //var_dump($modelPerfil);
            //$var  = $model->validate();
            //echo "valor de la validación: " . $var;
            //Yii::app()->end();


            if ($model->validate()) {
                //if ($var === false) {
                //echo "validacion no fue verdadera " . $var;
                //Yii::app()->end();
                $this->redirect($this->createUrl('ciudadano/mostrarPerfil'));
            } else {
                
            }
        }

        $this->_datosUser = $modelUser;
        //$this->layout = 'main-admin-user';
        $this->layout = 'main-admin';
        //$this->layout = 'main-prueba';
        //$this->render('perfilPrueba', array('modelUser' => $modelUser, 'modelPerfil' => $modelPerfil));
        $this->render('perfilUsuario', array('modelUser' => $modelUser, 'modelPerfil' => $modelPerfil));
    }

    public function actionRegistroCasoInterno() {
        $insertar_tramite = $_POST['insertar_tramite'];

        if (isset($insertar_tramite)) {
            $id_institucion = $_POST['id_institucion'];
            $id_provincia = $_POST['id_provincia'];
            $unidad_prestadora = $_POST['unidad_prestadora'];
            $idhijo = $_POST['idhijo'];
            $empresa = $_POST['empresa'];
            //$id_tramite = isset ($_POST['id_tramite']);

            if (isset($_POST['id_tramite2'])) {
                $id_tramite = $_POST['id_tramite2'];
            } else {
                $id_tramite = 4173;
            }
            $experiencia = $_POST['experiencia'];
            $titulo_solucion = $_POST['titulo_solucion'];


            if (isset($_POST['otro_tramite'])) {
                $otro_tramite = $_POST['otro_tramite'];
            } else {
                $otro_tramite = "n/a";
            }

            $propuesta_solucion = $_POST['propuesta_solucion'];
            $id_usuario = $_POST['id_usuario'];
            //$problematica_otro = $_POST['problematica_otro'];
            $url = $_POST['url'];

            $insertar_tramite = $_POST['insertar_tramite'];

            $hoy = date("Y-m-d");

            $conexion = Yii::app()->db;
            $transaction = $conexion->beginTransaction();
            try {
                //Datos trámite
                $model_dtramite = new DatosTramite();
                $model_dtramite->par_id = 1500;
                $model_dtramite->usu_id = $id_usuario;
                $model_dtramite->trai_id = $id_tramite;
                $model_dtramite->datt_unidadprestadora = $unidad_prestadora;
                $model_dtramite->datt_experiencia = $experiencia;
                $model_dtramite->datt_fechainicio = $hoy;
                $model_dtramite->datt_fechafin = $hoy;
                $model_dtramite->datt_fecharegistro = $hoy;
                $model_dtramite->datt_ipingreso = '0.0.0.0';
                $model_dtramite->datt_edicion = '2015';
                $model_dtramite->datt_codigoconfirmacion = 'N/A';
                $model_dtramite->datt_otronombretramite = $otro_tramite;
                $model_dtramite->datt_calificado = 0;
                $model_dtramite->datt_descripcionbreve = 'prueba decripcion';
                $model_dtramite->datt_estado = 1;
                $model_dtramite->can_id = 150;
                $model_dtramite->datt_otronombreinstitucion = 'N/A';
                $model_dtramite->datt_fecha_actualizacion = $hoy;
                $model_dtramite->save();
                $id_dtramite = $model_dtramite->primaryKey;

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
                /*
                if (strlen($_POST['problematica_otro'])>0) {
                    $model_problema = new ProblemaTramite();
                    $model_problema->prob_id = 41;
                    $model_problema->datt_id = $id_dtramite;
                    $model_problema->prot_estado_ = 0;
                    $model_problema->prot_nombreotroproblema = $problematica_otro;
                    $model_problema->save();
                }
                */
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

                
                $transaction->commit();
                header('Location:'.Yii::app()->baseURL.'/dashboard/index');
            } catch (Exception $e) {
                echo $e;
                echo "<div>Hubo un error</div>";
                $transaction->rollBack();
            }
        }
    }

}
