<!-- begin register -->
<div class="register register-with-news-feed">
    <!-- begin news-feed -->
    <div class="news-feed">
        <div class="news-image">
            <img src="<?php echo Yii::app()->theme->baseUrl;?>/assets/img/login-bg/bg-9-tramiton.jpg" alt="" />
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
        <h1 class="register-header">
            Establecer Contraseña
            <!--<small>Crea tu cuenta en Tramiton.to y cuéntanos sobre los trámites mas absurdos.</small>-->
        </h1>
        <!-- end register-header -->
        <!-- begin register-content -->
        <div class="register-content">
            <?php 
            $form = $this->beginWidget('CActiveForm', array
                    (
                    'method' => 'POST',
                    'action' => Yii::app()->createUrl('site/resetPassword'),
                    'id' => 'form-reset-pass',
                    'enableClientValidation' => true,
                    'enableAjaxValidation'=>true,
                    'htmlOptions' => array('class' => 'margin-bottom-0'),
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                        'validateOnChange' => true,
                        'validateOnType' => true,
                    ),
                    ));
            ?>
            <?php echo $form->hiddenField($modelNuevoPassw, 'email', array('value' => $email)); ?>
            <?php echo $form->hiddenField($modelNuevoPassw, 'codigoVerificacion', array('value' => $codigoVerif)); ?>
            <?php echo $form->labelEx($modelNuevoPassw, 'password', array('class' => 'control-label')); ?>
            <div class="row m-b-15">
                <div class="col-md-12">
                    <?php echo $form->passwordField($modelNuevoPassw, 'password', array('class' => 'form-control', 'placeholder' => 'Contraseña')); ?>
                    <?php echo $form->error($modelNuevoPassw, 'password'); ?>
                </div>
            </div>
            
            <?php echo $form->labelEx($modelNuevoPassw, 'repetir_password', array('class' => 'control-label')); ?>
            <div class="row m-b-15">
                <div class="col-md-12">
                    <?php echo $form->passwordField($modelNuevoPassw, 'repetir_password', array('class' => 'form-control', 'placeholder' => 'Confirme Contraseña')); ?>
                    <?php echo $form->error($modelNuevoPassw, 'repetir_password'); ?>
                </div>
            </div>
            
            <div class="register-buttons">
                <?php echo CHtml::submitButton('Reestablecer Contraseña', array('class' => 'btn btn-primary btn-block btn-lg')); ?>
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
