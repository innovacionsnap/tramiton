<?php

class PlanController extends Controller {

    public $_datosUser;

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * Acción que permite renderizar el listado de instituciones registradas
     */

    public function actionInstituciones() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);

        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->render('instituciones');
    }
    /**
     * Acción que permite renderizar los trámites por institución
     */
    public function actionIns_Tramites() {

        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->render('ins_tramites');
    }

}

