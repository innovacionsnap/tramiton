
<?php
    $baseUrl = Yii::app()->theme->baseUrl;

    include("config.inc.php");

   
    //usuario 

        $modelUser = Usuario::model() -> findByPk(Yii::app() -> user -> id);
        $id_usuario = $modelUser['usu_id'];

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
                        
                        <!-- begin breadcrumb -->
                        <ol class="breadcrumb pull-right">
                            <li ><a href="viewActividad">Tarea</a></li>
                            <li class="active"><a href="participantes">Participantes</a></li>
                            <li><a href="actividad_detalle">Actividades</a></li>
                        </ol>
                        <div class="panel-body">
                        
                            
                            <form action="<?php echo $baseUrl; ?>/views/bitacora/final_bitacora.php" method="POST" data-parsley-validate="true" name="form-wizard">
                                <div id="wizard">

                      
                        <!-- end breadcrumb -->
                                    <!-- begin wizard step-1 -->
                                   
                                       <!-- begin wizard step-1 -->
                                    <div class="wizard-step-1">
                                        <fieldset>
                                        
                                            <!-- begin row -->
                                            <div class="row">
                                                
                                                <!-- begin col-12 -->
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group block1">
                                                        <label>Participantes:</label>
                                                        
                                                        <?php

                                                            $consulta_usuario = 'select * from usuario usu, "AuthAssignment" aut where CAST(aut.userid as integer) = usu.usu_id and aut.itemname = \'Bitacora\' ';    
        
                                                            $resultado_usuario = pg_query($con, $consulta_usuario) or die("Error en la Consulta SQL");
                                                            $numReg = pg_num_rows($resultado_usuario);
                                                          
                                                            echo "<select class='form-control' data-parsley-group='wizard-step-1' name='id_usuario' id='id_usuario' required>";
                                                            echo "<option value=''>Selecciona una usuario...</option>";
                                                            while ($fila_usuario=pg_fetch_array($resultado_usuario)) 
                                                            {
                                                            echo "<option value=".$fila_usuario['usu_id'].">".$fila_usuario['usu_nombre']."</option>";
                                                            }
                                                            echo "</select>";
                                                   
                                                        ?>
                                                        
                                                    </div>
                                               </div>
                                                <!-- end col-12 -->
                                                <input type="submit" value="Enviar y Guardar" class="btn btn-success">
                                                <input type="hidden" name="insertar_tarea" value="1">
                                                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                                                <input type="hidden" name="url" value="<?php echo $baseUrl ?>">
                                            </div>
                                            <!-- end row -->
                                        </fieldset>
                                    </div>
                                    <!-- end wizard step-1 -->
                                  
                               </div>
                            </form>
                            <h4>Participantes</h4>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                </tbody>
                                     <?php foreach ($datosTarea_Participantes as $datosTarea_Participantes_detalle) {?>
                                    <tr class="odd gradeA">
                                   
                                        <td>
                                      <?php  echo $datosTarea_Participantes_detalle["usu_nombre"] ?>
                                        </td>
                                        <td>
                                        <?php  echo $datosTarea_Participantes_detalle["usu_nombreusuario"] ?>
                                        </td>
                                      
                                    </tr>
                                   <?php } ?>
                            </table>
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