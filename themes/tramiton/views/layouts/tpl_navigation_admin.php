<style type="text/css">
    .menu-central{
        border-right: 2px solid #707478;
       // height: auto;
        //margin-right: 10px;
        padding-right: 5px;
        padding-left: 5px;
        width: auto;
    }

    .cont-menu-central{
       //  margin-left: 0px !important;
       //  margin-top: 20px;
         display: inline-flex;

    }

    .cont-menu-central a{
        color:#707478;
        font-weight: bold;
    }
    
    .container-fluid{
        margin-bottom: 2px;
    }
</style>
<!-- begin #header -->
<div id="header" class="header navbar navbar-default navbar-fixed-top">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin mobile sidebar expand / collapse button -->
        <div class="col-md-12 col-sm-4 col-xs-12">
            <div class="col-md-1 col-sm-1 col-xs-6" style="width:auto;background-image:url('<?php echo Yii::app()->theme->baseUrl;?>/assets/img/flecha-menu.png');background-position:28px 64px; background-repeat:no-repeat;">
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled" style="float: left">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <font style="font-size: 9px;font-weight: bold;">MENU</font>
                </button>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-6">
                <a href="index"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/Logo.png" class="media-object" alt="" /></a>
            </div>
            <div class="cont-menu-central col-md-3 col-sm-1 col-xs-6">
                <div class="menu-central"><a href="<?php echo Yii::app()->baseUrl; ?>/ciudadano/index">Participa</a></div>
                <div class="menu-central"><a href="#">¿Qué es el Tramitón?</a></div>
                <div class="menu-central"><a href="#">Términos y Condiciones</a></div>
                <div class="menu-central"><a href="#">Ayuda</a></div>
            </div>
            <div class="col-md-6 col-sm-1 col-xs-12" style="display:inline-flex;float: right;">

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
                            <li><?php echo CHtml::link('Editar Perfil', array('ciudadano/mostrarPerfil', 'usrId' => $this->_datosUser->usu_id)); ?></li>
                            <!--<li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Notificaciones</a></li>-->
                            <li><a href="../empresa/index">Registrar Empresa</a></li>
                            <li><a href="../empresa/index">Registrar Caso como Empresa</a></li>
                            <li class="divider"></li>
                            <li><?php echo CHtml::link('Salir', array('site/logout')); ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end mobile sidebar expand / collapse button -->



        <!-- begin header navigation right -->



        <!-- end header navigation right -->
    </div>
    <!-- end container-fluid -->
</div>
<!-- end #header -->