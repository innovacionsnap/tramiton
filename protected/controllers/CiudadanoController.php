<?php

class CiudadanoController extends Controller {

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
                'actions' => array('index', 'valor', 'Usuario_Tramites', 'viewTramite_Usuario', 'viewTramite_Usuario2', 'viewTramite_Usuario_Comentario', 'mostrarPerfil', 'updatePerfil'),
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

    public function actionMostrarPerfil() {

        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $modelPerfil = new PerfilUsuario;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'update-form') {
            echo CActiveForm::validate($modelPerfil);
            Yii::app()->end();
        }

        $this->_datosUser = $modelUser;
        //$this->layout = 'main-admin-user';
        $this->layout = 'main-admin';
        //$this->layout = 'main-prueba';
        //$this->render('perfilPrueba', array('modelUser' => $modelUser, 'modelPerfil' => $modelPerfil));
        $this->render('perfilUsuario', array('modelUser' => $modelUser, 'modelPerfil' => $modelPerfil));
    }

    public function actionUpdatePerfil() {
        //echo "llegue a actualizar el perfil"; Yii::app()->end();

        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $modelPerfil = new PerfilUsuario;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'update-form') {
            echo CActiveForm::validate($modelPerfil);
            Yii::app()->end();
        }
        echo "llegue a actualizar el perfil"; //Yii::app()->end();
        if (isset($_POST['PerfilUsuario'])) {
            $modelPerfil->attributes = $_POST['PerfilUsuario'];
            var_dump($modelPerfil);
            //$var  = $model->validate();
            //echo "valor de la validación: " . $var;
            Yii::app()->end();


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
