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
        $cs = Yii::app()->getClientScript();
        Yii::app()->clientScript->registerCoreScript('jquery');
        ?>

        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="<?php echo $baseUrl; ?>/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/css/animate.min.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/css/style-adm.min.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/css/style-responsive-admin.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/css/theme/default.css" rel="stylesheet" id="theme" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->    
        <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/plugins/parsley/src/parsley.css" rel="stylesheet" />

        <!-- ================== END PAGE LEVEL CSS STYLE ================== -->



        <!-- ================== BEGIN BASE JS ================== -->
        <script src="<?php echo $baseUrl; ?>/assets/plugins/pace/pace.min.js"></script>
        <script src="<?php echo $baseUrl; ?>/views/ciudadano/jquery.js"></script>

        <!-- ================== END BASE JS ================== -->

        <!-- ================== BEGIN BASE COMBOBOX JS ================== -->


        <?php
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        Yii::app()->clientScript->registerCoreScript('jquery');
        ?>
        <?php echo "BASE URL: " . $baseUrl; ?>

        <?php $linkcombo = $baseUrl . '/themes/tramiton/views/ciudadano/combobox.php' ?>
        <?php $linkcombo2 = $baseUrl . '/themes/tramiton/views/ciudadano/combobox2.php' ?>

        <script src="<?php echo $baseUrl; ?>/assets/plugins/pace/pace.min.js"></script>
        <script type="text/javascript" src="<?php echo $baseUrl; ?>/views/ciudadano/jquery.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                /* COMBOBOX PROVINCIAS  */
                $("#id_provincia").change(function (event)
                {
                    var idpadre = $(this).find(':selected').val();
                    $("#pidhijo").html("<img src='<?php echo $baseUrl ?>/themes/tramiton/views/ciudadano/loading.gif' />");
                    $("#pidhijo").load('<?php echo $linkcombo ?>?buscar=hijos&id_provincia=' + idpadre);
                });

                /* COMBOBOX INTITUCION  */
                $("#id_institucion").change(function (event)
                {
                    var id_institucion = $(this).find(':selected').val();
                    $("#pidhijo2").html("<img src='<?php echo $baseUrl ?>/themes/tramiton/views/ciudadano/loading.gif' />");
                    $("#pidhijo2").load('<?php echo $linkcombo2 ?>?buscar_institucion=institucion&id_institucion=' + id_institucion);
                });

            });
        </script>

        <!-- ================== END BASE COMBOBOX JS ================== -->


    </head>
    <body>
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade in"><span class="spinner"></span></div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
