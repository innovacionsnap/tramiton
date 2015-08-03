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
    'method' => 'POST',
    'action' => Yii::app()->createUrl("site/recuperarPassword"),
    'id' => 'recovery_pass_form',
    'htmlOptions' => array('class' => 'margin-bottom-0'),
    'enableClientValidation' => true,
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
    ),
        ));
?>

<?php echo $form->labelEx($model_reset_pass, 'email', array('class' => 'control-label')); ?>
<div class="row m-b-15">
    <div class="col-md-12">
        <?php echo $form->textField($model_reset_pass, 'email', array('class' => 'form-control', 'placeholder' => 'Correo Electrónico')); ?>
        <?php echo $form->error($model_reset_pass, 'email'); ?>
    </div>
</div>


<?php if (CCaptcha::checkRequirements()) : ?>
    <?php echo $form->labelEx($model_reset_pass, 'captcha', array('class' => 'control-label')); ?>
    <div class="row row-space-10">
        <div class="col-md-6 m-b-15">
            <?php
            $this->widget("CCaptcha", array(
                'buttonType' => 'button',
                'buttonOptions' => array(
                    'type' => 'image',
                    'src' => '../images/recargaricon.png'
                ),
            ));
            ?>
        </div>    
        <div class="col-md-6 m-b-15">
            <?php echo $form->textField($model_reset_pass, 'captcha', array('class' => 'form-control')); ?>
            <?php echo $form->error($model_reset_pass, 'captcha'); ?>
        </div>

    </div>


<?php endif; ?>
<div class="register-buttons">
    <?php echo CHtml::submitButton('Recuperar Contraseña', array('class' => 'btn btn-primary btn-block btn-lg')); ?>
</div>

<?php $this->endWidget(); ?>
<hr />
<p class="text-center text-inverse">
    &copy; Tramiton.to Todos los derechos reservados 2015
</p>
