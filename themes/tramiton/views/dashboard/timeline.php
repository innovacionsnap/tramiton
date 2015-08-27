<style type="text/css">
    #linea-tiempo{
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
        float: right;
    }

    .cuerpo{
        height: 120px;
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
</style>

<?php $contador = 1; ?>
<?php foreach ($datosSolucion as $datoSolucion): ?>
    <div id="linea-tiempo">
        <div class="usuario">
            <img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/users/' . DashboardController::getImagen($datoSolucion['usu_id'])); ?>" alt=""/>
            <span><?php echo (DashboardController::GetUsuario($datoSolucion['usu_id'])); ?></span>
            <!--<span><?php //echo CHtml::Ajaxlink('<h4>' . $datoSolucion["sol_titulo"] . '</h4>', array('dashboard/procesavista?sol=' . $datoSolucion['sol_id']), array('update' => '#vista_' . $contador, 'complete' => 'js:function(html){$("#solucion_' . $contador . ' >.modal-body").html(html); $("#solucion_' . $contador . '").modal("show");}'));                         ?></span>-->

        </div>
        <div class="detalles">
            <span title="Me Gusta"><i class="fa fa-thumbs-o-up fa-fw"></i><?php echo DashboardController::getLike($datoSolucion['sol_id']); ?></span>
            <span title="Comentarios"><i class="fa fa-comments fa-fw"></i><?php echo DashboardController::getNumComentarios($datoSolucion['sol_id']); ?></span>
            <span title="Vistas"><i class="fa fa-eye fa-fw"></i><?php echo DashboardController::getVista($datoSolucion['sol_id']); ?></span>
        </div>
        <hr>
        <div class="cuerpo">
            <p>
                <?php
                $sol_descripcion = substr($datoSolucion['sol_descripcion'], 0, 170);
                echo $sol_descripcion . ' ...';
                ?>
            </p>
        </div>
        <hr>
        <div class="pie">
            <div class="compartir">
                <a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode('http://172.16.42.217/tramiton/solucion/index?sol=' . $datoSolucion['sol_id']); ?>" target="_blank"><i class="fa fa-adjust fa-facebook facebook"></i></a>
                <a href="http://twitter.com/share?url=<?php echo urlencode('http://172.16.42.217/tramiton/solucion/index?sol=' . $datoSolucion['sol_id']); ?>" target="_blank"><i class="fa fa-adjust fa-twitter twitter"></i></a>
                <a href="https://plus.google.com/share?url=<?php echo urlencode('http://172.16.42.217/tramiton/solucion/index?sol=' . $datoSolucion['sol_id']); ?>" target="_blank"><i class="fa fa-adjust fa-google-plus plus"></i></a>
            </div>
            <div class="fecha">
                <span><?php echo 'Publicado el: ' . $datoSolucion['sol_fecha']; ?></span>
            </div>
        </div>



    </div>
    <?php $contador++; ?>
<?php endforeach; ?>




<script type="text/javascript">
    function actualizarTexto(idTexto) {
        if ($(idTexto).html() === "Me gusta") {
            $(idTexto).html("Ya no me gusta");
        } else {
            $(idTexto).html("Me gusta");
        }
    }


</script>

