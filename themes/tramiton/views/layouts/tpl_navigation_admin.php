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
			
			<li>
				<form class="navbar-form full-width">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Buscar" />
						<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
					</div>
				</form>
			</li>
			
		
			<li class="dropdown navbar-user">
				<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
					<img src="<?php echo URL_IMG . $this->_datosUser->usu_imagen;?>" alt="" /> 
					<span class="hidden-xs"><?php echo $this->_datosUser->usu_nombre ?></span> <b class="caret"></b>
				</a>
				<ul class="dropdown-menu animated fadeInLeft">
					<li class="arrow"></li>
					<li><a href="javascript:;">Editar Perfil</a></li>
					<li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Notificaciones</a></li>
					<li><a href="javascript:;">Calendario</a></li>
					<li class="divider"></li>
                                        <li><?php echo CHtml::link('Salir', array('site/logout'));?></li>
				</ul>
			</li>
		</ul>
		<!-- end header navigation right -->
	</div>
	<!-- end container-fluid -->
</div>
<!-- end #header -->