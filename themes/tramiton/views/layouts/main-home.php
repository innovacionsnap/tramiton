<?php 
// Require the header
require_once('tpl_header.php');

//Yii::app()->bootstrap->register();
// Require the navigation 

require_once('tpl_navigation.php');

// Include content pages 
echo $content;

// Require the footer 
require_once('tpl_footer_home.php');
?>
