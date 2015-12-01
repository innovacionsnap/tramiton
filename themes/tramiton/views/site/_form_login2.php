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
    'htmlOptions' => array('class' => 'margin-bottom-0'),
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>

<div class="form-group m-b-15">
    <?php echo $form->textField($model_login, 'username', array("class" => "form-control input-home-tramiton", "placeholder" => "Usuario")); ?>
    <?php echo $form->error($model_login, 'username'); ?>
</div>
<div class="form-group m-b-15">    
    <?php echo $form->passwordField($model_login, 'password', array("class" => "form-control input-home-tramiton", "placeholder" => "Contraseña")); ?>
    <?php echo $form->error($model_login, 'password'); ?>
</div>
<div class="checkbox">
    <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>
    <?php echo $form->checkBox($model_login, 'rememberMe'); ?>
    <?php echo $form->label($model_login, 'rememberMe'); ?>
    <?php echo $form->error($model_login, 'rememberMe'); ?>
</div>
<div class="login-buttons">
    <?php echo CHtml::submitButton('Ingresar', array("class" => "btn btn-block btn-md btn-blue-tramiton")); ?>
</div>
<br>
<div class="form-group m-b-15"> 
    <?php echo CHtml::link('¿Olvidaste tu contraseña?', array('site/recuperarPassword'), array('class' => 'text-blue-tramiton')); ?>
</div>

<div class="m-t-20">
    ¿No dispones de una cuenta en Tramitón? <?php echo CHtml::link('<strong>Registrate aquí</strong>', array('site/registro'), array('class' => 'text-blue-tramiton')); ?>.
</div>
<?php $this->endWidget(); ?>