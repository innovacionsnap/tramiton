<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Inicio</a></li>
				<li class="active">Roles</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Roles <small> de los usuarios</small></h1>

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
                                <?php
                                
                                //var_dump($dataProvider);
                                
                                /*$this->widget('zii.widgets.grid.CGridView', array(
                                        'id'=>'usuario-grid',
                                        'dataProvider'=>$dataProvider,
                                        'itemsCssClass'=>'table table-striped table-bordered dataTable no-footer',
                                        //'ajaxUpdate' => TRUE,
                                        'pager' => array(
                                                //'class'=>'CLinkPager',
                                                /*'htmlOptions' => array(
                                                    'class' => 'dataTables_paginate paging_simple_numbers',
                                                ),*/
                                                //'selectedPageCssClass' => 'paginate_button current',
                                                //'hiddenPageCssClass' => 'disabled',
                                             //cambio   'header' => '',
                                                
                                        //cambio    ),
                                        //'filter'=>$model,
                                        /*cambio 'filter'=>$dataProvider->model,
                                        'columns'=>array(
                                                'usu_id',
                                                'rol_id',
                                                'usu_cedula',
                                                'usu_nombre',*/
                                                /*array(
                                                    'value' => "CHtml::link('<button type='button' class='btn btn-inverse active btn-xs m-r-5'><i class='fa fa-lock'></i>&nbsp;&nbsp;&nbsp;Permisos</button>', array('admin/asignarRol', 'usrId' => $model->usu_id), array('title' => 'Asingar Permisos',))",
                                                    'type'  => 'html',
                                                )*/
                                                
                                                /*
                                                'usu_apellido',
                                                'usu_direccion',
                                                'usu_mail',
                                                'usu_celular',
                                                'usu_convencional',
                                                'usu_nombreusuario',
                                                'usu_contrasenia',
                                                'usu_fechanacimiento',
                                                'usu_estado',
                                                'usu_fecha_registro',
                                                */
                                                /*array(
                                                        'class'=>'CButtonColumn',
                                                ),*/
                                    //cambio    ),
                            //cambio    ));*/
                                
                                ?>
                                
                                
                                
                                
                               
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
