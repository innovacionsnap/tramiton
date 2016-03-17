<style type="text/css">
    .loader {
        background: rgba(0, 0, 0, 0) url("<?php echo (Yii::app()->theme->baseUrl . '/assets/img/spinner.gif'); ?>") no-repeat scroll 50% center;
        height: 100%;
        left: 0;
        position: absolute;
        top: 30;
        width: 100%;
    }
    #panel4 #btnNav a.next-tab{
        display:none !important;
    }
    .contador{
        float:right;
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
            <li role="presentation" rel="panel3" class="text-center">Problemática</li>
            <li role="presentation" rel="panel4" class="text-center">Solución</li>
            <li role="presentation" rel="panel5" class="text-center">Finalizar</li>
        </ul>

        <div id="panel1" class="panel-registro active">
            <h4 id="bienvenida">Ingresa tu documento de identificación</h4>
            <div class="row">
                <div class="col-md-12 p-0">
                    <div class="form-group">
                        <label>Cédula de Identidad y/o Ciudadanía</label>
                        <i class="fa fa-question-circle ayuda" data-toggle="tooltip" data-placement="right" title="Ingrese su número de cédula de identidad o ciudadanía"></i>
                        <input size="20" type="text" maxlength="10" id = "cedula_ciu" name="cedula_ciu" class="campo-panel1 form-registro" placeholder="Ingrese su número de cédula de identidad y/o ciudadanía" autocomplete="off" <?php echo JS_ONLY_NUMS; ?>/>
                        <div id="cedula_ciu_error" style="display:none;color:red;"></div>
                        <div id="verifica" style="max-height: 80px;"></div>
                    </div>
                    <div>
                      <h3 style="display: inline">Institución</h3>
                      <span class="m-l-10">Identificar la Institución donde realizó el trámite</span>
                    </div>
                    <div class="row">
                        <div class="col-md-6 p-l-0 p-r-15">
                            <div class="form-group">
                                <label>Institución</label>
                                <i class="fa fa-question-circle ayuda" data-toggle="tooltip" data-placement="right" title="Seleccione la institución donde realizó el trámite"></i>
                                <?php institucion("id_institucion", "0"); ?>
                            </div>
                            <div id="pidhijo2"></div>

                            <div class="carl-institucion form-group">
                              <label>Trámite <i class='fa fa-question-circle ayuda' data-toggle='tooltip' data-placement='right' title='Seleccione el trámite realizado'></i> </label>
                              <select disabled class="form-registro" name="">
                                <option value=''>Seleccione un trámite</option>
                              </select>
                            </div>
                            <div class="carl-institucion form-group">
                              <label>Descricipción de otro trámite <i class='fa fa-question-circle ayuda' data-toggle='tooltip' data-placement='right' title='Describa el trámite realizado'></i> </label>
                              <input disabled type="text" class="form-registro">
                            </div>
                        </div>
                        <div class="col-md-6 p-0">
                          <div class="form-group">
                              <label>Provincia</label>
                              <i class="fa fa-question-circle ayuda" data-toggle="tooltip" data-placement="right" title="Seleccione la provincia donde realizó el trámite"></i>
                              <?php provincia("id_provincia", "0") ?>
                          </div>
                          <div id="pidhijo" class="form-group"></div>

                          <div class="carl-provincia form-group">
                            <label>Cantón <i class='fa fa-question-circle ayuda' data-toggle='tooltip' data-placement='right' title='Seleccione el cantón donde realizó el trámite'></i></label>
                            <select class='campo-panel2 form-registro' data-parsley-group='wizard-step-1'>
                              <option>Seleccione un cantón</option>
                            </select>
                          </div>
                          <div id="div-sucursal" class="form-group">
                              <label>Sucursal (Ej. Norte, Sur, etc) <i class="fa fa-question-circle ayuda" data-toggle="tooltip" data-placement="right" title="Indique la sucursal de la institución en la que realizó el trámite"></i></label>
                              <input disabled type="text" id = "unidad_prestadora" name="unidad_prestadora" class="campo-panel1 form-registro " class="form-registro" />
                              <div id='unidad_prestadora_error' style='display:none;'></div>
                          </div>
                        </div>


                    </div>

                </div>
                <div class="row botones_nav"></div>
            </div>
        </div>

        <div id="panel2" class="panel-registro">
            <p>¿Qué problemas tuvo? <i class="fa fa-question-circle ayuda" data-toggle="tooltip" data-placement="right" title="Seleccione uno o varios de los problemas encontrados al momento de realizar el trámite"></i>
            </p>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo problema2() ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo problema3() ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo problema4() ?>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Detalle brevemente su experiencia con el trámite con el Trámite </label>
                        <i class="fa fa-question-circle ayuda" data-toggle="tooltip" data-placement="right" title="Detalle el problema del trámite realizado"></i>
                        <div id="contador_1" class="contador">1500 de 1500 caracteres disponibles</div>
                        <textarea class="campo-panel2 form-registro comment" id = "experiencia" name="experiencia" data="comment_1" rows="4" placeholder="Detalle brevemente su experiencia con el trámite" maxlength="1500"></textarea>
                        <div id="experiencia_error" style="display:none;"></div>

                    </div>
                </div>

            </div>
            <div class="row botones_nav"></div>
        </div>
        <div id="panel3" class="panel-registro">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Título Solución</label>
                        <i class="fa fa-question-circle ayuda" data-toggle="tooltip" data-placement="right" title="De un título a la solución propuesta"></i>
                        <div class="controls">
                            <div id="contador_2" class="contador">100 de 100 caracteres disponibles</div>
                            <input type="text"  id="titulo_solucion" name="titulo_solucion" placeholder="Escriba un título claro y conciso para su propuesta de solución" class="campo-panel3 form-registro comment" data="comment_2" maxlength="100" />
                            <div id="titulo_solucion_error" style="display:none;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Detalle de solución</label>
                        <i class="fa fa-question-circle ayuda" data-toggle="tooltip" data-placement="right" title="Detalle la solución propuesta"></i>
                        <div class="controls">
                            <div id="contador_3" class="contador">1500 de 1500 caracteres disponibles</div>
                            <textarea class="campo-panel3 form-registro comment" id="propuesta_solucion" name="propuesta_solucion" data="comment_3" rows="4" placeholder="Describa de manera clara y detallada su propuesta de solución" maxlength="1500"></textarea>
                            <div id="propuesta_solucion_error" style="display:none;"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" name="insertar_tramite" value="1">
                    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                    <input type="hidden" name="url" value="<?php echo $baseUrl ?>">
                    <input class="campo-panel4" type="checkbox" name="terminos" checked disabled>Acepto los <a href="#">Términos</a> y acepta que ha leído la<a href="#">Política de Datos</a>, incluido el <a href="#">Uso de Cookies</a>
                    <p>Control de Seguridad:</p>
                    <div id="captcha_registro" class="g-recaptcha" data-sitekey="6LepsRITAAAAABcXO7sqylkyiUj8AoHjdY2aVBVQ"></div>
                    <div id="mensaje_captcha" style="display: none;"></div>
                    <?php
                    echo CHtml::ajaxSubmitButton(
                            'Guardar', array('registroCaso'), array(
                        //'update' => '#ejemploAjax4',
                        'beforeSend' => "function(){
                        $('#estados2').removeClass('loadingok');
                        $('#estados2').addClass('loadingprogreso');
                    }",
                        'complete' => "function(){
                        $('#estados2').removeClass('loadingprogreso');
                    }",
                        'success' => "function(data){

                        if (data==0){
                            //alert(data);
                            jQuery('#mensaje_captcha').html('No ha ingresado el captcha');
                            jQuery('#mensaje_captcha').show();
                        }else{
                            jQuery('#mensaje_captcha').hide();
                            jQuery('.next-tab')[2].click();
                            jQuery('#btnNav').hide();
                            jQuery('#msgValidacion').html(data);

                        }

                    }",
                        'error' => "function(){
                          // alert('error');
                        $('#estados2').addClass('loadingerror');
                        $('#msgValidacion').html('ocurrio un error al recuperar datos');

                    }",
                            ), array('class' => 'btn-publicar', 'id' => 'btnPublicarCaso')
                    );
                    ?>
                </div>
            </div>
            <div id="btnNav" class="row botones_nav"></div>

        </div>
        <div id="panel4" class="panel-registro">
            <h3 align="center" id="gracias"></h3>
            <h5 align="center" id="msgValidacion"></h5>

        </div>

    </div>

</form>
<script src="<?php echo Yii::app()->baseUrl; ?>/themes/tramiton/assets/js/form-caso.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
