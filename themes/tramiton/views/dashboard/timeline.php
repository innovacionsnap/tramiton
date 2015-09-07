<style type="text/css">
    .contenido-solucion{
        margin: 15px; 
        padding: 10px; 
        display:inline-block; 
        width:200px;
        max-width:200px; 
        height: 280px;
        border: 1px solid #B1B9C0; 
        max-height: 280px;
    }

    .usuario img{
        width:40px; 
        height:40px; 
        border-radius: 25px;
    }

    .detalles{
        float: left;
    }
    
    .compartir{
        float: right;
    }

    .cuerpo{
        height: 120px;
    }
    
    .cuerpo p{
        text-align: justify;
    }
    .cuerpo a{
        float:right;
        color: #325972;
        font-weight: bold;
    }

    .pie .fecha{
        text-align: center
    }

    hr{
        height: 1px;
        background-color: #B1B9C0;
        margin-top: 20px;
        margin-bottom: 5px;
    }

    .facebook{color:#4862A3;}
    .twitter{color:#55ACEE;}
    .plus{color:#DD4B39;}

    #more{
        background: #325972;
        border-radius: 4px;
        margin: 20px;
        text-align: center;
    }
    #more a{
        color:#000;
    }
</style>
<div id="linea-tiempo">
    <?php $contador = 1; ?>
    <?php foreach ($datosSolucion as $datoSolucion): ?>
        <div class="contenido-solucion">
            <div class="usuario">
                <img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/users/' . DashboardController::getImagen($datoSolucion['usu_id'])); ?>" alt=""/>
                <span><?php echo (DashboardController::GetUsuario($datoSolucion['usu_id'])); ?></span>
                <!--<span><?php //echo CHtml::Ajaxlink('<h4>' . $datoSolucion["sol_titulo"] . '</h4>', array('dashboard/procesavista?sol=' . $datoSolucion['sol_id']), array('update' => '#vista_' . $contador, 'complete' => 'js:function(html){$("#solucion_' . $contador . ' >.modal-body").html(html); $("#solucion_' . $contador . '").modal("show");}'));                               ?></span>-->

            </div>
            <div class="detalles">
                <span title="Me Gusta"><?php echo DashboardController::getLike($datoSolucion['sol_id']); ?><i class="fa fa-thumbs-o-up fa-fw"></i></span>
                <span title="Comentarios"><?php echo DashboardController::getNumComentarios($datoSolucion['sol_id']); ?><i class="fa fa-comments-o fa-fw"></i></span>
                <span title="Vistas"><?php echo DashboardController::getVista($datoSolucion['sol_id']); ?><i class="fa fa-eye fa-fw"></i></span>
            </div>
            <div class="compartir">
                <a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode('http://172.16.42.217/tramiton/solucion/index?sol=' . $datoSolucion['sol_id']); ?>" target="_blank"><i class="fa fa-adjust fa-facebook facebook"></i></a>
                <a href="http://twitter.com/share?url=<?php echo urlencode('http://172.16.42.217/tramiton/solucion/index?sol=' . $datoSolucion['sol_id']); ?>" target="_blank"><i class="fa fa-adjust fa-twitter twitter"></i></a>
                <a href="https://plus.google.com/share?url=<?php echo urlencode('http://172.16.42.217/tramiton/solucion/index?sol=' . $datoSolucion['sol_id']); ?>" target="_blank"><i class="fa fa-adjust fa-google-plus plus"></i></a>
            </div>
            <hr>
            <div class="cuerpo">
                <p>
                    <?php
                    $sol_descripcion = substr($datoSolucion['sol_descripcion'], 0, 150);
                    echo $sol_descripcion;
                    ?>
                    <a href="../solucion/index?sol=<?php echo $datoSolucion['sol_id'] ?>" class="solucion-new" target="_blank" title="Leer más">>></a>
                </p>
            </div>
            <hr>
            <div class="pie">

                <div class="fecha">
                    <span><?php echo 'Publicado el: ' . $datoSolucion['sol_fecha']; ?></span>
                </div>
            </div>



        </div>
        <?php $contador++; ?>
    <?php endforeach; ?>
</div>
<div id="porvenir" style="max-height: 80px;position: relative"></div>
<div id="more"><a href="#" onclick="cargasolucion()"><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/flecha-abajo.png');?>"></a></div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".solucion-new").fancybox({
            'titleShow': false,
            'width': '65%',
            'height': '65%',
            'autoScale': false,
            'transitionIn': 'none',
            'transitionOut': 'none',
            'type': 'iframe',
            /*afterClose : function() {
             location.reload();
             }*/
        });

    });
    function actualizarTexto(idTexto) {
        if ($(idTexto).html() === "Me gusta") {
            $(idTexto).html("Ya no me gusta");
        } else {
            $(idTexto).html("Me gusta");
        }
    }

    var limite = 0;
    var total = "<?php echo $total; ?>";
    function cargasolucion()
    {
        limite = limite + 15;
        if (limite < (total - 15)) {
            $.ajax({
                type: "POST",
                url: "cargatimeline?lim=" + limite,
                cache: false,
                beforeSend: function () {
                    //$("#porvenir").height = "10px";
                    $("#porvenir").addClass('loader');
                },
                success: function (html) {
                    //$("#porvenir").height="0px";
                    $("#porvenir").removeClass('loader');
                    $("#linea-tiempo").append(html);
                }
            });
        } else {
            $("#more").remove();
        }
    }

</script>

