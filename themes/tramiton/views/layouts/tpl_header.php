<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Tramiton.to | Trámites engorrosos del sector público</title>
        <link rel="icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/logos/favicon.ico" type="image/x-icon">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<?php
	  $baseUrl = Yii::app()->theme->baseUrl; 
	  $cs = Yii::app()->getClientScript();
	  Yii::app()->clientScript->registerCoreScript('jquery');
	?>
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/css/animate.min.css" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/css/theme/red.css" id="theme" rel="stylesheet" />
        <!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo $baseUrl; ?>/assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== Custom CSS ================== -->
	<link href="<?php echo $baseUrl; ?>/assets/css/style.css" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/css/style-responsive.admin.css" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/css/main.css" rel="stylesheet" />
        <!-- ================== END Custom CSS=============== -->
        <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
        <link href="<?php echo $baseUrl; ?>/assets/plugins/parsley/src/parsley.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/assets/css/home.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/assets/css/navigation.css">

	<?php
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        Yii::app()->clientScript->registerCoreScript('jquery');
    ?>
    <?php $linkcombo = $baseUrl . '/themes/tramiton/views/ciudadano/combobox.php' ?>
    <?php $linkcombo2 = $baseUrl . '/themes/tramiton/views/ciudadano/combobox2.php' ?>

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
</head>
<body data-spy="scroll" data-target="#header-navbar" data-offset="51">
	<!-- begin #page-container -->
    <!-- <div id="page-container" class="fade"> -->
