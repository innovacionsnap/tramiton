<?php
/* @var $this PermisoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Administración de Permisos',
);

$this->menu=array(
	array('label'=>'Crear Permiso', 'url'=>array('create')),
	array('label'=>'Administrar Permiso', 'url'=>array('admin')),
);
?>

<h1>Permisos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
