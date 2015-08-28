<style>
    .btn-comentario{
        margin-top: 30px;
        margin-left: -10px;
    }
    .tarea{
        resize: none;
        border-radius: 8px;
    }
    #header{
        display:none;
    }
    #contenido{
        padding-top: 0px;

    }
    #footer{
        display: none;
    }
    .pace{
        display: none;
    }
</style>
<div id="contenido" class="content" style="height: auto">

    <!-- begin page-header -->
    <h1 class="page-header">Opinión<small> del Ciudadano</small></h1>

    <!-- end page-header -->


    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="background-color: #fff; height: auto; border-radius: 8px; padding: 20px">
            <div>
                <span class="userimage"><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/users/' . $imagen_usuario); ?>" width="34px" height="34px"></span>
                <span class="pull-right text-muted" id="vista"><?php echo $vistas; ?></span>
                <span><?php echo $usuario_solucion; ?></span>
                <?php
                if ($tramite[0]['tra_nombre'] == 'Otro...') {
                    $nom_tramite = $experiencia['datt_otronombretramite'];
                } else {
                    $nom_tramite = $tramite[0]['tra_nombre'];
                }
                ?>
                <span><h5>Trámite:</h5><p><?php echo $nom_tramite; ?></p></span>
                <span><h5>Experiencia:</h5><p><?php echo $experiencia['datt_experiencia'] ?></p></span>
                <!--<span><h4><?php //echo $solucion["sol_titulo"]      ?></h4></span>-->
                <span><h5>Solución Propuesta:</h5><p><?php echo $solucion['sol_descripcion']; ?></p></span>
            </div>
            <div id ="megusta-interno" style="padding: 10px 0px;">
                <?php
                $verifica_likes = DashboardController::validalike($solucion['sol_id']);
                if ($verifica_likes == true) {
                    $texto = "Me gusta";
                } else {
                    $texto = "Ya no me gusta";
                }
                ?>
                <span><?php
                    echo CHtml::AjaxLink(
                            "<span id='texto-interno'>" . $texto . "</span>", array('dashboard/procesamegusta?sol=' . $solucion['sol_id']), array('update' => '#contalike-interno', 'complete' => "actualizarTexto('#texto-interno')"), array('id' => 'ajaxlink-interno', 'class' => 'ajaxlink-interno'));
                    ?></span>
                <span id="contalike-interno" style="color:#005580; padding-left: 20px;"><?php echo DashboardController::getLike($solucion['sol_id']);
                    ?></span><i class="fa fa-thumbs-o-up fa-fw"></i>
                <div style="float:right;">
                    <a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode('http://172.16.42.217/tramiton/solucion/index?sol=' . $solucion['sol_id']); ?>" target="_blank" style="color: inherit;"><i class="fa fa-adjust fa-facebook"></i></a>
                    <a href="http://twitter.com/share?url=<?php echo urlencode('http://172.16.42.217/tramiton/solucion/index?sol=' . $solucion['sol_id']); ?>" target="_blank" style="color: inherit;"><i class="fa fa-adjust fa-twitter"></i></a>
                    <a href="https://plus.google.com/share?url=<?php echo urlencode('http://172.16.42.217/tramiton/solucion/index?sol=' . $solucion['sol_id']); ?>" target="_blank" style="color: inherit;"><i class="fa fa-adjust fa-google-plus"></i></a>
                </div>
            </div>
            <div class="panel-body p-t-0" style="margin-top:5px; border-radius: 8px">
                <h4>Comentarios</h4>
                <div id="comentario-interno" data-scrollbar="true" style="max-height: 300px; padding-left: 20px; padding-right: 20px; background-color: #fff; border-radius:8px">
                    <?php
                    foreach ($comentario as $dato):
                        $usuario_comentario = SolucionController::getUsuario($dato['usu_id']);
                        ?>
                        <div class="row" style="border-bottom: 1px solid #f1f1f1; text-align: left; padding-top: 10px;"><p><font style="color:#348fe2;"><?php echo $usuario_comentario; ?></font><font><?php echo " " . $dato['com_descripcion']; ?></font></p></div>
                    <?php endforeach; ?>
                </div>
                <!--<div id="comenta-interno" data-scrollbar="true" style="font-size: 12px;max-height: 100px;margin-bottom: 0px;padding-left: 16px;padding-right: 16px; overflow: auto"><?php //DashboardController::getComentario($datoSolucion['sol_id'])      ?></div>-->
                <div id="form-comentario" style="margin-top:10px;">
                    <?php echo CHtml::beginForm(array('procesacomentario')) ?>

                    <div class="row">
                        <div class="col-md-11"><label><i class="fa fa-comments fa-fw"></i> Comentar:</label>
                            <input type="hidden" name="solucion" id="solucion" value="<?php echo $solucion['sol_id']; ?>"/>
                            <input type="hidden" name="usuario" id="usuario" value="<?php echo $solucion['usu_id']; ?>" />
                            <textarea class="form-control tarea" name="comentario-interno" id="coment-interno" rows="1"></textarea></div>
                        <div class="col-md-1"><?php echo CHtml::ajaxSubmitButton('Enviar', 'procesacomentario', array('update' => '#comentario-interno'), array('class' => 'btn btn-primary btn-xs m-r-5 btn-comentario')); ?></div>
                    </div>

                    <?php echo CHtml::endForm(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function actualizarTexto(idTexto) {
        if ($(idTexto).html() === "Me gusta") {
            $(idTexto).html("Ya no me gusta");
        } else {
            $(idTexto).html("Me gusta");
        }
    }
</script>
