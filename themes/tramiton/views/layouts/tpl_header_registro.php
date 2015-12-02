<!DOCTYPE html>
<!--[if IE 8]> <html lang="es" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
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
	<link href="<?php echo $baseUrl; ?>/assets/css/style-admin.css" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/css/style-responsive-admin.css" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->    
    <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    
    <link href="<?php echo $baseUrl; ?>/assets/css/main-registro.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/tramiton2/css/form.css" />
	<!-- ================== END PAGE LEVEL CSS STYLE ================== -->
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/assets/css/login.css">
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo $baseUrl; ?>/assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" style="padding-top: 20px;">