<?php
/* @var $this RoleController */
/* @var $model Role */

$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->rol_id,
);

$this->menu=array(
	array('label'=>'Lista Roles', 'url'=>array('index')),
	array('label'=>'Crear Rol', 'url'=>array('create')),
	array('label'=>'Actualizar Rol', 'url'=>array('update', 'id'=>$model->rol_id)),
	array('label'=>'Eliminar Rol', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rol_id),'confirm'=>'¿Está seguro de  eliminar este registro?')),
	array('label'=>'Administrar Rol', 'url'=>array('admin')),
);
?>

<h1>Rol de Usuario #<?php echo $model->rol_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rol_id',
		'rol_nombre',
		'rol_estado',
	),
)); ?>
