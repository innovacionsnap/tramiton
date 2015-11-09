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
                                'updateImagen'
                            ),
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

        //creo una instancia del modelo Dashboard
        $model = new Dashboard();
        $datosTotalTramites = $model->getTotalTramite();
        $datosRankingTramites = $model->getRankingTramite();
        $datosPublicacionesTramites = $model->getPublicacionesTramites();
        $this->layout = 'main-admin_form';
        $this->_datosUser = $modelUser;
        $this->render('form_ciudadano', compact('datosTotalTramites', 'datosRankingTramites', 'datosPublicacionesTramites'));
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

    public function actionMostrarPerfil($usrId) {
        $modelUser = Usuario::model()->findByPk($usrId);
        $modelPerfil = new PerfilUsuario;
        
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
                $modelUpdateperfil->updatePerfilUsuario($usrId, $modelPerfil);
                
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
            }
            elseif(!$modelImgUpload->validate()){
                $msg = array(
                    'mensaje' => 'Error al enviar formulario.',
                );
            }
            else{
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

}
