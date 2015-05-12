<?php
/* @var $this PermisoRolController */
/* @var $model PermisoRol */

$this->breadcrumbs=array(
	'Permisos Roles'=>array('index'),
	$model->per_rol_id,
);

$this->menu=array(
	array('label'=>'Listar Permisos Roles', 'url'=>array('index')),
	array('label'=>'Crear Permiso - Rol', 'url'=>array('create')),
	array('label'=>'Actualizar Permiso - Rol', 'url'=>array('update', 'id'=>$model->per_rol_id)),
	array('label'=>'Eliminar Permiso - Rol', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->per_rol_id),'confirm'=>'¿Está seguro de eliminar este registro?')),
	array('label'=>'Administrar Permiso - Rol', 'url'=>array('admin')),
);
?>

<h1>View PermisoRol #<?php echo $model->per_rol_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'per_id',
		'rol_id',
		'perr_valor',
		'per_rol_id',
	),
)); ?>
