<?php

class ReporteController extends Controller {

    public $_datosUser;

    public function actionIndex() {
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $this->_datosUser = $modelUser;
        $this->layout = 'main-admin';
        $this->render('index');
    }
    
    public function actionInstitucion() {
        
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        
        $datosInstitucion = $modelReporte->topTenInstituciones();
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin';
        $this->render('institucion', array('datosInstitucion' => $datosInstitucion));
        
    }
    
    public function actionAcciones($tram) {
        
        $tram = Yii::app()->encriptaParam->decodificaParamGet($tram);
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        $datosAcciones = $modelReporte->AccionesCorrectivas($tram);
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin';
        $this->render('accioncorrectiva', array('datosAcciones' => $datosAcciones));
        
    }
    
    public function actionViewAcciones($inst) {
        
        $inst = Yii::app()->encriptaParam->decodificaParamGet($inst);
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        $datosViewAcciones = $modelReporte->ViewAccionesCorrectivas($inst);
        $datosViewUsuario = $modelReporte->ViewAccionesCorrectivas($inst);
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin';
        $this->render('viewaccioncorrectiva', compact('datosViewAcciones','datosViewUsuario'));
        //$this->render('viewaccioncorrectiva', array('datosViewAcciones' => $datosViewAcciones));
        
    }
    
    public function actionTramitones() {
        
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        $datosTramitones = $modelReporte->Tramitones();
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin';
        $this->render('tramitones', array('datosTramitones' => $datosTramitones));
        
    }
    
     public function actionUsuarios_inst() {
        
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        $datosUsuarios = $modelReporte->Usuarios();
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin';
        $this->render('usuarios_inst', array('datosUsuarios' => $datosUsuarios));
        
    }
    
    public function actionViewUsuarios($tram) {
        
        //$tram = Yii::app()->encriptaParam->decodificaParamGet($tram);
        
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        $datosUsuarios = $modelReporte->ViewUsuarios($tram);
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin';
        $this->render('viewusuarios', array('datosUsuarios' => $datosUsuarios));
        
    }
    
    public function actionTramites() {
        
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        $datosTramitones = $modelReporte->Tramites();
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin';
        $this->render('tramites', array('datosTramitones' => $datosTramitones));
        
    }
    
    public function actionViewTramites($tram) {
        
        $tram1=$tram;
        $tram = Yii::app()->encriptaParam->decodificaParamGet($tram);
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        $datosTramites = $modelReporte->ViewTramites($tram);
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin';
        $this->render('viewtramites',compact('datosTramites','tram1')); 
        
    }
    
    public function actionViewTramites2($inst,$tram) {
        
        $tram2=$tram;
        $inst = Yii::app()->encriptaParam->decodificaParamGet($inst);
        $tram = Yii::app()->encriptaParam->decodificaParamGet($tram);
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        $datosViewTramites2 = $modelReporte->ViewTramites2($inst,$tram);
        $datosViewInstitucion = $modelReporte->ViewTramites2($inst,$tram);
        //$datosAccionesc=$modelReporte->ViewAccionesC();
        
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin';
        $this->render('viewtramites2',compact('datosViewTramites2','datosViewInstitucion','tram2'));  
        //array('datosViewTramites2' => $datosViewTramites2));
        //$this->render('viewaccioncorrectiva', array('datosViewAcciones' => $datosViewAcciones));
        
    }
    
    public function actionViewTramAcciones($inst,$tram2) {
        
        
        $inst = Yii::app()->encriptaParam->decodificaParamGet($inst);
        $tram2 = Yii::app()->encriptaParam->decodificaParamGet($tram2);
        //$inst = Yii::app()->encriptaParam->decodificaParamGet($tram);
        //$tram = Yii::app()->encriptaParam->decodificaParamGet($tram);
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        
        $datosAccionesc=$modelReporte->ViewAccionesC($inst,$tram2);
        $datosAccionesT=$modelReporte->ViewAccionesC($inst,$tram2);
        
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin';
        $this->render('viewacciones',compact('datosAccionesc','datosAccionesT'));  
        //array('datosViewTramites2' => $datosViewTramites2));
        //$this->render('viewaccioncorrectiva', array('datosViewAcciones' => $datosViewAcciones));
        
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
