
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
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
	
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/flot/jquery.flot.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/flot/jquery.flot.time.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/flot/jquery.flot.resize.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/flot/jquery.flot.pie.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/sparkline/jquery.sparkline.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/apps-admin.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
        <!--<script type="text/javascript" src="/tramiton2/assets/e1bed9d7/jquery.js"></script>-->
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.yiiactiveform.js"></script>
        
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
<!-- begin track con google analytic -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-71798551-1', 'auto');
    ga('send', 'pageview');
</script>
<!-- end track con google analytic -->
</body>
</html>