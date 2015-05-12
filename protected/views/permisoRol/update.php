<?php
/* @var $this PermisoRolController */
/* @var $model PermisoRol */

$this->breadcrumbs=array(
	'Permisos Roles'=>array('index'),
	$model->per_rol_id=>array('view','id'=>$model->per_rol_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Lista Permisos - Rol', 'url'=>array('index')),
	array('label'=>'Crear Permiso - Rol', 'url'=>array('create')),
	array('label'=>'Visualizar Permiso - Rol', 'url'=>array('view', 'id'=>$model->per_rol_id)),
	array('label'=>'Administrar Permiso - Rol', 'url'=>array('admin')),
);
?>

<h1>Actualizar Permisos Roles <?php echo $model->per_rol_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>