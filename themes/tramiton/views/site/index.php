<?php
$baseUrl = Yii::app()->theme->baseUrl;
?>
<style type="text/css">
    .titulo_tramiton{
        margin-top:10%;
        padding: 10%;
        position:absolute;
        color:#fff;
        font-size: 50px;
        text-align:center;
        font-weight: bold;

    }
    .definicion_tramiton{
        font-size: 16px;
    }
    video{
        position:relative;
        width:100%;
        height:80%;
        //top:50%;
        //left:50%;
        //transform:translateX(-50%) translateY(-50%);
        z-index:-1;
        -webkit-filter:sepia(100%);
    }
    .twitter{

        background-color:#325972 !important;
    }

    .titulo-twitter{
        text-align: left !important;
    }
    .titulos{
        color:#325972 !important;
        text-align: left !important;
        border-bottom: 3px solid #325972;
    }
    .boton-1 a{
        background-color: #325972;
        border-radius: 8px;
        color: #fff;
        float: left;
        font-weight: bold;
        height: 25px;
        margin-bottom: 10px;
        padding: 1%;
        text-align: center;
        width: 157px;
        text-decoration: none;
    }
    .boton-1 a:hover, .boton-2 a:hover{
        background-color:#f5f5f5;
        color:#325972
    }
    .boton-2 a{
        background-color: green;
        text-decoration: none;
        border-radius: 8px;
        color: #fff;
        float: right;
        font-weight: bold;
        height: 25px;
        margin-bottom: 10px;
        padding: 1%;
        text-align: center;
        width: 157px;
    }
    .titulo-estadistica{
        display: inline-flex; 
        text-align: center; 
        margin-left: 10%; 
        margin-top:3%
    }
    .titulo-estadistica div hr{
        border-width:3px;
        border-color:#325972;
    }
    .titulo-estadistica div h2{
        color:#325972 !important;
        font-weight: bold;
    }

</style>

<!-- begin #home -->
<div id="home" class="content" style="height:100% !important; padding-bottom: 0%; margin-top: 20px">
    <!-- begin content-bg -->
    <div class="container">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-4">
                <span class="boton-1"><a href="">Ciudadano</a></span>
                <span class="boton-2"><a href="">Servidor Público</a></span>
                <span><img src="<?php echo $baseUrl; ?>/assets/img/Home_1.png" alt="Home" /></span>
            </div>
            <div class="col-md-8"> 
                <?php
                $this->renderPartial('form_caso', true, false);
                ?>
            </div>

        </div>
    </div>

</div>
<!-- end #home -->

<!-- begin #participa -->
<div id="que_es_tramiton" class="content" data-scrollview="true">
    <!-- begin container -->
    <div class="container" data-animation="true" data-animation-type="fadeInDown">

        <!--
        <p class="content-desc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br />
            sed bibendum turpis luctus eget
        </p>
        -->
        <!-- begin row -->
        <div class="row">
            <!-- begin col-4 -->
            <span class="titulo_tramiton">¿QUÉ ES EL TRAMITÓN?<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen</p></span>

            <video src="<?php echo $baseUrl ?>/assets/mp4/tramiton.mp4" autoplay loop muted></video>

        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end #participa -->

<!-- begin #milestone -->
<div id="estadisticas" class="content has-bg" data-scrollview="true">
    <!-- begin content-bg -->
    <!--<div class="content-bg">
        <img src="assets/img/milestone-bg.jpg" alt="Milestone" />
    </div>-->
    <!-- end content-bg -->
    <!-- begin col-3 -->
    <div class="container">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-3 col-sm-3 milestone-col">
                <div class="milestone">
                    <div class="number" data-animation="true" data-animation-type="number" data-final-number="7500">7,500</div>
                    <div class="title">Total Participantes</div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-md-3 col-sm-3 milestone-col">
                <div class="milestone">
                    <div class="number" data-animation="true" data-animation-type="number" data-final-number="454">454</div>
                    <div class="title">Trámites con planes de mejora</div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-md-3 col-sm-3 milestone-col">
                <div class="milestone">
                    <div class="number" data-animation="true" data-animation-type="number" data-final-number="25">25</div>
                    <div class="title">Trámites mejorados</div>
                </div>
            </div>
            <!-- end col-3 -->
            <div class="col-md-3 col-sm-3 milestone-col">
                <div class="milestone">
                    <div class="number" data-animation="true" data-animation-type="number" data-final-number="64">64</div>
                    <div class="title">Instituciones más votadas</div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- begin container -->
    <div class="container">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-12 titulo-estadistica">
                <div class="col-md-2"><hr></div>
                <div class="col-md-6"><h2>TRÁMITES MÁS MENCIONADOS</h2></div>
                <div class="col-md-2"><hr></div>
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
    <!-- end container -->
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

<!--beign #notiticas frecuentes -->
<div id = "preguntas" class = "content has-bg" data-scrollview = "true">
    <div class = "container" data-animation = "true" data-animation-type = "fadeInDown">
        <h2 class = "content-title titulos">PREGUNTAS FRECUENTES</h2>
        <!--begin panel-group -->
        <div class = "panel-group" id = "faq">
            <!--begin panel -->
            <div class = "panel panel-inverse">
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
            </div>
            <!--end panel -->
            <!--begin panel -->
            <div class = "panel panel-inverse">
                <div class = "panel-heading">
                    <h4 class = "panel-title">
                        <a data-toggle = "collapse" href = "#faq-2"><i class = "fa fa-question-circle fa-fw text-success m-r-5"></i> ¿Qué institución lidera el proyecto Tramitón?</a>
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
                        <a data-toggle = "collapse" href = "#faq-3"><i class = "fa fa-question-circle fa-fw text-success m-r-5"></i> ¿Cuál es el beneficio que genera Tramitón?</a>
                    </h4>
                </div>
                <div id = "faq-3" class = "panel-collapse collapse">
                    <div class = "panel-body">
                        <p>
                            De acuerdo al artículo 227 de la Constitución, la Administración Pública constituye un servicio a la colectividad que se rige por los principios de eficacia, eficiencia, calidad, jerarquía, desconcentración, descentralización, coordinación, participación, planificación, transparencia y evaluación. Así también el Estado ecuatoriano requiere implantar procesos de investigación formal para el mejoramiento e innovación de los servicios públicos para la generación de mayor valor agregado en la atención a los usuarios. Es así, que se establece la convocatoria al concurso nacional “Tramitón”, para fomentar la participación e involucramiento de las y los ciudadanos con la identificación de aquellos trámites susceptibles de mejora y propuestas innovadoras que logren mejorar la eficiencia de la gestión y uso de recursos del Estado.
                            Por esta razón la gestión pública procura la disminución progresiva y simplificación de trámites para acceder a servicios eficientes, transparentes y de calidad.
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
                        <a data-toggle = "collapse" href = "#faq-4"><i class = "fa fa-question-circle fa-fw text-success m-r-5"></i> ¿Desde cuándo existe Tramitón?</a>
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
                        <a data-toggle = "collapse" href = "#faq-6"><i class = "fa fa-question-circle fa-fw text-success m-r-5"></i> ¿Cómo funciona Tramitón?</a>
                    </h4>
                </div>
                <div id = "faq-6" class = "panel-collapse collapse">
                    <div class = "panel-body">
                        <p>
                            Los ciudadanos pueden ingresar a la plataforma y describir un caso en el uso de un servicio público, lo califica y propone una solución. El análisis a dicha participación se realiza en función de los componentes del servicio, pertinencia del caso, factibilidad de implementación y coherencia en la descripción del caso y propuesta de la solución. Adicionalmente un equipo técnico se encarga de contactar a las instituciones que han sido mencionadas en el Tramitón para buscar que se atiendan a todos los casos y se desarrollen acciones globales de solución.
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
                        <a data-toggle = "collapse" href = "#faq-7"><i class = "fa fa-question-circle fa-fw text-success m-r-5"></i> ¿Los casos y propuestas de solución pueden registrarse continuamente?</a>
                    </h4>
                </div>
                <div id = "faq-7" class = "panel-collapse collapse">
                    <div class = "panel-body">
                        <p>
                            Si, los ciudadanos pueden continuar registrando sus casos y experiencias.
                        </p>
                    </div>
                </div>
            </div>
            <!--end panel -->


        </div>
        <!--end panel-group -->
    </div>
    <!--end container -->
</div>
<!--end #notiticas frecuentes -->


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





