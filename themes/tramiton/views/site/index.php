<?php
$baseUrl = Yii::app()->theme->baseUrl;
?>




<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog modal-dialog-center">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="font-size: 150%;" aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Bienvenido a Tramitón</h3>
      </div>
      <div class="modal-body">
        <p><h5>Elija si desea acceder al Tramitón Ciudadano o al Tramitón Productivo</h5></p>
        <div class="row">
            <div class="col-xs-6" id="col-logo-2">
                <a href="#"><img id="logo-ciudadano" class="center-block" src="<?php echo $baseUrl . '/images/logo-tramiton-ciudadano.png' ; ?>" alt="Tramitón" width="180" onclick="closeModal();"></a>
                <p class="text-center p-r-5 p-l-5 p-t-5">¿Conoces de trámites o servicios públicos complicados o ineficientes?</p>
            </div>
            <div class="col-xs-6" id="col-logo-1">
                <a href="http://productivo.tramiton.to"><img id="logo-productivo" class="center-block" src="<?php echo $baseUrl . '/images/logo-tramiton-productivo.png' ; ?>" alt="Tramitón productivo" width="180"></a>
                <p class="text-center p-r-5 p-l-5 p-t-5">¿Conoces de trámites o servicios públicos complicados o ineficientes que impactan en el sector productivo?</p>
            </div>


        </div>
      </div>
      <div class="modal-footer">
        <p><h6>Toda la información registrada en este portal será confidencial</h6></p>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="home" class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="text-center">Registra tu caso</h2>
            <?php
            $this->renderPartial('form_caso', true, false);
            ?>
        </div>

        <!-- <div class="col-md-5 col-md-pull-7">
            <div id="row-buttons" class="row">
                <h2 class="text-center">¿Cómo registrar tu caso?</h2>

                <div id="col-ciudadano" class="col-sm-4">
                    <a id="button-ciudadano" class="btn btn-primary boton-ciu center-block" href="#!" role="button">Ciudadano</a>
                </div>

                <div id="col-organizacion" class="col-sm-4">
                    <a id="button-organizacion" class="btn btn-warning boton-org center-block" href="#!" role="button">Organización</a>
                </div>

                <div id="col-servidor-publico" class="col-sm-4">
                    <a id="button-servidor-publico" class="btn btn-success boton-ser center-block" href="#!" role="button">Servidor Público</a>
                </div>

                <div style="display:none;" id="col-otro" class="col-sm-6">
                    <a id="button-otro" class="btn btn-primary boton-otro" href="#" role="button">Otro</a>
                </div>
            </div>

            <div id="row-arrows" class="row">
            </div>
            <div id="row-triangulos" class="row">
                <div id="col-triangulo-ciudadano" class="col-xs-4">
                    <img class="center-block" src="<?php echo $baseUrl; ?>/assets/img/triangulo_ciudadano.png" alt="arrow">
                </div>
                <div id="col-triangulo-organizacion" class="col-xs-4" style="display:none;">
                    <img class="center-block" src="<?php echo $baseUrl; ?>/assets/img/triangulo_organizacion.png" alt="arrow">
                </div>
                <div id="col-triangulo-servidor" class="col-xs-4" style="display:none;">
                    <img class="center-block" src="<?php echo $baseUrl; ?>/assets/img/triangulo_servidor.png" alt="arrow">
                </div>
            </div>

            <div id="row-img-ciudadano" class="row">
                <div class="col-xs-4"><span><img class="img-responsive center-block" src="<?php echo $baseUrl; ?>/assets/img/ciudadano_1.png" alt="Home" /></span></div>
                <div class="col-xs-4"><span><img class="img-responsive center-block" src="<?php echo $baseUrl; ?>/assets/img/ciudadano_2.png" alt="Home" /></span></div>
                <div class="col-xs-4"><span><img class="img-responsive center-block" src="<?php echo $baseUrl; ?>/assets/img/ciudadano_3.png" alt="Home" /></span></div>
            </div>
            <div id="row-vid-ciudadano" class="row">
                <div class="col-xs-12" style="padding-bottom: 10px;">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.youtube.com/embed/XXPq4UQXgBY" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <div id="row-img-organizacion" class="row" style="display: none;">
                <div class="col-xs-4"><span><img class="img-responsive center-block" src="<?php echo $baseUrl; ?>/assets/img/organizacion_1.png" alt="Home" /></span></div>
                <div class="col-xs-4"><span><img class="img-responsive center-block" src="<?php echo $baseUrl; ?>/assets/img/organizacion_2.png" alt="Home" /></span></div>
                <div class="col-xs-4"><span><img class="img-responsive center-block" src="<?php echo $baseUrl; ?>/assets/img/organizacion_3.png" alt="Home" /></span></div>
            </div>

            <div id="row-vid-organizacion" class="row" style="display: none;">
                <div class="col-xs-12" style="padding-bottom: 10px;">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.youtube.com/embed/XXPq4UQXgBY" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <div id="row-img-servidor" class="row" style="display: none;">
                <div class="col-xs-4"><span><img class="img-responsive center-block" src="<?php echo $baseUrl; ?>/assets/img/servidor_1.png" alt="Home" /></span></div>
                <div class="col-xs-4"><span><img class="img-responsive center-block" src="<?php echo $baseUrl; ?>/assets/img/servidor_2.png" alt="Home" /></span></div>
                <div class="col-xs-4"><span><a href="http://tramiton.to/interno" target="-blank"><img class="img-responsive center-block" src="<?php echo $baseUrl; ?>/assets/img/servidor_3.png" alt="Home" /></a></span></div>
            </div>
            <div id="row-vid-servidor" class="row" style="display: none;">
                <div class="col-xs-12" style="padding-bottom: 10px;">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.youtube.com/embed/XXPq4UQXgBY" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

        </div> -->
    </div>
</div>

<!-- begin #participa -->
<!-- <div class="container"></div>
<div id="que_es_tramiton" class="container" style="height: 616px;">
    <iframe style="border: none;" height="100%" width="100%" scrolling="no" src="<?php //echo (Yii::app()->theme->baseUrl . '/views/site/que_es_tramiton.php'); ?>"></iframe>
</div> -->
<!-- end participa -->

<div id="que_es_tramiton_1" class="container-fluid" style="background:blue; height: 600px;">
</div>
<style media="screen">
  #que_es_tramiton_1{
    background-image: url("<?php echo $baseUrl; ?>/assets/img/que_es_tramiton_1.png");
    background-repeat: no-repeat;
    background-position: center;

    background-color: blue;

    max-height: 900px;
    max-width: 1800px;
    overflow: auto;
  }
</style>


<!-- begin #milestone -->
<!-- <div id="estadisticas" class="content has-bg" data-scrollview="true" > -->
<div id="estadisticas" class="container" style="background: green;">
    <!-- begin row -->
    <div class="row">
        <div class="col-sm-4 milestone-col">
            <div class="milestone">
                <div class="number contentAnimated" data-animation="true" data-animation-type="number" data-final-number="<?php echo $estadisticas['totalParticipantes']?>"><?php echo $estadisticas['totalParticipantes']?></div>
                <div class="title">Total Participantes</div>
            </div>
        </div>
        <!-- end col-3 -->
        <div class="col-sm-4 milestone-col">
            <div class="milestone">
                <div class="number contentAnimated" data-animation="true" data-animation-type="number" data-final-number="<?php echo $estadisticas['totalTramites']?>"><?php echo $estadisticas['totalTramites']?></div>
                <div class="title">Soluciones Registradas</div>
            </div>
        </div>
        <!-- begin col-3 -->
        <div class="col-sm-4 milestone-col">
            <div class="milestone no-border">
                <div class="number contentAnimated" data-animation="true" data-animation-type="number" data-final-number="<?php echo $estadisticas['totalAcciones']?>"><?php echo $estadisticas['totalAcciones']?></div>
                <div class="title">Trámites con planes de mejora</div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <!-- <div class="col-sm-3 milestone-col">
            <div class="milestone">
                <div class="number contentAnimated" data-animation="true" data-animation-type="number" data-final-number="25">25</div>
                <div class="title">Trámites mejorados</div>
            </div>
        </div> -->
        <!-- end col-3 -->

    </div>
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12">

            <h2 style="color:#325972;" class="text-center titulo-estadistica">INSTITUCIONES CON MÁS ACCIONES CORRECTIVAS</h2>

        </div>
        <?php
       $nombreac="serie1";
       $nombreac2="serie2";
       $nombreac3="serie3";
       $nombreac4="serie4";
       $nombreac5="serie5";
       $nombreac6="serie6";
       $nombreac7="serie7";
       $nombreac8="serie8";
       $nombreac9="serie9";
       $nombreac10="serie10";

       $nacc=1;
       $i=1;

       foreach ($totalAccionesnom as $nacc) {

            if($i==1)
            {
            $p5 = $nacc['total']+0;
            $name= $nacc['nombre'];
            $nombreac=array('name' => $name, 'data' => array($p5));

            }

            if($i==2)
            {
            $p5 = $nacc['total']+0;
            $name= $nacc['nombre'];
            $nombreac2=array('name' => $name, 'data' => array($p5));

            }
            //$i++;

            if($i==3)
            {
            $p5 = $nacc['total']+0;
            $name= $nacc['nombre'];
            $nombreac3=array('name' => $name, 'data' => array($p5));

            }
            if($i==4)
            {
            $p5 = $nacc['total']+0;
            $name= $nacc['nombre'];
            $nombreac4=array('name' => $name, 'data' => array($p5));

            }
            if($i==5)
            {
            $p5 = $nacc['total']+0;
            $name= $nacc['nombre'];
            $nombreac5=array('name' => $name, 'data' => array($p5));

            }
            if($i==6)
            {
            $p5 = $nacc['total']+0;
            $name= $nacc['nombre'];
            $nombreac6=array('name' => $name, 'data' => array($p5));

            }

            if($i==7)
            {
            $p5 = $nacc['total']+0;
            $name= $nacc['nombre'];
            $nombreac7=array('name' => $name, 'data' => array($p5));

            }

            if($i==8)
            {
            $p5 = $nacc['total']+0;
            $name= $nacc['nombre'];
            $nombreac8=array('name' => $name, 'data' => array($p5));

            }

            if($i==9)
            {
            $p5 = $nacc['total']+0;
            $name= $nacc['nombre'];
            $nombreac9=array('name' => $name, 'data' => array($p5));

            }

            if($i==10)
            {
            $p5 = $nacc['total']+0;
            $name= $nacc['nombre'];
            $nombreac10=array('name' => $name, 'data' => array($p5));

            }
            $i++;

        }

        $this->Widget('ext.highcharts.HighchartsWidget', array(
            'options' => array(
                'chart' => array(
                        'plotBackgroundColor' => '#ffffff',
                        'plotBorderWidth' => null,
                        'plotShadow' => false,
                        'height' => 400,
                        'type'=>'column'
                      ),




                'credits' => array('enabled' => false),
                'title' => array('text' => ''),
                'xAxis' => array(
                    'categories' => array('INSTITUCIONES')
                ),
                'yAxis' => array(
                    'title' => array('text' => 'ACCIONES CORRECTIVAS')
                ),


              //'series'  = $accion;

                'series' => array(


                    $nombreac,$nombreac2,$nombreac3,$nombreac4,$nombreac5,
                    $nombreac6,$nombreac7,$nombreac8,$nombreac9,$nombreac10

                    //array('name' => 'Renovacion Matricula Caducidad', 'data' => array(100)),
                    //array('name' => 'Renovacion cédula', 'data' => array(88)),
                    //array('name' => 'Papeleta votación', 'data' => array(70)),
                    //array('name' => 'Certificado de defunción', 'data' => array(60)),
                    //array('name' => 'Permiso de operación vehicular', 'data' => array(55)),
                    //array('name' => 'Préstamos Hipotecarios', 'data' => array(45)),
                    //array('name' => 'Citas médicas', 'data' => array(35)),
                    //array('name' => 'Certificado de antescedentes policiales', 'data' => array(20)),
                    //array('name' => 'Permiso de salida del país', 'data' => array(10)),
                    //array('name' => 'Préstamos Quirografarios', 'data' => array(25)),
                    //array('name' => $name, 'data' => array($p5))

                    )
            )
        ));


        ?>
    </div>
    <!-- end row -->
</div>
<!-- end #milestone -->


<div id="noticias" class="container" style="background-color: cyan;">
  <div class="row">
    <div class="col-xs-12 text-right">
      <a class="twitter-timeline" href="https://twitter.com/TramitonEC" data-widget-id="705865349623881729">Tweets por el @TramitonEC.</a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
  </div>
</div>





<!--beign #preguntas frecuentes -->
<!-- <div id = "preguntas" class = "content has-bg" data-scrollview = "true" > -->
<div id = "preguntas" class="container" style="background: brown;" >
    <!-- <h2 class="content-title titulos">PREGUNTAS FRECUENTES</h2> -->

    <!--begin panel -->
    <div class = "panel panel-inverse">
        <div class = "panel-heading">
            <h2 class = "panel-title">
                <a data-toggle = "collapse" href = "#faq-2">PREGUNTAS FRECUENTES</a>
            </h2>
        </div>
        <div id = "faq-2" class = "panel-collapse collapse">
            <div class = "panel-body">

                <!-- begin pregunta -->
                <div class="row">
                    <div class="col-xs-12 col-sm-9">
                        <p class="pregunta">¿Qué institución lidera el proyecto Tramitón?</p>
                        <br>
                        <p class="respuesta">
                            La Secretaría Nacional de la Administración Pública en el marco de sus competencias y como órgano rector para el mejoramiento de la
                            eficiencia de las entidades de la Administración Pública Central, Institucional y dependiente de la Función Ejecutiva, a través de políticas y procesos
                            que optimicen la calidad, calidez y la transparencia del Servicio Público, bajo el liderazgo de la Dirección Nacional de Innovación trabaja en la
                            organización y ejecución de la convocatoria al concurso denominado “Tramitón”, el mismo que busca fomentar la participación ciudadana para estimular la
                            generación de ideas que propongan soluciones creativas, innovadoras y viables a los trámites actuales del servicio público a nivel nacional y que requieren ser mejorados.
                            Para dicho efecto, la ciudadanía podrá acceder a un formulario en línea para registro, postulación y propuesta de solución al peor trámite.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <img class="center-block img-responsive" src="<?php echo $baseUrl; ?>/assets/img/logo_snap.png">
                    </div>
                </div>
                <!-- end pregunta -->
                <div class='linea'></div>

                <!-- begin pregunta -->
                <div class="row">
                    <div class="col-xs-12 col-sm-9 col-sm-push-3">
                        <p class="pregunta text-right">¿Cuál es el beneficio que genera Tramitón?</p>
                        <br>
                        <p class="respuesta text-right">
                            De acuerdo al artículo 227 de la Constitución, la Administración Pública constituye un servicio a la colectividad que se rige por los principios de eficacia, eficiencia, calidad, jerarquía, desconcentración, descentralización, coordinación, participación, planificación, transparencia y evaluación. Así también el Estado ecuatoriano requiere implantar procesos de investigación formal para el mejoramiento e innovación de los servicios públicos para la generación de mayor valor agregado en la atención a los usuarios. Es así, que se establece la convocatoria al concurso nacional “Tramitón”, para fomentar la participación e involucramiento de las y los ciudadanos con la identificación de aquellos trámites susceptibles de mejora y propuestas innovadoras que logren mejorar la eficiencia de la gestión y uso de recursos del Estado.
                        </p>
                        <p class="respuesta text-right">
                            Por esta razón la gestión pública procura la disminución progresiva y simplificación de trámites para acceder a servicios eficientes, transparentes y de calidad.
                        </p>
                        <p class="respuesta text-right">
                            Al facilitar los trámites se facilita la interacción entre los usuarios y las Instituciones Públicas lo cual es un factor clave para el fomento de innovación abierta en servicios.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-sm-pull-9">
                        <img class="center-block img-responsive" src="<?php echo $baseUrl; ?>/images/preguntas/grupo.png">
                    </div>
                </div>
                <!-- end pregunta -->
                <div class='linea'></div>

                <!-- begin pregunta -->
                <div class="row">
                    <div class="col-xs-12 col-sm-9">
                        <p class="pregunta">¿Desde cuándo existe Tramitón? </p>
                        <br>
                        <p class="respuesta">
                            Tramitón fue lanzado a la ciudadanía el 21 de junio de 2014, bajo la figura de Concurso Nacional con convocatoria abierta hasta el 31 de agosto de 2014, con la motivación de entregar premios de Tren Crucero a los ciudadanos con las mejores propuestas de solución para la mejora de trámites de la gestión pública.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <img class="center-block img-responsive" src="<?php echo $baseUrl; ?>/images/preguntas/calendario.png">
                    </div>
                </div>
                <!-- end pregunta -->
                <div class='linea'></div>

                <!-- begin pregunta -->
                <div class="row">
                    <div class="col-xs-12 col-sm-9 col-sm-push-3">
                        <p class="pregunta text-right">¿Los casos y propuestas de solución pueden registrarse continuamente?</p>
                        <br>
                        <p class="respuesta text-right">
                            Si, los ciudadanos pueden continuar registrando sus casos y experiencias.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-sm-pull-9">
                        <img class="center-block img-responsive" src="<?php echo $baseUrl; ?>/images/preguntas/lista.png">
                    </div>
                </div>
                <!-- end pregunta -->
                <div class='linea'></div>

                <!-- begin pregunta -->
                <div class="row">
                    <div class="col-xs-12 col-sm-9">
                        <p class="pregunta">¿Cómo un ciudadano puede exponer su criterio sobre un trámite?</p>
                        <br>
                        <p class="respuesta">
                            El Tramitón es su primer convocatoria lo hizo bajo figura de un concurso, sin embargo, una vez concluida la misma, continua abierta la plataforma para el acceso a la ciudadanía, con el fin de continuar con la interacción con los usuarios ya que genera información importante para el seguimiento con respecto a los planes de acción para el mejoramiento de los trámites y posterior análisis de datos y planteamiento de propuestas para la innovación de los servicios.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <img class="center-block img-responsive" src="<?php echo $baseUrl; ?>/images/preguntas/hojas.png">
                    </div>
                </div>
                <!-- end pregunta -->
                <div class='linea'></div>

                <!-- begin pregunta -->
                <div class="row">
                    <div class="col-xs-12 col-sm-9 col-sm-push-3">
                        <p class="pregunta text right">¿Cómo funciona Tramitón?</p>
                        <br>
                        <p class="respuesta text-right">
                            Los ciudadanos pueden ingresar a la plataforma y describir un caso en el uso de un servicio público, lo califica y propone una solución. El análisis a dicha participación se realiza en función de los componentes del servicio, pertinencia del caso, factibilidad de implementación y coherencia en la descripción del caso y propuesta de la solución.
                        </p>
                        <p class="respuesta text-right">
                            Adicionalmente un equipo técnico se encarga de contactar a las instituciones que han sido mencionadas en el Tramitón para buscar que se atiendan a todos los casos y se desarrollen acciones globales de solución. En base a la información entregada por los ciudadanos, las instituciones desarrollan planes de mejora con acciones en el corto mediano plazo para mejorar el servicio público. El objetivo es llegar a una estrategia de mejoramiento e innovación de los servicios de forma participativa y colaborativa, siempre con el fin de favorecer la calidad y calidez de los servicios público. Las herramientas TIC son el apoyo informático con el cual contamos, así que en todos los casos en los que se requiera y sea posible aplicarlas se buscará hacerlo.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-sm-pull-9">
                        <img class="center-block img-responsive" src="<?php echo $baseUrl; ?>/images/preguntas/web.png">
                    </div>
                </div>
                <!-- end pregunta -->
                <div class='linea'></div>

                <!-- begin pregunta -->
                <div class="row">
                    <div class="col-xs-12 col-sm-9">
                        <p class="pregunta">¿Quiénes pueden registrarse?</p>
                        <br>
                        <p class="respuesta">
                            Podrán registrarse en Tramitón ciudadanos Ecuatorianos o extranjeros residentes en Ecuador que cumplan con los siguientes requisitos:
                            <ul>
                                <li class="respuesta">Ser mayor de 16 años de edad</li>
                                <li class="respuesta">Contar con cédula de identidad</li>
                            </ul>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <img class="center-block img-responsive" src="<?php echo $baseUrl; ?>/images/preguntas/cedula.png">
                    </div>
                </div>
                <!-- end pregunta -->
                <div class='linea'></div>

                <!-- begin pregunta -->
                <div class="row">
                    <div class="col-xs-12 col-sm-9 col-sm-push-3">
                        <p class="pregunta text-right">¿Es pública toda la información registrada en Tramitón?</p>
                        <br>
                        <p class="respuesta text-right">
                            Todos los datos registrados en Tramitón (datos personales y de experiencia con el trámite), serán de uso exclusivo de la Secretaría Nacional de la Administración Pública – SNAP. El ciudadano(a) el momento de su registro, podrá seleccionar si desea hacer públicos sus datos (información personal, sociodemográfica y de contacto) o mantenerlos en privado. En caso de hacer públicos sus datos, la(s) institución(es) relacionadas en su propuesta de solución podrán contactarlo de manera directa para gestionar su caso, según aplique y la institución considere pertinente. En ningún caso dichos datos, serán publicados en la Plataforma Tramitón o demás portales web de la Administración Publica Central y Dependiente de la Función Ejecutiva.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-sm-pull-9">
                        <img class="center-block img-responsive" src="<?php echo $baseUrl; ?>/images/preguntas/candado.png">
                    </div>
                </div>
                <!-- end pregunta -->
            </div>
        </div>
    <!--end panel -->
</div>
<!--end #preguntas frecuentes -->

</div>

<!--Modal login -->
<div class = "modal fade" id = "login-modal">
    <div class = "modal-dialog snap_modal_contenedor">
        <div class = "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">×</button>
                <h4 class = "modal-title">Ingrese al sistema</h4>
            </div>
            <div class = "modal-body">
                <?php $this->renderPartial('_form_login', array('model_login' => $model_login))
                ?>
            </div>

        </div>
    </div>
</div>
