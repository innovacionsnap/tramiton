<?php
/* @var $this RoleController */
/* @var $model Role */
?>
<h1>Detalle de Sectores</h1>
<b>ID</b>
    <?php echo $model->sec_id; ?><br>
<b>Nombre</b>
    <?php echo $model->sec_nombre; ?><br>
<b>Valor</b>
    <?php echo $model->sec_estado; ?><br>

<?php echo CHtml::link('Regresar', array('index')); ?>