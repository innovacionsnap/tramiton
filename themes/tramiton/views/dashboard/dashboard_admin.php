<link rel="stylesheet" type="text/css" href="../css/slider-vertical.css" media="all" />
<script src="<?php echo (Yii::app()->theme->baseUrl.'/assets/js/slider-vertical.js');?>" type="text/javascript"></script>
<style type="text/css">
    .linea{
        background-color: #ccccbc;
    }

    .content{
        margin-left: 50px;
        margin-right: 20px;
    }

    .noticia-new{
        font-weight: bold;
        color: #fff;
    }
    
    .estadistica{
        height: 190px;
        background-image: url("<?php echo (Yii::app()->theme->baseUrl.'/assets/img/estadistica.jpg');?>");
        margin-bottom: 10px;
        width: 201px;
        padding-top:42px;
        font-weight: bold;
        text-align:center;
    }
    
    .estadistica img{
        float:left;
        margin-left:24px;
        height:50px;
        width:32px !important;
        margin-right:-15px;
        margin-top:28px
            
    }
    
    .estadistica h3{
        color:#fff;
        font-size:52px;
        font-weight:bold;
    }
    .estadistica p{
        color:#fff;
        font-size:18px;
        margin-top:40px
    }
    
    .banner-lateral img{
        width: 201px;
        padding-bottom: 10px;
        //height:330px;
    }
    
    .registro{
        width:201px;
        background-color: #DA6925;
        height: 36px;
        margin-bottom: 10px;
        padding-top: 5px;
        text-align: center;
        
    }
    .registro a{
        color:#fff;
        font-size:18px;
        font-weight: bold;
        
    }
    
    
</style>
<div class="nivel slider-vertical col-md-12">
    <div class="contenedor-slider">
        <div class="bloque-slider">
            <?php
            $noticias = DashboardController::getNoticias();
            foreach ($noticias as $noticia):
                ?>
                <div class="modulo-slider">
                    <?php echo $noticia['logs_usu_usuario'] . " "; ?> 
                    <a href="../solucion/index?sol=<?php echo $noticia['logs_id_tabla_destino']; ?>" class="noticia-new" target="_blank"><?php echo $noticia['logs_accion']; ?></a>
                </div>
            <?php endforeach; ?>
            <!-- fin modulo-noticias-slide -->
        </div>
        <!-- fin bloque-slider -->

    </div>

</div>

<!-- begin #content -->
<div id="content" class="content linea">
    <div class="row">
        <!-- begin col-8 -->
        <div class="col-md-10">
            <!-- inicio mensajes -->

            <div id="contenido_linea" class="height-sm" data-scrollbar="true" style="height:610px; background-color: #fff; padding: 10px;"></div>

            <!-- fin mensajes -->
        </div>
        <div class="col-md-2 banner-lateral">
            <div class="estadistica">
                <img src="<?php echo (Yii::app()->theme->baseUrl.'/assets/img/flecha-arriba.png');?>"><h3>1999</h3>
                <p>Casos por día</p>
            </div>
            <div class="registro"><a href="../ciudadano/index">Registre otro caso</a></div>
            <a href="http://www.sri.gob.ec/web/guest/calculadora-plusvalia"><img src="<?php echo (Yii::app()->theme->baseUrl.'/assets/img/plusvalia.png');?>"></a>
            <a href="http://www.sri.gob.ec/web/guest/calculadora-herencias"><img src="<?php echo (Yii::app()->theme->baseUrl.'/assets/img/herencias.png');?>"></a>
            <a href="http://www.volcancotopaxi.com" target="_blank"><img src="<?php echo (Yii::app()->theme->baseUrl.'/assets/img/cotopaxi.png');?>"></a>
            
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

