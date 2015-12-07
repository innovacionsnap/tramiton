<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Inicio</a></li>
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
                    <h4 class="panel-title">Mostrando Rol</h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <h4>Eliminar Rol</h4>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><strong>Nombre</strong></td>
                                    <td><?php echo $rolSelect['nombre']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Descripción</strong></td>
                                    <td><?php echo $rolSelect['descripcion']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
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
