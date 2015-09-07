<link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="<?php echo Yii::app()->getBaseUrl(); ?>/dashboard/index">Inicio</a></li>
        <li class="active">Ranking Soluciones</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Trámites <small> de la Institución</small></h1>

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
                    <h4 class="panel-title">Soluciones más visitadas</h4>
                </div>
                <div class="panel-body">
                    <?php //echo "<pre>"; print_r($tramites); echo "</pre>";?>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Institución</th>
                                    <th>Trámite</th>
                                    <th>Solución</th>
                                    <th>Visitas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cont = 1;
                                foreach ($datosRankingSolucion as $solucion):
                                    ?>
                                    <tr class="odd gradeA">
                                        <td class="sorting_1"><?php echo $cont; ?></td>
                                        <td class="sorting_1"><?php echo $solucion['ins_nombre']; ?></td>
                                        <td class="sorting_1"><?php echo $solucion['tra_nombre'] ?></td>
                                        <td class="sorting_1"><?php echo $solucion['sol_descripcion'] ?></td>
                                        <td class="sorting_1"><?php echo $solucion['sol_vistas'] ?></td>
                                    </tr>

                                    <?php
                                    $cont++;
                                endforeach;
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
</div>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/plugins/DataTables/js/jquery.dataTables.js', CClientScript::POS_END); ?>	
<?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/js/table-manage-default.demo.min.js', CClientScript::POS_END); ?>	
<?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/js/apps.min.js', CClientScript::POS_END); ?>	


<!-- ================== END PAGE LEVEL JS prueba ================== -->
<script>
    $(document).ready(function () {
        App.init();
        TableManageDefault.init();
    });
</script>
