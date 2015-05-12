<?php
/* @var $this PermisoController */
/* @var $model Permiso */

$this->breadcrumbs=array(
	'Permisos'=>array('index'),
	$model->per_id=>array('view','id'=>$model->per_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Permisos', 'url'=>array('index')),
	array('label'=>'Crear Permiso', 'url'=>array('create')),
	array('label'=>'Visualizar Permiso', 'url'=>array('view', 'id'=>$model->per_id)),
	array('label'=>'Administrar Permiso', 'url'=>array('admin')),
);
?>

<h1>Actualizar Permiso <?php echo $model->per_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>