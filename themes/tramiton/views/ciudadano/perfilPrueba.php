<div class='form'>
    <?php
                        $form = $this->beginWidget('CActiveForm', array
                            (
                            'method' => 'POST',
                            //'action' => Yii::app()->createUrl('ciudadano/updatePerfil'),
                            'action' => $this->createUrl('ciudadano/updatePerfil'),
                            'id' => 'update-form',
                            'enableClientValidation' => true,
                            'enableAjaxValidation' => true,
                            //'htmlOptions' => array('class' => 'margin-bottom-0'),
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                                'validateOnChange' => true,
                                'validateOnType' => true,
                            ),
                        ));
                        ?>
    <div class='row'>
        <?php echo $modelUser->usu_nombre;?>
        <small><?php echo $modelUser->usu_cedula; ?></small>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($modelPerfil, 'nombreUsuario'); ?>
        <?php echo $form->textField($modelPerfil, 'nombreUsuario', array('size' => 20, 'maxlength' => 20, 'value' => $modelUser->usu_nombreusuario)); ?>
        <?php echo $form->error($modelPerfil, 'nombreUsuario'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($modelPerfil, 'email'); ?>
        <?php echo $form->textField($modelPerfil, 'email', array('size' => 50, 'maxlength' => 50, 'value' => $modelUser->usu_mail)); ?>
        <?php echo $form->error($modelPerfil, 'email'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($modelPerfil, 'telfConvencional'); ?>
        <?php echo $form->textField($modelPerfil, 'telfConvencional', array('size' => 20, 'maxlength' => 20, 'value' => $modelUser->usu_convencional)); ?>
        <?php echo $form->error($modelPerfil, 'telfConvencional'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($modelPerfil, 'telfCelular'); ?>
        <?php echo $form->textField($modelPerfil, 'telfCelular', array('size' => 20, 'maxlength' => 20, 'value' => $modelUser->usu_celular)); ?>
        <?php echo $form->error($modelPerfil, 'telfCelular'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($modelPerfil, 'direccion'); ?>
        <?php echo $form->textField($modelPerfil, 'direccion', array('size' => 50, 'maxlength' => 50, 'value' => $modelUser->usu_direccion)); ?>
        <?php echo $form->error($modelPerfil, 'direccion'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($modelPerfil, 'fechaNacimiento'); ?>
        <?php 
            $this->widget('zii.widgets.jui.CjuiDatePicker', array(
                'attribute' => 'fechaNacimiento',
                'model' => $modelPerfil,
                'language' => 'es',
                'options' => array(
                    'date-format' => 'yy-mm-dd',
                    'showButtonPanel' => true,
                    'changeYear' => true,
                    'yearRange' => '-80:-5',
                    'minDate' => '-80Y',
                    'maxDate' => '-5Y',
                    ),
                'htmlOptions'=> array('value' => $modelUser->usu_fechanacimiento)
                ));
            //echo $modelUser- usu_fechanacimiento; 
            ?>
            <?php echo $form->error($modelPerfil, 'fechaNacimiento'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($modelPerfil, 'lugarNacimiento'); ?>
        <?php echo $modelUser->usu_lugar_nacimiento; ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($modelPerfil, 'genero'); ?></td>
        <?php
        $swGenero = false;
        if($modelUser->usu_genero === 'MASCULINO'){
            $swGenero = true;
        }
        ?>
        <?php echo $form->dropDownList($modelPerfil,'genero', array('MASCULINO'=>'MASCULINO','FEMENINO'=>'FEMENINO'), array('options' => array($swGenero?'MASCULINO':'FEMENINO' => array('selected' => true)))); ?>
    </div>
    
    <div class="row">
        <?php echo CHtml::submitButton('Guardar'/*, array('class' => 'btn btn-primary btn-sm')*/); ?>&nbsp;&nbsp;
        <?php echo CHtml::Button('Cancelar'/*, array('class' => 'btn btn-danger btn-sm')*/); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>
