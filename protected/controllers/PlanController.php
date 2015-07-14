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
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */

    public function actionInstituciones() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->render('instituciones');
    }
    public function actionIns_Tramites() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->render('ins_tramites');
    }

}

