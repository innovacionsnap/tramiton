<?php
$baseUrl = Yii::app()->theme->baseUrl;
?>

<!-- begin #home -->
<div id="home" class="content">
    <!-- begin content-bg -->

    <div id="registro_caso" class="col-md-8">
        <?php
        $this->renderPartial('form_caso');
        ?>
    </div>
    <div id="instrucciones" class="col-md-4">
        <img src="<?php echo $baseUrl; ?>/assets/img/Home_1.png" alt="Home" />
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
            <div class="col-md-4 col-sm-6">
                <!-- begin about -->
                <div class="about">
                    <!-- <h3>Our Story</h3> -->

                    <div class="content-bg">
                        <img src="<?php echo $baseUrl ?>/assets/img/que_es_tramiton.png" alt="Milestone" />
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
<!-- end #participa -->

<!-- begin #milestone -->
<div id="estadisticas" class="content bg-black-darker has-bg" data-scrollview="true">
    <!-- begin content-bg -->
    <div class="content-bg">
        <img src="assets/img/milestone-bg.jpg" alt="Milestone" />
    </div>
    <!-- end content-bg -->
    <!-- begin container -->
    <div class="container">
        <!-- begin row -->
        <div class="row">
            <!-- begin col-3 -->
            <div class="col-md-3 col-sm-3 milestone-col">
                <div class="milestone">
                    <div class="number" data-animation="true" data-animation-type="number" data-final-number="7500">7,500</div>
                    <div class="title">Themes & Template</div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-md-3 col-sm-3 milestone-col">
                <div class="milestone">
                    <div class="number" data-animation="true" data-animation-type="number" data-final-number="9039">9,039</div>
                    <div class="title">Registered Members</div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-md-3 col-sm-3 milestone-col">
                <div class="milestone">
                    <div class="number" data-animation="true" data-animation-type="number" data-final-number="89291">89,291</div>
                    <div class="title">Items Sold</div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-md-3 col-sm-3 milestone-col">
                <div class="milestone">
                    <div class="number" data-animation="true" data-animation-type="number" data-final-number="129">129</div>
                    <div class="title">Theme Authors</div>
                </div>
            </div>
            <!-- end col-3 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end #milestone -->


<!-- begin #noticias -->
<div id="noticias" class="content has-bg bg-green" data-scrollview="true">
    <!-- begin content-bg -->
    <div class="content-bg">
        <img src="<?php echo $baseUrl; ?>/assets/img/client-bg.jpg" alt="Client" />
    </div>
    <!-- end content-bg -->
    <!-- begin container -->
    <div class="container" data-animation="true" data-animation-type="fadeInUp">
        <h2 class="content-title">Noticias</h2>
        <!-- begin carousel -->
        <div class="carousel testimonials slide" data-ride="carousel" id="testimonials">
            <!-- begin carousel-inner -->
            <div class="carousel-inner text-center">
                <!-- begin item -->
                <div class="item active">
                    <blockquote>
                        <i class="fa fa-quote-left"></i>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce viverra, nulla ut interdum fringilla,<br />
                        urna massa cursus lectus, eget rutrum lectus neque non ex.
                        <i class="fa fa-quote-right"></i>
                    </blockquote>
                    <div class="name"> — <span class="text-theme">Mark Doe</span>, Designer</div>
                </div>
                <!-- end item -->
                <!-- begin item -->
                <div class="item">
                    <blockquote>
                        <i class="fa fa-quote-left"></i>
                        Donec cursus ligula at ante vulputate laoreet. Nulla egestas sit amet lorem non bibendum.<br />
                        Nulla eget risus velit. Pellentesque tincidunt velit vitae tincidunt finibus.
                        <i class="fa fa-quote-right"></i>
                    </blockquote>
                    <div class="name"> — <span class="text-theme">Joe Smith</span>, Developer</div>
                </div>
                <!-- end item -->
                <!-- begin item -->
                <div class="item">
                    <blockquote>
                        <i class="fa fa-quote-left"></i>
                        Sed tincidunt quis est sed ultrices. Sed feugiat auctor ipsum, sit amet accumsan elit vestibulum<br />
                        fringilla. In sollicitudin ac ligula eget vestibulum.
                        <i class="fa fa-quote-right"></i>
                    </blockquote>
                    <div class="name"> — <span class="text-theme">Linda Adams</span>, Programmer</div>
                </div>
                <!-- end item -->
            </div>
            <!-- end carousel-inner -->
            <!-- begin carousel-indicators -->
            <ol class="carousel-indicators">
                <li data-target="#testimonials" data-slide-to="0" class="active"></li>
                <li data-target="#testimonials" data-slide-to="1" class=""></li>
                <li data-target="#testimonials" data-slide-to="2" class=""></li>
            </ol>
            <!-- end carousel-indicators -->
        </div>
        <!-- end carousel -->
    </div>
    <!-- end containter -->
</div>
<!-- end #noticias -->

<!-- beign #notiticas frecuentes -->
<div id="preguntas" class="content has-bg" data-scrollview="true">
    <div class="container" data-animation="true" data-animation-type="fadeInDown">
        <h2 class="content-title">FAQs</h2>
        <!-- begin panel-group -->
        <div class="panel-group" id="faq">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#faq-1"><i class="fa fa-question-circle fa-fw text-success m-r-5"></i>¿Qué objetivo persigue Tramitón?</a>
                    </h4>
                </div>
                <div id="faq-1" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p> 
                        <li>Incrementar los mecanismos de participación ciudadana.</li>
                        <li>Afianzar la relación entre ciudadanos y  Estado.</li>
                        <li>Mejorar los Servicios Públicos de acuerdo al Plan Nacional del Buen Vivir y principios de eficiencia, calidad y calidez.</li>
                        <li>Ejecutar una campaña comunicacional a nivel nacional para incentivar la participación ciudadana en el mejoramiento de los servicios públicos.</li>
                        <li>Promover el uso de los infocentros y tecnologías de la información y comunicaciones en la presente campaña.</li>
                        <li>Registrar y evaluar la participación ciudadana de acuerdo a sus propuestas</li>

                        </p>
                    </div>
                </div>
            </div>
            <!-- end panel -->
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#faq-2"><i class="fa fa-question-circle fa-fw text-success m-r-5"></i> ¿Qué institución lidera el proyecto Tramitón?</a>
                    </h4>
                </div>
                <div id="faq-2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            La Secretaría Nacional de la Administración Pública en el marco de sus competencias y como órgano rector para el mejoramiento de la eficiencia de las entidades de la Administración Pública Central, Institucional y dependiente de la Función Ejecutiva, a través de políticas y procesos que optimicen la calidad, calidez y la transparencia del Servicio Público, bajo el liderazgo de la Dirección Nacional de Innovación trabaja en la organización y ejecución de la convocatoria al concurso denominado “Tramitón”, el mismo que busca fomentar la participación ciudadana para estimular la generación de ideas que propongan soluciones creativas, innovadoras y viables a los trámites actuales del servicio público a nivel nacional y que requieren ser mejorados. Para dicho efecto, la ciudadanía podrá acceder a un formulario en línea para registro, postulación y propuesta de solución al peor trámite. 
                        </p>
                    </div>
                </div>
            </div>
            <!-- end panel -->
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#faq-3"><i class="fa fa-question-circle fa-fw text-success m-r-5"></i> ¿Cuál es el beneficio  que genera Tramitón?</a>
                    </h4>
                </div>
                <div id="faq-3" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            De acuerdo al artículo 227 de la Constitución, la Administración Pública constituye un servicio a la colectividad que se rige por los principios de eficacia, eficiencia, calidad, jerarquía, desconcentración, descentralización, coordinación, participación, planificación, transparencia y evaluación. Así también el Estado ecuatoriano requiere implantar procesos de investigación formal para el mejoramiento e innovación de los servicios públicos para la generación de mayor valor agregado en la atención a los usuarios. Es así, que se establece la convocatoria al concurso nacional “Tramitón”, para fomentar la participación e involucramiento de las y los ciudadanos con la identificación de aquellos trámites susceptibles de mejora y propuestas innovadoras que logren mejorar la eficiencia de la gestión y uso de recursos del Estado.
                            Por esta razón la gestión pública procura la disminución progresiva y simplificación de trámites para acceder a servicios eficientes, transparentes y de calidad. 
                            Al facilitar los trámites se facilita la interacción entre los usuarios y las Instituciones Públicas lo cual es un factor clave para el fomento de innovación abierta en servicios. 

                        </p>
                    </div>
                </div>
            </div>
            <!-- end panel -->
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#faq-4"><i class="fa fa-question-circle fa-fw text-success m-r-5"></i> ¿Desde cuándo existe Tramitón?</a>
                    </h4>
                </div>
                <div id="faq-4" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            Tramitón fue lanzado a la ciudadanía el 21 de junio de 2014, bajo la figura de Concurso Nacional con convocatoria abierta hasta el 31 de agosto de 2104, con la motivación de entregar premios de Tren Crucero a los ciudadanos con las mejores propuestas de solución para la mejora de trámites de la gestión pública. 
                        </p>
                    </div>
                </div>
            </div>
            <!-- end panel -->
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#faq-5"><i class="fa fa-question-circle fa-fw text-success m-r-5"></i>¿Los casos y propuestas de solución pueden registrarse continuamente?</a>
                    </h4>
                </div>
                <div id="faq-5" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            Si, los ciudadanos pueden continuar registrando sus casos y experiencias. 
                        </p>
                    </div>
                </div>
            </div>
            <!-- end panel -->
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#faq-6"><i class="fa fa-question-circle fa-fw text-success m-r-5"></i> ¿Cómo funciona Tramitón?</a>
                    </h4>
                </div>
                <div id="faq-6" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            Los ciudadanos pueden ingresar a la plataforma y describir un caso en el uso de un servicio público, lo califica y propone una solución. El análisis a dicha participación se realiza en función de los componentes del servicio, pertinencia del caso, factibilidad de implementación y coherencia en la descripción del caso y propuesta de la solución. Adicionalmente un equipo técnico se encarga de contactar a las instituciones que han sido mencionadas en el Tramitón para buscar que se atiendan a todos los casos y se desarrollen acciones globales de solución.
                            En base a la información entregada por los ciudadanos, las instituciones desarrollan planes de mejora con acciones en el corto mediano plazo para mejorar el servicio público. El objetivo es llegar a una estrategia mejoramiento e innovación de los servicios de forma participativa y colaborativa, siempre con el fin de favorecer la calidad y calidez de los servicios público. Las herramientas TIC son el apoyo informático con el cual contamos, así que en todos los casos en los que se requiera y sea posible aplicarlas se buscará hacerlo.

                        </p>
                    </div>
                </div>
            </div>
            <!-- end panel -->
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#faq-7"><i class="fa fa-question-circle fa-fw text-success m-r-5"></i> ¿Los casos y propuestas de solución pueden registrarse continuamente?</a>
                    </h4>
                </div>
                <div id="faq-7" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>
                            Si, los ciudadanos pueden continuar registrando sus casos y experiencias.
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
<!-- end #notiticas frecuentes -->

<!-- begin #participa -->
<div id="que-es" class="content" data-scrollview="true">
    <!-- begin container -->
    <div class="container" data-animation="true" data-animation-type="fadeInDown">
        <h2 class="content-title">¿C&oacute;mo participar?</h2>
        <p class="content-desc">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br />
            sed bibendum turpis luctus eget
        </p>
        <!-- begin row -->
        <div class="row">
            <!-- begin col-4 -->
            <div class="col-md-4 col-sm-6">
                <!-- begin about -->
                <div class="image">
                    <a href="#"><img src="assets/img/work-1.jpg" alt="Work 1" /></a>
                </div>
                <!-- end about -->
            </div>
            <!-- end col-4 -->
            <!-- begin col-4 -->
            <div class="col-md-4 col-sm-6">
                <h3>Our Philosophy</h3>
                <!-- begin about-author -->
                <div class="about-author">
                    <div class="quote bg-silver">
                        <i class="fa fa-quote-left"></i>
                        <h3>We work harder,<br /><span>to let our user keep simple</span></h3>
                        <i class="fa fa-quote-right"></i>
                    </div>
                    <div class="author">
                        <div class="image">
                            <img src="assets/img/user-1.jpg" alt="Sean Ngu" />
                        </div>
                        <div class="info">
                            Sean Ngu
                            <small>Front End Developer</small>
                        </div>
                    </div>
                </div>
                <!-- end about-author -->
            </div>
            <!-- end col-4 -->
            <!-- begin col-4 -->
            <div class="col-md-4 col-sm-12">
                <h3>¿C&oacute;mo Participar?</h3>
                <!-- begin skills -->
                <div class="skills">
                    <div class="skills-name">Front End</div>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-success" style="width: 95%">
                            <span class="progress-number">95%</span>
                        </div>
                    </div>
                    <div class="skills-name">Programming</div>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-success" style="width: 90%">
                            <span class="progress-number">90%</span>
                        </div>
                    </div>
                    <div class="skills-name">Database Design</div>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-success" style="width: 85%">
                            <span class="progress-number">85%</span>
                        </div>
                    </div>
                    <div class="skills-name">Wordpress</div>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-success" style="width: 80%">
                            <span class="progress-number">80%</span>
                        </div>
                    </div>
                </div>
                <!-- end skills -->
            </div>
            <!-- end col-4 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end #participa -->
<!-- Modal login   -->

<div class="modal fade" id="login-modal">
    <div class="modal-dialog snap_modal_contenedor">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Ingrese al sistema</h4>
            </div>
            <div class="modal-body">
                <?php $this->renderPartial('_form_login', array('model_login' => $model_login)) ?>
            </div>

        </div>
    </div>
</div>





