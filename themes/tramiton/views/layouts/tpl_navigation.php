<!-- begin #header -->
<div id="header" class="header navbar navbar-default navbar-fixed-top">
    <!-- begin container -->
    <div class="container">
        <!-- begin navbar-header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.html" class="navbar-brand visible-xs">
                <span class="brand-logo"><img src=""></span>
            </a>
        </div>
        <!-- end navbar-header -->
        <!-- begin navbar-collapse -->
        <div class="collapse navbar-collapse" id="header-navbar">
        	
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav navbar-nav navbar-right'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu dropdown-menu-left animated fadeInDown'),
					'itemCssClass'=>'',
                    'encodeLabel'=>false,
                    'items'=>array(
                        array('label'=>'Inicio', 'url'=>array('/site/index/'),'linkOptions'=>array(),),
						array('label'=>'Ranking<b class="caret"></b>', 'url'=>array('/site/index/tramites'),'itemOptions'=>array('class'=>'dropdown'),'linkOptions'=>array('data-toggle'=>'dropdown'), 
                        'items'=>array(
                        	array('label'=>'Trámites Más Absurdos', 'url'=>array('/site/admin/')),
                            array('label'=>'Trámites Más Mencionados', 'url'=>array('/site/admin/')),
							array('label'=>'Instituciones Más Mencionadas', 'url'=>array('/site/page', 'view'=>'admin')),
                        )),
						array('label'=>'Mejora de Trámites<b class="caret"></b>', 'url'=>array('/site/index/tramites2'),'itemOptions'=>array('class'=>'dropdown'),'linkOptions'=>array('data-toggle'=>'dropdown'), 
                        'items'=>array(
                            array('label'=>'Seguimiento de Mejora de Trámites', 'url'=>array('/site/index')),
							array('label'=>'Plan Nacional de Simplificación de Trámites', 'url'=>array('/site/page', 'view'=>'home2')),
                        )),
						array('label'=>'Acerca de Tramitón<b class="caret"></b>', 'url'=>array('/site/index/tramites3'),'itemOptions'=>array('class'=>'dropdown'),'linkOptions'=>array('data-toggle'=>'dropdown'), 
                        'items'=>array(
                            array('label'=>'¿Qué es y Porque Tramitón?', 'url'=>array('/site/formulario/')),
							array('label'=>'Gobierno Abierto', 'url'=>array('/site/page', 'view'=>'home2')),
							array('label'=>'FAQs', 'url'=>array('/site/page', 'view'=>'home2')),
                        )),
                        array('label'=>'Contacto', 'url'=>array('/site/index/tramites4'),'linkOptions'=>array(),),
                       
                        array('label'=>'<i class="fa fa-user"></i>&nbsp;Ingresar', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"member area")),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"member area")),
                    ),
                )); ?>
            
        </div>
        <!-- end navbar-collapse -->
    </div>
    <!-- end container -->
</div>
<!-- end #header -->