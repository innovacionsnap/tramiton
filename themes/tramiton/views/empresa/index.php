<style type="text/css">
    .table{
        max-width: 100%;
    }
</style>

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="<?php echo Yii::app()->baseUrl ?>/dashboard/index">Inicio</a></li>
        <li class="active">Registro Caso</li>
    </ol>
    <!-- end breadcrumb -->
    <div class="row">
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
                    <h4 class="panel-title">Empresas registradas</h4>
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Empresa</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($empresas as $empresa): ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $empresa['emp_razon']; ?></td>
                                        <td><?php
                                            $id = Empresa::model()->codificaGet('emp=' . $empresa['emp_id']);
                                            echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-pencil"></i> Registrar caso</button>', array('ciudadano/index/?' . $id), array('title' => 'Registrar caso'));
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
    </div>

</div>


