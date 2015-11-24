<style>
    .empresa{
        margin-top: 3%;
        margin-right: 16%;
    }
</style>
<div id="content" class="content empresa">
    <h1 class="page-header">Ingrese información de Empresa<small></small></h1>
    <div class="row">
        <!-- begin col-8 -->
        <div class="col-md-12">
            <?php
            $form = $this->beginWidget('CActiveForm', array
                (
                'method' => 'POST',
                'action' => Yii::app()->createUrl('empresa/guardarEmpresa'),
                'id' => 'form-registro',
                'enableClientValidation' => true,
                'enableAjaxValidation' => false,
                'htmlOptions' => array('class' => 'margin-bottom-0'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'validateOnChange' => false,
                    'validateOnType' => true,
                ),
            ));
            ?>
            <div class="row row-space-12">
                <div class="col-md-4 m-b-15">
                    <?php echo $form->labelEx($model, 'RUC', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($model, 'emp_ruc', array('class' => 'form-control', 'placeholder' => 'RUC')); ?>
                    <?php echo $form->error($model, 'emp_ruc') ?>
                </div>
                <div class="col-md-8 m-b-15">
                    <?php echo $form->labelEx($model, 'Razón Social', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($model, 'emp_razon', array('class' => 'form-control', 'placeholder' => 'Razón Social')); ?>
                    <?php echo $form->error($model, 'emp_razon'); ?>
                </div>
            </div>
            <div class="row row-space-12">
                <div class="col-md-6 m-b-15">
                    <?php echo $form->labelEx($model, 'Dirección', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($model, 'emp_direccion', array('class' => 'form-control', 'placeholder' => 'Dirección')); ?>
                    <?php echo $form->error($model, 'emp_direccion'); ?>
                </div>
                <div class="col-md-2 m-b-15">
                    <?php echo $form->labelEx($model, 'Teléfono 1', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($model, 'emp_telefono1', array('class' => 'form-control', 'placeholder' => 'Teléfono 1')); ?>
                    <?php echo $form->error($model, 'emp_telefono1'); ?>
                </div>
                <div class="col-md-2 m-b-15">
                    <?php echo $form->labelEx($model, 'Teléfono 2', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($model, 'emp_telefono2', array('class' => 'form-control', 'placeholder' => 'Teléfono 2')); ?>
                    <?php echo $form->error($model, 'emp_telefono2'); ?>
                </div>
                <div class="col-md-2 m-b-15">
                    <?php echo $form->labelEx($model, 'Fax', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($model, 'emp_fax', array('class' => 'form-control', 'placeholder' => 'Fax')); ?>
                    <?php echo $form->error($model, 'emp_fax'); ?>
                </div>
            </div>
            <div class="row row-space-12">
                <div class="col-md-6 m-b-15">
                    <?php echo $form->labelEx($model, 'Sitio Web', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($model, 'emp_web', array('class' => 'form-control', 'placeholder' => 'Sitio web')); ?>
                    <?php echo $form->error($model, 'emp_web'); ?>
                </div>
                <div class="col-md-6 m-b-15">
                    <?php echo $form->labelEx($model, 'Correo Electrónico', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($model, 'emp_email', array('class' => 'form-control', 'placeholder' => 'Correo Electrónico')); ?>
                    <?php echo $form->error($model, 'emp_email'); ?>
                </div>
            </div>
           <div class="row m-b-15">
                <div class="col-md-12">
                    <?php echo $form->hiddenField($model, 'usu_id', array('class' => 'form-control', 'placeholder' => 'Usuario','value'=>$id_usuario,'readonly'=>true)); ?>
                    <?php echo $form->error($model, 'usu_id'); ?>
                    <?php echo $form->hiddenField($model, 'emp_id', array('class' => 'form-control', 'placeholder' => 'Empid','value'=>$model->emp_id,'readonly'=>true)); ?>
                    
                </div>
            </div>
            <div class="row buttons">
                <?php echo CHtml::submitButton('Guardar', array("class" => "btn btn-primary")); ?>
                <?php echo CHtml::link('<button type="button" class="btn btn-danger">Cancelar</button>', array("empresa/empresa"));?>
            </div>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>