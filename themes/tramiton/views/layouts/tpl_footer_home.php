<footer>
    <div class="container-fluid borde-izq-gris borde-der-gris">
      <div class="row">
          <div class="col-sm-4 col-xs-12">
              <img title="Secretaría Nacional de la Administración Pública" alt="Secretaría Nacional de la Administración Pública" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/logo_presidencia.png" longdesc="longdesc/logdesc.html">
          </div>
          <div id="direccion" class="col-sm-4 col-xs-12 text-center m-b-10 f-12">
              Av. 10 de Agosto OE1-14 y Ramírez Dávalos Código Postal: 170520 / Quito - Ecuador
              <br>Teléfono: (593 2) 393 4500
          </div>
          <div class="col-sm-4 col-xs-12 text-right">
            <img title="Ecuador Ama la Vida" alt="Ecuador Ama la Vida" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/ecuadoramalavida_logo.png" width="138" height="37" longdesc="longdesc/logdesc.html">
          </div>
      </div>
    </div>
</footer>

<style media="screen">
@media(max-width:766px){
  #direccion{
    padding-top: 1em;
    padding-bottom: 0.8em;
  }
}
.f-12{
  font-size: 12px;
}
.f-21{
  font-size: 21px;
}
footer .row{
  padding: 0.8em 0;
}
@media(max-width:767px){
  footer [class*='col-']{
    text-align: center !important;
  }
}
footer .container-fluid{
    background-image: url("<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/colores.png");
    background-repeat: no-repeat;
    background-position: center bottom;
    background-size: 100% 5px;

    /*max-width: 90%;*/
}
    footer{
    position: absolute;
    bottom: 0;
    left: 0;right: 0;
    margin: auto;
  }
</style>

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
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/body-padding.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/form-ciudadano.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/navigation.js"></script>

<script type="text/javascript">
    function closeModal(){
        $('#myModal').modal('hide');
    }

    $('#myModal').modal('show');
    $(document).ready(function () {
        App.init();
        FormWizardValidation.init();
        viewElements();
        bodyPadding();
    });
    $(window).resize(function(){
        viewElements();
        bodyPadding();
    });


    var cssLink = document.createElement("link")
cssLink.href = "<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/twitter-plugin.css";
cssLink.rel = "stylesheet";
cssLink.type = "text/css";
frames['twitter-widget-0'].document.body.appendChild(cssLink);

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
