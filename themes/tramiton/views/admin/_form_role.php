<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of _form_login
 * 
 * @var $this SiteController 
 * @var $model_login Site 
 * @var $form CActiveForm 
 *
 * @author Oscar
 */

echo $role;

$form = $this->beginWidget("CActiveForm", array(
    'id' => "role-form",
    'enableAjaxValidation' => true,
    'clientOptions' => array("validateOnSubmit" => true)
        ));
?>

<?php echo $form->labelEx($modelRole, "nombre"); ?>
<?php echo $form->textField($modelRole, "nombre", array("class" => "form-control")); ?>
<?php echo $form->error($modelRole, "nombre"); ?>

<?php echo $form->labelEx($modelRole, "descripcion"); ?>
<?php echo $form->textArea($modelRole, "descripcion", array("class" => "form-control")); ?>
<?php echo $form->error($modelRole, "descripcion"); ?>

<br>
<?php echo CHtml::submitButton("Guardar", array("class" => "btn btn-primary")); ?>
&nbsp;&nbsp;&nbsp;
<?php echo CHtml::button('Cancelar', array("class" => "btn btn-danger", "data-dismiss" => "modal")); ?>
<?php $this->endWidget(); ?>


