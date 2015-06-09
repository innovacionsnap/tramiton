<!-- begin #about -->
<div id="about" class="content" data-scrollview="true">
    <!-- begin container -->
    <div class="container" data-animation="true" data-animation-type="fadeInDown">
        <div class="content-title"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo_1.png" /></div>
        <p class="content-desc">
            ¿CUÁLES CREES QUE SON LOS <b>TRÁMITES <br> MÁS ABSURDOS</b> DEL SECTOR PÚBLICO? <b>CUÉNTANOS!</b>
        </p>
        <?php
        $form = $this->beginWidget('CActiveForm', array
            (
            'method' => 'POST',
            'action' => Yii::app()->createUrl('site/validaCedula'),
            'enableClientValidation' => true,
            'enableAjaxValidation'=>true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'validateOnType' => true,
            ),
        ));
        ?>
        <div class="row home-participar">
            <div class="col-md-3 col-sm-3 col-centered">
                <?php //echo $msg1; 
                    if(isset($msg1)):  ?>
                <div class="alert alert-danger fade in m-b-15">
                    <strong>¡Atención!</strong>
                    <?php echo $msg1; ?>
                    <span class="close" data-dismiss="alert">&times;</span>
                </div>
                <?php endif; ?>
                <?php //echo $form->labelEx($model, 'cedula_participacion'); ?>
                <?php echo $form->textField($model, 'cedula_participacion', array("class" => "form-control input-home-tramiton", "placeholder" => "Ingrese su Cédula", "data-parsley-required" => "true" )); ?>
                <?php echo $form->error($model, 'cedula_participacion'); ?>
                <?php
                echo CHtml::submitButton('Ingresa tu Trámite Absurdo', array("class" => "btn btn-sm btn-success"));
                ?>
            </div>
        </div>

        <?php $this->endWidget(); ?>

        <br /><br />

        <!-- begin row -->
        <div class="row">
            <!-- begin col-4 -->
            <div class="col-md-4 col-sm-6">
                <!-- begin about -->
                <div class="about">
                    <h3><b>Seguimiento de Trámites</b></h3>
                    <div class="info_home_panel">

                        <?php $this->renderPartial('_form_login', array('model_login'=>$model_login)); ?>

                        <div class="login-or">
                            <hr class="hr-or">
                            <span class="span-or">o</span>
                        </div>

                        <input type="text" class="form-control input-home-tramiton" id="exampleInputEmail1" placeholder="Cédula" />
                        <button type="submit" class="btn btn-sm btn-primary">Crea una Cuenta</button>


                    </div>
                </div>
                <!-- end about -->
            </div>
            <!-- end col-4 -->
            <!-- begin col-4 -->
            <div class="col-md-8 col-sm-8">
                <!-- begin about -->
                <div class="about">
                    <h3>Los <b>5</b> Peores Trámites</h3>
                    <div class="info_home_panel">

                        <div class="panel-body p-t-0">
                            <table class="table table-valign-middle m-b-0">
                                <thead>
                                    <tr>	
                                        <th>Institución</th>
                                        <th>Menciones</th>
                                        <th>Likes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="title_5_peores_tramites">Ministerio del Trabajo</td>
                                        <td>622<span class="text-success"><i class="fa fa-arrow-up"></i></span></td>
                                        <td><span class="text-success"><i class="fa fa-thumbs-up fa-2x"></i></span></td>
                                    </tr>
                                    <tr>
                                        <td class="title_5_peores_tramites">Instituto Ecuatoriano de Seguridad Social - IESS</td>
                                        <td>612<span class="text-success"><i class="fa fa-arrow-down"></i></span></td>
                                        <td><span class="text-success"><i class="fa fa-thumbs-up fa-2x"></i></span></td>
                                    </tr>
                                    <tr>
                                        <td class="title_5_peores_tramites">Ministerio de Educación - MINEDUC</td>
                                        <td>543</td>
                                        <td><span class="text-success"><i class="fa fa-thumbs-up fa-2x"></i></span></td>
                                    </tr>
                                    <tr>
                                        <td class="title_5_peores_tramites">Dirección General de Registro Civil, Identificación y Cedulación - DGRCIC</td>
                                        <td>471</td>
                                        <td><span class="text-success"><i class="fa fa-thumbs-up fa-2x"></i></span></td>
                                    </tr>
                                    <tr>
                                        <td class="title_5_peores_tramites">Agencia Nacional de Regulación y Control de Transporte Terrestre Tránsito y Seguridad Vial - ANT</td>
                                        <td>423</td>
                                        <td><span class="text-success"><i class="fa fa-thumbs-up fa-2x"></i></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- end about -->
            </div>
            <!-- end col-4 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end #about -->

<!-- begin #milestone -->
<div id="milestone" class="content bg-black-darker has-bg" data-scrollview="true">
    <!-- end content-bg -->
    <!-- begin container -->
    <div class="container">
        <!-- begin row -->
        <div class="row">
            <!-- begin col-3 -->
            <div class="col-md-4 col-sm-4 milestone-col">
                <div class="milestone">
                    <div class="number">7000</div>
                    <div class="title">Total Participaciones</div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-md-4 col-sm-4 milestone-col">
                <div class="milestone">
                    <div class="number">454</div>
                    <div class="title">Trámites con planes de mejora</div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-md-4 col-sm-4 milestone-col">
                <div class="milestone">
                    <div class="number">25</div>
                    <div class="title">Trámites Mejorados</div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- end col-3 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end #milestone -->

<!-- begin FAQs -->
<div class="content bg-silver" data-scrollview="true">
    <!-- begin container -->
    <div class="container" data-animation="true" data-animation-type="fadeInDown">
        <h2 class="content-title">Preguntas Frecuentes</h2>
        <!-- begin panel-group -->
        <div class="panel-group" id="faq">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#faq-1"><i class="fa fa-question-circle fa-fw text-success m-r-5"></i>¿Qué es Tramitón?</a>
                    </h4>
                </div>
                <div id="faq-1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p>
                            Tramitón es un proyecto que busca principalmente fomentar la participación ciudadana a través de una plataforma en la que las y los ciudadanos identifiquen trámites complicados e/o ineficientes, y que presenten propuestas de soluciones para simplificarlos y mejorar el servicio público con la finalidad de impulsar la calidad, eficiencia y calidez en la gestión pública.
                        </p>
                    </div>
                </div>
            </div>
            <!-- end panel -->
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#faq-2"><i class="fa fa-question-circle fa-fw text-success m-r-5"></i>¿Qué objetivo persigue Tramitón?</a>
                    </h4>
                </div>
                <div id="faq-2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ol>
                            <li>Incrementar los mecanismos de participación ciudadana.</li>
                            <li>Afianzar la relación entre ciudadanos y Estado.</li>
                            <li>Mejorar los Servicios Públicos de acuerdo al Plan Nacional del Buen Vivir y principios de eficiencia, calidad y calidez.</li>
                            <li>Ejecutar una campaña comunicacional a nivel nacional para incentivar la participación ciudadana en el mejoramiento de los servicios públicos.</li>
                            <li>Promover el uso de los infocentros y tecnologías de la información y comunicaciones en la presente campaña.</li>
                            <li>Registrar y evaluar la participación ciudadana de acuerdo a sus propuestas.</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end panel -->
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#faq-3"><i class="fa fa-question-circle fa-fw text-success m-r-5"></i>¿Cómo funciona Tramitón?</a>
                    </h4>
                </div>
                <div id="faq-3" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            Los ciudadanos pueden ingresar a la plataforma y describir un caso en el uso de un servicio público, lo califica y propone una solución. El análisis a dicha participación se realiza en función de los componentes del servicio, pertinencia del caso, factibilidad de implementación y coherencia en la descripción del caso y propuesta de la solución. Adicionalmente un equipo técnico se encarga de contactar a las instituciones que han sido mencionadas en el Tramitón para buscar que se atiendan a todos los casos y se desarrollen acciones globales de solución.
                            <br><br>
                            En base a la información entregada por los ciudadanos, las instituciones desarrollan planes de mejora con acciones en el corto mediano plazo para mejorar el servicio público. El objetivo es llegar a una estrategia mejoramiento e innovación de los servicios de forma participativa y colaborativa, siempre con el fin de favorecer la calidad y calidez de los servicios público. Las herramientas TIC son el apoyo informático con el cual contamos, así que en todos los casos en los que se requiera y sea posible aplicarlas se buscará hacerlo.
                        </p>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end panel-group -->
    </div>
    <!-- end container -->
</div>
<!-- end FAQs -->

<!-- Modal login   -->



<div class="modal fade" id="login-modal">
    <div class="modal-dialog snap_modal_contenedor">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Ingrese al sistema</h4>
            </div>
            <div class="modal-body">
                <?php $this->renderPartial('_form_login', array('model_login'=>$model_login)) ?>
            </div>
            
        </div>
    </div>
</div>



