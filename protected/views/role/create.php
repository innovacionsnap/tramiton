<?php
/* @var $this RoleController */
/* @var $model Role */

$this->breadcrumbs=array(
	'Roles'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Roles', 'url'=>array('index')),
	array('label'=>'Administrar Rol', 'url'=>array('admin')),
);
?>

<h1>Nuevo Rol</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>