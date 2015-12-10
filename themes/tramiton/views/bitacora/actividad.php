

<?php
/* Agregar funciones de combox provincia  */

$baseUrl = Yii::app()->theme->baseUrl;

include("config.inc.php");

   
    
$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
$id_usuario = $modelUser['usu_id'];

?>

<script type="text/javascript">
    function Validate(unidad_prestadora) {
        unidad_prestadora.value = unidad_prestadora.value.replace(/[*?|"#Ç¿?="´'ç´;{+(^[@&_%]+/g, '');
    }

    function Validate(experiencia) {
        experiencia.value = experiencia.value.replace(/[*?|"#Ç¿?="´'{+(^;ç@&_%]+/g, '');
    }
    function Validate(propuesta_solucion) {
        propuesta_solucion.value = propuesta_solucion.value.replace(/[*?|"#Ç¿ç?="´'{+(^;@&_%]+/g, '');
    }

</script>
<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<?php //echo $baseUrl; ?>

<!-- begin #content -->
<div id="content" class="content" style="margin-left: 50px; margin-right: 20px">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="<?php echo $baseUrl; ?>/dashboard/">Inicio</a></li>
        <li><a href="<?php echo $baseUrl; ?>/bitacora/">Bitácora</a></li>
        <li class="active">Registro Tarea </li>
        
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Registro Tarea<small></small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <!--<div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Form Wizards</h4>
                </div>-->
                <div class="panel-body">

                    <form action="<?php echo Yii::app()->BaseUrl?>/bitacora/registrocasointerno" method="POST" data-parsley-validate="true" name="form-wizard">
                        <div id="wizard">
                            
                              <ol>
                                    <li>
                                        Institución
                                        <small>Ingreso de datos de la institución responsable.</small>
                                    </li>
                                    <li>
                                        Tarea
                                        <small>Detalle tarea a ser ingresada.</small>
                                    </li>
                                   
                                    <li>
                                       Finalizar
                                        <small>Enviar y pulicar .</small>
                                    </li>
                                    
                                </ol> 
                            <!-- begin wizard step-1 -->
                            <div class="wizard-step-1">
                                <fieldset>
                                    <legend class="pull-left width-full">Institución</legend>
                                    <!-- begin row -->
                                    <div class="row">

                                        <!-- begin col-12 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Categoría</label>
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
                                        </div>
                                        <!-- end col-12 -->
                                        <!-- begin col-12 -->
                                       
                                            <!-- end col-12 -->
                                            <!-- begin col-4 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                               
                                                 <label>Institución responsable:</label>
                                                        
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
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-12 -->
                                     
                                            <!-- end col-12 -->

                                            <!-- begin col-12 -->

                                        <div class="col-md-12">
                                            <div class="form-group block1">
                                                <label>Usuario responsables:</label>
                                                        
                                                        <?php

                                                            $consulta_usuario = 'select * from usuario usu, "AuthAssignment" aut where CAST(aut.userid as integer) = usu.usu_id and aut.itemname = \'bitacora\' ';   
                                                            echo  $consulta_usuario;
        
                                                            $resultado_usuario = pg_query($con, $consulta_usuario) or die("Error en la Consulta SQL");
                                                            $numReg = pg_num_rows($resultado_usuario);
                                                          
                                                            echo "<select class='form-control' data-parsley-group='wizard-step-1' name='id_usuario_responsable' id='id_usuario_responsable' required>";
                                                            echo "<option value=''>Selecciona una usuario...</option>";
                                                            while ($fila_usuario=pg_fetch_array($resultado_usuario)) 
                                                            {
                                                            echo "<option value=".$fila_usuario['usu_id'].">".$fila_usuario['usu_nombre']."</option>";
                                                            }
                                                            echo "</select>";
                                                   
                                                        ?>

                                            </div>
                                        </div>
                                        <!-- end col-12 -->
                                    </div>
                                    <!-- end row -->
                                </fieldset>
                            </div>
                            <!-- end wizard step-1 -->
                            <!-- begin wizard step-2 -->
                            <div class="wizard-step-2">
                                <fieldset>
                                    <legend class="pull-left width-full"></legend>
                                    <!-- begin row -->
                                    <div class="row">
                                        <!-- begin col-4 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label>Tarea</label>
                                              <input type="text" id = "nombre_tarea" onkeyup = "Validate(this)" name="nombre_tarea" placeholder="Escribir aqui" class="form-control" data-parsley-group="wizard-step-2" required />

                                            </div>
                                            <div class="form-group">
                                              <label>Descripcion</label>
                                                <input type="text" id = "descripcion_tarea" onkeyup = "Validate(this)" name="descripcion_tarea" data-parsley-range="[2,200]" placeholder="Escribir aqui" class="form-control" data-parsley-group="wizard-step-2" required />

                                            </div>
                                            
                                            <label>Fechas</label>
                                            <div class="input-group input-daterange">
                                                <input type="text" class="form-control" name="start" placeholder="Fecha Inicio" />
                                                <span class="input-group-addon">a</span>
                                                <input type="text" class="form-control" name="end" placeholder="Fecha Fin" />
                                            </div>
                                            <label>Meta</label>
                                            <div class="controls">
                                                 <textarea class="form-control" id="meta_tarea" onkeyup = "Validate(this)" name="meta_tarea" rows="4" data-parsley-range="[20,200]" placeholder="Escribir aqui" data-parsley-group="wizard-step-2" required></textarea>
                                            </div>
                                     

                                        </div>
                                        <!-- end col-4 -->

                                            
                                       

                                    </div>
                                    <!-- end row -->
                                </fieldset>
                            </div>
                            <!-- end wizard step-2 -->
                           
                            <!-- begin wizard step-4 -->
                            <div class="wizard-step-4">
                                <div class="jumbotron m-b-0 text-center">
                                    <h1>Gracias por ingresar su tarea</h1>
                                 
                                        <input type="submit" value="Enviar y Guardar" class="btn btn-success btn-lg">
                                        <input type="hidden" name="insertar_tarea" value="1">
                                        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                                        <input type="hidden" name="url" value="<?php echo $baseUrl ?>">
                                 </div>
                             </div>
                            <!-- end wizard step-4 -->
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
