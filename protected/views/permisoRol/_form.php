<?php
/* @var $this PermisoRolController */
/* @var $model PermisoRol */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'permiso-rol-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos marcados con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rol_id'); ?>
		<?php echo $form->dropDownList($model,'rol_id', $model->getListaRoles()); ?>
		<?php echo $form->error($model,'rol_id'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'per_id'); ?>
		<?php echo $form->dropDownList($model,'per_id', $model->getListaPermisos()); ?>
		<?php echo $form->error($model,'per_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'perr_valor'); ?>
		<?php echo $form->textField($model,'perr_valor'); ?>
		<?php echo $form->error($model,'perr_valor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->