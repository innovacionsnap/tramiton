<style type="text/css">
    #content{
        padding-top: 30px !important;
    }
    .tab-panels ul {
        margin: 0;
        padding: 0;
    }
    .tab-panels ul li {
        list-style-type: none;
        display: inline-block;
        background: #325972;
        margin: 0;
        padding: 3px 10px;
        border-radius: 5px;
        color: #fff;
        font-weight: bold;
        cursor: default;
        width: 148px;

    }

    .tab-panels ul li.active {
        color: #325972;
        background: #F5F5F5;
    }

    .tab-panels .panel-registro {
        display:none;
        background: #F5F5F5;
        padding: 30px;
        border-radius: 0 0 10px 10px;
        min-height: 374px;
    }

    .tab-panels .panel-registro.active {
        display:block;
    }

    .botones_nav{
        margin-top: 20px;

    }
    .next-tab{
        float:right;

    }

    .prev-tab{
        float:left;
    }

    .next-tab,.prev-tab{
        background: #325972;
        border-radius: 5px;
        padding:5px;
        color:#fff;
    }

    select.form-registro{
        border-color: #325972;
        border-radius: 5px;
        -moz-appearance: none;
        background: transparent url("themes/tramiton/assets/img/flecha_select.png") no-repeat right center;
        width: 100%;
        height: 34px;
    }
    input.form-registro{
        border-color: #325972;
        border-radius: 5px;
        width:100%;
        height: 34px;
    }
    textarea.form-registro{
        width: 100%;
    }

    .btn-publicar{
        background: #325972;
        color:#fff;
        width: 100%;
        height: 40px;
        font-weight: bold;
    }

    .btn-publicar:hover{
        background: #f5f5f5;
        color:#325972;

    }

</style>

<?php
define("JS_ONLY_NUMS", " onKeypress=\"hkp(event); if ((_KeyCode < 48 && _KeyCode != 0 && _KeyCode != 8) || _KeyCode > 57) return false;\"");
/* Agregar funciones de combox provincia  */

function provincia($nombre, $valor) {

    include("config.inc.php");

    $consulta_provincia = "select * from provincia";
    $resultado_provincia = pg_query($con, $consulta_provincia) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_provincia);
    //echo "<div class='col-md-10'>";
    echo "<select class='form-registro' name='$nombre' id='$nombre'>";
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
    echo "<option value=''>Selecciona un Cantón...</option>";
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
    echo "<select class='form-registro' name='$nombre' id='$nombre'>";
    echo "<option value=''>Selecciona una Institución...</option>";
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
    echo "<option value=''>Selecciona un trámite...</option>";
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
                                    <input type="checkbox" name="problematica[]" value="<?php echo $fila_p2['prob_id'] ?>">&nbsp&nbsp<?php echo $fila_p2['prob_nombre'] ?><br>	
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
                                    <input type="checkbox" name="problematica[]" value="<?php echo $fila_p2['prob_id'] ?>">&nbsp&nbsp<?php echo $fila_p2['prob_nombre'] ?><br>	
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
                                    <input type="checkbox" name="problematica[]" value="<?php echo $fila_p2['prob_id'] ?>">&nbsp&nbsp<?php echo $fila_p2['prob_nombre'] ?><br>	

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

    function hkp(evt)
    {
        _KeyCode = (window.event) ? evt.keyCode : evt.which;
        return(_KeyCode);
    }


</script>
<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<?php //echo $baseUrl;  ?>


<form action="/" method="POST" name="form-wizard" onsubmit="alert('no debe desjarse enviar') return false;">
    <div class="tab-panels">
        <ul class="tabs">
            <li rel="panel1" class="active">Identificación</li>
            <li rel="panel2">Institución</li>
            <li rel="panel3">Problemática</li>
            <li rel="panel4">Solución</li>
            <li rel="panel5">Finalizar</li>
        </ul>

        <div id="panel1" class="panel-registro active">
            <h3>Ingresar su documento de identificación</h3>
            <label>Cédula de Ciudadanía</label>
            <input type="text" maxlength="10" id = "cedula_ciu" class="form-registro" placeholder="Ingrese su cédula de ciudadanía" autocomplete="off"/>
            <div class="row botones_nav"></div>
        </div>
        <div id="panel2" class="panel-registro">
            <h3>Institución</h3>
            <span>Identificar la Institución donde realizó el trámite</span>
            <div class="row">

                <!-- begin col-12 -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Unidad Prestadora</label>
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
                        <input type="text" id = "unidad_prestadora" name="unidad_prestadora" class="form-registro" placeholder="Unidad Prestadora" class="form-control" />

                    </div>
                </div>
                <!-- end col-12 -->
            </div>
            <div class="row botones_nav"></div>
        </div>
        <div id="panel3" class="panel-registro">
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
                        <textarea class="form-registro" id = "experiencia" name="experiencia" rows="4" placeholder="experiencia"></textarea>

                    </div>
                </div>
                <!-- end col-6 -->

            </div>
            <div class="row botones_nav"></div>
        </div>
        <div id="panel4" class="panel-registro">

            <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Titulo Solucion</label>
                        <div class="controls">
                            <input type="text"  id="titulo_solucion" name="titulo_solucion" placeholder="Titulo Problemática" class="form-registro" />
                        </div>
                    </div>
                </div>
                <!-- end col-12 -->
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Detalle de solucion</label>
                        <div class="controls">
                            <textarea class="form-registro" id="propuesta_solucion" name="propuesta_solucion" rows="4" placeholder="propuesta_solucion"></textarea>
                        </div>
                    </div>
                </div>
                <!-- end col-12 -->

            </div>
            <div class="row botones_nav"></div>
        </div>
        <div id="panel5" class="panel-registro">

            <h1>Gracias por ingresar el tramite</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat commodo porttitor. Vivamus eleifend, arcu in tincidunt semper, lorem odio molestie lacus, sed malesuada est lacus ac ligula. Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin. </p>
            <!--  <p><a class="btn btn-success btn-lg" role="button">Guardar y enviar</a></p> -->
            <input type="submit" value="Publicar y Guardar" class="btn-publicar"> 
            <input type="hidden" name="insertar_tramite" value="1">
            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
            <input type="hidden" name="url" value="<?php echo $baseUrl ?>">
            <div class="row botones_nav"></div>
        </div>

    </div>
</form>


<script type="text/javascript">

    $(function () {

        $('.panel-registro').each(function (i) {
            var total = $('.panel-registro').size() - 1;

            if (i != total) {
                next = i + 2;
                $(this).find('.botones_nav').append("<a href='#' class='next-tab' rel='panel" + next + "'>Siguiente &#187;</a>");
                $('a.next-tab').hide();
            }
            if (i != 0) {
                prev = i;
                $(this).find('.botones_nav').append("<a href='#' class='prev-tab' rel='panel" + prev + "'>&#171; Anterior</a>");

            }

        });
        $('#cedula_ciu').keyup(function () {
            var cedula=(this).value;
           var tamano=cedula.length;
           if (tamano==10){
              $.ajax({
                type: "POST",
                url: 'site/validacedula',
                data: {cedula: cedula},
                beforeSend: function () {
                },
                success: function (data) {
                    if (data == 1) {
                        $('a.next-tab').show();
                    } else {
                        $('a.next-tab').hide();
                        //$(this).append("<p>Cédula ingresada no es válida</p>");
                    }
                }
            });

           
           }else{$('a.next-tab').hide();}
           
            //alert(cedula);
            /**/
        });
        $('.next-tab').click(function () {
            var panelToShow = $(this).attr('rel');
            var litoshow = parseInt(panelToShow.slice(5, 6));
            $('.tab-panels').find('.tabs li.active').removeClass('active');
            $('.tab-panels').find('.tabs li').eq(litoshow - 1).addClass('active');
            //$('a.next-tab').hide();
            $('.tab-panels').find('.panel-registro.active').show(showNextPanel);
            function showNextPanel() {
                $(this).removeClass('active');

                $('#' + panelToShow).hide(function () {
                    $(this).addClass('active');
                });
            }
        });

        $('.prev-tab').click(function () {
            var panelToShow = $(this).attr('rel');
            var litoshow = parseInt(panelToShow.slice(5, 6));
            $('.tab-panels').find('.tabs li.active').removeClass('active');
            $('.tab-panels').find('.tabs li').eq(litoshow - 1).addClass('active');
            $('.tab-panels').find('.panel-registro.active').show(showNextPanel);
            function showNextPanel() {
                $(this).removeClass('active');

                $('#' + panelToShow).hide(function () {
                    $(this).addClass('active');
                });
            }
        });

    });
</script>
<script type="text/javascript">
    /* var resultado = false;
     window.ParsleyValidator.addValidator('validarcedula',
     function (value, requirement) {
     
     $.ajax({
     type: "POST",
     url: 'site/validacedula',
     data: {cedula: value},
     beforeSend: function () {
     },
     success: function (data) {
     if (data == 1) {
     resultado = true;
     return true;
     } else {
     resultado = false;
     return true;
     }
     }
     });
     
     return resultado;
     }, 32);
     */
</script>