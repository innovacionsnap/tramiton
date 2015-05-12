<div class="success">
    <?php
    echo $msg;
    ?>
</div>

<div class='form'>
    <?php 
    $form = $this->beginWidget('CActiveForm', array
            (
            'method' => 'POST',
            'action' => Yii::app()->createUrl('site/registro'),
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'validateOnType' => true,
            ),
            ));
    ?>
    
    <div class='row'>
        <?php
        
        echo $form->labelEx($model, "cedula");
        echo $form->textField($model, 'cedula');
        echo $form->error($model, 'cedula')
        
        ?>
        
    </div>
    <div class='row'>
        <?php
        
        echo $form->labelEx($model, 'nombre_usuario');
        echo $form->textField($model, 'nombre_usuario');
        echo $form->error($model, 'nombre_usuario')
        
        ?>
        
    </div>
    
    <div class='row'>
        <?php
        
        echo $form->labelEx($model, 'email');
        echo $form->textField($model, 'email');
        echo $form->error($model, 'email')
        
        ?>
        
    </div>
    
    <div class='row'>
        <?php
        
        echo $form->labelEx($model, 'repetir_email');
        echo $form->textField($model, 'repetir_email');
        echo $form->error($model, 'repetir_email')
        
        ?>
        
    </div>
    <div class='row'>
        <?php
        
        echo $form->labelEx($model, 'password');
        echo $form->passwordField($model, 'password');
        echo $form->error($model, 'password')
        
        ?>
        
    </div>
    <div class='row'>
        <?php
        
        echo $form->labelEx($model, 'repetir_password');
        echo $form->passwordField($model, 'repetir_password');
        echo $form->error($model, 'repetir_password')
        
        ?>
        
    </div>
    
    <?php if(CCaptcha::checkRequirements()) : ?>
    <div class='row'>
        <?php echo $form->labelEx($model, 'captcha'); ?>
        <div>
            <?php 
            
                $this->widget("CCaptcha",
                        array(
                            'buttonType' => 'button',
                            'buttonOptions' => array(
                                'type' => 'image',
                                'src' => 'images/recargaricon.png'
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
    
    <div class='row'>
        
        <?php
        
        echo CHtml::submitButton('Registrar');
        
        ?>
        
    </div>
    
    <?php $this->endWidget(); ?>
    
</div>