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
        //width: 148px;

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
    .loader {
    background: rgba(0, 0, 0, 0) url("<?php echo (Yii::app()->theme->baseUrl . '/assets/img/spinner.gif'); ?>") no-repeat scroll 50% center;
    height: 100%;
    left: 0;
    position: absolute;
    top: 30;
    width: 100%;
}

</style>
<?php
include("funcion_registro.php");
define("JS_ONLY_NUMS", " onKeypress=\"hkp(event); if ((_KeyCode < 48 && _KeyCode != 0 && _KeyCode != 8) || _KeyCode > 57) return false;\"");
$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
$id_usuario = $modelUser['usu_id'];
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
Yii::app()->clientScript->registerCoreScript('jquery');
?>

<form action="" method="POST" name="form-wizard">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Cédula de Ciudadanía</label>
                        <input type="text" maxlength="10" id = "cedula_ciu" class="campo-panel1 form-registro" placeholder="Ingrese su cédula de ciudadanía" autocomplete="off" <?php echo JS_ONLY_NUMS; ?>/>
                        <div id="cedula_ciu_error" style="display:none;color:red;"></div>
                        <div id="verifica" style="max-height: 80px;"></div>
                    </div>
                </div>
                <div class="row botones_nav"></div>
            </div>
        </div>
        <div id="panel2" class="panel-registro">
            <h3>Institución</h3>
            <span>Identificar la Institución donde realizó el trámite</span>
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
                    <div class="form-group">
                        <label>Unidad Prestadora</label>
                        <input type="text" id = "unidad_prestadora" name="unidad_prestadora" class="campo-panel2 form-registro " placeholder="Unidad Prestadora" class="form-control" />
                        <div id="unidad_prestadora_error" style="display:none;"></div>

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
                        <textarea class="campo-panel3 form-registro" id = "experiencia" name="experiencia" rows="4" placeholder="experiencia"></textarea>
                        <div id="experiencia_error" style="display:none;"></div>

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
                            <input type="text"  id="titulo_solucion" name="titulo_solucion" placeholder="Titulo Problemática" class="campo-panel4 form-registro" />
                            <div id="titulo_solucion_error" style="display:none;"></div>
                        </div>
                    </div>
                </div>
                <!-- end col-12 -->
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Detalle de solucion</label>
                        <div class="controls">
                            <textarea class="campo-panel4 form-registro" id="propuesta_solucion" name="propuesta_solucion" rows="4" placeholder="propuesta_solucion"></textarea>
                            <div id="propuesta_solucion_error" style="display:none;"></div>
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
    function hkp(evt)
    {
        _KeyCode = (window.event) ? evt.keyCode : evt.which;
        return(_KeyCode);
    }

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
            var cedula = (this).value;
            var tamano = cedula.length;
            if (tamano == 10) {
                $.ajax({
                    type: "POST",
                    url: 'site/validacedula',
                    data: {cedula: cedula},
                    beforeSend: function () {
                        $("#verifica").addClass('loader');
                    },
                    success: function (data) {
                        $("#verifica").removeClass('loader');
                        if (data == 1) {
                            $('a.next-tab').show();
                            $('#cedula_ciu_error').hide();
                        } else {
                            $('a.next-tab').hide();
                            $('#cedula_ciu_error').html("Cédula ingresada no válida");
                            $('#cedula_ciu_error').show();
                        }
                    }
                });


            } else {
                $('a.next-tab').hide();
            }

            //alert(cedula);
            /**/
        });
        $('.next-tab').click(function () {
            var panelToShow = $(this).attr('rel');
            var litoshow = parseInt(panelToShow.slice(5, 6));
            var num_actual = parseInt(panelToShow.slice(5, 6)) - 1;
            var actual = 'campo-panel' + (num_actual.toString());
            var campo = document.getElementsByClassName(actual);
            var contador = 0;
            for (i = 0; i < campo.length; i++) {
                var idCampo = $(campo[i]).attr("id");
                var idCampoError = idCampo + "_error";
                if (campo[i].value == "") {
                    campo[i].style.backgroundColor = "#f2dede";
                    //obtener el id del campo

                    $('#' + idCampoError).html('<div style="color:red;">Campo requerido</div>');
                    $('#' + idCampoError).show();
                    //campo[i].concat("<div>Campo requerido</div>");
                    contador++;
                } else {
                    campo[i].style.backgroundColor = "#fff";
                    $('#' + idCampoError).hide();
                    
                }

            }
            if (contador == 0) {
                $('.tab-panels').find('.tabs li.active').removeClass('active');
                $('.tab-panels').find('.tabs li').eq(litoshow - 1).addClass('active');
                $('.tab-panels').find('.panel-registro.active').show(function () {
                    $(this).removeClass('active');

                    $('#' + panelToShow).hide(function () {
                        $(this).addClass('active');
                    });
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