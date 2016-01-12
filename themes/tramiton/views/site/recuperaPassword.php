<?php
// Snippet that reloads the captcha image after validation
$updateCaptcha=<<<EOD
function(form,attribute,data,hasError) {
    var i=form.find('.captcha img').first(),
                h=/^.*\/v\//.exec(i.attr('src'));  // will cut off the number part at the end of image src URL (".../v/123456")
    i.attr('src',h+Math.floor(100000*Math.random()));  // creates a new random number to prevent image caching
    return true;
}
EOD;
?>
<!-- begin register -->
<div class="register register-with-news-feed">
    <!-- begin news-feed -->
    <div class="news-feed">
        <div class="news-image">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/login-bg/bg_tramiton.png" alt="" />
        </div>
        <div class="news-caption">
            <h4 class="caption-title">Tramiton.to | Bienvenido...</h4>
            <p>
                Regístrate para poder ingresar tus propuestas de trámites absurdos.
            </p>
        </div>
    </div>
    <!-- end news-feed -->
    <!-- begin right-content -->
    <div class="right-content">
        <!-- begin register-header -->
        <h1 class="register-header">
            <div class="row" style="padding-bottom: 20px;">
                <div class="col-xs-12 col-sm-offset-2 col-sm-4 text-center">
                    <a href="<?php echo Yii::app()->baseUrl; ?>"><h4 class="text-blue-tramiton">Inicio <span class="glyphicon glyphicon-home" aria-hidden="true"></span></h4></a>
                </div>
                <div class="col-xs-12 col-sm-6 text-center">
                    <a href="<?php echo Yii::app()->baseUrl; ?>/site/login"><h4 class="text-blue-tramiton">Login <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></h4></a>
                </div>
            </div>
            Recuperar tu contraseña
            <!--<small>Crea tu cuenta en Tramiton.to y cuéntanos sobre los trámites mas absurdos.</small>-->
        </h1>
        <!-- end register-header -->
        <!-- begin register-content -->
        <div class="register-content">
            <?php 
            $form = $this->beginWidget('CActiveForm', array
                    (
                    'method' => 'POST',
                    'action' => Yii::app()->createUrl('site/recuperarPassword'),
                    'id' => 'recovery_pass_form',
                    'enableClientValidation' => true,
                    'enableAjaxValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                        'validateOnChange' => true,
                        'validateOnType' => true,
                        'afterValidateAttribute' => 'js:'.$updateCaptcha,
                        'afterValidate' => 'js:'.$updateCaptcha,
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
            
            <?php if(CCaptcha::checkRequirements()) : ?>
                <?php echo $form->labelEx($model_reset_pass, 'captcha', array('class' => 'control-label')); ?>
                <div class="row row-space-10">
                    <div class="col-md-6 m-b-15">
                        <?php 

                            $this->widget("CCaptcha",
                                    array(
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

                <div class='control-label'>
                    <!--Por favor ingrese el texto que se muestra en la imagen.-->
                </div>
                
            <?php endif; ?>
            
            <div class="register-buttons">
                <?php echo CHtml::submitButton('Recuperar Contraseña', array('class' => 'btn btn-block btn-md btn-blue-tramiton')); ?>
            </div>

            <?php $this->endWidget(); ?>
            <hr />
            <p class="text-center text-inverse">
                &copy; Tramiton.to Todos los derechos reservados 2015
            </p>
        </div>
        <!-- end register-content -->
    </div>
    <!-- end right-content -->
</div>
<!-- end register -->
