<?php
/* @var $this PermisoUsuarioController */
/* @var $model PermisoUsuario */

$this->breadcrumbs=array(
	'Permiso Usuario'=>array('index'),
	$model->per_usu_id=>array('view','id'=>$model->per_usu_id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Permisos Usuarios', 'url'=>array('index')),
	array('label'=>'Crear Permiso - Usuario', 'url'=>array('create')),
	array('label'=>'Visualizar Permiso - Usuario', 'url'=>array('view', 'id'=>$model->per_usu_id)),
	array('label'=>'Asministrar Permiso - Usuario', 'url'=>array('admin')),
);
?>

<h1>Actualizar Permiso - Usuario <?php echo $model->per_usu_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>