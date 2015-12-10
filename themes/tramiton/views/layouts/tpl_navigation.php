<!-- begin #header -->
<div id="header-tramiton" class="navbar navbar-default navbar-fixed-top header"> <!-- header-->
    
    <div id="nav-admin">

        <div class="navbar-header">
            <a class="" href="#"><img id="logo-home" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo_tramiton1.png" alt="" /></a>
            <button  id="navbar-toggle" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Palanca de navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav nav-tramiton navbar-right">
                <li><a class="menu-central borde-derecha" href="#home" data-click="scroll-to-target">Participa</a></li>
                <li><a class="menu-central borde-derecha" href="#que_es_tramiton" data-click="scroll-to-target">¿Qué es Tramitón?</a></li>
                <li><a class="menu-central borde-derecha" href="#estadisticas" data-click="scroll-to-target">Estadísticas</a></li>
                <li><a class="menu-central borde-derecha" href="#noticias" data-click="scroll-to-target">Noticias</a></li>
                <li><a class="menu-central borde-derecha" href="#preguntas" data-click="scroll-to-target">Preguntas Frecuentes</a></li>
                <li><a class="menu-central no-border" href="<?php echo Yii::app()->baseUrl; ?>/site/registro">Registrar <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a></li>
                <li><a class="menu-central no-border m-b-10 m-r-20" href="/tramiton/./#login-modal" data-toggle="modal" data-description="member area">Ingresar <span class="glyphicon glyphicon-log-in" aria-hidden="true"></a></li>
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
