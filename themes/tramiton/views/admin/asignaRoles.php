<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Tramites</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Tramites <small> de la institucion</small></h1>

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
                    <h4 class="panel-title">Activar Permisos</h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <h4>Usuario</h4>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><strong>Cédula</strong></td>
                                    <td><?php echo $modelUserSelect->usu_cedula; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Nombres Completos</strong></td>
                                    <td><?php echo $modelUserSelect->usu_nombre; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Correo Electrónico</strong></td>
                                    <td><?php echo $modelUserSelect->usu_mail; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <h4>Roles Asignados</h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (Yii::app()->authManager->getAuthItems() as $data): ?>
                                    <?php $enabled = Yii::app()->authManager->checkAccess($data->name, $modelUserSelect->usu_id) ?> 
                                    <tr>
                                        <td><?php echo $data->name; ?></td>
                                        <td><?php echo $data->description; ?></td>
                                        <td><?php echo CHtml::link($enabled ? "<li class='fa fa-2x fa-toggle-on'></li>" : "<li class='fa fa-2x fa-toggle-off'></li>", array("admin/activaDesactivaRol", "usrId" => $modelUserSelect->usu_id, "item" => $data->name)); ?></td>
                                    </tr>
                                <?php endforeach; ?>
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
