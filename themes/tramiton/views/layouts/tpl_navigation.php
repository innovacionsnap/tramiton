<!-- begin #header -->
<div id="df" class="container-fluid">

  <div id="header-tramiton" class="navbar navbar-default header container"> <!-- header-->
    <div id="fila-logos" class="row">
      <div class="col-tramiton">
        <a href="#"><img id="logo-home" class="center-block" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo_tramiton2.png" alt="" /></a>
      </div>

      <div class="hidden-xs col-redes-sociales">
        <a target="_blank" href="https://www.facebook.com/AdmPublicaEcuador"><i class="fa fa-facebook fa-2x"></i></a><br>
        <a target="_blank" href="https://twitter.com/tramitonEC"><i class="fa fa-twitter fa-2x"></i></a><br>
        <a target="_blank" href="https://www.youtube.com/user/AdmPublicaEcuador"><i class="fa fa-youtube fa-2x"></i></a>
      </div>
    </div>

    <div id="nav-admin-home">

      <div id="navbar-header-home" class="navbar-header">
        <button  id="navbar-toggle-home" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Palanca de navegación</span>
          <span class="icon-bar icon-white"></span>
          <span class="icon-bar icon-white"></span>
          <span class="icon-bar icon-white"></span>
          <!-- <font style="font-size: 9px;font-weight: bold;">MENÚ</font> -->
        </button>
        <div class="visible-xs row-redes-sociales">
          <a target="_blank" href="https://www.facebook.com/AdmPublicaEcuador"><i class="fa fa-facebook fa-2x"></i></a>
          <a target="_blank" href="https://twitter.com/tramitonEC"><i class="fa fa-twitter fa-2x"></i></a>
          <a target="_blank" href="https://www.youtube.com/user/AdmPublicaEcuador"><i class="fa fa-youtube fa-2x"></i></a>
        </div>
      </div>

      <div class="collapse navbar-collapse azul">
        <ul class="nav navbar-nav nav-tramiton">
          <li><a class="menu-central " href="#">Participa</a></li>
          <li><a class="menu-central " href="#que_es_tramiton" data-click="scroll-to-target">¿Qué es el Tramitón?</a></li>
          <li><a class="menu-central " href="#estadisticas" data-click="scroll-to-target">Estadísticas</a></li>
          <li><a class="menu-central " href="#noticias-2" data-click="scroll-to-target">Noticias</a></li>
          <li><a class="menu-central " href="#preguntas" data-click="scroll-to-target">Preguntas frecuentes</a></li>
          <li><a class="menu-central " href="<?php echo Yii::app()->baseUrl; ?>/site/registro">Regístrate</a></li>
          <li><a class="menu-central p-b-10" href="/tramiton/./#login-modal" data-toggle="modal" data-description="member area">Ingresa</a></li>
        </ul>
      </div>

    </div>
  </div>
</div>
<!-- end #header -->

<script>

    $(document).ready(function () {
        viewElements();
    });
    $(window).resize(function(){
        viewElements();
    });
</script>
