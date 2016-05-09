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
                <p class="p-r-5 p-l-5 p-t-5">¿Conoces de trámites o servicios públicos complicados o ineficientes?</p>
            </div>
            <div class="col-xs-6" id="col-logo-1">
                <a href="http://productivo.tramiton.to"><img id="logo-productivo" class="center-block" src="<?php echo $baseUrl . '/images/logo-tramiton-productivo.png' ; ?>" alt="Tramitón productivo" width="180"></a>
                <p class="p-r-5 p-l-5 p-t-5">¿Conoces de trámites o servicios públicos complicados o ineficientes que impactan en el sector productivo?</p>
            </div>


        </div>
      </div>
      <div class="modal-footer">
        <p><h6>Toda la información registrada en este portal será confidencial</h6></p>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- $bandera -->

<div id="home" class="container-fluid p-t-10 p-l-15 p-r-15 p-b-30">
    <div class="row">
      <!-- <h4 class="text-left p-l-15" style="font-weight: bold;">Registra tu caso</h4> -->
        <div id="col-formulario" class="col-sm-7">
          <?php
            if(true){
              $this->renderPartial('form_login', true, false);
            }
            else{
              $this->renderPartial('form_caso', true, false);
            }
          ?>
        </div>

        <div id="noticias-2" class="col-sm-5 text-center">
          <a class="twitter-timeline" href="https://twitter.com/TramitonEC" data-widget-id="705865349623881729">Tweets por el @TramitonEC.</a>
          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>

        </div>
    </div>
</div>

<div id="que_es_tramiton" class="container-fluid" style="height: 616px;">
    <iframe style="border: none;" height="100%" width="100%" scrolling="no" src="<?php echo (Yii::app()->theme->baseUrl . '/views/site/que_es_tramiton.php'); ?>"></iframe>
</div>




<!-- begin #milestone -->
<!-- <div id="estadisticas" class="content has-bg" data-scrollview="true" > -->
<div id="estadisticas" class="container-fluid p-t-30 p-r-30 p-l-30">
    <div class="row">
        <div class="col-sm-4 milestone-col">
            <div class="milestone">
                <div class="number contentAnimated" data-animation="true" data-animation-type="number" data-final-number="<?php echo $estadisticas['totalParticipantes']?>"><?php echo $estadisticas['totalParticipantes']?></div>
                <div class="title">Personas registradas</div>
            </div>
        </div>
        <div class="col-sm-4 milestone-col">
            <div class="milestone">
                <div class="number contentAnimated" data-animation="true" data-animation-type="number" data-final-number="<?php echo $estadisticas['totalTramites']?>"><?php echo $estadisticas['totalTramites']?></div>
                <div class="title">Tramites y soluciones propuestas</div>
            </div>
        </div>
        <div class="col-sm-4 milestone-col">
            <div class="milestone no-border">
                <div class="number contentAnimated" data-animation="true" data-animation-type="number" data-final-number="<?php echo $estadisticas['totalAcciones']?>"><?php echo $estadisticas['totalAcciones']?></div>
                <div class="title">Planes de mejora institucionales a trámites</div>
            </div>
        </div>
    </div>

    <div class="col-md-6 m-t-30">
      <h2 style="color:#325972;" class="text-left titulo-estadistica m-t-0 m-l-0">Instituciones con propuestas de solución</h2>

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

    <!-- begin row -->
    <div class="col-md-6 m-t-30">
        <div class="col-xs-12 p-0">
          <h2 style="color:#325972;" class="text-left titulo-estadistica m-t-0 m-l-0">Instituciones con más acciones correctivas</h2>
          <?php


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


    </div>
    <!-- end row -->
</div>
<!-- end #milestone -->


<!-- <div id="noticias-1" class="container >
  <div class="row">
    <div class="col-xs-12 text-right">
      <a class="twitter-timeline" href="https://twitter.com/TramitonEC" data-widget-id="705865349623881729">Tweets por el @TramitonEC.</a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
  </div>
</div> -->





<!--beign #preguntas frecuentes -->
<!-- <div id = "preguntas" class = "content has-bg" data-scrollview = "true" > -->
<div id = "preguntas" class="container-fluid p-0 borde-inf-gris p-b-30 p-t-30 ">
    <!-- <h2 class="content-title titulos">PREGUNTAS FRECUENTES</h2> -->

    <!--begin panel -->
    <div class = "panel panel-inverse m-b-0 no-border">
        <div class = "panel-heading">
            <h3 class = "panel-title">
                <a data-toggle = "collapse" href = "#acordeon-preguntas" class="p-l-15 f-18">Preguntas frecuentes <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
            </h3>
        </div>
        <div id = "acordeon-preguntas" class = "panel-collapse collapse">
            <div class = "panel-body">

                <!-- begin pregunta -->
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
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
                    <div class="col-xs-12 col-sm-4 frame r-0 text-center">
                        <span class="helper hiden-xs"></span>
                        <img src="<?php echo $baseUrl; ?>/assets/img/logo_snap.png">
                    </div>
                </div>
                <!-- end pregunta -->
                <div class='linea'></div>

                <!-- begin pregunta -->
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-sm-push-4">
                        <p class="pregunta derecha">¿Cuál es el beneficio que genera Tramitón?</p>
                        <br>
                        <p class="respuesta derecha">
                            De acuerdo al artículo 227 de la Constitución, la Administración Pública constituye un servicio a la colectividad que se rige por los principios de eficacia, eficiencia, calidad, jerarquía, desconcentración, descentralización, coordinación, participación, planificación, transparencia y evaluación. Así también el Estado ecuatoriano requiere implantar procesos de investigación formal para el mejoramiento e innovación de los servicios públicos para la generación de mayor valor agregado en la atención a los usuarios. Es así, que se establece la convocatoria al concurso nacional “Tramitón”, para fomentar la participación e involucramiento de las y los ciudadanos con la identificación de aquellos trámites susceptibles de mejora y propuestas innovadoras que logren mejorar la eficiencia de la gestión y uso de recursos del Estado.
                        </p>
                        <p class="respuesta derecha">
                            Por esta razón la gestión pública procura la disminución progresiva y simplificación de trámites para acceder a servicios eficientes, transparentes y de calidad.
                        </p>
                        <p class="respuesta derecha">
                            Al facilitar los trámites se facilita la interacción entre los usuarios y las Instituciones Públicas lo cual es un factor clave para el fomento de innovación abierta en servicios.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-4 frame l-0 col-sm-pull-8 text-center">
                        <span class="helper hiden-xs"></span>
                        <img src="<?php echo $baseUrl; ?>/images/preguntas/grupo.png">
                    </div>
                </div>
                <!-- end pregunta -->
                <div class='linea'></div>

                <!-- begin pregunta -->
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
                        <p class="pregunta">¿Desde cuándo existe Tramitón? </p>
                        <br>
                        <p class="respuesta">
                            Tramitón fue lanzado a la ciudadanía el 21 de junio de 2014, bajo la figura de Concurso Nacional con convocatoria abierta hasta el 31 de agosto de 2014, con la motivación de entregar premios de Tren Crucero a los ciudadanos con las mejores propuestas de solución para la mejora de trámites de la gestión pública.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-4 frame r-0 text-center">
                        <span class="helper hiden-xs"></span>
                        <img src="<?php echo $baseUrl; ?>/images/preguntas/calendario.png">
                    </div>
                </div>
                <!-- end pregunta -->
                <div class='linea'></div>

                <!-- begin pregunta -->
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-sm-push-4 text-center">
                        <p class="pregunta derecha">¿Los casos y propuestas de solución pueden registrarse continuamente?</p>
                        <br>
                        <p class="respuesta derecha">
                            Si, los ciudadanos pueden continuar registrando sus casos y experiencias.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-sm-pull-8 text-center">
                        <!-- <span class hiden-xs="helper"></span> -->
                        <img src="<?php echo $baseUrl; ?>/images/preguntas/lista.png">
                    </div>
                </div>
                <!-- end pregunta -->
                <div class='linea'></div>

                <!-- begin pregunta -->
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
                        <p class="pregunta">¿Cómo un ciudadano puede exponer su criterio sobre un trámite?</p>
                        <br>
                        <p class="respuesta">
                            El Tramitón es su primer convocatoria lo hizo bajo figura de un concurso, sin embargo, una vez concluida la misma, continua abierta la plataforma para el acceso a la ciudadanía, con el fin de continuar con la interacción con los usuarios ya que genera información importante para el seguimiento con respecto a los planes de acción para el mejoramiento de los trámites y posterior análisis de datos y planteamiento de propuestas para la innovación de los servicios.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-4 frame r-0 text-center">
                        <span class="helper hiden-xs"></span>
                        <img src="<?php echo $baseUrl; ?>/images/preguntas/hojas.png">
                    </div>
                </div>
                <!-- end pregunta -->
                <div class='linea'></div>

                <!-- begin pregunta -->
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-sm-push-4">
                        <p class="pregunta text right">¿Cómo funciona Tramitón?</p>
                        <br>
                        <p class="respuesta derecha">
                            Los ciudadanos pueden ingresar a la plataforma y describir un caso en el uso de un servicio público, lo califica y propone una solución. El análisis a dicha participación se realiza en función de los componentes del servicio, pertinencia del caso, factibilidad de implementación y coherencia en la descripción del caso y propuesta de la solución.
                        </p>
                        <p class="respuesta derecha">
                            Adicionalmente un equipo técnico se encarga de contactar a las instituciones que han sido mencionadas en el Tramitón para buscar que se atiendan a todos los casos y se desarrollen acciones globales de solución. En base a la información entregada por los ciudadanos, las instituciones desarrollan planes de mejora con acciones en el corto mediano plazo para mejorar el servicio público. El objetivo es llegar a una estrategia de mejoramiento e innovación de los servicios de forma participativa y colaborativa, siempre con el fin de favorecer la calidad y calidez de los servicios público. Las herramientas TIC son el apoyo informático con el cual contamos, así que en todos los casos en los que se requiera y sea posible aplicarlas se buscará hacerlo.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-4 frame l-0 col-sm-pull-8 text-center">
                        <span class="helper hiden-xs"></span>
                        <img src="<?php echo $baseUrl; ?>/images/preguntas/web.png">
                    </div>
                </div>
                <!-- end pregunta -->
                <div class='linea'></div>

                <!-- begin pregunta -->
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
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
                    <div class="col-xs-12 col-sm-4 frame r-0 text-center">
                        <span class="helper hiden-xs"></span>
                        <img src="<?php echo $baseUrl; ?>/images/preguntas/cedula.png">
                    </div>
                </div>
                <!-- end pregunta -->
                <div class='linea'></div>

                <!-- begin pregunta -->
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-sm-push-4">
                        <p class="pregunta derecha">¿Es pública toda la información registrada en Tramitón?</p>
                        <br>
                        <p class="respuesta derecha">
                            Todos los datos registrados en Tramitón (datos personales y de experiencia con el trámite), serán de uso exclusivo de la Secretaría Nacional de la Administración Pública – SNAP. El ciudadano(a) el momento de su registro, podrá seleccionar si desea hacer públicos sus datos (información personal, sociodemográfica y de contacto) o mantenerlos en privado. En caso de hacer públicos sus datos, la(s) institución(es) relacionadas en su propuesta de solución podrán contactarlo de manera directa para gestionar su caso, según aplique y la institución considere pertinente. En ningún caso dichos datos, serán publicados en la Plataforma Tramitón o demás portales web de la Administración Publica Central y Dependiente de la Función Ejecutiva.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-4 frame l-0 col-sm-pull-8 text-center">
                        <span class="helper hiden-xs"></span>
                        <img src="<?php echo $baseUrl; ?>/images/preguntas/candado.png">
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


<div class="modal fade" tabindex="-1" role="dialog" id="tramites-simplificados-modal">
  <div class="modal-dialog modal-dialog-center">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="font-size: 150%;" aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Trámites simplificados 2015</h3>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-xs-12 col-sm-6 text-center p-t-10" id="col-logo-2">
              <i class="fa fa-file-pdf-o f-14 m-b-10" style="font-size: 500%; display:block; color: #C4161C;"></i>Listado de trámites simplificados <br>
              <a  role="button" class="btn btn-info" href="docs/LISTADO_TRAMITES_SIMPLIFICADOS_400_PNST2015.pdf" target="_blank">Descargar <i class="fa fa-download fa-4"></i></a>
            </div>
            <div class="col-xs-12 col-sm-6 text-center p-t-10" id="col-logo-1">
              <i class="fa fa-file-pdf-o f-14 m-b-10" style="font-size: 500%; display:block; color: #C4161C;"></i>Detalle de trámites simplificados <br>
              <a  role="button" class="btn btn-info" href="docs/LISTADO_TRAMITES_SIMPLIFICADOS_SECTORES_INSTITUCIONES_PNST2015.pdf" target="_blank">Descargar <i class="fa fa-download fa-4"></i></a>
            </div>


        </div>
      </div>
      <div class="modal-footer">
        <!-- <p><h6>Toda la información registrada en este portal será confidencial</h6></p> -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
