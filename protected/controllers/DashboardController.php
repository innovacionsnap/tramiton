<?php
class DashboardController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actionIndex() {
        $model= new Dashboard();
        $datosTotalTramites=$model->getTotalTramite();
        $datosRankingTramites=$model->getRankingTramite();
        $this->layout = 'main-admin';
        $this->render('dashboard_admin', compact('datosTotalTramites','datosRankingTramites'));
    }


}

