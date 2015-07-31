
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Trámites</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Trámites <small> de la Institución</small></h1>

    <!-- end page-header -->



    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-green">
                <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                <div class="stats-info">
                    <h4>TOTAL</h4>
                    <p><?php
                        echo $datosTotalTramites[0]["total_tramite"];
                        ?>
                    </p>	
                </div>
                <div class="stats-link">
                    <a href="../datosTramite/index">Ver Detalles <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-chain-broken"></i></div>
                <div class="stats-info">
                    <h4>RANKING TRAMITES</h4>
                    <p><?php
                        echo round(($datosRankingTramites[0]['sum_10_tot_tramite']*100/$datosTotalTramites[0]['total_tramite']),2);
                        ?>%
                    </p>	
                </div>
                <div class="stats-link">
                    <a href="../datosTramite/ranking">Ver Detalles <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-purple">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>SOLUCIONES MAS VISITADAS</h4>
                    <p>
                        <?php
                        $total_soluciones=  DashboardController::getTotalSoluciones();
                        echo round(($datosRankingSolucion[0]['vistas']*100/$total_soluciones),2);
                        ?>%
                    </p>	
                </div>
                <div class="stats-link">
                    <a href="../solucion/rankingsoluciones">Ver Detalles <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-clock-o"></i></div>
                <div class="stats-info">
                    <h4>SOLUCIONES MAS VOTADAS</h4>
                    <p>
                        <?php
                        echo round(($datosRankingLikes[0]['likes']*100/$total_soluciones), 2);
                        ?>%
                    </p>	
                </div>
                <div class="stats-link">
                    <a href="../megusta/rankinglikes">Ver Detalles <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>
    <!-- end row -->



    <!-- begin row -->
    <div class="row">
        <!-- begin col-8 -->
        <div class="col-md-8">
            <!-- inicio mensajes -->
            <div class="panel panel-inverse" data-sortable-id="index-5">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Soluciones Planteadas</h4>
                </div>
                <div class="panel-body">
                    <div class="height-sm" data-scrollbar="true">
                        <ul class="timeline">
                            <script type="text/javascript">
                                function actualizarTexto(idTexto) {
                                    if ($(idTexto).html() === "Me gusta") {
                                        $(idTexto).html("Ya no me gusta");
                                    } else {
                                        $(idTexto).html("Me gusta");
                                    }
                                }
                            </script>
                            <?php $contador = 1; ?>
                            <?php foreach ($datosSolucion as $datoSolucion): ?>
                                <li>
                                    <!-- begin timeline-time -->
                                    <div class="timeline-time">
                                        <span class="date"><?php echo $datoSolucion['sol_fecha']; ?></span>
                                        <!-- <span class="time">04:20</span> -->
                                    </div>
                                    <!-- end timeline-time -->
                                    <!-- begin timeline-icon -->
                                    <div class="timeline-icon">
                                        <a href="javascript:;"><i class="fa fa-paper-plane"></i></a>
                                    </div>
                                    <!-- end timeline-icon -->
                                    <!-- begin timeline-body -->
                                    <div class="timeline-body">
                                        <div class="timeline-header">
                                            <span class="userimage">
                                                <img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/users/' . DashboardController::getImagen($datoSolucion['usu_id'])); ?>" alt="" />

                                            </span>
                                            <span class="pull-right text-muted" id="vista_<?php echo $contador; ?>"><?php echo DashboardController::getVista($datoSolucion['sol_id']); ?></span>
                                            <span><?php echo (DashboardController::GetUsuario($datoSolucion['usu_id'])); ?></span>
                                            <span><?php echo CHtml::Ajaxlink('<h4>' . $datoSolucion["sol_titulo"] . '</h4>', array('dashboard/procesavista?sol=' . $datoSolucion['sol_id']), array('update' => '#vista_' . $contador, 'complete' => 'js:function(html){$("#solucion_' . $contador . ' >.modal-body").html(html); $("#solucion_' . $contador . '").modal("show");}')); ?></span>
                                        </div>
                                        <div class="timeline-content">
                                            <p>
                                                <?php echo $datoSolucion['sol_descripcion']; ?>
                                            </p>
                                        </div>
                                        <div id ="megusta_<?php echo $contador; ?>" style="padding: 10px 0px;">
                                            <?php
                                            $verifica_likes = DashboardController::validalike($datoSolucion['sol_id']);
                                            if ($verifica_likes == true) {
                                                $texto = "Me gusta";
                                            } else {
                                                $texto = "Ya no me gusta";
                                            }
                                            ?>
                                            <span><?php
                                                echo CHtml::AjaxLink(
                                                        "<span id='texto_" . $contador . "'>" . $texto . "</span>", array('dashboard/procesamegusta?sol=' . $datoSolucion['sol_id']), array('update' => '#contalike_' . $contador, 'complete' => "actualizarTexto('#texto_$contador')"), array('id' => 'ajaxlink_' . $contador, 'class' => 'ajaxlink_' . $contador));
                                                ?></span>
                                            <span id="contalike_<?php echo $contador; ?>" style="color:#005580; padding-left: 20px;"><?php echo DashboardController::getLike($datoSolucion['sol_id']); ?></span><i class="fa fa-thumbs-o-up fa-fw"></i>
                                            <div style="float:right;">
                                                <a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode('http://172.16.16.63/tramiton/solucion/index?sol=' . $datoSolucion['sol_id']); ?>" target="_blank" style="color: inherit;"><i class="fa fa-adjust fa-facebook"></i></a>
                                                <a href="http://twitter.com/share?url=<?php echo urlencode('http://172.16.16.63/tramiton/solucion/index?sol=' . $datoSolucion['sol_id']); ?>" target="_blank" style="color: inherit;"><i class="fa fa-adjust fa-twitter"></i></a>
                                                <a href="https://plus.google.com/share?url=<?php echo urlencode('http://172.16.16.63/tramiton/solucion/index?sol=' . $datoSolucion['sol_id']); ?>" target="_blank" style="color: inherit;"><i class="fa fa-adjust fa-google-plus"></i></a>
                                            </div>
                                        </div>

                                        <div class="timeline-footer">
                                            <div id="comenta_<?php echo $contador; ?>" data-scrollbar="true" style="font-size: 12px;max-height: 100px;margin-bottom: 0px;padding-left: 16px;padding-right: 16px; overflow: auto"><?php DashboardController::getComentario($datoSolucion['sol_id']) ?></div>
                                            
                                            <div class="modal fade" id="solucion_<?php echo $contador; ?>" tabindex="-1" role="dialog" aria-labelledby="MyModalLabel" aria-hidden="true" >
                                                <div class="modal-dialog">
                                                    <div class="modal-content" >
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <div><span><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/img/users/' . DashboardController::getImagen($datoSolucion['usu_id'])); ?>" alt="" width="34px" height="34px" style="border-radius: 40px;float:left;margin-right: 10px;" />
                                                                    <span  style="vertical-align: -8px;"><?php echo (DashboardController::GetUsuario($datoSolucion['usu_id'])); ?></span>
                                                                    <!--<span class="pull-right text-muted" id="vista_<?php echo $contador; ?>"><?php echo DashboardController::getVista($datoSolucion['sol_id']); ?></span>-->
                                                            </div>
                                                            <div class="row" style="margin-left:0px; margin-right: 0px;">
                                                                <span><h4 class="modal-title"><?php echo $datoSolucion['sol_titulo']; ?></h4></span>
                                                                <span><p><?php echo $datoSolucion['sol_descripcion']; ?></p></span>
                                                            </div>

                                                        </div>
                                                        <div id="coment_modal" class="modal-body" data-scrollbar="true" style="background-color:#e8ecf1;">
                                                            <div class="row">
                                                                <?php
                                                                echo DashboardController::getComentario($datoSolucion['sol_id']);
                                                                //$this->renderPartial('/solucion/solucion', compact('sol', 'u'));
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div id="miformulariodiv_<?php echo $contador; ?>" style="margin-top:10px;">
                                                <?php echo CHtml::beginForm(array('procesacomentario')) ?>

                                                <div class="row">
                                                    <label><i class="fa fa-comments fa-fw"></i> Comentar:</label>
                                                    <input type="hidden" name="solucion" id="solucion" value="<?php echo $datoSolucion['sol_id']; ?>"/>
                                                    <input type="hidden" name="usuario" id="usuario" value="<?php echo $datoSolucion['usu_id']; ?>" />
                                                    <input type="hidden" name="contador" id="contador" value="<?php echo $contador; ?>" />
                                                    <textarea class="form-control" name="comentario_<?php echo $contador; ?>" id="comment_<?php echo $contador; ?>" rows="1" cols="70"></textarea>
                                                    <?php echo CHtml::ajaxSubmitButton('Enviar', 'procesacomentario', array('update' => '#comenta_' . $contador,'complete' => "$('#comenta_$contador').addClass('comenta')")); ?>
                                                </div>


                                                <div class="row submit">

                                                </div>

                                                <?php echo CHtml::endForm(); ?>
                                            </div>   
                                            <!--<a href="javascript:;" class="m-r-15"><i class="fa fa-thumbs-up fa-fw"></i>Likes</a>-->
                                            <!--<a href="javascript:;"><i class="fa fa-comments fa-fw"></i>Comments</a>-->
                                        </div>
                                    </div>
                                </li>   
                                <?php $contador++; ?>
                            <?php endforeach; ?>
                            <!-- end timeline-body -->

                        </ul>
                    </div>
                </div>
                <!--<div class="panel-footer">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control bg-silver" placeholder="Ingresar el mensaje" />
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button"><i class="fa fa-pencil"></i></button>
                            </span>
                        </div>
                    </form>
                </div>-->
            </div>
            <!-- fin mensajes -->




        </div>
        <div class="col-md-4">
            <!-- inicio grafico -->
            <div class="panel panel-inverse" data-sortable-id="index-1">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Noticias</h4>
                </div>
                <div class="panel-body" >
                    <div class="height-sm" data-scrollbar="true" >
                        <?php 
                            $noticias=DashboardController::getNoticias();
                            foreach ($noticias as $noticia):
                        ?>
                        <p style=" background-color: #ffffff; border-radius: 8px; padding: 10px">
                          <?php echo $noticia['logs_usu_nombre']." ".$noticia['logs_accion'];?>  
                        </p>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <!-- fin grafico -->
        </div>
        <div>Status API Training Shop Blog About Help © 2015 GitHub, Inc. Terms Privacy Security Contact </div>
    </div>
    <!-- end row -->
    <!-- end row -->
</div>
<!-- end #content -->




