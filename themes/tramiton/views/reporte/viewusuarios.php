<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><?php echo CHtml::link('Inicio',array('dashboard/index')); ?></li>
                <li><?php echo CHtml::link('Regresar',array('reporte/usuarios_inst')); ?></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Usuarios Institucionales Registrados<small></small></h1>

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
                    <h4 class="panel-title">Total de Usuarios</h4>
                </div>
                <div class="panel-body">
                    <?php //echo CHtml::link('<li class="fa fa-plus-circle"></li>&nbsp;&nbsp;Nuevo&nbsp;', array('admin/#role-modal'), array('class' => 'btn btn-primary btn-xs m-r-5', 'data-toggle' => "modal")); ?>
                    <hr>
                    <?php $cont = 1; ?>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>Institución</th>
                                    <th>Responsable</th>
                                    <th>Cédula</th>
                                    <th>Correo Electónico</th>
                                    <th>N° de Visitas</th>
                                    <th>Última Visita</th>
                                                                       
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datosUsuarios as $datos) : ?>
                                    <tr class="odd gradeX">
                                        
                                        <td><?php echo $datos['usu_nombre']; ?></td>
                                        <td><?php echo $datos['usu_responsable_inst']; ?></td>
                                        <td><?php echo $datos['usu_cedula']; ?></td>
                                        <td><?php echo $datos['usu_mail']; ?></td>
                                        <td><?php echo $datos['usu_ingresos']; ?></td>
                                        <td><?php echo $datos['usu_fecha']; ?></td>
                                        
                                        
                                        </td>
                                    </tr>
                                <?php 
                                $cont++; 
                                endforeach; ?>

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




