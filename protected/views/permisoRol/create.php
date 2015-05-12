<?php
/* @var $this PermisoRolController */
/* @var $model PermisoRol */

$this->breadcrumbs=array(
	'Permisos Roles'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Permisos Roles', 'url'=>array('index')),
	array('label'=>'Administrar Permisos Roles', 'url'=>array('admin')),
);
?>

<h1>Crear Permisos Roles</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>