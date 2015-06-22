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
                            <?php echo CHtml::link('<li class="fa fa-plus-circle"></li>&nbsp;&nbsp;Nuevo&nbsp;',array('admin/#role-modal'),array('class'=>'btn btn-primary btn-xs m-r-5', 'data-toggle' => "modal")); ?>
                            <hr>
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Acciones</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach (Yii::app()->authManager->getAuthItems() as $roles): ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $roles->name; ?></td>
                                            <td><?php echo $roles->description; ?></td>
                                            <td><?php 
                                                echo CHtml::ajaxLink(
                                                        $text = 'Click me', 
                                                        $url = Yii::app()->createUrl('consumerRequest/manage'),//ajaxURL
                                                        array(
                                                            'data' => array(),
                                                            'type'      => 'POST',
                                                            'success'   => 'js:function(html){
                                                                window.location.href = '.Yii::app()->createUrl('consumerRequest/manage').';//targetURL
                                                             }'
                                                        )
                                                    );
                                            
                                            
                                                echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-eye"></i> Mostrar</button>', array("admin/#role-modal", 'role'=>$roles->name), array('title' => 'Mostrar', 'data-toggle' => "modal"));
                                                echo "&nbsp;&nbsp;";
                                                echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-edit (alias)"></i> Editar</button>', array('edit', 'role'=>$roles->name), array('title' => 'Editar', ));
                                                echo "&nbsp;&nbsp;";
                                                echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-trash-o"></i> Eliminar</button>', array('delete', 'role'=>$roles->name), array('title' => 'Eliminar'));
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

<!--  ventana modal para los roles  -->
<div class="modal fade" id="role-modal">
    <div class="modal-dialog snap_modal_contenedor">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Rol de Usuario</h4>
            </div>
            <div class="modal-body">
                <?php $this->renderPartial('_form_role', array('modelRole'=>$modelRole, 'role'=>$roles->name)) ?>
            </div>
            
        </div>
    </div>
</div>