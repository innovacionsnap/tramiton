
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
    <link href="<?php echo $baseUrl; ?>/assets/css/theme/default.css" rel="stylesheet" id="theme" />
    
    
    <!-- ================== END BASE CSS STYLE ================== -->
    
  

    <!-- ================== BEGIN PAGE EDIT INPUTS ================== -->  

    <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap3-editable/inputs-ext/address/address.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap3-editable/inputs-ext/typeaheadjs/lib/typeahead.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/assets/plugins/select2/select2.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css" rel="stylesheet" />


    <!-- ================== END PAGE EDIT INPUTS  ================== -->
        

   

        
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/lib/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/source/jquery.fancybox.css?v=2.1.5" media="screen" />


        <script type="text/javascript">
     $(document).ready(function() {
        $(".actividad").fancybox({
            'titleShow'         : false,
            'width'             : '65%',
            'height'            : '65%',
            'autoScale'         : false,
            'transitionIn'      : 'none',
            'transitionOut'     : 'none',
            'type'              : 'iframe',
           afterClose : function() {
                location.reload();
            }
        });
    });
     $(document).ready(function() {
        $(".actividad-new").fancybox({
            'titleShow'         : false,
            'width'             : '65%',
            'height'            : '65%',
            'autoScale'         : false,
            'transitionIn'      : 'none',
            'transitionOut'     : 'none',
            'type'              : 'iframe',
           afterClose : function() {
                location.reload();
           }
        });
    });
    </script>   
        
      
</head>
<body>
    <!-- begin page-header -->
            
            
    <!-- end page-header -->

<!-- begin #content -->
        <div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li class="active"><a href="#">Tarea</a></li>
                <li><a href="">Participantes</a></li>
                <li><a href="">Actividades</a></li>
            </ol>
            <!-- end breadcrumb -->
           
       
            <!-- begin profile-container -->
            <div class="profile-container">
                <!-- begin profile-section -->
                <div class="profile-section">
                  
                    <!-- begin profile-right -->
                    <div class="profile">
                        <!-- begin profile-info -->
                        <div class="profile-info">
                            <!-- begin table -->
                            <div class="table-responsive">
                                <table class="table table-profile">
                                    <thead>
                                        <tr>
                                           <?php foreach ($datosTarea_Actividad as $datosTarea_Actividad_detalle) ?>
                                             <h4><?php echo $datosTarea_Actividad_detalle["tar_nombre"] ?>
                                                 <br><small>Registro:<?php echo $datosTarea_Actividad_detalle["tar_fecharegistro"] ?></small>
                                            </h4>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr class="highlight">
                                            <td class="field">Tramite</td>
                                            <td><?php //echo $dato_tramite_detalle["tra_nombre"] ?></td>
                                        </tr>
                                        <tr class="highlight">
                                            <td class="field">Tramite</td>
                                            <td><?php //echo $dato_tramite_detalle["tra_nombre"] ?></td>
                                        </tr>
                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Provincia</td>
                                            <td><?php // echo $dato_tramite_detalle["pro_nombre"] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Canton</td>
                                            <td><?php //echo $dato_tramite_detalle["can_nombre"] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Fecha </td>
                                            <td><?php //echo $dato_tramite_detalle["datt_fecharegistro"] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">U. Prestado </td>
                                            <td><?php // echo $dato_tramite_detalle["datt_unidadprestadora"] ?></td>
                                        </tr>
                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr class="highlight">
                                            <td class="field">Experiencia</td>
                                            <td><?php //echo $dato_tramite_detalle["datt_experiencia"] ?></td>
                                        </tr>
                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table -->
                        </div>
                        <!-- end profile-info -->
                    </div>
                    <!-- end profile-right -->
                </div>
                <!-- end profile-section -->
                <!-- begin profile-section -->
                <div class="profile-section">
                    <!-- begin row -->
                    <div class="row">
                        <!-- begin col-4 -->
                        <div class="col-md-12">
                            <h4 class="title">Actividades</small></h4>
                            <!-- begin scrollbar -->
                            <div data-scrollbar="true" data-height="280px" class="bg-silver">
                                <!-- begin chats -->
                                <ul class="chats">
                                    
                                   
                                    
                                </ul>
                                <!-- end chats -->
                            </div>
                            <!-- end scrollbar -->
                        </div>
                        <!-- end col-4 -->
                       
                    </div>
                    <!-- end row -->
                </div>
                <!-- end profile-section -->
            </div>
            <!-- end profile-container -->
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
    

    <!-- INICIO EXTRA CSS -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap3-editable/inputs-ext/address/address.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap3-editable/inputs-ext/typeaheadjs/lib/typeahead.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap3-editable/inputs-ext/typeaheadjs/typeaheadjs.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap3-editable/inputs-ext/wysihtml5/wysihtml5.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/select2/select2.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/mockjax/jquery.mockjax.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/moment/moment.min.js"></script>
    <!-- FIN EXTRA CSS -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/parsley/dist/parsley.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap-wizard/js/bwizard.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/form-wizards-validation.demo.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/apps-admin.js"></script>
    
    <!-- ================== END PAGE LEVEL JS ================== -->
        


        
    <script>
        $(document).ready(function() {
            App.init();
            FormEditable.init();
        });
    </script>

</body>
</html>