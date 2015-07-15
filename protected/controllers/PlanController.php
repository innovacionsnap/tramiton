<?php

class PlanController extends Controller {
<<<<<<< HEAD
	
	   public $_datosUser;
=======
    
    
    public $_datosUser;
>>>>>>> origin/master

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
<<<<<<< HEAD
    	$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
=======
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
>>>>>>> origin/master
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->render('instituciones');
    }
    public function actionIns_Tramites() {
<<<<<<< HEAD
    	$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
=======
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
>>>>>>> origin/master
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin';
        $this->_datosUser = $modelUser;
        $this->render('ins_tramites');
    }

}

