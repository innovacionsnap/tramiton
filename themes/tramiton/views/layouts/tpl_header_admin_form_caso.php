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
	 // Yii::app()->clientScript->registerCoreScript('jquery');
	?>
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->

	<link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/css/animate.min.css" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/css/style-adm.min.css" rel="stylesheet" />
	<link href="<?php echo $baseUrl; ?>/assets/css/style-responsive-admin.css" rel="stylesheet" />
	
	
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->    
        <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
		<link href="<?php echo $baseUrl; ?>/assets/plugins/parsley/src/parsley.css" rel="stylesheet" />
        
	<!-- ================== END PAGE LEVEL CSS STYLE ================== -->
        

	
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN BASE COMBOBOX JS ================== -->
	
	<?php
	$baseUrl = Yii::app()->theme->baseUrl;
	echo "base: ".$baseUrl;
	?>





<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/lib/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/source/jquery.fancybox.css?v=2.1.5" media="screen" />



	
	<!-- ================== END BASE COMBOBOX JS ================== -->
        
      
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
