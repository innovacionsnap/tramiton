<style type="text/css">
    .menu-central{
        border-right: 2px solid #000;
        height: 14px;
        margin-right: 20px;
        padding-right: 10px;
        width: 100%;
    }
</style>
<!-- begin #header -->
<div id="header" class="header navbar navbar-default navbar-fixed-top">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin mobile sidebar expand / collapse button -->
        <div class="navbar-header" style="margin-top: 5px; margin-bottom: 5px; display: inline-flex">
            <button type="button" class="navbar-toggle" data-click="sidebar-toggled" style="float: left">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <font style="font-size: 9px;font-weight: bold;">MENU</font>
            </button>
            <a href="index"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/Logo.png" class="media-object" alt="" /></a>
            <div class="nav navbar-nav " style="display: inline-flex">
                <div class="menu-central"><a href="#">Participa</a></div>
                <div class="menu-central"><a href="#">¿Qué es el Tramitón?</a></div>
                <div class="menu-central"><a href="#">Términos y Condiciones</a></div>
                <div class="menu-central"><a href="#">Ayuda</a></div>
            </div>
        </div>
        <!-- end mobile sidebar expand / collapse button -->



        <!-- begin header navigation right -->

        <ul class="nav navbar-nav navbar-right">

            <li>
                <!--<form class="navbar-form full-width">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Buscar" />
                        <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                    </div>
                </form>-->

                <div id="busqueda" class="navbar-form full-width">
                    <?php echo CHtml::beginForm(array('datostramite/busca')) ?>

                    <div class="form-group">
                        <input name="busca" type="text" class="form-control" placeholder="Busque una experiencia" />
                        <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                    </div>


                    <?php echo CHtml::endForm(); ?>
                </div>
            </li>


            <li class="dropdown navbar-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo URL_IMG . $this->_datosUser->usu_imagen; ?>" alt="" /> 
                    <span class="hidden-xs"><?php echo $this->_datosUser->usu_nombre ?></span> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu animated fadeInLeft">
                    <li class="arrow"></li>
                    <li><?php echo CHtml::link('Editar Perfil', array('ciudadano/mostrarPerfil')); ?></li>
                    <li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Notificaciones</a></li>
                    <li><a href="javascript:;">Calendario</a></li>
                    <li class="divider"></li>
                    <li><?php echo CHtml::link('Salir', array('site/logout')); ?></li>
                </ul>
            </li>
        </ul>

        <!-- end header navigation right -->
    </div>
    <!-- end container-fluid -->
</div>
<!-- end #header -->