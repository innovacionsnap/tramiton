<style type="text/css">
    .navbar-header button{
        display: none;
    }
</style>
<div id="content" class="content col-md-12" style="height: auto; background-color: #b4d2ff">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="background-color: #fff; height: auto; border-radius: 8px; padding: 20px; margin-top:50px;">
            <div>
                <span><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/users/' . $imagen_usuario); ?>" width="34px" height="34px"></span>
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
                <!--<span><h4><?php //echo $solucion["sol_titulo"]       ?></h4></span>-->
                <span><h5>Solución Propuesta:</h5><p><?php echo $solucion['sol_descripcion']; ?></p></span>
            </div>
            <div class="panel-body p-t-0" style="margin-top:5px; border-radius: 8px; background-color: #e1ede1">
                <h4>Comentarios</h4>
                <div style="max-height: 300px; padding-left: 20px; padding-right: 20px; background-color: #fff; border-radius:8px; overflow:auto;"  >
                    <?php
                    foreach ($comentario as $dato):
                        $usuario_comentario = SolucionController::getUsuario($dato['usu_id']);
                        ?>
                        <div class="row" style="border-bottom: 1px solid #f1f1f1; text-align: left; padding-top: 10px;"><p><font style="color:#348fe2;"><?php echo $usuario_comentario; ?></font><font><?php echo " " . $dato['com_descripcion']; ?></font></p></div>
                            <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
