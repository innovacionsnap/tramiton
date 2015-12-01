

<?php
/* Agregar funciones de combox provincia  */

function provincia($nombre, $valor) {

    include("config.inc.php");

    $consulta_provincia = "select * from provincia";
    $resultado_provincia = pg_query($con, $consulta_provincia) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_provincia);
    //echo "<div class='col-md-10'>";
    echo "<select class='form-control' data-parsley-group='wizard-step-1' required name='$nombre' id='$nombre'>";
    echo "<option value=''>Selecciona una Provincia...</option>";
    while ($fila = pg_fetch_array($resultado_provincia)) {
        echo "<option value='" . $fila["pro_id"] . "'";
        if ($fila["pro_id"] == $valor)
            echo " selected";
        echo ">" . $fila["pro_nombre"] . "</option>\r\n";
    }
    echo "</select>";
    //echo "</div>";
}

function canton($nombre, $valor) {
    include("config.inc.php");

    $consulta_canton = "select * from canton";
    $resultado_canton = pg_query($con, $consulta_canton) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_canton);


    echo "<select name='$nombre' id='$nombre'>";
    echo "<option value=''>Selecciona un Canton...</option>";
    while ($fila = pg_fetch_array($resultado_canton)) {
        echo "<option value='" . $fila["can_id"] . "'";
        if ($fila["can_id"] == $valor)
            echo " selected";
        echo ">" . $fila["can_nombre"] . "</option>\r\n";
    }
    echo "</select>";
}

function institucion($nombre, $valor) {

    include("config.inc.php");

    $consulta_institucion = "select * from institucion order by ins_nombre";
    $resultado_institucion = pg_query($con, $consulta_institucion) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_institucion);
    //echo "<div class='col-md-12'>";
    //echo "<div class='form-group'>";
    echo "<select class='form-control' data-parsley-group='wizard-step-1' required name='$nombre' id='$nombre'>";
    echo "<option value=''>Selecciona una Institucion...</option>";
    while ($fila = pg_fetch_array($resultado_institucion)) {
        echo "<option value='" . $fila["ins_id"] . "'";
        if ($fila["ins_id"] == $valor)
            echo " selected";
        echo ">" . $fila["ins_nombre"] . "</option>\r\n";
    }
    echo "</select>";
    //echo "</div></div>";
}

function tramite($nombre, $valor) {

    include("config.inc.php");

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

function problema2() {
    include("config.inc.php");

    $consulta_problema = "select DISTINCT pro_prob_id, prob_nombre from problema 
where nivp_ip = 1
order by pro_prob_id limit 4 offset 0";
    //echo $consulta_problema;
    $resultado_problema = pg_query($con, $consulta_problema) or die("Error en la Consulta SQL");
    $numReg1 = pg_num_rows($resultado_problema);
    ?>
    <div class="col-md-15">
        <!-- begin panel-group -->
        <div class="panel-group m-b-0" id="accordion">
            <?php
            while ($fila = pg_fetch_array($resultado_problema)) {
                $pro_prob_id = $fila['pro_prob_id'];
                $prob_nombre = $fila['prob_nombre'];
                ?>
                <!-- begin panel -1 -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">

                            <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $pro_prob_id ?>"><?php echo $prob_nombre ?></a>
                        </h4>
                    </div>
                    <?php
                    $consulta_problema_2 = "select prob_nombre,nivp_ip, prob_id from problema where nivp_ip = 2 and pro_prob_id =" . $pro_prob_id . "";

                    $resultado_problema_2 = pg_query($con, $consulta_problema_2) or die("Error en la Consulta SQL");
                    $numReg2 = pg_num_rows($resultado_problema_2);
                    ?>
                    <div id="<?php echo $pro_prob_id ?>" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p><?php
                                while ($fila_p2 = pg_fetch_array($resultado_problema_2)) {
                                    //if ($prob_nombre_otros==1){
                                    //echo $prob_nombre_otros;	
                                    //}else {
                                    ?>
                                    <input class="problema-checkbox" type="checkbox" name="problematica[]" value="<?php echo $fila_p2['prob_id'] ?>">&nbsp&nbsp<?php echo $fila_p2['prob_nombre'] ?><br>
                                    <?php
                                    //}
                                    ?>

                                    <?php
                                }
                                ?> 
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end panel-->
                <?php
            }
            ?>
            <!-- end panel-group -->
        </div>
    </div>
    <?php
}

function problema3() {
    include("config.inc.php");

    $consulta_problema = "select DISTINCT pro_prob_id, prob_nombre from problema
	where nivp_ip = 1
	order by pro_prob_id limit 4 offset 4";
    //echo $consulta_problema;
    $resultado_problema = pg_query($con, $consulta_problema) or die("Error en la Consulta SQL");
    $numReg1 = pg_num_rows($resultado_problema);
    ?>
    <div class="col-md-15">
        <!-- begin panel-group -->
        <div class="panel-group m-b-0" id="accordion">
            <?php
            while ($fila = pg_fetch_array($resultado_problema)) {
                $pro_prob_id = $fila['pro_prob_id'];
                $prob_nombre = $fila['prob_nombre'];
                ?>
                <!-- begin panel -1 -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">

                            <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $pro_prob_id ?>"><?php echo $prob_nombre ?></a>
                        </h4>
                    </div>
                    <?php
                    $consulta_problema_2 = "select prob_nombre,nivp_ip, prob_id from problema where nivp_ip = 2 and pro_prob_id =" . $pro_prob_id . "";

                    $resultado_problema_2 = pg_query($con, $consulta_problema_2) or die("Error en la Consulta SQL");
                    $numReg2 = pg_num_rows($resultado_problema_2);
                    ?>
                    <div id="<?php echo $pro_prob_id ?>" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p><?php
                                while ($fila_p2 = pg_fetch_array($resultado_problema_2)) {
                                    //if ($prob_nombre_otros==1){
                                    //echo $prob_nombre_otros;	
                                    //}else {
                                    ?>
                                    <input class="problema-checkbox" type="checkbox" name="problematica[]" value="<?php echo $fila_p2['prob_id'] ?>">&nbsp&nbsp<?php echo $fila_p2['prob_nombre'] ?><br>
                                    <?php
                                    //}
                                    ?>

                                    <?php
                                }
                                ?> 
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end panel-->

                <?php
            }
            ?>
            <!-- end panel-group -->
        </div>
    </div>
    <?php
}

function problema4() {
    include("config.inc.php");

    $consulta_problema = "select DISTINCT pro_prob_id, prob_nombre from problema
	where nivp_ip = 1
	order by pro_prob_id limit 4 offset 8";
    //echo $consulta_problema;
    $resultado_problema = pg_query($con, $consulta_problema) or die("Error en la Consulta SQL");
    $numReg1 = pg_num_rows($resultado_problema);
    ?>
    <div class="col-md-15">
        <!-- begin panel-group -->
        <div class="panel-group m-b-0" id="accordion">
            <?php
            while ($fila = pg_fetch_array($resultado_problema)) {
                $pro_prob_id = $fila['pro_prob_id'];
                $prob_nombre = $fila['prob_nombre'];
                ?>
                <!-- begin panel -1 -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">

                            <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $pro_prob_id ?>"><?php echo $prob_nombre ?></a>
                        </h4>
                    </div>
                    <?php
                    $consulta_problema_2 = "select prob_nombre,nivp_ip, prob_id from problema where nivp_ip = 2 and pro_prob_id =" . $pro_prob_id . "";
                    //echo $consulta_problema_2;

                    $resultado_problema_2 = pg_query($con, $consulta_problema_2) or die("Error en la Consulta SQL");
                    $numReg2 = pg_num_rows($resultado_problema_2);
                    ?>
                    <div id="<?php echo $pro_prob_id ?>" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p><?php
                                while ($fila_p2 = pg_fetch_array($resultado_problema_2)) {
                                    ?>											
                                    <input class="problema-checkbox" type="checkbox" name="problematica[]" value="<?php echo $fila_p2['prob_id'] ?>">&nbsp&nbsp<?php echo $fila_p2['prob_nombre'] ?><br>

                                    <?php
                                }

                                if ($prob_nombre == 'Otros') {
                                    $prob_nombre_otros = $prob_nombre;
                                    ?>

                                    <input type="text" name="problematica_otro" placeholder="Otra Problematica" data-parsley-range="[20,140]" class="form-control" data-parsley-group="wizard-step-2"/>


                                    <?php
                                }
                                ?> 
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end panel-->

                <?php
            }
            ?>
            <!-- end panel-group -->
        </div>
    </div>
    <?php
}

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

        <li class="active">Registro Tr&aacute;mite </li>
        
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Registro Tr&aacute;mite<small></small></h1>
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

                    <form action="<?php echo Yii::app()->BaseUrl?>/ciudadano/registrocasointerno" method="POST" data-parsley-validate="true" name="form-wizard">
                        <div id="wizard">
                            <ol>
                                <li>
                                    Institución
                                    <small>Identificar la Institución donde realizó el trámite</small>
                                </li>
                                <li>
                                    Problemática
                                    <small>Idenficar el problema encontrado en la institución</small>
                                </li>
                                <li>
                                    Solución
                                    <small>Registre su solución al problema</small>
                                </li>
                                <li>
                                    Finalizar
                                    <small>Enviar y publicar.</small>
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
                                                <label>Institución</label>
                                                <?php institucion("id_institucion", "0"); ?>  

                                            </div>
                                        </div>
                                        <!-- end col-12 -->
                                        <!-- begin col-12 -->
                                        <p id="pidhijo2">
                                            <!-- end col-12 -->
                                            <!-- begin col-4 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Provincia</label>
                                                <?php provincia("id_provincia", "0") ?>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-12 -->
                                        <p id="pidhijo">
                                            <!-- end col-12 -->

                                            <!-- begin col-12 -->

                                        <div class="col-md-12">
                                            <div class="form-group block1">
                                                <label>Unidad Prestadora</label>
                                                <input type="text" id = "unidad_prestadora" onkeyup = "Validate(this)" name="unidad_prestadora" placeholder="Unidad Prestadora" class="form-control" data-parsley-group="wizard-step-1" required />

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
                                    <legend class="pull-left width-full">Problemas</legend>
                                    <!-- begin row -->
                                    <div class="row">
                                        <!-- begin col-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php echo problema2() ?>

                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php echo problema3() ?>

                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php echo problema4() ?>

                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                        <!-- begin col-12 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Detalle del problema</label>
                                                <textarea class="form-control" id = "experiencia" onkeyup = "Validate(this)" name="experiencia" rows="4" data-parsley-range="[20,200]" placeholder="Experiencia" data-parsley-group="wizard-step-2" required></textarea>

                                            </div>
                                        </div>
                                        <!-- end col-6 -->

                                    </div>
                                    <!-- end row -->
                                </fieldset>
                            </div>
                            <!-- end wizard step-2 -->
                            <!-- begin wizard step-3 -->
                            <div class="wizard-step-3">
                                <fieldset>
                                    <legend class="pull-left width-full">Solución</legend>
                                    <!-- begin row -->
                                    <div class="row">
                                        <!-- begin col-12 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Titulo de la solución</label>
                                                <div class="controls">
                                                    <input type="text"  id="titulo_solucion" onkeyup = "Validate(this)" name="titulo_solucion"  data-parsley-range="[20,99]" placeholder="Título de la problemática" class="form-control" data-parsley-group="wizard-step-3" required />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-12 -->
                                        <!-- begin col-12 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Detalle de la solución</label>
                                                <div class="controls">
                                                    <textarea class="form-control" id="propuesta_solucion" onkeyup = "Validate(this)" name="propuesta_solucion" rows="4" data-parsley-range="[20,200]" placeholder="Solución" data-parsley-group="wizard-step-3" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-12 -->

                                    </div>
                                    <!-- end row -->
                                </fieldset>
                            </div>
                            <!-- end wizard step-3 -->
                            <!-- begin wizard step-4 -->
                            <div>
                                <div class="jumbotron m-b-0 text-center">
                                    <h1>Gracias por ingresar el tramite</h1>
                                    <p>... </p>
                                    <!--  <p><a class="btn btn-success btn-lg" role="button">Guardar y enviar</a></p> -->
                                    <input type="submit" value="Publicar y Guardar" class="btn btn-success btn-lg"> 
                                    <input type="hidden" name="insertar_tramite" value="1">
                                    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                                    <input type="hidden" name="url" value="<?php echo $baseUrl ?>">
                                    <input type="hidden" name="empresa" value="<?php echo $empresa;?>">
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
