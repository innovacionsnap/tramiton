<!-- Require the header -->
<?php require_once('tpl_header.php')?>
<?php Yii::app()->bootstrap->register(); ?>
<!-- Require the navigation -->
<?php require_once('tpl_navigation.php')?>

<!-- Include content pages -->
<?php echo $content; ?>

<!-- Require the footer -->
<?php require_once('tpl_footer.php')?>
