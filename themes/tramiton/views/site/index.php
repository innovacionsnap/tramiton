<?php
$baseUrl = Yii::app()->theme->baseUrl;
?>

<div id="home" class="container-fluid">
    <div class="row">
        <div class="col-md-7 col-md-push-5"> 
            <h2 class="text-center">Registra tu caso</h2>
            <?php
            $this->renderPartial('form_caso', true, false);
            ?>
        </div>

        <div class="col-md-5 col-md-pull-7">
            <div id="row-buttons" class="row">
                <h2 class="text-center">Cómo registrar tu caso</h2>

                <div id="col-ciudadano" class="col-sm-4">
                    <a id="button-ciudadano" class="btn btn-primary boton-ciu center-block" href="#" role="button">Ciudadano</a>
                </div>

                <div id="col-organizacion" class="col-sm-4">
                    <a id="button-organizacion" class="btn btn-warning boton-org center-block" href="#" role="button">Organización</a>
                </div>

                <div id="col-servidor-publico" class="col-sm-4">
                    <a id="button-servidor-publico" class="btn btn-success boton-ser center-block" href="#" role="button">Servidor Público</a>
                </div>

                <div style="display:none;" id="col-otro" class="col-sm-6">
                    <a id="button-otro" class="btn btn-primary boton-otro" href="#" role="button">Otro</a>
                </div>
            </div>

            <div id="row-arrows" class="row">
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
                        <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/yuZs0p4e2xk"></iframe> -->
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
                        <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/yuZs0p4e2xk"></iframe> -->
                    </div>
                </div>
            </div> 

            <div id="row-img-servidor" class="row" style="display: none;">
                <div class="col-xs-4"><span><img class="img-responsive center-block" src="<?php echo $baseUrl; ?>/assets/img/servidor_1.png" alt="Home" /></span></div>
                <div class="col-xs-4"><span><img class="img-responsive center-block" src="<?php echo $baseUrl; ?>/assets/img/servidor_2.png" alt="Home" /></span></div>
                <div class="col-xs-4"><span><img class="img-responsive center-block" src="<?php echo $baseUrl; ?>/assets/img/servidor_3.png" alt="Home" /></span></div>
            </div>
            <div id="row-vid-servidor" class="row" style="display: none;">
                <div class="col-xs-12" style="padding-bottom: 10px;">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.youtube.com/embed/XXPq4UQXgBY" frameborder="0" allowfullscreen></iframe>
                        <!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/yuZs0p4e2xk"></iframe> -->
                    </div>
                </div>
            </div> 
                         
            <!-- <span><?php /*$data=SiteController::validaCedula('1716475015'); var_dump($data);*/?> </span> -->
        </div>
    </div>
</div>

<!-- begin #participa -->
<div class="container"></div>
<!-- <div id="que_es_tramiton" class="container-fluid">
    <div class="row">
        <div class="col-xs-12" id="text_tramiton">
                <h1 id="titulo_tramiton" class="text-center">¿QUÉ ES EL TRAMITÓN?</h1>
                <p id="definicion_tramiton" class="lead text-justify">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen</p>
                <video src="<?php echo $baseUrl ?>/assets/mp4/tramiton.mp4" autoplay loop muted></video>
        </div>
    </div>
</div> -->

<div id="que_es_tramiton" class="container-fluid" style="height: 616px;">
    <iframe style="border: none;" height="100%" width="100%" scrolling="no" src="<?php echo (Yii::app()->theme->baseUrl . '/views/site/que_es_tramiton.php'); ?>"></iframe>
</div>

<!-- end participa -->

<!-- begin #milestone -->
<!-- <div id="estadisticas" class="content has-bg" data-scrollview="true" > -->
<div id="estadisticas" class="container" style="padding-top: 28px;padding-bottom: 28px;">
    <!-- begin row -->
    <div class="row">
        <div class="col-sm-4 milestone-col">
            <div class="milestone">
                <div class="number" data-animation="true" data-animation-type="number" data-final-number="6505">6,505</div>
                <div class="title">Total Participantes</div>
            </div>
        </div>
        <!-- end col-3 -->
        <div class="col-sm-4 milestone-col">
            <div class="milestone">
                <?php 
                echo '<div class="number" data-animation="true" data-animation-type="number" data-final-number="'.$total_soluciones.'">'.$total_soluciones.'</div>'?>
                <div class="title">Soluciones Registradas</div>
            </div>
        </div>
        <!-- begin col-3 -->
        <div class="col-sm-4 milestone-col">
            <div class="milestone">
                <div class="number" data-animation="true" data-animation-type="number" data-final-number="454">454</div>
                <div class="title">Trámites con planes de mejora</div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <!-- <div class="col-sm-3 milestone-col">
            <div class="milestone">
                <div class="number" data-animation="true" data-animation-type="number" data-final-number="25">25</div>
                <div class="title">Trámites mejorados</div>
            </div>
        </div> -->
        <!-- end col-3 -->
        
    </div>
    <!-- begin row -->
    <div class="row">
        <div class="col-md-12">
            
            <h2 style="color:#325972;" class="text-center titulo-estadistica">TRÁMITES MÁS MENCIONADOS</h2>
            
        </div>
        <?php
        $this->Widget('ext.highcharts.HighchartsWidget', array(
            'options' => array(
                'credits' => array('enabled' => false),
                'title' => array('text' => ''),
                'xAxis' => array(
                    'categories' => array('TRÁMITES')
                ),
                'yAxis' => array(
                    'title' => array('text' => 'MENCIONES')
                ),
                'series' => array(
                    array('name' => 'Renovacion Matricula Caducidad', 'data' => array(100)),
                    array('name' => 'Renovacion cédula', 'data' => array(88)),
                    array('name' => 'Papeleta votación', 'data' => array(70)),
                    array('name' => 'Certificado de defunción', 'data' => array(60)),
                    array('name' => 'Permiso de operación vehicular', 'data' => array(55)),
                    array('name' => 'Préstamos Hipotecarios', 'data' => array(45)),
                    array('name' => 'Citas médicas', 'data' => array(35)),
                    array('name' => 'Certificado de antescedentes policiales', 'data' => array(20)),
                    array('name' => 'Permiso de salida del país', 'data' => array(10)),
                    array('name' => 'Préstamos Quirografarios', 'data' => array(5))
                )
            )
        ));
        ?>
    </div>
    <!-- end row -->
</div>
<!-- end #milestone -->


<!-- begin #noticias -->
<div id="noticias" class="content has-bg twitter" data-scrollview="true">

    <?php $twitter = SiteController::getTwitter();
    ?>

    <!-- begin container -->
    <div class="container" data-animation="true" data-animation-type="fadeInUp">
        <h2 class="content-title titulo-twitter">@TramitonEC <i class = "fa fa-twitter-square"></i></h2>
        <hr>
        <!-- begin carousel -->
        <div class="carousel testimonials slide" data-ride="carousel" id="testimonials">
            <!-- begin carousel-inner -->
            <div class="carousel-inner text-center">
                <!-- begin item -->
                <?php
                $len = count($twitter);

                for ($i = 0; $i < $len; $i++) {
                    if (isset($twitter[$i]['retweeted_status'])) {
                        $texto = '@TramitonEC ha retwitteado: ' . $twitter[$i]['text'];
                        $time = date('d M', strtotime($twitter[$i]['retweeted_status']['created_at']));
                    } else {
                        $time = date('d M', strtotime($twitter[$i]['created_at']));
                        $texto = $twitter[$i]['text'];
                    }
                    if (isset($twitter[$i]['entities']['media'])) {
                        $imagen = '<img src="' . $twitter[$i]['entities']['media'][0]['media_url'] . '" width="200px" height="150px">';
                    } else {
                        $imagen = '';
                    }

                    $html = '';
                    if ($i == 0) {
                        $html.='<div class="item active"><div style ="display:inline-flex"><blockquote><i class = "fa fa-quote-left"></i>' . $texto . '<b> ' . $time . '</b>' . $imagen . '</blockquote>';
                    } elseif ($i == 3 or $i == 6 or $i == 9) {
                        $html.='</div></div><div class="item"><div style ="display:inline-flex"><blockquote><i class = "fa fa-quote-left"></i>' . $texto . '<b> ' . $time . '</b>' . $imagen . '</blockquote>';
                    } elseif ($i == 12) {
                        $html.='<blockquote><i class = "fa fa-quote-left"></i>' . $texto . '<b> ' . $time . '</b>' . $imagen . '</blockquote></div></div>';
                    } else {
                        $html.='<blockquote><i class = "fa fa-quote-left"></i>' . $texto . '<b> ' . $time . '</b>' . $imagen . '</blockquote>';
                    }

                    echo $html;
                }
                echo '</div></div>';
                ?>

                <!--end item -->

            </div>
            <!--end carousel-inner -->
            <!--begin carousel-indicators -->
            <ol class = "carousel-indicators">
                <li data-target = "#testimonials" data-slide-to = "0" class = "active"></li>
                <li data-target = "#testimonials" data-slide-to = "1" class = ""></li>
                <li data-target = "#testimonials" data-slide-to = "2" class = ""></li>
                <li data-target = "#testimonials" data-slide-to = "3" class = ""></li>

            </ol>
            <!--end carousel-indicators -->
        </div>
        <!--end carousel -->
    </div>
    <!--end containter -->
</div>
<!--end #noticias -->

<!--beign #preguntas frecuentes -->
<!-- <div id = "preguntas" class = "content has-bg" data-scrollview = "true" > -->
<div id = "preguntas" class="container" style="padding-top: 80px; padding-bottom:10px;" >
    <h2 class = "content-title titulos">PREGUNTAS FRECUENTES</h2>
    <!--begin panel-group -->
    <div class = "panel-group" id = "faq">
        <!--begin panel -->
        <!-- <div class = "panel panel-inverse">
            <div class = "panel-heading">
                <h4 class = "panel-title">
                    <a data-toggle = "collapse" href = "#faq-1"><i class = "fa fa-question-circle fa-fw text-success m-r-5"></i>¿Qué objetivo persigue Tramitón?</a>
                </h4>
            </div>
            <div id = "faq-1" class = "panel-collapse collapse">
                <div class = "panel-body">
                    <p>
                    <li>Incrementar los mecanismos de participación ciudadana.</li>
                    <li>Afianzar la relación entre ciudadanos y Estado.</li>
                    <li>Mejorar los Servicios Públicos de acuerdo al Plan Nacional del Buen Vivir y principios de eficiencia, calidad y calidez.</li>
                    <li>Ejecutar una campaña comunicacional a nivel nacional para incentivar la participación ciudadana en el mejoramiento de los servicios públicos.</li>
                    <li>Promover el uso de los infocentros y tecnologías de la información y comunicaciones en la presente campaña.</li>
                    <li>Registrar y evaluar la participación ciudadana de acuerdo a sus propuestas</li>

                    </p>
                </div>
            </div>
        </div> -->
        <!--end panel -->
        <!--begin panel -->
        <div class = "panel panel-inverse">
            <div class = "panel-heading">
                <h4 class = "panel-title">
                    <a data-toggle = "collapse" href = "#faq-2"><i class = "fa fa-question-circle fa-fw text-success m-r-5"></i>¿Qué institución lidera el proyecto Tramitón?</a>
                </h4>
            </div>
            <div id = "faq-2" class = "panel-collapse collapse">
                <div class = "panel-body">
                    <p>
                        La Secretaría Nacional de la Administración Pública en el marco de sus competencias y como órgano rector para el mejoramiento de la eficiencia de las entidades de la Administración Pública Central, Institucional y dependiente de la Función Ejecutiva, a través de políticas y procesos que optimicen la calidad, calidez y la transparencia del Servicio Público, bajo el liderazgo de la Dirección Nacional de Innovación trabaja en la organización y ejecución de la convocatoria al concurso denominado “Tramitón”, el mismo que busca fomentar la participación ciudadana para estimular la generación de ideas que propongan soluciones creativas, innovadoras y viables a los trámites actuales del servicio público a nivel nacional y que requieren ser mejorados. Para dicho efecto, la ciudadanía podrá acceder a un formulario en línea para registro, postulación y propuesta de solución al peor trámite.
                    </p>
                </div>
            </div>
        </div>
        <!--end panel -->
        <!--begin panel -->
        <div class = "panel panel-inverse">
            <div class = "panel-heading">
                <h4 class = "panel-title">
                    <a data-toggle = "collapse" href = "#faq-3"><i class = "fa fa-question-circle fa-fw text-success m-r-5"></i>¿Cuál es el beneficio que genera Tramitón?</a>
                </h4>
            </div>
            <div id = "faq-3" class = "panel-collapse collapse">
                <div class = "panel-body">
                    <p>
                        De acuerdo al artículo 227 de la Constitución, la Administración Pública constituye un servicio a la colectividad que se rige por los principios de eficacia, eficiencia, calidad, jerarquía, desconcentración, descentralización, coordinación, participación, planificación, transparencia y evaluación. Así también el Estado ecuatoriano requiere implantar procesos de investigación formal para el mejoramiento e innovación de los servicios públicos para la generación de mayor valor agregado en la atención a los usuarios. Es así, que se establece la convocatoria al concurso nacional “Tramitón”, para fomentar la participación e involucramiento de las y los ciudadanos con la identificación de aquellos trámites susceptibles de mejora y propuestas innovadoras que logren mejorar la eficiencia de la gestión y uso de recursos del Estado.
                    </p>
                    <p>
                        Por esta razón la gestión pública procura la disminución progresiva y simplificación de trámites para acceder a servicios eficientes, transparentes y de calidad.
                    </p>
                    <p>
                        Al facilitar los trámites se facilita la interacción entre los usuarios y las Instituciones Públicas lo cual es un factor clave para el fomento de innovación abierta en servicios. 
                    </p>
                </div>
            </div>
        </div>
        <!--end panel -->
        <!--begin panel -->
        <div class = "panel panel-inverse">
            <div class = "panel-heading">
                <h4 class = "panel-title">
                    <a data-toggle = "collapse" href = "#faq-4"><i class = "fa fa-question-circle fa-fw text-success m-r-5"></i>¿Desde cuándo existe Tramitón?</a>
                </h4>
            </div>
            <div id = "faq-4" class = "panel-collapse collapse">
                <div class = "panel-body">
                    <p>
                        Tramitón fue lanzado a la ciudadanía el 21 de junio de 2014, bajo la figura de Concurso Nacional con convocatoria abierta hasta el 31 de agosto de 2104, con la motivación de entregar premios de Tren Crucero a los ciudadanos con las mejores propuestas de solución para la mejora de trámites de la gestión pública.
                    </p>
                </div>
            </div>
        </div>
        <!--end panel -->
        <!--begin panel -->
        <div class = "panel panel-inverse">
            <div class = "panel-heading">
                <h4 class = "panel-title">
                    <a data-toggle = "collapse" href = "#faq-5"><i class = "fa fa-question-circle fa-fw text-success m-r-5"></i>¿Los casos y propuestas de solución pueden registrarse continuamente?</a>
                </h4>
            </div>
            <div id = "faq-5" class = "panel-collapse collapse">
                <div class = "panel-body">
                    <p>
                        Si, los ciudadanos pueden continuar registrando sus casos y experiencias.
                    </p>
                </div>
            </div>
        </div>
        <!--end panel -->
        <!--begin panel -->
        <div class = "panel panel-inverse">
            <div class = "panel-heading">
                <h4 class = "panel-title">
                    <a data-toggle = "collapse" href = "#faq-6"><i class = "fa fa-question-circle fa-fw text-success m-r-5"></i>¿Cómo un ciudadano puede exponer su criterio sobre un trámite?</a>
                </h4>
            </div>
            <div id = "faq-6" class = "panel-collapse collapse">
                <div class = "panel-body">
                    <p>
                        El Tramitón es su primer convocatoria lo hizo bajo figura de un concurso, sin embargo, una vez concluida su la misma, continua abierta la plataforma para el acceso a la ciudadanía, con el fin de continuar con la interacción con los usuarios ya que genera información importante para el seguimiento con respecto a los planes de acción para el mejoramiento de los trámites y posterior análisis de datos y planteamiento de propuestas para la innovación de los servicios.
                    </p>
                </div>
            </div>
        </div>
        <!--end panel -->
        <!--begin panel -->
        <div class = "panel panel-inverse">
            <div class = "panel-heading">
                <h4 class = "panel-title">
                    <a data-toggle = "collapse" href = "#faq-7"><i class = "fa fa-question-circle fa-fw text-success m-r-5"></i>¿Cómo funciona Tramitón?</a>
                </h4>
            </div>
            <div id = "faq-7" class = "panel-collapse collapse">
                <div class = "panel-body">
                    <p>
                        Los ciudadanos pueden ingresar a la plataforma y describir un caso en el uso de un servicio público, lo califica y propone una solución. El análisis a dicha participación se realiza en función de los componentes del servicio, pertinencia del caso, factibilidad de implementación y coherencia en la descripción del caso y propuesta de la solución. Adicionalmente un equipo técnico se encarga de contactar a las instituciones que han sido mencionadas en el Tramitón para buscar que se atiendan a todos los casos y se desarrollen acciones globales de solución.
                    </p>
                    <p>
                        En base a la información entregada por los ciudadanos, las instituciones desarrollan planes de mejora con acciones en el corto mediano plazo para mejorar el servicio público. El objetivo es llegar a una estrategia mejoramiento e innovación de los servicios de forma participativa y colaborativa, siempre con el fin de favorecer la calidad y calidez de los servicios público. Las herramientas TIC son el apoyo informático con el cual contamos, así que en todos los casos en los que se requiera y sea posible aplicarlas se buscará hacerlo.
                    </p>
                </div>
            </div>
        </div>
        <!--end panel -->
        <!--begin panel -->
        <div class = "panel panel-inverse">
            <div class = "panel-heading">
                <h4 class = "panel-title">
                    <a data-toggle = "collapse" href = "#faq-8"><i class = "fa fa-question-circle fa-fw text-success m-r-5"></i>¿Cuáles trámites han logrado ser simplificados?</a>
                </h4>
            </div>
            <div id = "faq-8" class = "panel-collapse collapse">
                <div class = "panel-body">
                    <p>
                        En el Estado Ecuatoriano, el Comité de Simplificación de Trámites creado según lo dispuesto en el Decreto Ejecutivo N° 149 de 20 de noviembre de 2013, entre otras, tiene como función el <em>“impulsar planes, proyectos, programas, metodologías interinstitucionales de simplificación de trámites”</em>. 
                    </p>
                    <p>
                        Es así, que derivado del Proyecto Tramitón se analizó y procesó la base de datos generada. Se consideró además información de otras bases de datos tales como:
                        <ul>
                            <li>Portal de Trámites Ciudadanos – PTC (detalle de trámites a nivel de requisitos y procedimiento);</li>
                            <li>Gobierno por Resultados – GPR (herramienta que contiene información de los Planes Estratégicos y Operativos de las Instituciones; detallando objetivos, estrategias, indicadores y sus metas/resultados, proyectos y procesos para el cliente interno y externo (ciudadano));</li>
                            <li>Tasas y Multas (levantamiento realizado por la Dirección de Servicios de SNAP).</li>
                        </ul>
                    </p>
                    <p>
                        De la unificación de estas cuatro (4) bases de datos (Tramitón, GPR, PTC y Trámites y Multas) permitió que se realizara un análisis de 1934[1] trámites; de los cuales se priorizaron 636[2], mismos que fueron analizados en cada uno de los Comités Sectoriales[3] de la Función Ejecutiva llegando a seleccionar 345[4] trámites que constituyen el Plan Nacional de Simplificación de Trámites de aplicación en el año 2015.
                    </p>
                    <p>
                        La ciudadanía puede consultar el avance de todos los planes de mejora y simplificación de los Trámites del Plan Nacional de Simplificación en el siguiente enlace <a href="http://www.tramiton.to/seguimento">http://www.tramiton.to/seguimento</a>
                    </p>
                </div>
            </div>
        </div>
        <!--end panel -->
        <!--begin panel -->
        <div class = "panel panel-inverse">
            <div class = "panel-heading">
                <h4 class = "panel-title">
                    <a data-toggle = "collapse" href = "#faq-9"><i class = "fa fa-question-circle fa-fw text-success m-r-5"></i>¿Quiénes pueden registrarse?</a>
                </h4>
            </div>
            <div id = "faq-9" class = "panel-collapse collapse">
                <div class = "panel-body">
                    <p>
                        Podrán registrarse en Tramitón ciudadanos Ecuatorianos o extranjeros residentes en Ecuador que cumplan con los siguientes requisitos:
                        <ul>
                            <li>Ser mayor de 16 años de edad</li>
                            <li>Contar con cédula de identidad</li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
        <!--end panel -->
        <!--begin panel -->
        <div class = "panel panel-inverse">
            <div class = "panel-heading">
                <h4 class = "panel-title">
                    <a data-toggle = "collapse" href = "#faq-10"><i class = "fa fa-question-circle fa-fw text-success m-r-5"></i>¿Es pública toda la información registrada en Tramitón?</a>
                </h4>
            </div>
            <div id = "faq-10" class = "panel-collapse collapse">
                <div class = "panel-body">
                    <p>
                        Todos los datos registrados en Tramitón (datos personales y de experiencia con el trámite), serán de uso exclusivo de la Secretaría Nacional de la Administración Pública – SNAP. El ciudadano(a) el momento de su registro, podrá seleccionar si desea hacer públicos sus datos (información personal, sociodemográfica y de contacto) o mantenerlos en privado. En caso de hacer públicos sus datos, la(s) institución(es) relacionadas en su propuesta de solución podrán contactarlo de manera directa para gestionar su caso, según aplique y la institución considere pertinente. En ningún caso dichos datos, serán publicados en la Plataforma Tramitón o demás portales web de la Administración Publica Central y Dependiente de la Función Ejecutiva.
                    </p>
                </div>
            </div>
        </div>
        <!--end panel -->


    </div>
    <!--end panel-group -->
</div>
<!--end #preguntas frecuentes -->

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
