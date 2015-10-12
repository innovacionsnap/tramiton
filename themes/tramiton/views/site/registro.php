<!-- begin register -->
<div class="register register-with-news-feed">
    <!-- begin news-feed -->
    <div class="news-feed">
        <div class="news-image">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/login-bg/bg-9-tramiton.jpg" alt="" />
        </div>
        <div class="news-caption">
            <h4 class="caption-title">Tramiton.to | Trámites Absurdos del Sector Público</h4>
            <p>
                Regístrate para poder ingresar tus propuestas de trámites absurdos.
            </p>
        </div>
    </div>
    <!-- end news-feed -->
    <!-- begin right-content -->
    <div class="right-content">
        <!-- begin register-header -->
        <h1 class="register-header" style="padding: 0px 60px 0;">
            Regístrate 
            <!--<small>Crea tu cuenta en Tramiton.to y cuéntanos sobre los trámites mas absurdos.</small>-->
        </h1>
        <!-- end register-header -->
        <!-- begin register-content -->
        <div class="register-content">
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
            <?php echo $form->labelEx($model, 'cedula', array('class' => 'control-label')); ?>
            <div class="row row-space-10">
                <div class="col-md-6 m-b-15">
                    <?php echo $form->textField($model, 'cedula', array('class' => 'form-control', 'placeholder' => 'Cédula')); ?>
                    <?php echo $form->error($model, 'cedula') ?>
                </div>
                <div class="col-md-6 m-b-15">
                    <?php echo $form->textField($model, 'nombre_usuario', array('class' => 'form-control', 'placeholder' => 'Nombre usuario')); ?>
                    <?php //echo $form->error($model, 'nombre_usuario', array('class' => 'errorMessage', 'errorCssClass' => 'parsley-error', 'successCssClass' =>'parsley-success')); ?>
                    <?php echo $form->error($model, 'nombre_usuario'); ?>
                </div>
            </div>

            <?php echo $form->labelEx($model, 'email', array('class' => 'control-label')); ?>
            <div class="row m-b-15">
                <div class="col-md-12">
                    <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => 'Correo Electrónico')); ?>
                    <?php echo $form->error($model, 'email'); ?>
                </div>
            </div>

            <?php echo $form->labelEx($model, 'repetir_email', array('class' => 'control-label')); ?>
            <div class="row m-b-15">
                <div class="col-md-12">
                    <?php echo $form->textField($model, 'repetir_email', array('class' => 'form-control', 'placeholder' => 'Reingrese Correo Electrónico')); ?>
                    <?php echo $form->error($model, 'repetir_email'); ?>
                </div>
            </div>

            <?php echo $form->labelEx($model, 'password', array('class' => 'control-label')); ?>
            <div class="row m-b-15">
                <div class="col-md-12">
                    <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => 'Contraseña')); ?>
                    <?php echo $form->error($model, 'password'); ?>
                </div>
            </div>

            <?php echo $form->labelEx($model, 'repetir_password', array('class' => 'control-label')); ?>
            <div class="row m-b-15">
                <div class="col-md-12">
                    <?php echo $form->passwordField($model, 'repetir_password', array('class' => 'form-control', 'placeholder' => 'Confirme Contraseña')); ?>
                    <?php echo $form->error($model, 'repetir_password'); ?>
                </div>
            </div>
            
            <?php if(CCaptcha::checkRequirements()) : ?>
                <?php echo $form->labelEx($model, 'captcha', array('class' => 'control-label')); ?>
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
                        <?php echo $form->textField($model, 'captcha', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'captcha'); ?>
                    </div>

                </div>

                <div class='control-label'>
                    <!--Por favor ingrese el texto que se muestra en la imagen.-->
                </div>
                
            <?php endif; ?>
            
            <?php echo $form->labelEx($model, 'terminos', array('class' => 'control-label')); ?>
            <div class="row m-b-15">
                <div class="col-md-12">
                    <?php echo $form->checkBox($model, 'terminos', array('style', 'display:inline')); ?>&nbsp;&nbsp;
                    Al dar click en aquí, usted acepta nuestros <a href="#">Términos</a> y acepta que ha leido nuestra <a href="#">Política de Datos</a>, incluido el <a href="#">Uso de Cookies
                        <?php echo $form->error($model, 'terminos'); ?>
                </div>
            </div>
            <div class="register-buttons">
                <?php echo CHtml::submitButton('Únete ahora', array('class' => 'btn btn-primary btn-block btn-lg')); ?>
            </div>

            <?php $this->endWidget(); ?>
            <hr />
            <p class="text-center text-inverse">
                &copy; Tramiton.to Todos los derechos reservados <?php echo date('Y'); ?>
            </p>
        </div>
        <!-- end register-content -->
    </div>
    <!-- end right-content -->
</div>
<!-- end register -->
