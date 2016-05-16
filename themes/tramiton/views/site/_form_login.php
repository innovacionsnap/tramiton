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
<div class="panel panel-default panel-login-home">
  <div class="panel-body panel-login-home-body">
    <h2 class="text-center azul" >Inicia sesión</h2>
    <div class="form-group m-b-15">
      <div class="form-group has-feedback">
        <?php echo $form->labelEx($model_login, 'username', array('class' => 'control-label')); ?>
        <?php echo $form->textField($model_login, 'username', array("class" => "form-control", "placeholder" => "Usuario")); ?>
        <i class="glyphicon glyphicon-user form-control-feedback"></i>
        <?php echo $form->error($model_login, 'username'); ?>
      </div>
    </div>

    <div class="form-group m-b-15">
      <div class="form-group has-feedback">
        <?php echo $form->labelEx($model_login, 'password', array('class' => 'control-label')); ?>
        <?php echo $form->passwordField($model_login, 'password', array("class" => "form-control", "placeholder" => "Contraseña")); ?>
        <i class="glyphicon glyphicon-lock form-control-feedback"></i>
        <?php echo $form->error($model_login, 'password'); ?>
      </div>
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
  </div>
</div>
<?php $this->endWidget(); ?>

<style media="screen">
  /*Para alinear verticalmente el panel del login ubicado en home*/
  .panel-login-home-body{
    position: relative;
    height: 442px;
    top: 50%;
    margin-top: -200px;
  }
  .panel-login-home{
    position: relative;
    height: 461px;
  }
</style>
