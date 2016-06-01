<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SectorController
 *
 * @author Oscar
 */
class SectorController extends Controller{
    //put your code here
    public function actionIndex() {
        $sector = Sector::model()->findAll();
        $this->render('index', array('sector' => $sector));
    }
    /**
     * Acción que permite ver los diferentes sectores
     * @param int $id
     */
    public function actionView($id) {
        $model = Sector::model()->findByPk($id);
        $this->render('view', array('model' => $model));
    }
    
    /**
     * Acción que permite editar un sector específico
     * @param int $id
     */
    public function actionEdit($id) {
        $model = Sector::model()->findByPk($id);
        
        if(isset($_POST['Sector'])){
            $model->attributes = $_POST['Sector'];
            if($model->save()){
                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        $this->render('edit', array('model' => $model));
    }
}
