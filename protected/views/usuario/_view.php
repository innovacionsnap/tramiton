<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usu_id), array('view', 'id'=>$data->usu_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('insu_id')); ?>:</b>
	<?php echo CHtml::encode($data->insu_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rol_id')); ?>:</b>
	<?php echo CHtml::encode($data->rol_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('par_id')); ?>:</b>
	<?php echo CHtml::encode($data->par_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_cedula')); ?>:</b>
	<?php echo CHtml::encode($data->usu_cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->usu_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_apellido')); ?>:</b>
	<?php echo CHtml::encode($data->usu_apellido); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_direccion')); ?>:</b>
	<?php echo CHtml::encode($data->usu_direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_mail')); ?>:</b>
	<?php echo CHtml::encode($data->usu_mail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_celular')); ?>:</b>
	<?php echo CHtml::encode($data->usu_celular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_convencional')); ?>:</b>
	<?php echo CHtml::encode($data->usu_convencional); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_nombreusuario')); ?>:</b>
	<?php echo CHtml::encode($data->usu_nombreusuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_contrasenia')); ?>:</b>
	<?php echo CHtml::encode($data->usu_contrasenia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_fechanacimiento')); ?>:</b>
	<?php echo CHtml::encode($data->usu_fechanacimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_estado')); ?>:</b>
	<?php echo CHtml::encode($data->usu_estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->usu_fecha_registro); ?>
	<br />

	*/ ?>

</div>