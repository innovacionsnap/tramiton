<?php
/* @var $this PermisoUsuarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Permisos Usuarios',
);

$this->menu=array(
	array('label'=>'Crear Permiso Usuario', 'url'=>array('create')),
	array('label'=>'Administrar Permiso Usuario', 'url'=>array('admin')),
);
?>

<h1>Permisos Usuarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
