

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;">Extra</a></li>
        <li class="active">Profile Page</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Profile Page <small>header small text goes here...</small></h1>
    <!-- end page-header -->
    <!-- begin profile-container -->
    <div class="profile-container">
        <!-- begin profile-section -->
        <div class="profile-section">
            <!-- begin profile-left -->
            <div class="profile-left">
                <!-- begin profile-image -->
                <div class="profile-image">
                    <!--<img src="assets/img/profile-cover.jpg" />-->
                    <img src="<?php echo URL_IMG . $modelUser->usu_imagen; ?>" />
                    <i class="fa fa-user hide"></i>
                </div>
                <!-- end profile-image -->
                <div class="m-b-10">
                    <?php echo CHtml::link('Cambiar Imagen', array("usuario/cambiaImagen", 'userId' => $modelUser->usu_id), array('class' => 'btn btn-warning btn-block btn-sm', 'title' => 'Cambiar Imagen')); ?>
                    <!--<a href="#" class="btn btn-warning btn-block btn-sm">Cambiar Imagen</a>-->
                </div>
                <div class="m-b-10">
                    <?php echo CHtml::link('Cambiar Contraseña', array("usuario/cambiaImagen", 'userId' => $modelUser->usu_id), array('class' => 'btn btn-info btn-block btn-sm', 'title' => 'Cambiar Imagen')); ?>
                    <!--<a href="#" class="btn btn-warning btn-block btn-sm">Cambiar Imagen</a>-->
                </div>

            </div>
            <!-- end profile-left -->
            <!-- begin profile-right -->
            <div class="profile-right">
                <!-- begin profile-info -->
                <div class="profile-info">
                    <!-- begin table -->
                    <div class="table-responsive">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array
                            (
                            'method' => 'POST',
                            'action' => Yii::app()->createUrl('usuario/update'),
                            'id' => 'usuario-form',
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


                        <table class="table table-profile">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>
                                        <h4>
                                            <?php echo $modelUser->usu_nombre; ?>
                                            <small><?php echo $modelUser->usu_cedula; ?></small>
                                        </h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="highlight">
                                    <td class="field"><?php echo $form->labelEx($modelUser, 'usu_nombreusuario'); ?></td>
                                    <td>
                                        <?php echo $form->textField($modelUser, 'usu_nombreusuario', array('size' => 20, 'maxlength' => 20, 'value' => $modelUser->usu_nombreusuario)); ?>
                                        <?php echo $form->error($modelUser, 'usu_nombreusuario'); ?>
                                    </td>

                                </tr>

                                <tr class="highlight">
                                    <td class="field"><?php echo $form->labelEx($modelUser, 'usu_mail'); ?></td>
                                    <td>
                                        <?php echo $form->textField($modelUser, 'usu_mail', array('size' => 50, 'maxlength' => 50, 'value' => $modelUser->usu_mail)); ?>
                                        <?php echo $form->error($modelUser, 'usu_mail'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field"><?php echo $form->labelEx($modelUser, 'usu_convencional'); ?></td>
                                    <td>
                                        <?php echo $form->textField($modelUser, 'usu_convencional', array('size' => 20, 'maxlength' => 20, 'value' => $modelUser->usu_convencional)); ?>
                                        <i class="fa fa-phone fa-lg m-r-5"></i> 
                                        <?php echo $form->error($modelUser, 'usu_convencional'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field"><?php echo $form->labelEx($modelUser, 'usu_celular'); ?></td>
                                    <td>
                                        <?php echo $form->textField($modelUser, 'usu_celular', array('size' => 20, 'maxlength' => 20, 'value' => $modelUser->usu_celular)); ?>
                                        <i class="fa fa-mobile fa-lg m-r-5"></i> 
                                        <?php echo $form->error($modelUser, 'usu_celular'); ?>
                                    </td>
                                </tr>
                                <tr class="divider">
                                    <td colspan="2"></td>
                                </tr>
                                <tr class="highlight">
                                    <td class="field"><?php echo $form->labelEx($modelUser, 'usu_direccion'); ?></td>
                                    <td>
                                        <?php echo $form->textField($modelUser, 'usu_direccion', array('size' => 50, 'maxlength' => 50, 'value' => $modelUser->usu_direccion)); ?>
                                        <?php echo $form->error($modelUser, 'usu_direccion'); ?>
                                    </td>
                                </tr>
                                <tr class="divider">
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td class="field"><?php echo $form->labelEx($modelUser, 'usu_fechanacimiento'); ?></td>
                                    <td>
                                        <?php 
                                        $this->widget('zii.widgets.jui.CjuiDatePicker', array(
                                            'attribute' => 'usu_fechanacimiento',
                                            'model' => $modelUser,
                                            'language' => 'es',
                                            'options' => array(
                                                'date-format' => 'yy-mm-dd',
                                                'showButtonPanel' => true,
                                                'changeYear' => true,
                                                'yearRange' => '-80:-10',
                                                'minDate' => '-80Y',
                                                'maxDate' => '-10Y',
                                            )
                                        ));
                                        //echo $modelUser->usu_fechanacimiento; 
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field"><?php echo $form->labelEx($modelUser, 'usu_lugar_nacimiento'); ?></td>
                                    <td><?php echo $modelUser->usu_lugar_nacimiento; ?></td>
                                </tr>
                                <tr>
                                    <td class="field"><?php echo $form->labelEx($modelUser, 'usu_genero'); ?></td>
                                    <td><?php echo "sexo: " . $modelUser->usu_genero; ?>
                                        <select class="form-control input-inline input-xs" name="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="divider">
                                    <td colspan="2"></td>
                                </tr>
                                <tr class="highlight">
                                    <td class="field"></td>
                                    <td>
                                        <?php echo CHtml::submitButton('Guardar', array('class' => 'btn btn-primary btn-sm')); ?>&nbsp;&nbsp;
                                        <?php echo CHtml::submitButton('Cancelar', array('class' => 'btn btn-danger btn-sm')); ?>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <?php $this->endWidget(); ?>
                    </div>
                    <!-- end table -->
                </div>
                <!-- end profile-info -->
            </div>
            <!-- end profile-right -->
        </div>
        <!-- end profile-section -->
        <!-- begin profile-section -->
    </div>
    <!-- end profile-container -->
</div>
<!-- end #content -->


