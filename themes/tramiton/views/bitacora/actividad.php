
<?php
    $baseUrl = Yii::app()->theme->baseUrl;

    include("config.inc.php");

   
    //usuario 

        $modelUser = Usuario::model() -> findByPk(Yii::app() -> user -> id);
        $id_usuario = $modelUser['usu_id'];

?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Tramiton.to | Admin</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
     
    <?php
    $baseUrl = Yii::app()->theme->baseUrl;
    
    ?>
    <!-- ================== BEGIN BASE CSS STYLE ================== -->

    <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/assets/css/animate.min.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/assets/css/style-adm-bitacora.min.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/assets/css/style-responsive-admin.css" rel="stylesheet" />
    
    
    <!-- ================== END BASE CSS STYLE ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->    
    <link href="<?php echo $baseUrl; ?>/assets/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl; ?>/assets/plugins/parsley/src/parsley.css" rel="stylesheet" />
        
    <!-- ================== END PAGE LEVEL CSS STYLE ================== -->
        

    
    <!-- ================== END BASE JS ================== -->
    
    <!-- ================== BEGIN BASE COMBOBOX JS ================== -->
   

        
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/lib/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/source/jquery.fancybox.css?v=2.1.5" media="screen" />



    
    <!-- ================== END BASE COMBOBOX JS ================== -->
        
      
</head>
<body>


<!-- begin #content -->
        <div id="content" class="content">
           
           
            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        
                        <div class="panel-body">
                            <?php /*
                            <?php echo CHtml::beginForm('','post',array("name"=>"form-wizard"));?>
                                <div class="form-group block1">
                                    <label>Tarea</label>
                                    <?php echo CHtml::activeTextField($model,'nombre_tarea', array("placeholder"=>"Escribir aqui", "class" => "form-control"))?>
                                    <?php echo CHtml::error($model,'nombre_tarea')?>
                                </div>
                                 <div class="form-group block1">
                                    <label>Decripcion</label>
                                    <?php echo CHtml::activeTextField($model,'descripcion_tarea', array("placeholder"=>"Escribir aqui", "class" => "form-control"))?>
                                    <?php echo CHtml::error($model,'descripcion_tarea')?>
                                </div>
                                <div class="form-group block1">
                                    <label>Meta</label>
                                    <?php echo CHtml::activeTextArea($model,'meta_tarea', array("placeholder"=>"Escribir aqui", "class" => "form-control", "rows"=>"4"))?>
                                    <?php echo CHtml::error($model,'meta_tarea')?>
                                </div>
                              
                                <?php echo CHtml::submitButton("Guardar",array("class" =>"btn btn-success btn","title"=>"Guardar Tarea")); ?>

                            <?php echo CHtml::endForm();?>
                            */?>
                            
                            <form action="<?php echo $baseUrl; ?>/views/bitacora/final_bitacora.php" method="POST" data-parsley-validate="true" name="form-wizard">
                                <div id="wizard">
                                  
                                    <!-- begin wizard step-1 -->
                                    <div class="wizard-step-1">
                                        <fieldset>
                                        
                                            <!-- begin row -->
                                            <div class="row">
                                                
                                                <!-- begin col-12 -->
                                                
                                                <div class="col-md-12">
                                                     <div class="form-group block1">
                                                        <label>Categoria</label>
                                                        <?php

                                                            $consulta_categoria = "SELECT * FROM categoria";    
        
                                                            $resultado_categoria = pg_query($con, $consulta_categoria) or die("Error en la Consulta SQL");
                                                            $numReg = pg_num_rows($resultado_categoria);
                                                          
                                                            echo "<select class='form-control' data-parsley-group='wizard-step-1' name='id_categoria' id='id_categoria' required>";
                                                            echo "<option value=''>Selecciona una categoria...</option>";
                                                            while ($fila=pg_fetch_array($resultado_categoria)) 
                                                            {
                                                            echo "<option value=".$fila['cat_id'].">".$fila['cat_nombre']."</option>";
                                                            }
                                                            echo "</select>";
                                                           
                                                        ?>
                                                        
                                                    </div>
                                                 
                                                    
                                                        
                                                
                                                    <div class="form-group block1">
                                                        <label>Tarea</label>
                                                        
                                                        <?php

                                                            $consulta_institucion = "SELECT * FROM institucion";    
        
                                                            $resultado_institucion = pg_query($con, $consulta_institucion) or die("Error en la Consulta SQL");
                                                            $numReg = pg_num_rows($resultado_institucion);
                                                          
                                                            echo "<select class='form-control' data-parsley-group='wizard-step-1' name='id_institucion' id='id_institucion' required>";
                                                            echo "<option value=''>Selecciona una institucion...</option>";
                                                            while ($fila=pg_fetch_array($resultado_institucion)) 
                                                            {
                                                            echo "<option value=".$fila['ins_id'].">".$fila['ins_nombre']."</option>";
                                                            }
                                                            echo "</select>";
                                                   
                                                        ?>
                                                        
                                                    </div>
                                                    <div class="form-group block1">
                                                        <label>Tarea</label>
                                                        <input type="text" id = "nombre_tarea" onkeyup = "Validate(this)" name="nombre_tarea" placeholder="Escribir aqui" class="form-control" data-parsley-group="wizard-step-1" required />
                                                        
                                                    </div>
                                                     <div class="form-group block1">
                                                        <label>Descripcion</label>
                                                        <input type="text" id = "descripcion_tarea" onkeyup = "Validate(this)" name="descripcion_tarea" data-parsley-range="[2,200]" placeholder="Escribir aqui" class="form-control" data-parsley-group="wizard-step-1" required />
                                                        
                                                    </div>
                                                    <div class="form-group block1">
                                                        <label>Fechas</label>
                                                           <div class="input-group input-daterange">
                                                                <input type="text" class="form-control" name="start" placeholder="Fecha Inicio" />
                                                                <span class="input-group-addon">a</span>
                                                                <input type="text" class="form-control" name="end" placeholder="Fecha Fin" />
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="form-group block1">
                                                        <label>Meta</label>
                                                        <div class="controls">
                                                            <textarea class="form-control" id="meta_tarea" onkeyup = "Validate(this)" name="meta_tarea" rows="4" data-parsley-range="[20,200]" placeholder="Escribir aqui" data-parsley-group="wizard-step-3" required></textarea>
                                                        </div>
                                                        
                                                    </div>
                                                    <input type="submit" value="Guardar" class="btn btn-success btn-lg">
                                                    <input type="hidden" name="insertar_tarea" value="1">
                                                    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                                                    <input type="hidden" name="url" value="<?php echo $baseUrl ?>">
                                                </div>
                                                <!-- end col-12 -->
                                            </div>
                                            <!-- end row -->
                                        </fieldset>
                                    </div>
                                    <!-- end wizard step-1 -->
                                 
                                    
                                  
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end #content -->


  
        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->
    
    <!-- ================== BEGIN BASE JS ================== -->
    <!--  JS PARA QUE FUNCIONE FANCYBOX 
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery/jquery-1.9.1.min.js"></script> 
    -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/crossbrowserjs/html5shiv.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/crossbrowserjs/respond.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
    <!-- ================== END BASE JS ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    

    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/parsley/dist/parsley.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap-wizard/js/bwizard.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/form-wizards-validation.demo.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/apps-admin.js"></script>
    
    <!-- ================== END PAGE LEVEL JS ================== -->
        


        
    <script>
        $(document).ready(function() {
            App.init();
            FormWizardValidation.init();
        });
    </script>

</body>
</html>