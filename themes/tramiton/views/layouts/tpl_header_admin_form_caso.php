<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Tramiton.to | Admin</title>
        <link rel="icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/logos/favicon.ico" type="image/x-icon">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <?php
        $baseUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();
        // Yii::app()->clientScript->registerCoreScript('jquery');
        ?>

        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        
        <link href="<?php echo $baseUrl; ?>/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/css/animate.min.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/css/style-adm.min.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/css/style-responsive-admin.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/css/loader.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/css/theme/default.css" id="theme" rel="stylesheet" />

        <!-- ================== Custom CSS ================== -->
        <!-- <link href="<?php echo $baseUrl; ?>/assets/css/style.css" rel="stylesheet" /> -->
        <link href="<?php echo $baseUrl; ?>/assets/css/style-responsive-admin.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo $baseUrl; ?>/assets/css/navigation.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo $baseUrl; ?>/assets/css/footer.css" rel="stylesheet" />
            <!-- ================== END Custom CSS=============== -->

        <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
        <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/plugins/parsley/src/parsley.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />

        <link type="text/css" href="<?php echo $baseUrl; ?>/assets/css/navigation.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/assets/css/timeline.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/source/jquery.fancybox.css?v=2.1.5" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/assets/css/login.css">
        <!-- ================== END PAGE LEVEL CSS STYLE ================== -->




        <?php
        $baseUrl = Yii::app()->theme->baseUrl;
        ?>


        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/lib/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/source/jquery.fancybox.js?v=2.1.5"></script>
        
        <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); 
        });
        </script>
        
        <script type="text/javascript">
            $(document).ready(function () {
                /* COMBOBOX PROVINCIAS  */
                $("#id_provincia").change(function (event)
                {
                    var idpadre = $(this).find(':selected').val();
                    $("#pidhijo").html("<img src='<?php echo $baseUrl; ?>/views/ciudadano/loading.gif' />");
                    $("#pidhijo").load('<?php echo $baseUrl; ?>/views/ciudadano/combobox.php?buscar=hijos&id_provincia=' + idpadre);
                });

                /* COMBOBOX INTITUCION  */
                $("#id_institucion").change(function (event)
                {
                    var id_institucion = $(this).find(':selected').val();
                    $("#pidhijo2").html("<img src='<?php echo $baseUrl; ?>/views/ciudadano/loading.gif' />");
                    $("#pidhijo2").load('<?php echo $baseUrl; ?>/views/ciudadano/combobox2.php?buscar_institucion=institucion&id_institucion=' + id_institucion);
                });

            });
        </script>



        <!-- ================== END BASE COMBOBOX JS ================== -->


    </head>
    <body id="body-admin-form-caso" >
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade in"><span class="spinner"></span></div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
