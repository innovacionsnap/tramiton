
<?php
    $baseUrl = Yii::app()->theme->baseUrl;

    include("config.inc.php");

   
    //usuario 

        $modelUser = Usuario::model() -> findByPk(Yii::app() -> user -> id);
        $usu_id = $modelUser->usu_id;
        echo "Este es jejej:".$usu_id;

        $tra_id = $_GET['tra_id'];

?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Tramiton.to | Admin</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
     
    <?php
    $baseUrl = Yii::app()->theme->baseUrl;
    
    ?>
    <!-- ================== BEGIN BASE CSS STYLE ================== -->

    <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/assets/css/animate.min.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/assets/css/style-adm-bitacora.min.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/assets/css/style-responsive-admin.css" rel="stylesheet" />
    
    
    <!-- ================== END BASE CSS STYLE ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->    
    <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/assets/plugins/parsley/src/parsley.css" rel="stylesheet" />
        
    <!-- ================== END PAGE LEVEL CSS STYLE ================== -->
        

    
    <!-- ================== END BASE JS ================== -->
    
    <!-- ================== BEGIN BASE COMBOBOX JS ================== -->
   

        
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/lib/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/source/jquery.fancybox.css?v=2.1.5" media="screen" />



    
    <!-- ================== END BASE COMBOBOX JS ================== -->
        
      
</head>
<body>


<!-- begin #content -->
        <div id="content" class="content">
           
           
            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        
                        <div class="panel-body">
                            
                            
                            <form action="<?php echo $baseUrl; ?>/views/tramiteInstitucion/final_accion.php" method="POST" data-parsley-validate="true" name="form-wizard">
                                <div id="wizard">

                                  <ol>
                                        <li>
                                            Accion Correctiva
                                            <small>Ingresar datos de Institucion responsable.</small>
                                        </li>
                                       
                                       
                                        
                                    </ol>  
                                  
                                    <!-- begin wizard step-1 -->
                                   
                                       <!-- begin wizard step-1 -->
                                    <div class="wizard-step-1">
                                        <fieldset>
                                        
                                            <!-- begin row -->
                                            <div class="row">
                                                
                                                <!-- begin col-12 -->
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nombre</label>
                                                        <input type="text" id = "nombre_accc" onkeyup = "Validate(this)" name="nombre_accc" placeholder="Escribir aqui" class="form-control" data-parsley-group="wizard-step-1" required />
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>Descripcion</label>
                                                        <textarea class="form-control" id="descripcion_accc" onkeyup = "Validate(this)" name="descripcion_accc" rows="4" data-parsley-range="[20,200]" placeholder="Escribir aqui" data-parsley-group="wizard-step-1" required></textarea>
                                                                    
                                                    </div>  
                                                  
                                                   
                                                </div>
                                                <!-- end col-12 -->
                                            </div>
                                            <!-- end row -->
                                        </fieldset>
                                     
                                           
                                                <input type="submit" value="Enviar y Guardar" class="btn btn-success btn">
                                                <input type="hidden" name="insertar_accion" value="1">
                                                <input type="hidden" name="id_usuario" value="<?php echo $usu_id ?>">
                                                <input type="hidden" name="tra_id" value="<?php echo $tra_id ?>">
                                                <input type="hidden" name="url" value="<?php echo $baseUrl ?>">
                                                
                                     
                                    </div>
                                    <!-- end wizard step-1 -->
                                  
                                 
                                  
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end #content -->


  
        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->
    
    <!-- ================== BEGIN BASE JS ================== -->
    <!--  JS PARA QUE FUNCIONE FANCYBOX 
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery/jquery-1.9.1.min.js"></script> 
    -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/crossbrowserjs/html5shiv.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/crossbrowserjs/respond.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
    <!-- ================== END BASE JS ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    

    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/parsley/dist/parsley.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap-wizard/js/bwizard.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/form-wizards-validation.demo.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/apps-admin.js"></script>
    
    <!-- ================== END PAGE LEVEL JS ================== -->
        


        
    <script>
        $(document).ready(function() {
            App.init();
            FormWizardValidation.init();
        });
    </script>

</body>
</html>