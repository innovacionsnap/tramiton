<!-- begin #footer -->
<div class="footer">
    <div class="container">

        <!-- begin row -->
        <div class="row">
            <!-- begin col-3 -->
            <div align="left" class="col-md-4 col-sm-4">
                <a><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logotipo_republica_ecuador.png" /></a>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-md-4 col-sm-4 footer-texto-snap">			    	
                <p>García Moreno N10-43 entre Chile y Espejo<br>
                    Código Postal: 170401 / Quito - Ecuador<br>
                    Teléfono: 593-2 382-7000</p>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div align="right" class="col-md-4 col-sm-4">
                <a class="footer-logo-ecuador"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logos/Logo-PAIS.png" /></a>
            </div>
            <!-- end col-3 -->
            <!-- end col-3 -->
        </div>
        <!-- end row -->

        <p class="social-list">
            <a href="#"><i class="fa fa-facebook fa-fw"></i></a>
            <a href="#"><i class="fa fa-instagram fa-fw"></i></a>
            <a href="#"><i class="fa fa-twitter fa-fw"></i></a>
            <a href="#"><i class="fa fa-google-plus fa-fw"></i></a>
            <a href="#"><i class="fa fa-dribbble fa-fw"></i></a>
        </p>
    </div>
</div>
<!-- end #footer -->
<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/parsley/dist/parsley.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/apps.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/view-elements.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	
	<script>
		$(document).ready(function() {
			App.init();
            viewElements();
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

