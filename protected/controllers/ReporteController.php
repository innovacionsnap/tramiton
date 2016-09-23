<?php

class ReporteController extends Controller {

    public $_datosUser;
    
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }
    
    public function accessRules() {
        return array(
            
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array(
                    'index',
                    'general',                    
                    'institucion',
                    'resumen',
                    'tramites',
                    'tramitones',
                    'usuarios_inst',
                    'acciones',
                    'viewtramacciones',
                    'viewtramites',
                    'viewtramites2',
                    'viewusuarios',
                    'viewacciones',
                    'casosreportados',
                    'comentarios',
                    'provincias',
                    'viewprovincias',
                    'viewprovincias2'
                    
                    
                ),
                'roles' => array('super_admin', 'reportes'),
            ),
            /* array('allow',
              'actions' => array(
              '*'
              ),
              //'users' => array('admin', 'oacero'),
              'roles' => array('super_admin', 'ciudadano'),
              ), */
            array('deny', // deny all users
                #'roles' => array('*'),
                'users' => array('*'),
            ),
        );
    }

    
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
        
        $this->layout = 'main-admin-rep';
        $this->render('institucion', array('datosInstitucion' => $datosInstitucion));
        
    }
    
    public function actionAcciones($tram) {
        
        $tram = Yii::app()->encriptaParam->decodificaParamGet($tram);
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        $datosAcciones = $modelReporte->AccionesCorrectivas($tram);
        $datosSumaAcciones = $modelReporte->AccionesCorrectivas($tram);
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin-rep';
        $this->render('accioncorrectiva', compact('datosAcciones','datosSumaAcciones','tram'));
        
    }
    
    public function actionViewAcciones($inst,$tram) {
        
        $inst = Yii::app()->encriptaParam->decodificaParamGet($inst);
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        $datosViewAcciones = $modelReporte->ViewAccionesCorrectivas($inst,$tram);
        $datosViewUsuario = $modelReporte->ViewAccionesCorrectivas($inst,$tram);
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin-rep';
        $this->render('viewaccioncorrectiva', compact('datosViewAcciones','datosViewUsuario'));
        //$this->render('viewaccioncorrectiva', array('datosViewAcciones' => $datosViewAcciones));
        
    }
    
    public function actionTramitones() {
        
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        $datosTramitones = $modelReporte->Tramitones();
        $datosSumaTramitones = $modelReporte->Tramitones();
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin-gen';
        $this->render('tramitones', compact('datosTramitones','datosSumaTramitones'));
        
    }
    
     public function actionUsuarios_inst() {
        
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        $datosUsuarios = $modelReporte->Usuarios();
        $datosSumaUsuarios = $modelReporte->Usuarios();
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin-gen';
        $this->render('usuarios_inst', compact('datosUsuarios','datosSumaUsuarios' ));
        
    }
    
    public function actionViewUsuarios($tram) {
        
        $tram = Yii::app()->encriptaParam->decodificaParamGet($tram);
        
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        $datosUsuarios = $modelReporte->ViewUsuarios($tram);
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin-rep';
        $this->render('viewusuarios', array('datosUsuarios' => $datosUsuarios));
        
    }
    
    public function actionTramites() {
        
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        $datosTramitones = $modelReporte->Tramites();
        $datosSumaTramitones = $modelReporte->Tramites();
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin-gen';
        $this->render('tramites', compact('datosTramitones','datosSumaTramitones' ));
        
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
        
        $this->layout = 'main-admin-rep';
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
        
        $this->layout = 'main-admin-rep';
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
        
        $this->layout = 'main-admin-rep';
        $this->render('viewacciones',compact('datosAccionesc','datosAccionesT'));  
        //array('datosViewTramites2' => $datosViewTramites2));
        //$this->render('viewaccioncorrectiva', array('datosViewAcciones' => $datosViewAcciones));
        
    }
    
    public function actionGeneral() {
        
         $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        $datosUsuarios = $modelReporte->GenUsuarios();
        $datosSumaUsuarios = $modelReporte->GenUsuarios();
        $datosTramitones = $modelReporte->Tramitones();
        $datosSumaAcciones = $modelReporte->Tramitones();
        $datosTramites = $modelReporte->Tramites();
        $datosSumaTramites = $modelReporte->Tramites();
        $datosComentarios = $modelReporte->GenComentarios();
        $datosSumaComentarios = $modelReporte->GenComentarios();
        
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin-gen';
        $this->render('general', compact('datosUsuarios','datosTramitones','datosTramites','datosSumaUsuarios','datosSumaAcciones','datosSumaTramites','datosComentarios','datosSumaComentarios'));
        
    }
    
    public function actionResumen() {
        
         $hoy = getdate();
        $d= $hoy['mday'];
        $d1=$d-9;
        $d2=$d-8;
        $d3=$d-7;
        $d4=$d-6;
        $d5=$d-5;
        $d6=$d-4;
        $d7=$d-3;
        $d8=$d-2;
        $d9=$d-1;
        $d10=$d;
        
        $m =$hoy['mon'];
        $a =$hoy['year'];
        //$d=$d-9;

        $fecha1=$a . '-' . $m . '-' . $d1;      
        $fecha2=$a . '-' . $m . '-' . $d2;      
        $fecha3=$a . '-' . $m . '-' . $d3;      
        $fecha4=$a . '-' . $m . '-' . $d4;      
        $fecha5=$a . '-' . $m . '-' . $d5; 
        $fecha6=$a . '-' . $m . '-' . $d6;      
        $fecha7=$a . '-' . $m . '-' . $d7;      
        $fecha8=$a . '-' . $m . '-' . $d8;      
        $fecha9=$a . '-' . $m . '-' . $d9;      
        $fecha10=$a . '-' . $m . '-' . $d10; 
        
        $enero='01/01/2016';
        $enero1='31/01/2016';
        $febrero='01/02/2016';
        $febrero1='29/02/2016';
        $marzo='01/03/2016';
        $marzo1='31/03/2016';
        $abril='01/04/2016';
        $abril1='30/04/2016';
        $mayo='01/05/2016';
        $mayo1='31/05/2016';
        $junio='01/06/2016';
        $junio1='30/06/2016';
        $julio='01/07/2016';
        $julio1='31/07/2016';
        $agosto='01/08/2016';
        $agosto1='31/08/2016';
        $septiembre='01/09/2016';
        $septiembre1='30/09/2016';
        $octubre='01/10/2016';
        $octubre1='31/10/2016';
        $noviembre='01/11/2016';
        $noviembre1='30/11/2016';
        $diciembre='01/12/2016';
        $diciembre1='31/12/2016';
               
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $datosUsuarios = $modelReporte->GenUsuarios1();
        $datosSumaUsuarios = $modelReporte->GenUsuarios2();
        $datosTramitones = $modelReporte->Tramitones1();
        $datosSumaAcciones = $modelReporte->Tramitones2();
        $datosTramites = $modelReporte->Tramites1();
        $datosSumaTramites = $modelReporte->Tramites2();
        $datosComentarios = $modelReporte->GenComentarios1();
        $datosSumaComentarios = $modelReporte->GenComentarios2();
        $datosIngresos1 = $modelReporte->Ingresos1();
        $datosIngresos2 = $modelReporte->Ingresos2();
        $datosMegusta1 = $modelReporte->Megusta1();
        $datosMegusta2 = $modelReporte->Megusta2();
        $datosgrafico = $modelReporte->grafico();
        
        $datosgraficofc1 = $modelReporte->graficofc1($fecha1);
        $datosgraficofc2 = $modelReporte->graficofc1($fecha2);
        $datosgraficofc3 = $modelReporte->graficofc1($fecha3);
        $datosgraficofc4 = $modelReporte->graficofc1($fecha4);
        $datosgraficofc5 = $modelReporte->graficofc1($fecha5);
        $datosgraficofc6 = $modelReporte->graficofc1($fecha6);
        $datosgraficofc7 = $modelReporte->graficofc1($fecha7);
        $datosgraficofc8 = $modelReporte->graficofc1($fecha8);
        $datosgraficofc9 = $modelReporte->graficofc1($fecha9);
        $datosgraficofc10 = $modelReporte->graficofc1($fecha10);
        
        $datosgraficofp1 = $modelReporte->graficofp1($fecha1);
        $datosgraficofp2 = $modelReporte->graficofp1($fecha2);
        $datosgraficofp3 = $modelReporte->graficofp1($fecha3);
        $datosgraficofp4 = $modelReporte->graficofp1($fecha4);
        $datosgraficofp5 = $modelReporte->graficofp1($fecha5);
        $datosgraficofp6 = $modelReporte->graficofp1($fecha6);
        $datosgraficofp7 = $modelReporte->graficofp1($fecha7);
        $datosgraficofp8 = $modelReporte->graficofp1($fecha8);
        $datosgraficofp9 = $modelReporte->graficofp1($fecha9);
        $datosgraficofp10 = $modelReporte->graficofp1($fecha10);
        
        $datosgraficomc1 = $modelReporte->graficomc1($enero,$enero1);
        $datosgraficomc2 = $modelReporte->graficomc1($febrero,$febrero1);
        $datosgraficomc3 = $modelReporte->graficomc1($marzo,$marzo1);
        $datosgraficomc4 = $modelReporte->graficomc1($abril,$abril1);
        $datosgraficomc5 = $modelReporte->graficomc1($mayo,$mayo1);
        $datosgraficomc6 = $modelReporte->graficomc1($junio,$junio1);
        $datosgraficomc7 = $modelReporte->graficomc1($julio,$julio1);
        $datosgraficomc8 = $modelReporte->graficomc1($agosto,$agosto1);
        $datosgraficomc9 = $modelReporte->graficomc1($septiembre,$septiembre1);
        $datosgraficomc10 = $modelReporte->graficomc1($octubre,$octubre1);
        $datosgraficomc11 = $modelReporte->graficomc1($noviembre,$noviembre1);
        $datosgraficomc12 = $modelReporte->graficomc1($diciembre,$diciembre1);
        
        $datosgraficomp1 = $modelReporte->graficomp1($enero,$enero1);
        $datosgraficomp2 = $modelReporte->graficomp1($febrero,$febrero1);
        $datosgraficomp3 = $modelReporte->graficomp1($marzo,$marzo1);
        $datosgraficomp4 = $modelReporte->graficomp1($abril,$abril1);
        $datosgraficomp5 = $modelReporte->graficomp1($mayo,$mayo1);
        $datosgraficomp6 = $modelReporte->graficomp1($junio,$junio1);
        $datosgraficomp7 = $modelReporte->graficomp1($julio,$julio1);
        $datosgraficomp8 = $modelReporte->graficomp1($agosto,$agosto1);
        $datosgraficomp9 = $modelReporte->graficomp1($septiembre,$septiembre1);
        $datosgraficomp10 = $modelReporte->graficomp1($octubre,$octubre1);
        $datosgraficomp11 = $modelReporte->graficomp1($noviembre,$noviembre1);
        $datosgraficomp12 = $modelReporte->graficomp1($diciembre,$diciembre1);
        
        
        
        $datosgraficop = $modelReporte->graficop();
        
        
        //$datosInstitucion = $modelReporte->topTenInstituciones();
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-resumen';
        $this->render('resumen',compact('datosUsuarios','datosTramitones','datosTramites','datosSumaUsuarios','datosSumaAcciones','datosSumaTramites','datosComentarios','datosSumaComentarios','datosIngresos1','datosIngresos2','datosMegusta1','datosMegusta2','datosgrafico','datosgraficop',
                'datosgraficofc1','datosgraficofc2','datosgraficofc3','datosgraficofc4','datosgraficofc5','datosgraficofc6','datosgraficofc7','datosgraficofc8','datosgraficofc9','datosgraficofc10','datosgraficofp1','datosgraficofp2','datosgraficofp3','datosgraficofp4','datosgraficofp5','datosgraficofp6','datosgraficofp7','datosgraficofp8','datosgraficofp9','datosgraficofp10',
                'datosgraficomc1','datosgraficomc2','datosgraficomc3','datosgraficomc4','datosgraficomc5','datosgraficomc6','datosgraficomc7','datosgraficomc8','datosgraficomc9','datosgraficomc10','datosgraficomc11','datosgraficomc12',
                'datosgraficomp1','datosgraficomp2','datosgraficomp3','datosgraficomp4','datosgraficomp5','datosgraficomp6','datosgraficomp7','datosgraficomp8','datosgraficomp9','datosgraficomp10','datosgraficomp11','datosgraficomp12'));
        
    }
    
    public function actioncasosreportados($traiId) {

        $traiId = Yii::app()->encriptaParam->decodificaParamGet($traiId);

        //echo "tramite institucion: " . $traiId; Yii::app()->end();

        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        //creo una instancia del modelo Dashboard
        $model = new TramiteInstitucion();
        $datosgetTramiteInstitucionDetalle = $model->getTramiteInstitucionDetalle($traiId, $modelUser->usu_id);

        $this->layout = 'main-admin-rep';
        $this->_datosUser = $modelUser;
        //$this->_casosTmp = $this->getDatosTemporal();
        $this->render('casosreportados',compact('datosgetTramiteInstitucionDetalle'));
        //$this->render('formulario');
    }

    public function actionComentarios() {
        
        //$i = Yii::app()->encriptaParam->decodificaParamGet();

        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $model = new Ciudadano();
        $datosTramite_Usuario = $model->getTramite_Usuario();
        $datosTramite_Solucion = $model->getTramite_Solucion();
        $datosTramite_Problemas = $model->getTramite_Problemas();
        $datosComentarios=$model->getComentarios();
        $this->_datosUser = $modelUser;
        //$this->_casosTmp = $this->getDatosTemporal();
        $this->layout = 'main-admin_form_caso';
        $this->render('comentarios', compact('datosUsuarioTramite', 'datosTramite_Usuario', 'datosTramite_Solucion','datosTramite_Problemas','datosComentarios'));
    }
    
    public function actionProvincias() {
        
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        $datosTramitones = $modelReporte->Tramites();
        $datosSumaTramitones = $modelReporte->Tramites();
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin-gen';
        $this->render('provincias', compact('datosTramitones','datosSumaTramitones' ));
        
    }
    
    public function actionViewProvincias($tram) {
        
        $tram1=$tram;
        $tram = Yii::app()->encriptaParam->decodificaParamGet($tram);
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        $datosTramites = $modelReporte->ViewProvincias($tram);
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin-rep';
        $this->render('viewprovincias',compact('datosTramites','tram1')); 
        
    }
    
    public function actionViewProvincias2($inst,$tram) {
        
        $tram2=$tram;
        $inst = Yii::app()->encriptaParam->decodificaParamGet($inst);
        $tram = Yii::app()->encriptaParam->decodificaParamGet($tram);
        $modelReporte = new Reporte();
        $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);        
        $datosViewTramites2 = $modelReporte->ViewProvincias2($inst,$tram);
        $datosViewInstitucion = $modelReporte->ViewProvincias2($inst,$tram);
        //$datosAccionesc=$modelReporte->ViewAccionesC();
        
        //foreach ($datosInstitucion as $datos){
          //  echo "<br>" . $datos['total'] . " " . $datos['ins_nombre'];
        //}
        
        //var_dump($datosInstitucion);
        //Yii::app()->end();
        
        $this->_datosUser = $modelUser;
        
        $this->layout = 'main-admin-rep';
        $this->render('viewprovincias2',compact('datosViewTramites2','datosViewInstitucion','tram2'));  
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
