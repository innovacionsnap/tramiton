<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Tramites</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Tramites <small> de la institucion</small></h1>

			<!-- end page-header -->
                        
                        
                        
            <!-- begin row -->
			<div class="row">
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-green">
						<div class="stats-icon"><i class="fa fa-desktop"></i></div>
						<div class="stats-info">
							<h4>TOTAL</h4>
                                                        <p><?php foreach ($datosTotalTramites as $dato){echo $numero_tramites = $dato["total_tramite"];} ?></p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">Ver Detalles <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-blue">
						<div class="stats-icon"><i class="fa fa-chain-broken"></i></div>
						<div class="stats-info">
							<h4>RANKING TRAMITES</h4>
							<p><?php foreach ($datosRankingTramites as $datoRanking){
                                                            $tot_ranking = $datoRanking["sum_10_tot_tramite"];
                                                        }  
                                                        $porcentaje_tramite = ($tot_ranking*100)/$numero_tramites;
                                                        echo substr($porcentaje_tramite, 0,2);
                                                        ?>%</p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">Ver Detalles <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-purple">
						<div class="stats-icon"><i class="fa fa-users"></i></div>
						<div class="stats-info">
							<h4>TRAMITES MAS VISITADOS</h4>
							<p>1,291,922</p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;">Ver Datalles <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-red">
						<div class="stats-icon"><i class="fa fa-clock-o"></i></div>
						<div class="stats-info">
							<h4>SOLUCIONES MAS VOTADAS</h4>
							<p>30%</p>	
						</div>
						<div class="stats-link">
                                                    <a href="rankingTramites">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
							<?php //echo CHtml::link('Ver Detalles', array('dashboard/rankingTramites')); ?>
							
						</div>
					</div>
				</div>
				<!-- end col-3 -->
			</div>
			<!-- end row -->
                        
                        
			
		<!-- begin row -->
		<div class="row">
		<!-- begin col-8 -->
				<div class="col-md-12">
					<!-- inicio mensajes -->
					<div class="panel panel-inverse" data-sortable-id="index-5">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Mensajes</h4>
						</div>
						<div class="panel-body">
							<div class="height-sm" data-scrollbar="true">
								<ul class="media-list media-list-with-divider media-messaging">
                                                                    <?php 
                                                                          //  print_r($datosPublicacionesTramites);
                                                                        foreach ($datosPublicacionesTramites as $datosPublicaciones){
                                                                    ?>
                                                                    <li class="media media-sm">
										<a href="javascript:;" class="pull-left">
											<img src="<?php echo URL_IMG . $datosPublicaciones["usu_imagen"]; ?>" alt="" class="media-object rounded-corner" />
										</a>
										<div class="media-body">
											<h5 class="media-heading"><?php echo $datosPublicaciones["usu_nombreusuario"]; ?></h5>
											<p><?php echo $datosPublicaciones["usu_imagen"]; ?>Publicó el trámite , <?php echo $datosPublicaciones["tra_nombre"]; ?> en <?php echo $datosPublicaciones["ins_nombre"]; ?></p>
                                                                                        <p><strong>Publicado: </strong><?php echo $datosPublicaciones["datt_fecharegistro"]; ?></p>
										</div>
									</li>
                                                                    <?php       
                                                                        //echo $datosPublicaciones["ins_nombre"]; 
                                                                        }
                                                                    ?>
									
								</ul>
							</div>
						</div>
						<div class="panel-footer">
							<form>
								<div class="input-group">
									<input type="text" class="form-control bg-silver" placeholder="Ingresar el mensaje" />
									<span class="input-group-btn">
										<button class="btn btn-primary" type="button"><i class="fa fa-pencil"></i></button>
									</span>
								</div>
							</form>
                        </div>
					</div>
					<!-- fin mensajes -->
					<!-- inicio grafico -->
					<div class="panel panel-inverse" data-sortable-id="index-1">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Tramites ingresados (7 días)</h4>
						</div>
						<div class="panel-body">
							<div id="interactive-chart" class="height-sm"></div>
						</div>
					</div>
					<!-- fin grafico --> 
					
					
					
				</div>
					    
                </div>
            <!-- end row -->
        <!-- end row -->
    </div>
<!-- end #content -->
