<?php
/* @var $this RoleController */
/* @var $data Role */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rol_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rol_id), array('view', 'id'=>$data->rol_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rol_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->rol_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rol_estado')); ?>:</b>
	<?php echo CHtml::encode($data->rol_estado); ?>
	<br />


</div>