<!-- Require the header -->
<?php require_once('tpl_header_admin.php');?>
<?php require_once('tpl_sidebar_admin.php');?>
<?php //Yii::app()->bootstrap->register(); ?>

<!-- Require the navigation -->
<?php require_once('tpl_navigation_admin.php');?>

<!-- Include content pages -->
<?php echo $content; ?>

<!-- Require the footer -->
<?php require_once('tpl_footer_admin.php');?>
