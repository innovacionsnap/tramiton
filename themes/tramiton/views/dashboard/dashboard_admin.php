<link rel="stylesheet" type="text/css" href="../css/slider-vertical.css" media="all" />
<script src="../assets/602d1638/slider-vertical.js" type="text/javascript"></script>
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
</style>
<!-- begin #content -->
<div id="content" class="content linea">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Inicio</a></li>
        <li class="active">Trámites</li>

    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Experiencias de Usuarios</h1>

    <!-- begin row -->
    <div class="row">
        <div class="col-md-11">
            <div class="nivel slider-vertical">
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
        </div>
        <!-- begin col-8 -->
        <div class="col-md-11">
            <!-- inicio mensajes -->

            <div id="contenido_linea" class="height-sm" data-scrollbar="true" style="height:600px; background-color: #fff; padding: 10px;"></div>

            <!-- fin mensajes -->
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

