<style type="text/css">
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
        <ul class="tabs nav nav-pills nav-justified">
            <li role="presentation" rel="panel1" class="active text-center">Identificación</li>
            <li role="presentation" rel="panel2" class="text-center">Institución</li>
            <li role="presentation" rel="panel3" class="text-center">Problemática</li>
            <li role="presentation" rel="panel4" class="text-center">Solución</li>
            <li role="presentation" rel="panel5" class="text-center">Finalizar</li>
        </ul>

        <div id="panel1" class="panel-registro active">
            <h4 id="bienvenida">Ingresar su documento de identificación</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Cédula de Identidad y/o Ciudadanía</label>
                        <input size="20" type="text" maxlength="10" id = "cedula_ciu" name="cedula_ciu" class="campo-panel1 form-registro" placeholder="Ingrese su número de cédula de identidad y/o ciudadanía" autocomplete="off" <?php echo JS_ONLY_NUMS; ?>/>
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
                        <label>Sucursal (Ej. Norte, Sur, etc)</label>
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
                        <textarea class="campo-panel3 form-registro" id = "experiencia" name="experiencia" rows="4" placeholder="Experiencia"></textarea>
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
                        <label>Titulo Solución</label>
                        <div class="controls">
                            <input type="text"  id="titulo_solucion" name="titulo_solucion" placeholder="Título de la solución" class="campo-panel4 form-registro" />
                            <div id="titulo_solucion_error" style="display:none;"></div>
                        </div>
                    </div>
                </div>
                <!-- end col-12 -->
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Detalle de solución</label>
                        <div class="controls">
                            <textarea class="campo-panel4 form-registro" id="propuesta_solucion" name="Detalle de la solución" rows="4" placeholder="Propuesta de la solución"></textarea>
                            <div id="propuesta_solucion_error" style="display:none;"></div>
                        </div>
                    </div>
                </div>
                <!-- end col-12 -->

            </div>
            <div class="row botones_nav"></div>
        </div>
        <div id="panel5" class="panel-registro">

            <h4 id="gracias"></h4>
            <h3 align="center" id="msgValidacion"></h3>
            <!--<input type="submit" value="Publicar y Guardar" class="btn-publicar"> -->
            <input type="hidden" name="insertar_tramite" value="1">
            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
            <input type="hidden" name="url" value="<?php echo $baseUrl ?>">
            <?php echo CHtml::ajaxSubmitButton(
                'Guardar', 
                array('registroCaso'),
                array(
                    //'update' => '#ejemploAjax4',
                    'beforeSend' => "function(){
                        $('#estados2').removeClass('loadingok');
                        $('#estados2').addClass('loadingprogreso');
                    }",
                    'complete' => "function(){
                        $('#estados2').removeClass('loadingprogreso');
                    }",
                    'success' => "function(data){
                        jQuery('#gracias').hide();
                        jQuery('#btnNav').hide();
                        jQuery('#btnPublicarCaso').hide();
                        jQuery('#msgValidacion').html(data);
                        
                        
                    }",
                    'error' => "function(){
                        $('#estados2').addClass('loadingerror');
                        $('#msgValidacion').html('ocurrio un error al recuperar datos');
                    }",
                ),
                array('class' => 'btn-publicar', 'id' => 'btnPublicarCaso')
            ); 
            ?>            
            <div id="btnNav" class="row botones_nav"></div>
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
                        var bandera = data.split('?');
                        if (bandera[0] == 1) {
                            $('a.next-tab').show();
                            $('#cedula_ciu_error').hide();
                            $('#gracias').html('Gracias ' + bandera[1] + ' por registrar su caso');
                            $('#bienvenida').html('Bienvenido/a ' + bandera[1]);
                        } else {
                            $('a.next-tab').hide();
                            $('#cedula_ciu_error').html("Cédula ingresada no válida");
                            $('#cedula_ciu_error').show();
                            $('#bienvenida').html('Ingresar su documento de identificación');
                        }
                    }
                });


            } else {
                $('a.next-tab').hide();
                $('#bienvenida').html('Ingresar su documento de identificación');
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
