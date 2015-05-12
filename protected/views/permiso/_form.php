<?php
/* @var $this PermisoController */
/* @var $model Permiso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'permiso-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos marcados con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'per_permiso_desc'); ?>
		<?php echo $form->textField($model,'per_permiso_desc',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'per_permiso_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'per_clave'); ?>
		<?php echo $form->textField($model,'per_clave',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'per_clave'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->