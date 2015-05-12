<?php
/* @var $this RoleController */
/* @var $model Role */

$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->rol_id=>array('view','id'=>$model->rol_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Roles', 'url'=>array('index')),
	array('label'=>'Crear Rol', 'url'=>array('create')),
	array('label'=>'Visualizar Rol', 'url'=>array('view', 'id'=>$model->rol_id)),
	array('label'=>'Administrar Rol', 'url'=>array('admin')),
);
?>

<h1>Actualizar Roles<?php echo $model->rol_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>