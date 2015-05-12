<?php
/* @var $this PermisoUsuarioController */
/* @var $model PermisoUsuario */

$this->breadcrumbs=array(
	'Permiso Usuarios'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Permisos Usuarios', 'url'=>array('index')),
	array('label'=>'Crear Permiso - Usuario', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#permiso-usuario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Permiso Usuario</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'permiso-usuario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'per_id',
		'usu_id',
		'valor',
		'per_usu_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
