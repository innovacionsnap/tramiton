<h1>Editar Sector</h1>
<?php
$form = $this->beginWidget('CActiveForm');
?>
<div>
    <?php echo $form->labelEx($model, 'nombre') ?>
    <?php echo $form->textField($model, 'nombre') ?>
    <?php echo $form->error($model, 'nombre') ?>
</div>
<div>
    <?php echo $form->labelEx($model, 'valor') ?>
    <?php echo $form->textField($model, 'valor') ?>
    <?php echo $form->error($model, 'valor') ?>
</div>
<?php echo CHtml::submitButton('Editar'); ?>
<?php
$this->endWidget();
?>