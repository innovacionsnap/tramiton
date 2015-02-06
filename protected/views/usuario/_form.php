<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'insu_id'); ?>
		<?php echo $form->textField($model,'insu_id'); ?>
		<?php echo $form->error($model,'insu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rol_id'); ?>
		<?php echo $form->textField($model,'rol_id'); ?>
		<?php echo $form->error($model,'rol_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'par_id'); ?>
		<?php echo $form->textField($model,'par_id'); ?>
		<?php echo $form->error($model,'par_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usu_cedula'); ?>
		<?php echo $form->textField($model,'usu_cedula',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'usu_cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usu_nombre'); ?>
		<?php echo $form->textField($model,'usu_nombre',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'usu_nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usu_apellido'); ?>
		<?php echo $form->textField($model,'usu_apellido',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'usu_apellido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usu_direccion'); ?>
		<?php echo $form->textField($model,'usu_direccion',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'usu_direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usu_mail'); ?>
		<?php echo $form->textField($model,'usu_mail',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'usu_mail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usu_celular'); ?>
		<?php echo $form->textField($model,'usu_celular',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'usu_celular'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usu_convencional'); ?>
		<?php echo $form->textField($model,'usu_convencional',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'usu_convencional'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usu_nombreusuario'); ?>
		<?php echo $form->textField($model,'usu_nombreusuario',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'usu_nombreusuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usu_contrasenia'); ?>
		<?php echo $form->textField($model,'usu_contrasenia',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'usu_contrasenia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usu_fechanacimiento'); ?>
		<?php echo $form->textField($model,'usu_fechanacimiento'); ?>
		<?php echo $form->error($model,'usu_fechanacimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usu_estado'); ?>
		<?php echo $form->textField($model,'usu_estado'); ?>
		<?php echo $form->error($model,'usu_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usu_fecha_registro'); ?>
		<?php echo $form->textField($model,'usu_fecha_registro'); ?>
		<?php echo $form->error($model,'usu_fecha_registro'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->