<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'usu_id'); ?>
		<?php echo $form->textField($model,'usu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'insu_id'); ?>
		<?php echo $form->textField($model,'insu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rol_id'); ?>
		<?php echo $form->textField($model,'rol_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'par_id'); ?>
		<?php echo $form->textField($model,'par_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_cedula'); ?>
		<?php echo $form->textField($model,'usu_cedula',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_nombre'); ?>
		<?php echo $form->textField($model,'usu_nombre',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_apellido'); ?>
		<?php echo $form->textField($model,'usu_apellido',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_direccion'); ?>
		<?php echo $form->textField($model,'usu_direccion',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_mail'); ?>
		<?php echo $form->textField($model,'usu_mail',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_celular'); ?>
		<?php echo $form->textField($model,'usu_celular',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_convencional'); ?>
		<?php echo $form->textField($model,'usu_convencional',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_nombreusuario'); ?>
		<?php echo $form->textField($model,'usu_nombreusuario',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_contrasenia'); ?>
		<?php echo $form->textField($model,'usu_contrasenia',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_fechanacimiento'); ?>
		<?php echo $form->textField($model,'usu_fechanacimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_estado'); ?>
		<?php echo $form->textField($model,'usu_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_fecha_registro'); ?>
		<?php echo $form->textField($model,'usu_fecha_registro'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->