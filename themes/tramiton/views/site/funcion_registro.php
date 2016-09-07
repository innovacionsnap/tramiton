<?php
function provincia($nombre, $valor) {

    include 'protected/extensions/validacion/config.inc.php';    

    $consulta_provincia = "select * from provincia";
    $resultado_provincia = pg_query($con, $consulta_provincia) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_provincia);
    //echo "<div class='col-md-10'>";
    echo "<select disabled class='campo-panel1 form-registro' name='$nombre' id='$nombre'>";
    echo "<option value=''>Selecciona una Provincia</option>";
    while ($fila = pg_fetch_array($resultado_provincia)) {
        echo "<option value='" . $fila["pro_id"] . "'";
        if ($fila["pro_id"] == $valor)
            echo " selected";
        echo ">" . $fila["pro_nombre"] . "</option>\r\n";
    }
    echo "</select><div id='".$nombre."_error' style='display:none;'></div>";
    //echo "</div>";
}

function canton($nombre, $valor) {
    include 'protected/extensions/validacion/config.inc.php';    
    
    $consulta_canton = "select * from canton";
    //echo $consulta_canton;
    $resultado_canton = pg_query($con, $consulta_canton) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_canton);


    echo "<select class= 'campo-panel1' name='$nombre' id='$nombre'>";
    echo "<option value=''>Selecciona un Cantón</option>";
    while ($fila = pg_fetch_array($resultado_canton)) {
        echo "<option value='" . $fila["can_id"] . "'";
        if ($fila["can_id"] == $valor)
            echo " selected";
        echo ">" . $fila["can_nombre"] . "</option>\r\n";
    }
    echo "</select><div id='".$nombre."_error' style='display:none;'></div>";
}

function institucion($nombre, $valor) {

    include 'protected/extensions/validacion/config.inc.php';    

    $consulta_institucion = "select * from institucion order by ins_funcion_ejecutiva desc,ins_nombre";
    $resultado_institucion = pg_query($con, $consulta_institucion) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_institucion);
    //echo "<div class='col-md-12'>";
    //echo "<div class='form-group'>";
    echo "<select disabled class='campo-panel1 form-registro' name='$nombre' id='$nombre'>";
    echo "<option value=''>Selecciona una Institución</option>";
    while ($fila = pg_fetch_array($resultado_institucion)) {
        echo "<option value='" . $fila["ins_id"] . "'";
        if ($fila["ins_id"] == $valor)
            echo " selected";
        echo ">" . $fila["ins_nombre"] . "</option>\r\n";
    }
    echo "</select><div id='".$nombre."_error' style='display:none;'></div>";
    //echo "</div></div>";
}

function tramite($nombre, $valor) {

    include 'protected/extensions/validacion/config.inc.php';    

    $consulta_tramite = "select ins.ins_id,ins.ins_nombre,tra.tra_nombre
from tramite tra, tramite_institucion trai, institucion ins where tra.tra_id = trai.tra_id and trai.ins_id = ins.ins_id";
    $resultado_tramite = pg_query($con, $consulta_tramite) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_tramite);

    echo "<select class='campo-panel1' name='$nombre' id='$nombre'>";
    echo "<option value=''>Selecciona un trámite...</option>";
    while ($fila = pg_fetch_array($resultado_tramite)) {
        echo "<option value='" . $fila["ins_id"] . "'";
        if ($fila["ins_id"] == $valor)
            echo " selected";
        echo ">" . $fila["ins_nombre"] . "</option>\r\n";
    }
    echo "</select><div id='".$nombre."_error' style='display:none;'></div>";
}

function problema2() {
    include 'protected/extensions/validacion/config.inc.php';    

    $consulta_problema = "select DISTINCT pro_prob_id, prob_nombre from problema 
where nivp_ip = 1
order by pro_prob_id limit 3 offset 0";
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
    include 'protected/extensions/validacion/config.inc.php';    

    $consulta_problema = "select DISTINCT pro_prob_id, prob_nombre from problema
	where nivp_ip = 1
	order by pro_prob_id limit 3 offset 3";
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
    include 'protected/extensions/validacion/config.inc.php';    

    $consulta_problema = "select DISTINCT pro_prob_id, prob_nombre from problema
	where nivp_ip = 1
	order by pro_prob_id limit 2 offset 6";
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

                                    <input type="text" name="problematica_otro" placeholder="Otra Problematica" data-parsley-range="[20,140]" class="form-control" data-parsley-group="wizard-step-3"/>


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