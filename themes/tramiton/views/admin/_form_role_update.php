<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of _form_role_update
 * 
 * @var $this AdminController 
 * @var $modelRole Admin 
 * @var $form CActiveForm 
 *
 * @author Oscar
 */

$form = $this->beginWidget("CActiveForm", array(
    'method' => 'POST',
    'id' => "role-form-update",
    'enableAjaxValidation' => true,
    'clientOptions' => array("validateOnSubmit" => true)
        ));
?>

<?php //echo $form->hiddenField($modelRole, "nombre_orig", array("value" => $rolSelect['nombre'])); ?>
<?php echo $form->textField($modelRole, "item", array("value" => $rolSelect['nombre'])); ?>

<?php echo $form->labelEx($modelRole, "nombre"); ?>
<?php echo $form->textField($modelRole, "nombre", array("value" => $rolSelect['nombre'], "class" => "form-control input-home-tramiton")); ?>
<?php echo $form->error($modelRole, "nombre"); ?>

<?php echo $form->labelEx($modelRole, "descripcion"); ?>
<?php echo $form->textArea($modelRole, "descripcion", array("value" => $rolSelect['descripcion'], "class" => "form-control input-home-tramiton")); ?>
<?php echo $form->error($modelRole, "descripcion"); ?>

<br>
<?php echo CHtml::submitButton('Actualizar', array("class" => "btn btn-primary")); ?>
&nbsp;&nbsp;&nbsp;
<?php echo CHtml::button('Cancelar', array("class" => "btn btn-danger", "data-dismiss" => "modal")); ?>
<?php $this->endWidget(); ?>


