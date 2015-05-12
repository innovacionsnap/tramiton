<?php
/* @var $this PermisoController */
/* @var $model Permiso */

$this->breadcrumbs=array(
	'Permisos'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Permisos', 'url'=>array('index')),
	array('label'=>'Administrar Permisos', 'url'=>array('admin')),
);
?>

<h1>Nuevo Permiso</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>