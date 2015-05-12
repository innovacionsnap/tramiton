<?php
/* @var $this PermisoRolController */
/* @var $data PermisoRol */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('per_rol_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->per_rol_id), array('view', 'id'=>$data->per_rol_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('per_id')); ?>:</b>
	<?php echo CHtml::encode($data->per->per_permiso_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rol_id')); ?>:</b>
	<?php echo CHtml::encode($data->rol->rol_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('perr_valor')); ?>:</b>
	<?php echo CHtml::encode($data->perr_valor); ?>
	<br />


</div>