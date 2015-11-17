<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
/* @var $form CActiveForm */
?>
<div id="content" class="content linea">
    <div class="row">
        <div class="form">

            <?php
            $form = $this->beginWidget('CActiveForm', array
                (
                'method' => 'POST',
                'action' => Yii::app()->createUrl('site/registro'),
                'id' => 'form-registro',
                'enableClientValidation' => true,
                'enableAjaxValidation' => true,
                'htmlOptions' => array('class' => 'margin-bottom-0'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'validateOnChange' => true,
                    'validateOnType' => true,
                ),
            ));
            ?>

            <p class="note">Fields with <span class="required">*</span> are required.</p>

            <?php echo $form->errorSummary($model); ?>

            <div class="row">
                <?php echo $form->labelEx($model, 'RUC'); ?>
                <?php echo $form->textField($model, 'emp_ruc'); ?>
                <?php echo $form->error($model, 'emp_ruc'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'Razón Social'); ?>
                <?php echo $form->textField($model, 'emp_razon'); ?>
                <?php echo $form->error($model, 'emp_razon'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'Dirección'); ?>
                <?php echo $form->textField($model, 'emp_direccion'); ?>
                <?php echo $form->error($model, 'emp_direccion'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'Teléfono 1'); ?>
                <?php echo $form->textField($model, 'emp_telefono1'); ?>
                <?php echo $form->error($model, 'emp_telefono1'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'usu_id'); ?>
                <?php echo $form->textField($model, 'usu_id'); ?>
                <?php echo $form->error($model, 'usu_id'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'Teléfono 2'); ?>
                <?php echo $form->textField($model, 'emp_telefono2'); ?>
                <?php echo $form->error($model, 'emp_telefono2'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'Fax'); ?>
                <?php echo $form->textField($model, 'emp_fax'); ?>
                <?php echo $form->error($model, 'emp_fax'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'Sitio Web'); ?>
                <?php echo $form->textField($model, 'emp_web'); ?>
                <?php echo $form->error($model, 'emp_web'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'Correo electrónico'); ?>
                <?php echo $form->textField($model, 'emp_email'); ?>
                <?php echo $form->error($model, 'emp_email'); ?>
            </div>

            <?php if (CCaptcha::checkRequirements()) : ?>
                <div class='row'>
                    <?php echo $form->labelEx($model, 'captcha'); ?>
                    <div>
                        <?php
                        $this->widget("CCaptcha", array(
                            'buttonType' => 'button',
                            'buttonOptions' => array(
                                'type' => 'image',
                                'src' => '../images/recargaricon.png'
                            ),
                        ));
                        ?>
                        <?php echo $form->textField($model, 'captcha'); ?>
                    </div>
                    <div class='hint'>
                        Por favor ingrese el texto que se muestra en la imagen.
                    </div>
    <?php echo $form->error($model, 'captcha'); ?>
                </div>
                <?php endif; ?>
            <div class="row buttons">
            <?php echo CHtml::submitButton('Submit'); ?>
            </div>

<?php $this->endWidget(); ?>

        </div><!-- form -->
    </div>
</div>