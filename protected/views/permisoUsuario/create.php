<?php
/* @var $this PermisoUsuarioController */
/* @var $model PermisoUsuario */

$this->breadcrumbs=array(
	'Permisos Usuarios'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar Permisos Usuarios', 'url'=>array('index')),
	array('label'=>'Administrar Permiso - Usuario', 'url'=>array('admin')),
);
?>

<h1>Nuevo Permiso Usuario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>