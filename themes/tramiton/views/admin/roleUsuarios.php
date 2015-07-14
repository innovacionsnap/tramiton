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
                            <h4 class="panel-title">Datos principales</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombres y Apellidos</th>
                                            <th>Cédula</th>
                                            <th>Nombre Usuario</th>
                                            <th>Acciones</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($usuarios as $users): ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $users->usu_id; ?></td>
                                            <td><?php echo $users->usu_nombre; ?></td>
                                            <td><?php echo $users->usu_cedula; ?></td>
                                            <td><?php echo $users->usu_nombreusuario; ?></td>
                                            <td><?php 
                                                echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-lock"></i>&nbsp;&nbsp;&nbsp;Permisos</button>', array('admin/asignarRol', 'usrId' => $users->usu_id), array('title' => 'Asingar Permisos',));    
                                                //echo CHtml::link('<i class="fa fa-lock"></i>&nbsp;', array('view', 'id'=>$users->usu_id), array('title' => 'Asignar Permisos'));
                                                //echo "&nbsp;&nbsp;&nbsp;";
                                                //echo CHtml::link('<i class="fa fa-edit (alias)"></i>', array('edit', 'id'=>$users->usu_id), array('title' => 'Editar'));
                                                //echo "&nbsp;&nbsp;&nbsp;";
                                                //echo CHtml::link('<i class="fa fa-eraser"></i>', array('delete', 'id'=>$users->usu_id), array('title' => 'Eliminar'));
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
                <!-- end col-12 -->
            </div>
            <!-- end row -->
            <!-- end row -->
    </div>
<!-- end #content -->
