<?php
/* @var $this PermisoRolController */
/* @var $model PermisoRol */
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
		<?php echo $form->label($model,'rol_id'); ?>
		<?php echo $form->textField($model,'rol_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'perr_valor'); ?>
		<?php echo $form->textField($model,'perr_valor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'per_rol_id'); ?>
		<?php echo $form->textField($model,'per_rol_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->