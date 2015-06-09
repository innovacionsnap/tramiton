<?php
class DashboardController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actionIndex() {
        $model= new Dashboard();
        $datosTotalTramites=$model->getTotalTramite();
        $this->layout = 'main-admin';
        //envio los datos al index en tramite institucion
        //$this->render('dashboard_admin',  compact("datos"));
        //$datosRankingTramites = 20;
        // $datosTotalTramites = 5;
        $this->render('dashboard_admin', compact('datosTotalTramites'));
    }


}

