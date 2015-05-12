<?php
/* @var $this PermisoUsuarioController */
/* @var $model PermisoUsuario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'per_id'); ?>
		<?php echo $form->textField($model,'per_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_id'); ?>
		<?php echo $form->textField($model,'usu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valor'); ?>
		<?php echo $form->textField($model,'valor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'per_usu_id'); ?>
		<?php echo $form->textField($model,'per_usu_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->