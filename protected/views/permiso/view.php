<?php
/* @var $this PermisoController */
/* @var $model Permiso */

$this->breadcrumbs=array(
	'Permisos'=>array('index'),
	$model->per_id,
);

$this->menu=array(
	array('label'=>'Listar Permiso', 'url'=>array('index')),
	array('label'=>'Crear Permiso', 'url'=>array('create')),
	array('label'=>'Actualizar Permiso', 'url'=>array('update', 'id'=>$model->per_id)),
	array('label'=>'Eliminar Permiso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->per_id),'confirm'=>'¿Está seguro de eliminar este registro?')),
	array('label'=>'Administrar Permiso', 'url'=>array('admin')),
);
?>

<h1>Permiso #<?php echo $model->per_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'per_id',
		'per_permiso_desc',
		'per_clave',
	),
)); ?>
