<?php
/* @var $this RoleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Roles de Usuarios',
);

$this->menu=array(
	array('label'=>'Crear Roles', 'url'=>array('create')),
	array('label'=>'Administrar Roles', 'url'=>array('admin')),
);
?>

<h1>Roles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
