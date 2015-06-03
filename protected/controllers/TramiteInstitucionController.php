<?php
class TramiteInstitucionController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actionIndex() {
        $model= new TramiteInstitucion();
        $datos=$model->getTramiteInstitucion();
        $this->layout = 'main-admin';
        //envio los datos al index en tramite institucion
        $this->render('index',  compact("datos"));
      
    }


}

