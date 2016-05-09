<?php

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
    <?php echo CHtml::submitButton('Ingresar', array("class" => "btn btn-sm btn-success")); ?>
</div>
<br>
<div class="form-group m-b-15"> 
    <?php echo CHtml::link('¿Olvidaste tu contraseña?', array('site/recuperarPassword'), array('class' => 'text-success')); ?>
</div>

<div class="m-t-20">
    ¿No dispones de una cuenta en Tramitón? <?php echo CHtml::link('<strong>Regístrate aquí</strong>', array('site/registro'), array('class' => 'text-success')); ?>.
</div>
<?php $this->endWidget(); ?>
