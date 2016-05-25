<!-- begin #header -->
<div id="df" class="container-fluid p-0">
  <!-- begin inner -->
  <div class="inner">

    <!-- first container-fluid -->
    <div class="container-fluid p-0">

      <div class="hidden-xs col-redes-sociales">
        <a target="_blank" href="https://twitter.com/tramitonEC"><i class="fa fa-twitter f-21"></i></a><br>
        <a target="_blank" href="https://www.facebook.com/AdmPublicaEcuador"><i class="fa fa-facebook f-21"></i></a><br>
        <a target="_blank" href="https://www.youtube.com/user/AdmPublicaEcuador"><i class="fa fa-youtube f-21"></i></a>
      </div>

      <div id="header-tramiton" class="navbar navbar-default header container-fluid borde-izq-blanco borde-der-blanco"> <!-- header-->
        <div id="fila-logos" class="row">
          <div class="col-tramiton">
            <a href="#"><img id="logo-home" class="center-block" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo_tramiton2.png" alt="" /></a>
          </div>
        </div>
      </div>
    </div>

    <!-- end first container-fluid -->
    <div class="separator container-fluid p-0"></div>
    <!-- begin second container-fluid -->
    <div  id="container-menu" class="container-fluid p-0">
      <div id="nav-admin-home" class="container-fluid  borde-izq-blanco borde-der-blanco">

        <div id="navbar-header-home" class="navbar-header">
          <button  id="navbar-toggle-home" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Palanca de navegación</span>
            <span class="icon-bar icon-white"></span>
            <span class="icon-bar icon-white"></span>
            <span class="icon-bar icon-white"></span>
            <!-- <font style="font-size: 9px;font-weight: bold;">MENÚ</font> -->
          </button>
          <div class="visible-xs row-redes-sociales">
            <a target="_blank" href="https://twitter.com/tramitonEC"><i class="fa fa-twitter f-21"></i></a>
            <a target="_blank" href="https://www.facebook.com/AdmPublicaEcuador"><i class="fa fa-facebook f-21"></i></a>
            <a target="_blank" href="https://www.youtube.com/user/AdmPublicaEcuador"><i class="fa fa-youtube f-21"></i></a>
          </div>
        </div>

        <div class="collapse navbar-collapse azul">
          <ul class="nav navbar-nav nav-tramiton">
            <li><a class="menu-central " href="#">Participa</a></li>
            <li><a class="menu-central " href="#que_es_tramiton" data-click="scroll-to-target">¿Qué es el Tramitón?</a></li>
            <li><a class="menu-central " href="/tramiton/./#tramites-simplificados-modal" data-toggle="modal" data-description="member area">Trámites simplificados 2015</a></li>
            <li><a class="menu-central " href="#estadisticas" data-click="scroll-to-target">Estadísticas</a></li>
            <!-- <li><a class="menu-central " href="#noticias-2" data-click="scroll-to-target">Noticias</a></li> -->
            <li><a class="menu-central " href="#preguntas" data-click="scroll-to-target">Preguntas frecuentes</a></li>
            <?php if(Yii::app()->user->isGuest): ?>
            <li><a class="menu-central otro" href="<?php echo Yii::app()->baseUrl; ?>/site/registro">Regístrate</a></li>
            <?php else: ?>
            <li><a class="menu-central otro" href="<?php echo Yii::app()->baseUrl; ?>/dashboard/index">Escritorio</a></li>
            <?php endif; ?>
            <?php if(Yii::app()->user->isGuest): ?>
            <li><a class="menu-central otro p-b-10" href="/tramiton/./#login-modal" data-toggle="modal" data-description="member area">Ingresa</a></li>
            <?php else: ?>
            <li><a class="menu-central otro" href="<?php echo Yii::app()->baseUrl; ?>/site/logout">Cerrar Sesión (<?php echo Yii::app()->user->name ?>)</a></li>
            <?php endif; ?>
          </ul>
        </div>

      </div>
    </div>
    <!-- end second container fluid -->
  </div>
  <!-- end inner -->
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
