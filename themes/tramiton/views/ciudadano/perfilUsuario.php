<!-- begin #content -->
<div id="content" class="content" style="margin-left: 50px; margin-top: 50px;">
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
                    <?php echo CHtml::link('Cambiar Imagen', array("ciudadano/updateImagen", 'usrId' => $modelUser->usu_id), array('class' => 'btn btn-warning btn-block btn-sm', 'title' => 'Cambiar Imagen')); ?>
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
                        $usrId = $modelUser->usu_id;
                        $form = $this->beginWidget('CActiveForm', array
                            (
                            'method' => 'POST',
                            //'action' => Yii::app()->createUrl('ciudadano/updatePerfil'),
                            'action' => $this->createUrl("ciudadano/mostrarPerfil?usrId=$usrId"),
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
                        <?php //var_dump($modelUser); 
                        //echo "ID User ==>> " . $modelUser->usu_id;
                        //$modelPerfil->idUsr = $modelUser->usu_id;
                        
                        //echo "<br><br>ID User update ==>> " . $modelPerfil->idUsr;
                         
                          
                                
                        ?>
                        <?php //echo $form->hiddenField($modelPerfil, 'idUsr', array('value' => $modelUser->usu_id)); ?>
                        <?php //echo $form->textField($modelPerfil, 'idUsr', array('value' => $modelUser->usu_id)); ?>
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
                                    <td class="field"><?php echo $form->labelEx($modelPerfil, 'nombreUsuario'); ?></td>
                                    <td>
                                        <?php echo $form->textField($modelPerfil, 'nombreUsuario', array('class' => 'form-control input-inline input-xs', 'size' => 20, 'maxlength' => 20, 'value' => $modelUser->usu_nombreusuario)); ?>
                                        <?php echo $form->error($modelPerfil, 'nombreUsuario'); ?>
                                    </td>

                                </tr>

                                <tr class="highlight">
                                    <td class="field"><?php echo $form->labelEx($modelPerfil, 'email'); ?></td>
                                    <td>
                                        <?php echo $form->textField($modelPerfil, 'email', array('class' => 'form-control input-inline input-xs', 'size' => 50, 'maxlength' => 50, 'value' => $modelUser->usu_mail)); ?>
                                        <?php echo $form->error($modelPerfil, 'email'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field"><?php echo $form->labelEx($modelPerfil, 'telfConvencional'); ?></td>
                                    <td>
                                        <?php echo $form->textField($modelPerfil, 'telfConvencional', array('class' => 'form-control input-inline input-xs', 'size' => 20, 'maxlength' => 20, 'value' => $modelUser->usu_convencional)); ?>
                                        <i class="fa fa-phone fa-lg m-r-5"></i> 
                                        <?php echo $form->error($modelPerfil, 'telfConvencional'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field"><?php echo $form->labelEx($modelPerfil, 'telfCelular'); ?></td>
                                    <td>
                                        <?php echo $form->textField($modelPerfil, 'telfCelular', array('class' => 'form-control input-inline input-xs', 'size' => 20, 'maxlength' => 20, 'value' => $modelUser->usu_celular)); ?>
                                        <i class="fa fa-mobile fa-lg m-r-5"></i> 
                                        <?php echo $form->error($modelPerfil, 'telfCelular'); ?>
                                    </td>
                                </tr>
                                <tr class="divider">
                                    <td colspan="2"></td>
                                </tr>
                                <tr class="highlight">
                                    <td class="field"><?php echo $form->labelEx($modelPerfil, 'direccion'); ?></td>
                                    <td>
                                        <?php echo $form->textField($modelPerfil, 'direccion', array('class' => 'form-control input-inline input-xs', 'size' => 50, 'maxlength' => 50, 'value' => $modelUser->usu_direccion)); ?>
                                        <?php echo $form->error($modelPerfil, 'direccion'); ?>
                                    </td>
                                </tr>
                                <tr class="divider">
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td class="field"><?php echo $form->labelEx($modelPerfil, 'fechaNacimiento'); ?></td>
                                    <td>
                                        <?php 
                                        $fecha = date("Y-m-d");
                                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                'options' => array(
                                                        'showAnim' => 'fold',
                                                ),
                                                'model' => $modelPerfil,
                                                'language' => 'es',
                                                'attribute' => 'fechaNacimiento',
                                                'htmlOptions' => array(
                                                        //'class' => 'form-control input-inline input-xs',
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
                                                'htmlOptions'=>array('class' => 'form-control input-inline input-xs', 'value' => $modelUser->usu_fechanacimiento)
                                        ));
                                        
                                        
                                        
                                        
                                        /*$this->widget('zii.widgets.jui.CjuiDatePicker', array(
                                            'attribute' => 'fechaNacimiento',
                                            'model' => $modelPerfil,
                                            'language' => 'es',
                                            'options' => array(
                                                'date-format' => 'yyyy-mm-dd',
                                                'showButtonPanel' => true,
                                                'changeYear' => true,
                                                'yearRange' => '-80:-5',
                                                'minDate' => '-80Y',
                                                'maxDate' => '-5Y',
                                            ),
                                            'htmlOptions'=> array('class' => 'form-control input-inline input-xs', 'value' => $modelUser->usu_fechanacimiento)
                                        ));*/
                                        //echo $modelUser->usu_fechanacimiento . "<br>"; 
                                        //echo date("d/m/Y", $modelUser->usu_fechanacimiento);
                                        ?>
                                        <?php echo $form->error($modelPerfil, 'fechaNacimiento'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="field"><?php echo $form->labelEx($modelPerfil, 'lugarNacimiento'); ?></td>
                                    <td><?php echo $modelUser->usu_lugar_nacimiento; ?></td>
                                </tr>
                                <tr>
                                    <td class="field"><?php echo $form->labelEx($modelPerfil, 'genero'); ?></td>
                                    <?php
                                    $swGenero = false;
                                    if($modelUser->usu_genero === 'MASCULINO'){
                                        $swGenero = true;
                                    }
                                    ?>
                                    <td>
                                        <?php echo $form->dropDownList($modelPerfil,'genero', array('MASCULINO'=>'MASCULINO','FEMENINO'=>'FEMENINO'), array('class' => 'form-control input-inline input-xs', 'options' => array($swGenero?'MASCULINO':'FEMENINO' => array('selected' => true)))); ?>
                                    </td>
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


