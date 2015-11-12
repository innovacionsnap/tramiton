<!-- begin #content -->
<div id="content" class="content" style="margin-left: 50px; margin-top: 50px;">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        
        <li><?php $this->breadcrumbs = array('Actualizar Imagen'); ?></li>

    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Actualizar Imagen <small></small></h1>
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
                    <img src="<?php //echo URL_IMG . $modelUser->usu_imagen; ?>" />
                    <i class="fa fa-user hide"></i>
                </div>
                <!-- end profile-image -->
                <div class="m-b-10">
                    <?php //echo CHtml::link('Cambiar Imagen', array("ciudadano/updateImagen", 'usrId' => $modelUser->usu_id), array('class' => 'btn btn-warning btn-block btn-sm', 'title' => 'Cambiar Imagen')); ?>
                    <!--<a href="#" class="btn btn-warning btn-block btn-sm">Cambiar Imagen</a>-->
                </div>
                <div class="m-b-10">
                    <?php //echo CHtml::link('Cambiar Contraseña', array("usuario/cambiaImagen", 'userId' => $modelUser->usu_id), array('class' => 'btn btn-info btn-block btn-sm', 'title' => 'Cambiar Imagen')); ?>
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
                        //$usrId = $modelUser->usu_id;
                        $usrId = 12;
                        $form = $this->beginWidget('CActiveForm', array
                            (
                            'method' => 'POST',
                            //'action' => Yii::app()->createUrl('ciudadano/updatePerfil'),
                            'action' => $this->createUrl("ciudadano/updateImagen?usrId=$usrId"),
                            'id' => 'updateImage-form',
                            'enableClientValidation' => true,
                            'enableAjaxValidation' => true,
                            'htmlOptions' => array(
                                'enctype' => 'multipart/form-data',
                                'class' => 'margin-bottom-0'
                                ),
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                                'validateOnChange' => true,
                                'validateOnType' => true,
                            ),
                        ));
                        ?>
             
                        <?php //echo $form->hiddenField($modelPerfil, 'idUsr', array('value' => $modelUser->usu_id)); ?>
                        <?php //echo $form->textField($modelPerfil, 'idUsr', array('value' => $modelUser->usu_id)); ?>
                        <table class="table table-profile">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>
                                        <h4>
                                            <?php //echo $modelUser->usu_nombre; ?>
                                            <small><?php //echo $modelUser->usu_cedula; ?></small>
                                        </h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="highlight">
                                    <td class="field"></td>
                                    <td>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field"><?php //echo $form->labelEx($modelPerfil, 'email'); ?></td>
                                    <td>
                                        <span class="field f-s-14">
                                            Elegir imagen<br>
                                        <?php //echo "Elegir imagen"; ?>
                                        <?php //echo "<br>"; ?>
                                        <?php //echo $form->error($modelPerfil, 'email'); ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field"><?php //echo $form->labelEx($modelPerfil, 'imagenPerfil'); ?></td>
                                    <td>
                                        <span class="btn btn-primary start">
                                        <?php
                                        $this->widget('CMultiFileUpload',
                                                array(
                                                    'model' => $modelImgUpload,
                                                    'name' => 'imagen',
                                                    'attribute' => 'imagenPerfil',
                                                    'accept' => 'jpg|gif|png',
                                                    'denied' => 'El tipo de archivo seleccionado no esta permitido',
                                                    'max' => 1,
                                                    'duplicate' => 'Archivo Duplicado',
                                                    //'htmlOptions' => array('class' => 'btn btn-success fileinput-button'),
                                                    'htmlOptions' => array('class' => 'form-control input-inline input-xs btn btn-primary start')
                                                ));
                                        
                                        ?>
                                        </span>
                                        <?php echo $form->error($modelImgUpload, 'imagenPerfil'); ?>
                                        <span class="field f-s-14">
                                            <br><br>Tamaño máximo: 1MB<br>
                                        </span>
                                        
                                        
                                    </td>

                                </tr>
                                <tr class="divider">
                                    <td colspan="2"></td>
                                </tr>

                                
                                
                                <tr class="divider">
                                    <td colspan="2"></td>
                                </tr>
                                <tr class="highlight">
                                    <td class="field"></td>
                                    <td>
                                        <?php echo CHtml::submitButton('Guardar', array('class' => 'btn btn-primary btn-sm')); ?>&nbsp;&nbsp;
                                        <?php echo CHtml::Button('Cancelar', array('class' => 'btn btn-danger btn-sm')); ?>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <?php $this->endWidget(); ?>
                    </div><p>&nbsp;</p><p>&nbsp;</p>
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


