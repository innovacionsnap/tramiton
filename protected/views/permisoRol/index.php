<?php
/* @var $this PermisoRolController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Adminstración de Permisos y Roles',
);

$this->menu=array(
	array('label'=>'Crear Permiso - Rol', 'url'=>array('create')),
	array('label'=>'Administrar Permiso - Rol', 'url'=>array('admin')),
);
?>

<h1>Permisos Roles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
