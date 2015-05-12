<?php
/* @var $this PermisoUsuarioController */
/* @var $data PermisoUsuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('per_usu_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->per_usu_id), array('view', 'id'=>$data->per_usu_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('per_id')); ?>:</b>
	<?php echo CHtml::encode($data->per_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_id')); ?>:</b>
	<?php echo CHtml::encode($data->usu_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />


</div>