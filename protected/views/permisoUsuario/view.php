<?php
/* @var $this PermisoUsuarioController */
/* @var $model PermisoUsuario */

$this->breadcrumbs=array(
	'Permisos Usuarios'=>array('index'),
	$model->per_usu_id,
);

$this->menu=array(
	array('label'=>'Listar Permisos Usuarios', 'url'=>array('index')),
	array('label'=>'Crear Permiso Usuario', 'url'=>array('create')),
	array('label'=>'Actualizar Permiso - Usuario', 'url'=>array('update', 'id'=>$model->per_usu_id)),
	array('label'=>'Eliminar Permiso - Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->per_usu_id),'confirm'=>'¿Está seguro de eliminar este registro?')),
	array('label'=>'Administrar Permiso - Usuario', 'url'=>array('admin')),
);
?>

<h1>Permiso Usuario #<?php echo $model->per_usu_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'per_id',
		'usu_id',
		'valor',
		'per_usu_id',
	),
)); ?>
