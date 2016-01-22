<?php $baseUrl = Yii::app()->baseUrl?>


<!-- begin #content -->
<div id="content" class="content" style="margin: 25px; border-radius: 20px;">

    <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-6">
            <h1 class="page-header">Editar <small>perfil</small></h1>
        </div>
        <div class="col-lg-10 col-md-9 col-sm-6 text-right">
            <ol class="breadcrumb">
                <li><a href="<?php echo $baseUrl.'/dashboard/index';?>">Inicio</a></li>
                <li class="active">Perfil</li>
            </ol>
        </div>
    </div> <!-- end row -->
    <div class="row">
        <div class="col-lg-2 col-lg-offset-1 col-sm-3 col-sm-offset-1 col-xs-12">
            <div class="profile-image">
                <img class="center-block" src="<?php echo Yii::app()->theme->baseUrl . '/assets/img/users/' . $modelUser->usu_imagen; ?>" />
                <i class="fa fa-user hide"></i>
            </div>
            <div class="m-b-10">
                <?php //echo CHtml::link('Cambiar Imagen', array("ciudadano/updateImagen", 'usrId' => $modelUser->usu_id), array('class' => 'btn btn-warning btn-block btn-sm', 'title' => 'Cambiar Imagen')); ?>
            </div>
            <div class="m-b-10">
                <?php //echo CHtml::link('Cambiar Contraseña', array("usuario/cambiaImagen", 'userId' => $modelUser->usu_id), array('class' => 'btn btn-info btn-block btn-sm', 'title' => 'Cambiar Imagen')); ?>
            </div>
        </div> <!-- end col -->
        <div class="col-lg-8 col-lg-offset-1 col-sm-7 col-xs-12">
            <div class="col-sm-10 col-sm-offset-2">
                <h4><?php echo $modelUser->usu_nombre; ?></h4>
            </div>
            <div class="col-sm-10 col-sm-offset-2">
                <h4><small><?php echo $modelUser->usu_cedula; ?></small></h4>
            </div>

            <?php
            $key = $modelUser->usu_codigo_confirmacion;
            $form = $this->beginWidget('CActiveForm', array
                (
                'method' => 'POST',
                //'action' => Yii::app()->createUrl('ciudadano/updatePerfil'),
                'action' => $this->createUrl("ciudadano/mostrarPerfil?key=$key"),
                'id' => 'update-form',
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

            <form class="form-horizontal" role="form">


                <div class="row">
                    <label class="col-sm-2 control-label" for="inputError"><?php echo $form->labelEx($modelPerfil, 'nombreUsuario'); ?></label>
                    <div class="col-sm-10">
                        <?php echo $form->textField($modelPerfil, 'nombreUsuario', array('class' => 'form-control w-a input-xs', 'size' => 20, 'maxlength' => 20, 'value' => $modelUser->usu_nombreusuario)); ?>
                        <?php echo $form->error($modelPerfil, 'nombreUsuario'); ?>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 control-label" for=""><?php echo $form->labelEx($modelPerfil, 'email'); ?></label>
                    <div class="col-sm-10">
                        <?php echo $form->textField($modelPerfil, 'email', array('class' => 'form-control w-a input-xs', 'size' => 50, 'maxlength' => 50, 'value' => $modelUser->usu_mail, 'style' => 'max-width:180px;')); ?>
                        <?php echo $form->error($modelPerfil, 'email'); ?>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 control-label" for=""><?php echo $form->labelEx($modelPerfil, 'telfConvencional'); ?></label>
                    <div class="col-sm-10">
                        <?php echo $form->textField($modelPerfil, 'telfConvencional', array('class' => 'form-control w-a input-xs', 'size' => 20, 'maxlength' => 20, 'value' => $modelUser->usu_convencional)); ?>
                        <span class="icon glyphicon glyphicon-earphone" aria-hidden="true"></span> 
                        <?php echo $form->error($modelPerfil, 'telfConvencional'); ?>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 control-label" for=""><?php echo $form->labelEx($modelPerfil, 'telfCelular'); ?></label>
                    <div class="col-sm-10">
                        <?php echo $form->textField($modelPerfil, 'telfCelular', array('class' => 'form-control w-a input-xs', 'size' => 20, 'maxlength' => 20, 'value' => $modelUser->usu_celular)); ?>
                        <span class="icon glyphicon glyphicon-phone" aria-hidden="true"></span> 
                        <?php echo $form->error($modelPerfil, 'telfCelular'); ?>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 control-label" for=""><?php echo $form->labelEx($modelPerfil, 'direccion'); ?></label>
                    <div class="col-sm-10">
                        <?php echo $form->textArea($modelPerfil, 'direccion', array('class' => 'form-control w-a', 'size' => 50, 'maxlength' => 50, 'value' => $modelUser->usu_direccion, 'style' => 'width: 190px; height: 90px;')); ?>
                        <?php echo $form->error($modelPerfil, 'direccion'); ?>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 control-label" for=""><?php echo $form->labelEx($modelPerfil, 'fechaNacimiento'); ?></label>
                    <div class="col-sm-10">
                        <?php 
                            echo $modelUser->usu_fechanacimiento;
                            /*$fecha = date("Y-m-d");
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'options' => array(
                                            'showAnim' => 'fold',
                                    ),
                                    'model' => $modelPerfil,
                                    'language' => 'es',
                                    'attribute' => 'fechaNacimiento',
                                    'htmlOptions' => array(
                                            //'class' => 'form-control w-a input-xs',
                                            'tabindex' => 3
                                    ),
                                    'options'=>array(
                                            'dateFormat'=>'yy-mm-dd',
                                            'defaultDate' => $fecha,
                                            'showButtonPanel'=>true,
                                            'changeMonth'=>true,
                                            'changeYear'=>true,
                                            'defaultDate'=>'+1w',
                                            'yearRange' => '-80:-5',
                                            'minDate' => '-80Y',
                                            'maxDate' => '-5Y',
                                    ),
                                    'htmlOptions'=>array('class' => 'form-control w-a input-xs', 'value' => $modelUser->usu_fechanacimiento)
                            ));*/
                        ?>
                        <?php echo $form->error($modelPerfil, 'fechaNacimiento'); ?>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 control-label" for=""><?php echo $form->labelEx($modelPerfil, 'lugarNacimiento'); ?></label>
                    <div class="col-sm-10">
                        <?php echo $modelUser->usu_lugar_nacimiento; ?>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 control-label" for=""><?php echo $form->labelEx($modelPerfil, 'genero'); ?></label>
                    <div class="col-sm-10">
                        <?php
                        echo $modelUser->usu_genero;
                        /*$swGenero = false;
                        if($modelUser->usu_genero === 'MASCULINO'){
                            $swGenero = true;
                        }*/
                        ?>
                        <?php //echo $form->dropDownList($modelPerfil,'genero', array('MASCULINO'=>'MASCULINO','FEMENINO'=>'FEMENINO'), array('class' => 'form-control input-inline input-xs', 'options' => array($swGenero?'MASCULINO':'FEMENINO' => array('selected' => true)))); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-2">
                        <?php echo CHtml::submitButton('Guardar', array('class' => 'btn btn-success btn-sm')); ?>&nbsp;&nbsp;
                        <?php //echo CHtml::Button('Cancelar', array('class' => 'btn btn-danger btn-sm')); ?>
                        <?php echo CHtml::link('<button type="button" class="btn btn-danger btn-sm"> Cancelar</button>', array('dashboard/index'), array('title' => 'Cancelar')); ?>
                        
                        
                        
                    </div>
                </div>
                

            </form>
            <?php $this->endWidget(); ?>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>
<!-- end #content -->

<?php
//     $numero = 4;
//     $banderaNotificacion = true;
//     $texto = "Notificación";
//     $titulo = "Perfil actualizado con éxito";
?> 

<script type="text/javascript">
//     var banderaNotificacion = <?php echo json_encode($banderaNotificacion); ?>;
//     var texto = <?php echo json_encode($texto); ?>;
//     var titulo = <?php echo json_encode($titulo); ?>;
</script>
