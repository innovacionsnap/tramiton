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

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'login-form',
    'action' => $this->createUrl("site/login"),
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    ));
?>

<?php echo $form->textField($model_login, 'username', array("class" => "form-control input-home-tramiton", "placeholder" => "Usuario")); ?>
<?php echo $form->error($model_login, 'username'); ?>

<?php echo $form->passwordField($model_login, 'password', array("class" => "form-control input-home-tramiton", "placeholder" => "Contraseña")); ?>
<?php echo $form->error($model_login, 'password'); ?>

<?php echo CHtml::submitButton('Ingresa', array("class" => "btn btn-sm btn-success")); ?>

<?php $this->endWidget(); ?>