<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->usu_id,
);

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'Update Usuario', 'url'=>array('update', 'id'=>$model->usu_id)),
	array('label'=>'Delete Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->usu_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
?>

<h1>View Usuario #<?php echo $model->usu_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'usu_id',
		'insu_id',
		'rol_id',
		'par_id',
		'usu_cedula',
		'usu_nombre',
		'usu_apellido',
		'usu_direccion',
		'usu_mail',
		'usu_celular',
		'usu_convencional',
		'usu_nombreusuario',
		'usu_contrasenia',
		'usu_fechanacimiento',
		'usu_estado',
		'usu_fecha_registro',
	),
)); ?>
