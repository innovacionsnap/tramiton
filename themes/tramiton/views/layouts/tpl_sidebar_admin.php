<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="<?php echo Yii::app()->theme->baseUrl. '/assets/img/users/' . $this->_datosUser->usu_imagen; ?>" alt="" /></a>
                </div>
                <div class="info">
                    <h4 style="color:#fff;">Hola <?php echo Yii::app()->user->name ?></h4>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->

        <?php
        echo "url: " . Yii::app()->baseUrl;
        $this->widget('zii.widgets.CMenu', array(
            'htmlOptions' => array('class' => 'nav'),
            'submenuHtmlOptions' => array('class' => 'sub-menu'),
            'activateItems' => true,
            'activateParents' => true,
            'activeCssClass' => 'active',
            'firstItemCssClass' => 'has-sub',
            'itemCssClass' => '',
            'encodeLabel' => false,
            'items' => array(
                array('label' => '<i class="fa fa-home"></i>Inicio', 'url' => array('./'), 'linkOptions' => array(),),
                array('label' => '<i class="fa fa-desktop"></i>Escritorio', 'url' => array('dashboard/index'), 'linkOptions' => array(),),
                
                array('label' => '<i class="fa fa-archive"></i>Trámites<b class="caret pull-right"></b>', 'url' => '', 'visible' => Yii::app()->authManager->checkAccess('ciudadano', Yii::app()->user->id), 'itemOptions' => array('class' => 'has-sub'), 
                    'items' => array(
                        array('label' => 'Registro', 'url' => array('ciudadano/index')),
                        array('label' => 'Seguimiento', 'url' => array('ciudadano/usuario_tramites')),
                        //array('label' => 'Mis comentarios', 'url' => array('')),
                    )),
                array('label' => '<i class="fa fa-institution alias"></i>Instituciones<b class="caret pull-right"></b>', 'url' => '', 'visible' => Yii::app()->authManager->checkAccess('institucion', Yii::app()->user->id), 'itemOptions' => array('class' => 'has-sub'), 
                    'items' => array(
                        array('label' => 'Mi Institución', 'url' => array('tramiteInstitucion/index')),
                        //array('label' => 'Acciones Correctivas', 'url' => array('')),
                        //array('label' => 'Seguimiento de Trámites', 'url' => array('')),
                        //array('label' => 'Servicios', 'url' => array('')),
                        //array('label' => 'Usuarios', 'url' => array('')),
                    )),
                /*
                array('label' => '<i class="fa fa-cubes"></i>Procesos<b class="caret pull-right"></b>', 'url' => '', 'visible' => Yii::app()->authManager->checkAccess('super_admin', Yii::app()->user->id), 'itemOptions' => array('class' => 'has-sub'), 
                    'items' => array(
                        array('label' => 'Aprobar Tranferencias', 'url' => array('')),
                        array('label' => 'Aprobar Acciones Correctivas', 'url' => array('')),
                        array('label' => 'Seguimiento', 'url' => array('')),
                    )),
                */
                 array('label' => '<i class="fa fa-crosshairs"></i>Seguimiento<b class="caret pull-right"></b>', 'url' => '', 'visible' => Yii::app()->authManager->checkAccess('bitacora', Yii::app()->user->id), 'itemOptions' => array('class' => 'has-sub'), 
                    'items' => array(
                        array('label' => 'Bitácora', 'url' => array('bitacora/index')),
                        array('label' => 'Bitácora Trámites', 'url' => array('bitacora/indexTramite')),
                        //array('label' => 'Tareas por usuario', 'url' => array('')),
                        //array('label' => 'Archivos', 'url' => array('')),
                    )),
                array('label' => '<i class="fa fa-cogs"></i>Administración<b class="caret pull-right"></b>', 'url' => '', 'visible' => Yii::app()->authManager->checkAccess('super_admin', Yii::app()->user->id), 'itemOptions' => array('class' => 'has-sub'),
                    'items' => array(
                        array('label' => 'Usuarios', 'url' => array('admin/index')),
                        //array('label' => 'Instituciones', 'url' => array('')),
                        array('label' => 'Roles', 'url' => array('admin/role')),
                        array('label' => 'Asignación de Roles', 'url' => array('admin/rolesUsuarios')),
                        //array('label' => 'Configuraciones', 'url' => array('')),
                    )),
                
                array('label' => '<i class="fa fa-sign-out"></i>Salir (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest, 'linkOptions' => array("data-description" => "member area")),
            ),
        ));
        ?>


        <!--<ul class="nav">
            <li class="nav-header">Menú</li>
            <li class="has-sub <?php //echo $this->_menuActive == 1 ? 'active' : ''; ?>">
                <a href="dashboard/index">

                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>    
            </li>
            <li class="has-sub active">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-user"></i>
                    <span>Usuario</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="#">Item 1</a></li>
                    <li ><a href="#">Item 2</a></li>
                    <li ><a href="#">Item 3</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <span class="badge pull-right"></span>
                    <i class="fa fa-user"></i> 
                    <span>Usuario-2</span>
                </a>
                <ul class="sub-menu">
                    <li ><a href="#">Item 2</a></li>
                    <li ><a href="#">Item 3</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <span class="badge pull-right"></span>
                    <i class="fa fa-user"></i> 
                    <span>Usuario-3</span>
                </a>
                <ul class="sub-menu">
                    <li ><a href="#">Item 1</a></li>
                    <li ><a href="#">Item 2</a></li>
                    <li ><a href="#">Item 3</a></li>
                </ul>
            </li>
            <?php //if (Yii::app()->authManager->checkAccess('super_admin', Yii::app()->user->id)): ?>
                <li class="has-sub <?php //echo $this->_menuActive == 1 ? 'active' : ''; ?>">
                    <a href="javascript:;">
                        <span class="badge pull-right"></span>
                        <i class="fa fa-cogs"></i> 
                        <span>Administración</span>
                    </a>
                    <ul class="sub-menu">
                        <li ><?php //echo CHtml::link('Usuarios', array('admin/index')); ?></li>
                        <li ><a href="#">Roles</a></li>
                        <li ><a href="#">Instituciones</a></li>
                    </ul>
                </li>
            <?php //endif; ?>

            <!-- begin sidebar minify button -->
            <!--<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>-->
            <!-- end sidebar minify button -->
        <!--</ul>-->
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>

