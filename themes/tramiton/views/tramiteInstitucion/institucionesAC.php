<?php
//$usu_id = $modelUser->usu_id;
$usu_id = $this->_datosUser->usu_id;
?>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><?php echo CHtml::link('Inicio',array('dashboard/index')); ?></li>
        <li class="active">Mi Institución</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Acciones correctivas<small> de las instituciones</small></h1>

    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Datos principales</h4>
                </div>
                <?php
                // $totalCasos = 0;
                // foreach ($sumaCasosTotal as $suma){
                //     $totalCasos += $suma["total"];
                // }
                ?>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Institución</th>
                                    <th>Trámite</th>
                                    <th>Fecha</th>
                                    <th>Acción correctiva</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                foreach ($datosGetInstitucionAccionCorrectiva as $dato) {
                                    ?>
                                    <tr class="odd gradeA">
                                        <td>
                                            <?php echo $dato["ins_nombre"] ?>
                                        </td>
                                        <td>
                                            <?php echo $dato["tra_nombre"] ?>
                                        </td>
                                        <td>
                                          <?php echo $dato["accc_fechaingreso"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $dato["accc_nombre"]; ?>
                                        </td>
                                        <!-- <td>
                                            <?php //echo $dato["accc_descripcion"]; ?>
                                        </td> -->

                                        <td>
                                            <?php
                                            $traiId = Yii::app()->encriptaParam->codificaParamGet($dato['trai_id']);
                                            $traId = Yii::app()->encriptaParam->codificaParamGet($dato['tra_id']);
                                            // $id_tramite = Empresa::model()->codificaGet('tra_id=' . $dato['tra_id']);
                                            //$id_usuario = Empresa::model()->codificaGet('usu_id=' . $usu_id);
                                            // echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-eye"></i> Mostrar AC</button>'
                                                    // , array('tramiteInstitucion/viewTramite_Institucion', 'traiId' => $traiId), array('title' => 'Mostrar'));
                                            ?>
                                            <?php
                                            echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-eye"></i> Ver acción correctiva</button>'
                                                    , array("tramiteInstitucion/viewTramite_Accion_Correctiva_2", 'traiId' => $traiId, 'traId' => $traId), array('title' => 'Acciones Correctivas'));
                                                    // , array("tramiteInstitucion/viewTramite_Accion_Correctiva?" . $id_tramite), array('title' => 'Acciones Correctivas'));
                                            ?>
                                        </td>

                                    </tr>
                                    <?php
                                }
                                ?>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
    <!-- end row -->
</div>
<!-- end #content -->
