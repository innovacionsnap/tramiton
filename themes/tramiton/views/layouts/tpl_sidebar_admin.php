<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="<?php echo URL_IMG . $this->_datosUser->usu_imagen; ?>" alt="" /></a>
                </div>
                <div class="info">
                    Usuario
                    <small>Hola <?php echo Yii::app()->user->name ?>!</small>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->

        <?php
        $this->widget('zii.widgets.CMenu', array(
            'htmlOptions' => array('class' => 'nav'),
            'submenuHtmlOptions' => array('class' => 'sub-menu'),
            'activateItems' => true,
            'activeCssClass' => 'active',
            'firstItemCssClass' => 'has-sub',
            'itemCssClass' => '',
            'encodeLabel' => false,
            'items' => array(
                array('label' => '<i class="fa fa-home"></i>Inicio', 'url' => array('dashboard/index'), 'linkOptions' => array(),),
                array('label' => '<i class="fa fa-cogs"></i>Administración'),
                /*array('label' => 'Ranking<b class="caret"></b>', 'url' => array('/site/index/tramites'), 'itemOptions' => array('class' => 'has-sub'), 'linkOptions' => array('data-toggle' => 'dropdown'),
                    'items' => array(
                        array('label' => 'Trámites Más Absurdos', 'url' => array('/site/admin/')),
                        array('label' => 'Trámites Más Mencionados', 'url' => array('/site/admin/')),
                        array('label' => 'Instituciones Más Mencionadas', 'url' => array('/site/page', 'view' => 'admin')),
                    )),
                array('label' => 'Mejora de Trámites<b class="caret"></b>', 'url' => array('/site/index/tramites2'), 'itemOptions' => array('class' => 'has-sub'), 'linkOptions' => array('data-toggle' => 'dropdown'),
                    'items' => array(
                        array('label' => 'Seguimiento de Mejora de Trámites', 'url' => array('/site/index')),
                        array('label' => 'Plan Nacional de Simplificación de Trámites', 'url' => array('/site/page', 'view' => 'home2')),
                    )),
                array('label' => 'Acerca de Tramitón<b class="caret"></b>', 'url' => array('/site/index/tramites3'), 'itemOptions' => array('class' => 'has-sub'), 'linkOptions' => array('data-toggle' => 'dropdown'),
                    'items' => array(
                        array('label' => '¿Qué es y Porque Tramitón?', 'url' => array('/site/formulario/')),
                        array('label' => 'Gobierno Abierto', 'url' => array('/site/page', 'view' => 'home2')),
                        array('label' => 'FAQs', 'url' => array('/site/page', 'view' => 'home2')),
                    )),
                array('label' => 'Contacto', 'url' => array('/site/index/tramites4'), 'linkOptions' => array(),),
                array('label' => '<i class="fa fa-user"></i>&nbsp;Ingresar', 'url' => array('./#login-modal'), 'visible' => Yii::app()->user->isGuest, 'linkOptions' => array("data-description" => "member area", 'data-toggle' => "modal")),*/
                array('label' => 'Salir (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest, 'linkOptions' => array("data-description" => "member area")),
            ),
        ));
        ?>


        <ul class="nav">
            <li class="nav-header">Menú</li>
            <li class="has-sub <?php echo $this->_menuActive == 1 ? 'active' : ''; ?>">
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
            <?php if (Yii::app()->authManager->checkAccess('super_admin', Yii::app()->user->id)): ?>
                <li class="has-sub <?php echo $this->_menuActive == 1 ? 'active' : ''; ?>">
                    <a href="javascript:;">
                        <span class="badge pull-right"></span>
                        <i class="fa fa-cogs"></i> 
                        <span>Administración</span>
                    </a>
                    <ul class="sub-menu">
                        <li ><?php echo CHtml::link('Usuarios', array('admin/index')); ?></li>
                        <li ><a href="#">Roles</a></li>
                        <li ><a href="#">Instituciones</a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
