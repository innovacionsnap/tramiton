<?php
/* @var $this PermisoRolController */
/* @var $model PermisoRol */

$this->breadcrumbs=array(
	'Permiso Roles'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Permiso - Rol', 'url'=>array('index')),
	array('label'=>'Crear Permiso - Rol', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#permiso-rol-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Permisos Roles</h1>

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
	'id'=>'permiso-rol-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'per_rol_id',
                //'rol_id',
                array(
                    'name'=>'rol_id',
                    'value'=>'($data->rol!=null) ? $data->rol->rol_nombre : null',
                ),
                array(
                    'name'=>'per_id',
                    'value'=>'($data->per!=null) ? $data->per->per_permiso_desc : null',
                ),
                //'per_id',
		'perr_valor',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
