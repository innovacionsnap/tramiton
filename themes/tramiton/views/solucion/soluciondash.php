
<div class="container">

    <div class="row">

        <div class="col-md-7" style="height: 300px; ">

            <div class="panel-body p-t-0" style="width:615px !important;">
                <div>
                    <span class="userimage"><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/users/' . $imagen_usuario); ?>" width="34px" height="34px"></span>
                    <span class="pull-right text-muted" id="vista"><?php echo $vistas; ?></span>
                    <span><?php echo $usuario_solucion; ?></span>
                    <span><h4><?php echo $solucion["sol_titulo"] ?></h4></span>
                    <span><?php echo $solucion['sol_descripcion']; ?></span>
                </div>
                <div id="comentar"></div>
                
                <?php echo CHtml::beginForm(array('solucion/procesacoment')) ?>
                        <label><i class="fa fa-comments fa-fw"></i> Comentar:</label>
                        <input type="hidden" name="solu" id="solucion1" value="7773"/>
                        <input type="hidden" name="usua" id="usuario1" value="6" />
                        <textarea class="form-control" name="comenta" id="comment1" rows="1" cols="70"></textarea>
                        <?php echo CHtml::ajaxSubmitButton('Enviar', array('solucion/procesacoment'), array('update' => '#comentar'),array('id'=>'envia_com')); ?>
                <?php echo CHtml::endForm();  ?>
                  


            </div>
        </div>



    </div>

</div>







