
<div id="about" class="content">
    <div class="container">
        
        <div class="row">
            <div class="content-title">
                <img src="/tramiton/themes/tramiton/images/logo_1.png">
            </div>
            <div class="col-md-5 col-md-offset-4" style="height: 300px;">

                <div class="panel-body p-t-0" >
                    <div>
                        <span class="userimage"><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/users/' . $imagen_usuario); ?>" width="34px" height="34px"></span>
                        <span class="pull-right text-muted" id="vista"><?php echo $vistas; ?></span>
                        <span><?php echo $usuario_solucion; ?></span>
                        <span><h4><?php echo $solucion["sol_titulo"] ?></h4></span>
                        <span><?php echo $solucion['sol_descripcion']; ?></span>
                    </div>
                    <div data-scrollbar="true" style="max-height: 300px; height: auto; overflow: auto;padding-left: 20px;padding-right: 20px; margin-top: 10px; background-color: #f1f1f1;"><?php
                        foreach ($comentario as $dato):
                            $usuario_comentario = SolucionController::getUsuario($dato['usu_id']);
                            ?>
                            <div class="row" style="border-top: 1px solid #ffffff; text-align: left;"><p><font style="color:#348fe2;"><?php echo $usuario_comentario; ?></font><font><?php echo " " . $dato['com_descripcion']; ?></font></p></div>

                        <?php endforeach; ?>
                    </div>


                </div>
            </div>



        </div>

    </div>
</div>






