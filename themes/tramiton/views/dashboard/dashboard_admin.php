<link rel="stylesheet" type="text/css" href="../css/slider-vertical.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo (Yii::app()->theme->baseUrl . '/assets/css/dashboard.css'); ?>" />
<script src="<?php echo (Yii::app()->theme->baseUrl . '/assets/js/slider-vertical.js'); ?>" type="text/javascript"></script>
<div class="nivel slider-vertical noticia">
    <div class="contenedor-slider ">
        <div class="bloque-slider">
            <?php
            $noticias = DashboardController::getNoticias();
            foreach ($noticias as $noticia):
                ?>
                <div class="modulo-slider">
                    <?php echo $noticia['logs_usu_usuario'] . " ";
                        $id=Empresa::model()->codificaGet('sol='.$noticia['logs_id_tabla_destino']);
                    ?>
                    <a href="../solucion/index?<?php echo $id; ?>" class="noticia-new" target="_blank"><?php echo substr($noticia['logs_accion'], 0, 80); ?></a>
                </div>
            <?php endforeach; ?>
            <!-- fin modulo-noticias-slide -->
        </div>
        <!-- fin bloque-slider -->

    </div>


</div>
<!-- begin #content -->
<div id="content" class="container-fluid linea">
    <div class="row">
        <!-- begin col-8 -->
        <?php

        /*if($verificaTmp['existe'] == TRUE){
            echo "<strong>usted tiene registrados " . $verificaTmp['nroTmp'] . " casos temporales</strong>";
            echo CHtml::link('Ver casos temporales',array('ciudadano/casosTemporales'));
        }
        */

        ?>

        <div class="col-md-10">
            <!-- inicio mensajes -->

            <div id="contenido_linea" class="height-sm" data-scrollbar="true" style="height:610px; background-color: #e7e5e2; "></div> <!-- padding: 10px; -->

            <!-- fin mensajes -->
        </div>
        <div class="col-md-2 banner-lateral">
            <div class="row">
                <div class="dashboard-admin-banner col-xs-6 col-md-12">
                    <div class="banner-3 productivo">
                      <a target="_blank" href="http://productivo.tramiton.to">
                        <img class="center-block img-responsive" src="<?php echo (Yii::app()->theme->baseUrl . '/images/logo-tramiton-productivo.png'); ?>">
                      </a>
                    </div>
                </div>
                <div class="dashboard-admin-banner col-xs-6 col-md-12">
                    <div class="banner-2" style="margin-left:auto; margin-right:auto;"><a href="../ciudadano/index">Registre otro caso</a></div>
                    <div class="banner-3"><a target="_blank" href="http://www.sri.gob.ec/web/guest/calculadora-plusvalia"><img class="center-block img-responsive" src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/plusvalia.png'); ?>"></a></div>
                </div>
            </div> <!-- end row -->

            <div class="row">
                <div class="dashboard-admin-banner col-xs-6 col-md-12">
                    <div class="banner-4"><a target="_blank" href="http://www.sri.gob.ec/web/guest/calculadora-herencias"><img class="center-block img-responsive" src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/herencias.png'); ?>"></a></div>

                </div>
                <div class="dashboard-admin-banner col-xs-6  col-md-12">
                    <div class="banner-5"><a target="_blank" href="http://www.volcancotopaxi.com" target="_blank"><img class="center-block img-responsive" src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/cotopaxi.png'); ?>"></a></div>
                </div>
            </div> <!-- end row -->
        </div>


    </div>
    <!-- end row -->
</div>
<!-- end #content -->
<script type="text/javascript">
    var res1 = {
        loader: $('<div />', {class: 'loader'}),
        container: $('#contenido_linea')
    };
    $(document).ready(function () {
        $.ajax({
            url: 'timeline',
            beforeSend: function () {
                res1.container.append(res1.loader);
            },
            success: function (data) {
                res1.container.html(data);
                res1.container.find(res1.loader).remove();
            }
        });

        $(".noticia-new").fancybox({
            'titleShow': false,
            'width': '65%',
            'height': '65%',
            'autoScale': false,
            'transitionIn': 'none',
            'transitionOut': 'none',
            'type': 'iframe',
            // afterClose : function() {
            //     location.reload();
            // }
        });

        moverSlider();
        $(".slider-vertical").mouseover(function () {
            verificar = 0;
        });

        $(".slider-vertical").mouseout(function () {
            verificar = 1;
        });



    });
</script>


<?php
    $nroCasosTmp = $verificaTmp['nroTmp'];
    $banderaNotificacion = $verificaTmp['existe'];
    $textoNotificacion = "Usted tiene (".$nroCasosTmp.") caso(s) temporales registrados";
    $nombreUser = $modelUser->usu_nombreusuario;
 ?>

 <script type="text/javascript">
    var banderaNotificacion = <?php echo json_encode($banderaNotificacion); ?>;
    var texto = <?php echo json_encode($textoNotificacion); ?>;
    var titulo = <?php echo json_encode($nombreUser); ?>;

    $(document).ready(function () {
        Notificaciones.init();
    });
</script>
