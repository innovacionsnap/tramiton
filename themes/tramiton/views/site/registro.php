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
        
        
        <div class="row" style="padding-bottom: 10px;">
            <div class="col-xs-12 col-sm-offset-2 col-sm-4 text-center">
                <a href="<?php echo Yii::app()->baseUrl; ?>/"><h4 class="text-blue-tramiton">Inicio <span class="glyphicon glyphicon-home" aria-hidden="true"></span></h4></a>
            </div>
            <div class="col-xs-12 col-sm-6 text-center">
                <a href="<?php echo Yii::app()->baseUrl; ?>/site/login"><h4 class="text-blue-tramiton">Login <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></h4></a>
            </div>
        </div>
        

        <!-- begin register-header -->
        <h2 class="register-header" style="padding: 0px 60px 0px;">
            Regístrate 
            <!--<small>Crea tu cuenta en Tramiton.to y cuéntanos sobre los trámites mas absurdos.</small>-->
        </h2>
        <!-- end register-header -->    
        <!-- begin register-content -->
        <div class="register-content" style="padding-bottom:0px;">
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
                <div class="col-md-6 m-b-5">
                    <?php echo $form->textField($model, 'cedula', array('class' => 'form-control', 'placeholder' => 'Cédula')); ?>
                    <?php echo $form->error($model, 'cedula') ?>
                </div>
                <div class="col-md-6 m-b-5">
                    <?php echo $form->textField($model, 'nombre_usuario', array('class' => 'form-control', 'placeholder' => 'Nombre usuario')); ?>
                    <?php //echo $form->error($model, 'nombre_usuario', array('class' => 'errorMessage', 'errorCssClass' => 'parsley-error', 'successCssClass' =>'parsley-success')); ?>
                    <?php echo $form->error($model, 'nombre_usuario'); ?>
                </div>
            </div>

            <?php echo $form->labelEx($model, 'email', array('class' => 'control-label')); ?>
            <div class="row m-b-5">
                <div class="col-md-12">
                    <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => 'Correo Electrónico')); ?>
                    <?php echo $form->error($model, 'email'); ?>
                </div>
            </div>

            <?php echo $form->labelEx($model, 'repetir_email', array('class' => 'control-label')); ?>
            <div class="row m-b-5">
                <div class="col-md-12">
                    <?php echo $form->textField($model, 'repetir_email', array('class' => 'form-control', 'placeholder' => 'Reingrese Correo Electrónico')); ?>
                    <?php echo $form->error($model, 'repetir_email'); ?>
                </div>
            </div>

            <?php echo $form->labelEx($model, 'password', array('class' => 'control-label')); ?>
            <div class="row m-b-5">
                <div class="col-md-12">
                    <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => 'Contraseña')); ?>
                    <?php echo $form->error($model, 'password'); ?>
                </div>
            </div>

            <?php echo $form->labelEx($model, 'repetir_password', array('class' => 'control-label')); ?>
            <div class="row m-b-5">
                <div class="col-md-12">
                    <?php echo $form->passwordField($model, 'repetir_password', array('class' => 'form-control', 'placeholder' => 'Confirme Contraseña')); ?>
                    <?php echo $form->error($model, 'repetir_password'); ?>
                </div>
            </div>
            
            <?php if(CCaptcha::checkRequirements()) : ?>
                <?php echo $form->labelEx($model, 'captcha', array('class' => 'control-label')); ?>
                <div class="row row-space-10">
                    <div class="col-md-6 m-b-5">
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
                    <div class="col-md-6 m-b-5">
                        <?php echo $form->textField($model, 'captcha', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'captcha'); ?>
                    </div>

                </div>

                <div class='control-label'>
                    <!--Por favor ingrese el texto que se muestra en la imagen.-->
                </div>
                
            <?php endif; ?>
            
            <?php echo $form->labelEx($model, 'terminos', array('class' => 'control-label')); ?>
            <div class="row m-b-5">
                <div class="col-md-12">
                    <?php echo $form->checkBox($model, 'terminos', array('style', 'display:inline')); ?>&nbsp;&nbsp;
                    Al dar click aquí, usted acepta nuestros <a href="#">Términos</a> y acepta que ha leido nuestra <a href="#">Política de Datos</a>, incluido el <a href="#">Uso de Cookies</a>
                        <?php echo $form->error($model, 'terminos'); ?>
                </div>
            </div>
            <div class="register-buttons">
                <?php echo CHtml::submitButton('Únete ahora', array('class' => 'btn btn-block btn-md btn-blue-tramiton')); ?>
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
