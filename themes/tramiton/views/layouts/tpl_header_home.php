<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Tramiton.to | Trámites engorrosos del sector público</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="Registra tus tramites absurdos" name="description" />
	<meta content="SNAP" name="author" />
	
	<?php
	  $baseUrl = Yii::app()->theme->baseUrl; 
	  $cs = Yii::app()->getClientScript();
	  Yii::app()->clientScript->registerCoreScript('jquery');
	?>
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/css/animate.min.css" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/css/style.min.css" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/css/theme/default.css" id="theme" rel="stylesheet" />
        <!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo $baseUrl; ?>/assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	
</head>
<body data-spy="scroll" data-target="#header-navbar" data-offset="51">
<!-- begin #page-container -->
    <div id="page-container" class="fade">
    	<!-- begin #header -->
        <div id="header" class="header navbar navbar-transparent navbar-fixed-top">
            <!-- begin container -->
            <div class="container">
                <!-- begin navbar-header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.html" class="navbar-brand">
                        <span class="brand-logo"></span>
                        <span class="brand-text">
                            <span class="text-theme">Color</span> Admin
                        </span>
                    </a>
                </div>
                <!-- end navbar-header -->
                <!-- begin navbar-collapse -->
                <div class="collapse navbar-collapse" id="header-navbar">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="#home" data-click="scroll-to-target">Inicio</a></li>
                        <li><a href="#participa" data-click="scroll-to-target">¿C&oacute;mo participar?</a></li>
                        <li><a href="#tramites" data-click="scroll-to-target">Tr&aacute;mites</a></li>
                        <li><a href="#noticias" data-click="scroll-to-target">Noticias</a></li>
                        <li><a href="#preguntas" data-click="scroll-to-target">Preguntas frecuentes</a></li>
                        <li><a href="#que-es" data-click="scroll-to-target">Qu&eacute; es tramit&oacute;n</a></li>
                        <li><a href="#terminos" data-click="scroll-to-target">Terminos y Condiciones</a></li>
                        <li><a href="#ayuda" data-click="scroll-to-target">Ayuda</a></li>
                    </ul>
                </div>
                <!-- end navbar-collapse -->
            </div>
            <!-- end container -->
        </div>
        <!-- end #header -->