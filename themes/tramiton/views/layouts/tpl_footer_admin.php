<!-- begin #footer -->
<div id="footer" >
  <div class="col-md-12 col-sm-12 col-xs-12 " style="padding-top:10px; background: url('<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/footer.png') repeat-x">
        <!-- begin col-3 -->
        <div class="col-md-4 col-sm-4 col-xs-12" style="margin-top:30px;">
            <a><img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/logo_snap.png" /></a>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-4 col-sm-4 col-xs-12" style="margin-top:30px;">			    	
            <a><img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/logo_pais.png" /></a>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div align="right" class="col-md-4 col-sm-4 col-xs-12">
            <a href=""><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/red_plataforma_innovacion.png'); ?>"></a>
            <a href=""><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/red_facebook.png'); ?>"></a>
            <a href=""><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/red_twitter.png'); ?>"></a>
            <a href=""><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/red_youtube.png'); ?>"></a>
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
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/DataTables/js/jquery.dataTables.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/table-manage-default.demo.min.js"></script>

<!-- ================== END PAGE LEVEL JS ================== -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.yiiactiveform.js"></script>



<script>
    $(document).ready(function () {
        App.init();
        TableManageDefault.init();
    });
</script>

</body>
</html>
