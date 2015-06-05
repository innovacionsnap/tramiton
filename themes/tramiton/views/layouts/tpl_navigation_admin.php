<!-- begin #header -->
<div id="header" class="header navbar navbar-default navbar-fixed-top">
	<!-- begin container-fluid -->
	<div class="container-fluid">
		<!-- begin mobile sidebar expand / collapse button -->
		<div class="navbar-header">
			<a href="index.html" class="navbar-brand"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/logo_2.png" class="media-object" alt="" /></a>
			<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<!-- end mobile sidebar expand / collapse button -->
		
		<!-- begin header navigation right -->
		
		<ul class="nav navbar-nav navbar-right">
			<!--
			<li class=""><?php //echo CHtml::link('Inicio',array('/site/page', 'view'=>'home2')); ?></li>
			<li class=""><?php //echo CHtml::link('Ranking',array('/site/page', 'view'=>'home2')); ?></li>
			<li class=""><?php //echo CHtml::link('Mejora de Trámites',array('/site/page', 'view'=>'home2')); ?></li>
			<li class=""><?php //echo CHtml::link('Acerca de Tramitón',array('/site/page', 'view'=>'home2')); ?></li>
			<li class=""><?php //echo CHtml::link('Contacto',array('/site/page', 'view'=>'home2')); ?></li>
			-->
			<li>
				<form class="navbar-form full-width">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Buscar" />
						<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
					</div>
				</form>
			</li>
			<!--
			<li class="dropdown">
				<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
					<i class="fa fa-bell-o"></i>
					<span class="label">5</span>
				</a>
				<ul class="dropdown-menu media-list pull-right animated fadeInDown">
                    <li class="dropdown-header">Notifications (5)</li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>
                            <div class="media-body">
                                <h6 class="media-heading">Server Error Reports</h6>
                                <div class="text-muted f-s-11">3 minutes ago</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left"><img src="<?php // echo Yii::app()->theme->baseUrl;?>/assets/img/user-1.jpg" class="media-object" alt="" /></div>
                            <div class="media-body">
                                <h6 class="media-heading">John Smith</h6>
                                <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                <div class="text-muted f-s-11">25 minutes ago</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left"><img src="<?php // echo Yii::app()->theme->baseUrl;?>/assets/img/user-2.jpg" class="media-object" alt="" /></div>
                            <div class="media-body">
                                <h6 class="media-heading">Olivia</h6>
                                <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                <div class="text-muted f-s-11">35 minutes ago</div>
                            </div>
                        </a>
                    </li>
                    
				</ul>
			</li>
			-->
			<li class="dropdown navbar-user">
				<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/assets/img/user-13.jpg" alt="" /> 
					<span class="hidden-xs">Juan Pedrito Alvarado</span> <b class="caret"></b>
				</a>
				<ul class="dropdown-menu animated fadeInLeft">
					<li class="arrow"></li>
					<li><a href="javascript:;">Editar Perfil</a></li>
					<li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Notificaciones</a></li>
					<li><a href="javascript:;">Calendario</a></li>
					<li class="divider"></li>
					<li><a href="javascript:;">Salir</a></li>
				</ul>
			</li>
		</ul>
		<!-- end header navigation right -->
	</div>
	<!-- end container-fluid -->
</div>
<!-- end #header -->