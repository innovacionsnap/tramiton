<!-- begin #footer -->
<div class="footer-page">
    <div class="row" style="padding-top:10px; background: url('<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/footer.png') repeat-x">
        <div id="col-snap-logo" class="col-xs-4">
            <a><img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/logo_snap.png" /></a>
        </div>
        <div id="col-ecu-logo" class="col-xs-4" align="right">
            <a><img class="center-block" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/logo_pais.png" /></a>
        </div>
        <div id="col-socials-networks" class="col-xs-4" align="right">
                    <a style="display: none;" target="_blank" href="http://ilab.gob.ec/"><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/red_plataforma_innovacion.png'); ?>"></a>
                    <a target="_blank" href="https://www.facebook.com/AdmPublicaEcuador"><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/red_facebook.png'); ?>"></a>
                    <a target="_blank" href="https://twitter.com/tramitonEC"><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/red_twitter.png'); ?>"></a>
                    <a target="_blank" href="https://www.youtube.com/user/AdmPublicaEcuador"><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/uoy.png'); ?>"></a>
        </div>

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

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/dashboard.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/apps-admin.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/DataTables/js/jquery.dataTables-asc.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/table-manage-default.demo.min.js"></script>

<!-- ================== END PAGE LEVEL JS ================== -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.yiiactiveform.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/view-elements.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/body-padding.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/notificacion.js"></script>




<script>
    $(document).ready(function () {
        App.init();
        TableManageDefault.init();
        viewElements();
        bodyPadding();
    });
    $(window).resize(function(){
        viewElements();
        bodyPadding();
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
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/gridview/jquery.yiigridview.js"></script>
</html>
