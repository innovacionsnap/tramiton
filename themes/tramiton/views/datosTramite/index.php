<link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="<?php echo Yii::app()->getBaseUrl(); ?>/dashboard/index">Home</a></li>
        <li class="active">Total Trámites</li>
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
                    <h4 class="panel-title">Trámites</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Fecha de Registro</th>
                                    <th>Trámite</th>
                                    <th>Entidad</th>
                                    <th>Sector</th>
                                    <th>Usuario</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cont = 1;
                                foreach ($tramites as $tramite):
                                    ?>
                                    <tr class="odd gradeA">
                                        <td class="sorting_1"><?php echo $cont; ?></td>
                                        <td class="sorting_1"><?php echo $tramite['datt_fecharegistro'] ?></td>
                                        <td class="sorting_1"><?php echo $tramite['datt_otronombretramite'] ?></td>
                                        <td class="sorting_1"><?php echo $tramite['trai_id'] ?></td>
                                        <td class="sorting_1"><?php echo $tramite['trai_id'] ?></td>
                                        <td class="sorting_1"><?php echo $tramite->usu['usu_nombreusuario'] ?></td>
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
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . 'assets/plugins/DataTables/js/jquery.dataTables.js', CClientScript::POS_END); ?>	
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . 'assets/js/table-manage-default.demo.min.js', CClientScript::POS_END); ?>	
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . 'assets/js/apps.min.js', CClientScript::POS_END); ?>	


<!-- ================== END PAGE LEVEL JS prueba ================== -->
<script>
    $(document).ready(function () {
        App.init();
        TableManageDefault.init();
    });
</script>
