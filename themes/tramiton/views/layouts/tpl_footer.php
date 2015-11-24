<!-- begin #footer -->
<div id="footer" class="container-fluid">
    <div class="row" style="padding-top:10px; background: url('<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/footer.png') repeat-x">

        <div id="col-snap-logo" class="col-xs-4" style="padding-top:30px; padding-left:2%;">
            <a><img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/logo_snap.png" /></a>
        </div>

        <div class="col-xs-4 col-ecu-logo" align="right" style="padding-top:30px;">
            <a><img class="center-block" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/logo_pais.png" /></a>
        </div>

        <div id="col-socials-networks" class="col-xs-4" align="right" style="padding-right:2%;">
    
                    <a style="display: none;" target="_blank" href="http://ilab.gob.ec/"><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/red_plataforma_innovacion.png'); ?>"></a>
                    <a target="_blank" href="https://www.facebook.com/AdmPublicaEcuador"><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/red_facebook.png'); ?>"></a>
                    <a target="_blank" href="https://twitter.com/tramitonEC"><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/red_twitter.png'); ?>"></a>
                    <a target="_blank" href="https://www.youtube.com/user/AdmPublicaEcuador"><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/red_youtube.png'); ?>"></a>
    
        </div>

    </div>
</div>

<!-- end #footer -->

<!-- begin scroll to top btn -->
<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
<!-- end scroll to top btn -->

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
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/scrollMonitor/scrollMonitor.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/apps.min.js"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/parsley/dist/parsley.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/apps.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap-wizard/js/bwizard.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/form-wizards-validation.demo.min.js"></script>

<!-- ================== END PAGE LEVEL JS ================== -->

<!--<script type="text/javascript" src="/tramiton2/assets/e1bed9d7/jquery.js"></script>-->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.yiiactiveform.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/home.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/view-elements.js"></script>

<script>
    $(document).ready(function () {
        App.init();
        FormWizardValidation.init();
        viewElements();
    });
    $(window).resize(function(){
        viewElements();
    });

</script>

</body>
</html>