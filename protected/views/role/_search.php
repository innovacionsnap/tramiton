<?php
/* @var $this RoleController */
/* @var $model Role */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'rol_id'); ?>
		<?php echo $form->textField($model,'rol_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rol_nombre'); ?>
		<?php echo $form->textField($model,'rol_nombre',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rol_estado'); ?>
		<?php echo $form->textField($model,'rol_estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->