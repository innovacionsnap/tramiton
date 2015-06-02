<?php
//var_dump($model);
?>

<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->

<!-- begin FAQs -->
<div class="content" data-scrollview="true">
    <!-- begin container -->
    <br><br><br>
    <div class="container" data-animation="true" data-animation-type="fadeInDown">
        <h2 class="content-title content-titlewizard">Registro de Trámites Engorrosos</h2>

        <div class="panel-body">
            <form action="/" method="POST">
                <div id="wizard">
                    <ol>
                        <li>
                            Datos Personales 
                            <small>Verifica y Completa tus Datos Personales.</small>
                        </li>
                        <li>
                            Detalles del Trámite
                            <small>Indica el Trámite y porqúe es engorroso.</small>
                        </li>
                        <li>
                            Solución
                            <small>¿Cómo solucionarias este trámite?.</small>
                        </li>
                        <li>
                            Gracias!
                            <small>Gracias por Participar!.</small>
                        </li>
                    </ol>
                    <!-- begin wizard step-1 -->
                    <?php 
                    
                    if(!isset($model->nombre_ciudadano)){
                        $this->redirect($this->createUrl('site/index'));
                    }
                    
                    ?>
                    
                    
                    <div>
                        <fieldset>
                            <legend class="pull-left width-full">Datos Personales </legend>
                            <!-- begin row -->
                            <div class="row">
                                <!-- begin col-4 -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nombres Completos</label>
                                        <input type="text" value="<?php echo $model->nombre_ciudadano; ?>" name="firstname" placeholder="" class="form-control"  readonly />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                                <!-- begin col-4 -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Dirección de Domicilio</label>
                                        <input type="text" value="<?php echo $model->direccion_ciudadano; ?>"  name="middle" placeholder="" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                                <!-- begin col-4 -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Correo Electrónico</label>
                                        <input type="text" name="lastname" placeholder="Smith" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                            </div>
                            <div class="row">
                                <!-- begin col-4 -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input type="text" name="firstname" placeholder="" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                                <!-- begin col-4 -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Celular</label>
                                        <input type="text" name="middle" placeholder="" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                                <!-- begin col-4 -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Provincia</label>
                                        <input type="text" name="lastname" placeholder="Smith" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                                <!-- begin col-4 -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Cantón</label>
                                        <input type="text" name="lastname" placeholder="Smith" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                            </div>
                            <!-- end row -->
                        </fieldset>
                    </div>
                    <!-- end wizard step-1 -->
                    <!-- begin wizard step-2 -->
                    <div>
                        <fieldset>
                            <legend class="pull-left width-full">Detalles del Trámite</legend>
                            <!-- begin row -->
                            <div class="row">
                                <!-- begin col-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Institución</label>
                                        <input type="text" name="phone" placeholder="" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-6 -->
                                <!-- begin col-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre del Trámite</label>
                                        <input type="text" name="email" placeholder="" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-6 -->
                            </div>
                            <!-- end row -->
                            <!-- begin row -->
                            <div class="row">
                                <!-- begin col-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Unidad Prestadora del Servicio</label>
                                        <input type="text" name="phone" placeholder="" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-6 -->
                                <!-- begin col-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sector de la Institución</label>
                                        <input type="text" name="email" placeholder="" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-6 -->
                            </div>
                            <!-- end row -->
                            <!-- begin row -->
                            <div class="row">
                                <!-- begin col-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Provincia </label>
                                        <input type="text" name="phone" placeholder="" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-6 -->
                                <!-- begin col-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cantón</label>
                                        <input type="text" name="email" placeholder="" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-6 -->
                            </div>
                            <!-- end row -->
                            <div class="row">
                                <!-- begin col-6 -->
                                <div class="col-md-12">

                                    <br>
                                    <label>Seleccione uno o varios de los problemas encontrados al momento de realizar el trámite.</label>
                                    <br>
                                    <div id="main_checkboxes_snap" class="col-sm-6 col-xs-12 column">
                                        <div id="chk_problema_1_div" class="checkbox">
                                            <input type="checkbox" value="1" name="chk_problema_1" id="chk_problema_1" class="chk_snap_1">
                                            <label class="lbl_chk_snap_1" for="chk_problema_1">Mala atención<div id="lbl_div_chk_snap_1" class=""></div></label>
                                        </div>
                                        <div id="chk_problema_2_div" class="checkbox">
                                            <input type="checkbox" value="5" name="chk_problema_2" id="chk_problema_2" class="chk_snap_1">
                                            <label class="lbl_chk_snap_1" for="chk_problema_2">Falta de información<div id="lbl_div_chk_snap_2" class=""></div></label>
                                        </div>
                                        <div id="chk_problema_3_div" class="checkbox">
                                            <input type="checkbox" value="9" name="chk_problema_3" id="chk_problema_3" class="chk_snap_1">
                                            <label class="lbl_chk_snap_1" for="chk_problema_3">Herramientas informáticas<div id="lbl_div_chk_snap_3" class=""></div></label>
                                        </div>
                                        <div id="chk_problema_4_div" class="checkbox">
                                            <input type="checkbox" value="13" name="chk_problema_4" id="chk_problema_4" class="chk_snap_1">
                                            <label class="lbl_chk_snap_1" for="chk_problema_4">Tiempo de duración<div id="lbl_div_chk_snap_4" class=""></div></label>
                                        </div>
                                        <div id="chk_problema_5_div" class="checkbox">
                                            <input type="checkbox" value="18" name="chk_problema_5" id="chk_problema_5" class="chk_snap_1">
                                            <label class="lbl_chk_snap_1" for="chk_problema_5" style="margin-bottom:5px;">Falta de coordinación entre instituciones<div id="lbl_div_chk_snap_5" class=""></div></label>
                                        </div>
                                        <div id="chk_problema_6_div" class="checkbox">
                                            <input type="checkbox" value="21" name="chk_problema_6" id="chk_problema_6" class="chk_snap_1">
                                            <label class="lbl_chk_snap_1" for="chk_problema_6">Instalaciones en mal estado<div id="lbl_div_chk_snap_6" class=""></div></label>
                                        </div>
                                        <div id="chk_problema_7_div" class="checkbox">
                                            <input type="checkbox" value="28" name="chk_problema_7" id="chk_problema_7" class="chk_snap_1">
                                            <label class="lbl_chk_snap_1" for="chk_problema_7">Alto costo<div id="lbl_div_chk_snap_7" class=""></div></label>
                                        </div>
                                        <div id="chk_problema_8_div" class="checkbox">
                                            <input type="checkbox" value="32" name="chk_problema_8" id="chk_problema_8" class="chk_snap_1">
                                            <label class="lbl_chk_snap_1" for="chk_problema_8">Falta de recursos en la institución<div id="lbl_div_chk_snap_8" class=""></div></label>
                                        </div>
                                        <div id="chk_problema_9_div" class="checkbox">
                                            <input type="checkbox" value="36" name="chk_problema_9" id="chk_problema_9" class="chk_snap_1">
                                            <label class="lbl_chk_snap_1" for="chk_problema_9">Corrupción<div id="lbl_div_chk_snap_9" class=""></div></label>
                                        </div>
                                        <div id="chk_problema_10_div" class="checkbox">
                                            <input type="checkbox" value="41" name="chk_problema_10" id="chk_problema_10" class="chk_snap_1">
                                            <label class="lbl_chk_snap_1" for="chk_problema_10">Otros<div id="lbl_div_chk_snap_10" class=""></div></label>
                                        </div>
                                    </div>

                                </div>
                                <!-- end col-6 -->
                            </div>
                            <div class="row">
                                <!-- begin col-4 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Experiencia</label>
                                        <div class="controls">
                                            <textarea id="solucion" name="solucion" class="form-control input-sm error" placeholder="Escriba aquí" rows="8"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col-4 -->
                            </div>
                            <!-- end row -->
                        </fieldset>
                    </div>
                    <!-- end wizard step-2 -->
                    <!-- begin wizard step-3 -->
                    <div>
                        <fieldset>
                            <legend class="pull-left width-full">Solución</legend>
                            <!-- begin row -->
                            <div class="row">
                                <!-- begin col-4 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Título de su solución</label>
                                        <input type="text" name="phone" placeholder="" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                            </div>
                            <div class="row">
                                <!-- begin col-4 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Propuesta de solución</label>
                                        <div class="controls">
                                            <textarea id="solucion" name="solucion" class="form-control input-sm error" placeholder="Escriba aquí" rows="8"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col-4 -->
                            </div>
                            <!-- end row -->
                        </fieldset>
                    </div>
                    <!-- end wizard step-3 -->
                    <!-- begin wizard step-4 -->
                    <div>
                        <div class="jumbotron m-b-0 text-center">
                            <h1>Gracias por Participar!</h1>
                            <p>Te ha llegado un correo confirmando tu participación!<br>Recuerda que puedes tambien dar Likes a otros trámites engorrosos registrados en la plataforma!</p>
                            <p><a class="btn btn-success btn-lg" role="button">Ingresar Más Trámites Engorrosos!</a></p>
                        </div>
                    </div>
                    <!-- end wizard step-4 -->
                </div>
            </form>
        </div>				

    </div>
    <!-- end container -->
</div>
<!-- end FAQs -->

<!-- ================== BEGIN BASE JS ================== -->
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/plugins/bootstrap/js/bootstrap.min.js', CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/plugins/slimscroll/jquery.slimscroll.min.js', CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/plugins/bootstrap-wizard/js/bwizard.js', CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/js/form-wizards.demo.js', CClientScript::POS_END); ?>
<!-- ================== END BASE JS ================== -->

<script>
    $(document).ready(function () {
        FormWizard.init();
    });
</script>
