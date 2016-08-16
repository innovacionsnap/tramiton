<!-- begin #header -->
<nav id="header" class="navbar navbar-default navbar-fixed-top header">

  <div id="nav-admin" class="container-fluid menu-dashboard">

    <div class="navbar-header">
        <button class="navbar-toggle" style="float: left;" data-click="sidebar-toggled" type="button">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <font style="font-size: 9px;font-weight: bold;">MENÚ</font>
        </button>
        <!-- <button class="navbar-toggle" style="float: left;" data-click="sidebar-toggled" type="button">
            <span id="ghy-right" class="glyphicon glyphicon-menu-right" aria-hidden="true" style="font-size: 25px;"></span>
        </button> -->
        <a class="navbar-brand no-margin-right" href="<?php echo Yii::app()->baseUrl. '/dashboard/'; ?>"><img id="logo-dashboard" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo_tramiton1.png"/></a>
        <button id="navbar-toggle-dashboard" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-1" > <!-- style="display:none;" -->
            <h3><span class="glyphicon glyphicon-menu-down"></span></h3>
        </button>
    </div> <!-- end navbar-header -->

    <div class="collapse navbar-collapse" id="collapse-1">
        <!-- <ul class="nav navbar-nav">
            <li><a class="menu-central-dashboard borde-derecha" href="<?php //echo Yii::app()->baseUrl; ?>/ciudadano/index">Participa</a></li>
            <li><a class="menu-central-dashboard borde-derecha" href="<?php //echo Yii::app()->baseUrl; ?>/#que_es_tramiton" data-click="scroll-to-target">¿Qué es Tramitón?</a></li>
            <li><a class="menu-central-dashboard borde-derecha" href="#">Términos y Condiciones</a></li>
            <li><a class="menu-central-dashboard no-border" href="#">Ayuda</a></li>
        </ul> -->
        <ul id="dashboard-navbar" class="nav navbar-nav navbar-right">
            <li>
                <div id="busqueda" class="navbar-form full-width">
                    <?php echo CHtml::beginForm(array('datosTramite/busca')) ?>
                                        
                        <div class="form-group has-feedback">
                            <input id="input-buscar-experiencia" name="busca" type="text" class="form-control" placeholder="Busque una experiencia" style="min-width:176px!important;"/>
                            <button id="boton-busqueda" type="submit" class="btn btn-search"><i class="glyphicon glyphicon-search form-control-feedback"></i></button>
                        </div>

                    <?php echo CHtml::endForm(); ?>
                </div>
            </li>
            <!--<li id="campana" class="dropdown">
                <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14" aria-expanded="true">
                    <i class="fa fa-bell-o"></i>
                    <span class="label"><?php //echo "4"; ?></span>
                </a>
                <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                    <li class="dropdown-header">Notificaciones <?php //echo '('.'4'.')'; ?></li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left"><i class="fa fa-comments media-object bg-red"></i></div>
                            <div class="media-body">
                                <h6 class="media-heading">ciudadano</h6>
                                <p>Comentó tu publicación</p>
                                <div class="text-muted f-s-11">Hace 3 minutos</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left"><i class="fa fa-thumbs-o-up media-object bg-blue"></i></div>
                            <div class="media-body">
                                <h6 class="media-heading">A John Smith</h6>
                                <p>Le gusta tu solución al trámite..</p>
                                <div class="text-muted f-s-11">Hace 25 minutos</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left"><i class="fa fa-share media-object bg-green"></i></div>
                            <div class="media-body">
                                <h6 class="media-heading"> Nueva solución por registrar</h6>
                                <div class="text-muted f-s-11">Hace una hora</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left"><i class="fa fa-comments media-object bg-red"></i></div>
                            <div class="media-body">
                                <h6 class="media-heading">admin</h6>
                                <p>Comentó tu publicación</p>
                                <div class="text-muted f-s-11">Hace 3 minutos</div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-footer text-center">
                        <a href="javascript:;">Ver más</a>
                    </li>
                </ul>
            </li>-->
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <img style="width:30px; height:30px; border-radius: 15px;" src="<?php echo Yii::app()->theme->baseUrl . '/assets/img/users/' . $this->_datosUser->usu_imagen; ?>" alt="" /> 
                    <span class="hidden-sm"><?php echo $this->_datosUser->usu_nombre ?></span> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu animated fadeInLeft">
                    <!-- <li class="arrow"></li> -->
                    <li><?php echo CHtml::link('Editar Perfil', array('ciudadano/mostrarPerfil', 'key' => $this->_datosUser->usu_codigo_confirmacion)); ?></li>
                    <?php if($this->_casosTmp['existe'] == TRUE): ?>
                    <li><a href="<?php echo Yii::app()->baseUrl;?>/ciudadano/casosTemporales"><span class="badge badge-danger pull-right"><?php echo $this->_casosTmp['nroTmp'] ?></span> Casos Temporales</a></li>
                    <?php endif; ?>
                    <?php if($this->_datosUser->usu_tipo_usuario <> 2): ?>
                    <li><a href="<?php echo Yii::app()->baseUrl;?>/ciudadano/usuario_tramites">Mis Trámites</a></li>
                    <li><a href="<?php echo Yii::app()->baseUrl;?>/empresa/empresa">Mis Empresas</a></li>
                    <li><a href="<?php echo Yii::app()->baseUrl;?>/empresa/index">Registrar Caso como Empresa</a></li>
                    <?php endif; ?>
                    <li role="separator" class="divider"></li>
                    <li><?php echo CHtml::link('Salir', array('site/logout')); ?></li>
                </ul>
            </li> <!-- end dropdown -->
        </ul>
    </div><!-- end collapse -->

  </div><!-- end container -->
</nav>
<!-- end #header -->
<script>
    $(document).ready(function () {
        viewElements();
    });
    $(window).resize(function(){
        viewElements();
    });
</script>
