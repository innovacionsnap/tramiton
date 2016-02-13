<!-- begin #header -->
<div id="header-tramiton" class="navbar navbar-default navbar-fixed-top header"> <!-- header-->
    <div id="fila-logos" class="row">
            <div class="col-tramiton borde-izquierda">
                <a href="#"><img id="logo-home" class="center-block" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo_tramiton1.png" alt="" /></a>
            </div>
        
            <div class="hidden-xs col-redes-sociales borde-izquierda">
                <a target="_blank" href="https://www.facebook.com/AdmPublicaEcuador"><i class="fa fa-facebook fa-2x"></i></a><br>
                <a target="_blank" href="https://twitter.com/tramitonEC"><i class="fa fa-twitter fa-2x"></i></a><br>
                <a target="_blank" href="https://www.youtube.com/user/AdmPublicaEcuador"><i class="fa fa-youtube fa-2x"></i></a>
            </div>
    </div>

    <div id="nav-admin">

        <div class="navbar-header">
            <button  id="navbar-toggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Palanca de navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
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
                <li><a class="menu-central " href="#">PARTICIPA</a></li>
                <li><a class="menu-central " href="#que_es_tramiton" data-click="scroll-to-target">¿QUÉ ES EL TRAMITÓN?</a></li>
                <li><a class="menu-central " href="#estadisticas" data-click="scroll-to-target">ESTADÍSTICAS</a></li>
                <li><a class="menu-central " href="#noticias" data-click="scroll-to-target">NOTICIAS</a></li>
                <li><a class="menu-central " href="#preguntas" data-click="scroll-to-target">PREGUNTAS FRECUENTES</a></li>
                <li><a class="menu-central " href="<?php echo Yii::app()->baseUrl; ?>/site/registro">REGISTRAR</a></li>
                <li><a class="menu-central p-b-10" href="/tramiton/./#login-modal" data-toggle="modal" data-description="member area">INGRESAR</a></li>
            </ul>
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
