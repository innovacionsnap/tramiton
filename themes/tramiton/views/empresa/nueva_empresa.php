
<style>
    .empresa{
        margin-top: 3%;
        margin-right: 16%;
    }

    #verifica {
        width:5%;
        margin-top: 2.55%;
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
                'id' => 'form-registro-empresa',
                'enableClientValidation' => true,
                'enableAjaxValidation' => false,
                'htmlOptions' => array('class' => 'margin-bottom-0'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'validateOnChange' => true,
                    'validateOnType' => false,
                ),
            ));
            ?>
            <div class="row row-space-12">
                <div class="col-md-4 m-b-15">
                    <?php echo $form->labelEx($model, 'RUC', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($model, 'emp_ruc', array('class' => 'form-control', 'placeholder' => 'RUC', 'autocomplete' => 'off', 'onKeypress' => 'hkp(event); if ((_KeyCode < 48 && _KeyCode != 0 && _KeyCode != 8) || _KeyCode > 57) return false;')); ?>
                    <?php echo $form->error($model, 'emp_ruc') ?>
                    <div id="ruc_error" style="display: none;"></div>
                </div>
                <div id="verifica" class="col-md-1 m-b-15" style="display:none;"><img src="<?php echo (Yii::app()->theme->baseUrl . '/assets/plugins/lightbox/img/loading.gif'); ?>"></div>

                <div id="razon_social" class="col-md-8 m-b-15">
                    <?php echo $form->labelEx($model, 'Razón Social', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($model, 'emp_razon', array('class' => 'form-control', 'placeholder' => 'Razón Social', 'readonly' => true)); ?>
                    <?php echo $form->error($model, 'emp_razon'); ?>
                </div>
            </div>
            <div class="row row-space-12">
                <div class="col-md-6 m-b-15">
                    <?php echo $form->labelEx($model, 'Dirección', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($model, 'emp_direccion', array('class' => 'form-control', 'placeholder' => 'Dirección', 'readonly' => true)); ?>
                    <?php echo $form->error($model, 'emp_direccion'); ?>
                </div>
                <div class="col-md-2 m-b-15">
                    <?php echo $form->labelEx($model, 'Teléfono 1', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($model, 'emp_telefono1', array('class' => 'form-control', 'placeholder' => 'Teléfono 1', 'readonly' => true)); ?>
                    <?php echo $form->error($model, 'emp_telefono1'); ?>
                </div>
                <div class="col-md-2 m-b-15">
                    <?php echo $form->labelEx($model, 'Teléfono 2', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($model, 'emp_telefono2', array('class' => 'form-control', 'placeholder' => 'Teléfono 2','onKeypress' => 'hkp(event); if ((_KeyCode < 48 && _KeyCode != 0 && _KeyCode != 8) || _KeyCode > 57) return false;')); ?>
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
                    <?php echo $form->hiddenField($model, 'usu_id', array('class' => 'form-control', 'placeholder' => 'Usuario', 'value' => $id_usuario, 'readonly' => true)); ?>
                    <?php echo $form->error($model, 'usu_id'); ?>
                    <?php echo $form->hiddenField($model, 'emp_id', array('class' => 'form-control', 'placeholder' => 'Empid', 'value' => $model->emp_id, 'readonly' => true)); ?>

                </div>
            </div>
            <div class="row buttons">
                <?php echo CHtml::submitButton('Guardar', array("class" => "btn btn-primary", "id" => "guarda_empresa")); ?>
                <?php echo CHtml::link('<button type="button" class="btn btn-danger">Cancelar</button>', array("empresa/empresa")); ?>
            </div>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>

<script type="text/javascript">

    function hkp(evt)
    {
        _KeyCode = (window.event) ? evt.keyCode : evt.which;
        return(_KeyCode);
    }

    $(function () {
        $('#Empresa_emp_ruc').keyup(function () {
            var ruc = (this).value;
            var tamano = ruc.length;
            if (tamano == 13) {

                $.ajax({
                    type: "POST",
                    url: 'validaruc',
                    data: {ruc: ruc},
                    beforeSend: function () {
                        $("#verifica").show();
                        $("#razon_social").removeClass('col-md-8');
                        $("#razon_social").addClass('col-md-7');

                    },
                    success: function (data) {
                        $("#verifica").hide();
                        $("#razon_social").removeClass('col-md-7');
                        $("#razon_social").addClass('col-md-8');
                        if (data == 1) {
                            $('#guarda_empresa').hide();
                            $('#ruc_error').html("RUC ingresado ya se encuentra registrado");
                            $('#ruc_error').show();
                            $('#Empresa_emp_razon').val("");
                            $('#Empresa_emp_direccion').val("");
                            $('#Empresa_emp_telefono1').val("");
                            $('#Empresa_emp_fax').val("");
                            $('#Empresa_emp_web').val("");
                            $('#Empresa_emp_email').val("");
                        } else if (data == 2) {
                            $('#guarda_empresa').hide();
                            $('#ruc_error').html("Error al consultar el RUC");
                            $('#ruc_error').show();
                            $('#Empresa_emp_razon').val("");
                            $('#Empresa_emp_direccion').val("");
                            $('#Empresa_emp_telefono1').val("");
                            $('#Empresa_emp_fax').val("");
                            $('#Empresa_emp_web').val("");
                            $('#Empresa_emp_email').val("");
                        } else if (data == 3) {
                            $('#guarda_empresa').hide();
                            $('#ruc_error').html("RUC ingresado no es válido");
                            $('#ruc_error').show();
                            $('#Empresa_emp_razon').val("");
                            $('#Empresa_emp_direccion').val("");
                            $('#Empresa_emp_telefono1').val("");
                            $('#Empresa_emp_fax').val("");
                            $('#Empresa_emp_web').val("");
                            $('#Empresa_emp_email').val("");
                        } else {
                            var emp = jQuery.parseJSON(data);
                            $('#Empresa_emp_razon').val(emp.emp_razon);
                            $('#Empresa_emp_direccion').val(emp.emp_direccion);
                            $('#Empresa_emp_telefono1').val(emp.emp_telefono1);
                            $('#Empresa_emp_fax').val(emp.emp_fax);
                            $('#guarda_empresa').show();
                            $('#ruc_error').hide();

                        }

                        // alert(data);
                    }, error: function () {
                        $("#verifica").hide();
                        $("#razon_social").removeClass('col-md-7');
                        $("#razon_social").addClass('col-md-8');
                        $('#guarda_empresa').hide();
                        $('#ruc_error').html("Error al consultar el RUC, inténtelo más tarde");
                        $('#ruc_error').show();
                        $('#Empresa_emp_razon').val("");
                        $('#Empresa_emp_direccion').val("");
                        $('#Empresa_emp_telefono1').val("");
                        $('#Empresa_emp_fax').val("");
                        $('#Empresa_emp_web').val("");
                        $('#Empresa_emp_email').val("");
                    }
                });


            } else {
                $('#guarda_empresa').hide();
            }


        });
    });


</script>