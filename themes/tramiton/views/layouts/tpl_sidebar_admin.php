<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;"><img src="<?php echo Yii::app()->theme->baseUrl;?>/assets/img/users/user-13.jpg" alt="" /></a>
						</div>
						<div class="info">
							Usuario
							<small>Hola <?php echo Yii::app()->user->name ?>!</small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Menú</li>
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
                                        <?php if(Yii::app()->authManager->checkAccess('super_admin', Yii::app()->user->id)): ?>
					<li class="has-sub">
						<a href="javascript:;">
							<span class="badge pull-right"></span>
							<i class="fa fa-user"></i> 
							<span>Administración</span>
						</a>
						<ul class="sub-menu">
						    <li ><a href="#">Usuarios</a></li>
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
		