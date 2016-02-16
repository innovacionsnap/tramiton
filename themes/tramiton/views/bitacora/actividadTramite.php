

<?php
/* Agregar funciones de combox provincia  */

$baseUrl = Yii::app()->theme->baseUrl;

include("config.inc.php");

   
    
$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
$id_usuario = $modelUser['usu_id'];

function tramite($nombre, $valor) {

    include 'protected/extensions/validacion/config.inc.php';

    $consulta_tramite = "select ins.ins_id,ins.ins_nombre,tra.tra_nombre
from tramite tra, tramite_institucion trai, institucion ins where tra.tra_id = trai.tra_id and trai.ins_id = ins.ins_id";
    $resultado_tramite = pg_query($con, $consulta_tramite) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_tramite);

    echo "<select name='$nombre' id='$nombre'>";
    echo "<option value=''>Selecciona un tramite...</option>";
    while ($fila = pg_fetch_array($resultado_tramite)) {
        echo "<option value='" . $fila["ins_id"] . "'";
        if ($fila["ins_id"] == $valor)
            echo " selected";
        echo ">" . $fila["ins_nombre"] . "</option>\r\n";
    }
    echo "</select>";
}

function institucion($nombre, $valor) {

    include 'protected/extensions/validacion/config.inc.php';

    $consulta_institucion = "select * from institucion order by ins_funcion_ejecutiva desc,ins_nombre";
    $resultado_institucion = pg_query($con, $consulta_institucion) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_institucion);
    //echo "<div class='col-md-12'>";
    //echo "<div class='form-group'>";
    echo "<i class='fa fa-question-circle ayuda' data-toggle='tooltip' data-placement='right' title='Seleccione la institución donde realizó el trámite'></i>";
    echo "<select class='form-control' data-parsley-group='wizard-step-1' required name='$nombre' id='$nombre'>";
    echo "<option value=''>Selecciona una Institución</option>";
    while ($fila = pg_fetch_array($resultado_institucion)) {
        echo "<option value='" . $fila["ins_id"] . "'";
        if ($fila["ins_id"] == $valor)
            echo " selected";
        echo ">" . $fila["ins_nombre"] . "</option>\r\n";
    }
    echo "</select>";
    //echo "</div></div>";
}

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
        <li><a href="<?php echo $baseUrl; ?>/bitacora/indexTramite">Bitácora</a></li>
        <li class="active">Registro Trámite </li>
        
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Registro Trámite<small></small></h1>
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

                    <form action="<?php echo Yii::app()->BaseUrl?>/bitacora/registroTramite" method="POST" data-parsley-validate="true" name="form-wizard">
                       
                            <div class="wizard-step-1">
                                <fieldset>
                                    <legend class="pull-left width-full">Institución</legend>
                                    <!-- begin row -->
                                    <div class="row">

                                        <!-- begin col-12 -->
                                        <!-- <div class="col-md-12">
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
                                        </div> -->
                                        <!-- end col-12 -->
                                        <!-- begin col-12 -->   
                                       
                                            <!-- end col-12 -->
                                            <!-- begin col-4 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                               
                                                 <label>Institución responsable:</label>
                                                        
                                                        <?php institucion("id_institucion", "0"); ?>  
                                            </div>
                                        </div>

                                        <p id="pidhijo2">
                                        <!-- end col-4 -->
                                        <div class="col-md-12">
                                         <label>Fecha Inicio / Cierre</label>
                                            <div class="input-group input-daterange">
                                                <input type="text" class="form-control" name="start" placeholder="Fecha Inicio" />
                                                <span class="input-group-addon">a</span>
                                                <input type="text" class="form-control" name="end" placeholder="Fecha Cierre" />
                                            </div>
                                        </div>

                                 </fieldset>      
                                <div class="text-center">
                                  
                                 
                                        <input type="submit" value="Enviar y Guardar" class="btn btn-success btn-lg">
                                        <input type="hidden" name="insertar_tarea" value="1">
                                        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                                        <input type="hidden" name="url" value="<?php echo $baseUrl ?>">
                                </div>


                                
                                

                             
                            <!-- end wizard step-4 -->
                        
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
