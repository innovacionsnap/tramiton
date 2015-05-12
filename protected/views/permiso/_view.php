<?php
/* @var $this PermisoController */
/* @var $data Permiso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('per_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->per_id), array('view', 'id'=>$data->per_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('per_permiso_desc')); ?>:</b>
	<?php echo CHtml::encode($data->per_permiso_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('per_clave')); ?>:</b>
	<?php echo CHtml::encode($data->per_clave); ?>
	<br />


</div>