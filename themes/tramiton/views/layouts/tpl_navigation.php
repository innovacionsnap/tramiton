<style type="text/css">
    .menu-home{
        display: inline-flex;
        margin-left:10%;
    }
    .menu-home #header-navbar{
        width: 100%;
    }
</style>

<!-- begin #header -->
<div id="header" class="header navbar navbar-default navbar-fixed-top">
    <!-- begin container -->
    <div class="container menu-home">
        <!-- begin navbar-header -->

        <!-- INGRESASAR LOGO -->
        <div class="navbar-header">
            <a href="index"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/Logo.png" class="media-object" alt="" /></a>
        </div>
        <!-- INGRESASAR LOGO -->
        <!-- end navbar-header -->
        <!-- begin navbar-collapse -->
        <div class="collapse navbar-collapse" id="header-navbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#home" data-click="scroll-to-target">Participa</a></li>
                <li><a href="#que_es_tramiton" data-click="scroll-to-target">¿Qué es Tramitón?</a></li>
                <li><a href="#estadisticas" data-click="scroll-to-target">Estadisticas</a></li>
                <li><a href="#noticias" data-click="scroll-to-target">Noticias</a></li>
                <li><a href="#preguntas" data-click="scroll-to-target">Preguntas Frecuentes</a></li>
                <li><a href="/tramiton/./#login-modal" data-toggle="modal" data-description="member area">Ingresar</a></li>
            </ul>
        </div>
        <!-- end navbar-collapse -->
    </div>
    <!-- end container -->
</div>
<!-- end #header -->