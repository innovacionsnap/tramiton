

<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li><a href="javascript:;">Extra</a></li>
				<li class="active">Profile Page</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Detalle tramite <small></small></h1>
			<!-- end page-header -->
			<!-- begin profile-container -->
            <div class="profile-container">
                <!-- begin profile-section -->
                <div class="profile-section">
                    <!-- begin profile-left -->
                    <div class="profile-left">
                        <!-- begin profile-image -->
                        <div class="profile-image">
                            <img src="assets/img/profile-cover.jpg" />
                            <i class="fa fa-user hide"></i>
                        </div>
                        <!-- end profile-image -->
                        
                        <!-- end profile-highlight -->
                    </div>
                    <!-- end profile-left -->
                    <!-- begin profile-right -->
                    <div class="profile-right">
                        <!-- begin profile-info -->
                        <div class="profile-info">
                            <!-- begin table -->
                            <div class="table-responsive">
                                <table class="table table-profile">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>
                                            	<?php foreach ($datosTramite_Usuario as $dato_tramite_detalle) ?>
                                                <h4><?php echo $dato_tramite_detalle["ins_nombre"] ?><small><strong>Registro:</strong> <?php echo $dato_tramite_detalle["datt_fecharegistro"] ?></small></h4>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="highlight">
                                            <td class="field">Tramite</td>
                                            <td><?php echo $dato_tramite_detalle["tra_nombre"] ?></td>
                                        </tr>
                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Provincia</td>
                                            <td><?php echo $dato_tramite_detalle["pro_nombre"] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Canton</td>
                                            <td><?php echo $dato_tramite_detalle["can_nombre"] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Fecha </td>
                                            <td><?php echo $dato_tramite_detalle["datt_fecharegistro"] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">U. Prestadora </td>
                                            <td><?php echo $dato_tramite_detalle["datt_unidadprestadora"] ?></td>
                                        </tr>
                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr class="highlight">
                                            <td class="field">Experiencia</td>
                                            <td><?php echo $dato_tramite_detalle["datt_experiencia"] ?></td>
                                        </tr>
                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table -->
                        </div>
                        <!-- end profile-info -->
                    </div>
                    <!-- end profile-right -->
                </div>
                <!-- end profile-section -->
                <!-- begin profile-section -->
                <div class="profile-section">
                    <!-- begin row -->
                    <div class="row">
                        <!-- begin col-4 -->
                        <div class="col-md-12">
                            <h4 class="title">Soluciones</small></h4>
                            <!-- begin scrollbar -->
                            <div data-scrollbar="true" data-height="280px" class="bg-silver">
                                <!-- begin chats -->
                                <ul class="chats">
                                	<?php foreach ($datosTramite_Solucion as $dato_tramite_solucion){ ?>
                                    <li class="left">
                                    	<span class="date-time"><?php echo $dato_tramite_solucion["sol_fecha"] ?></span>
                                    	<a href="<?php echo 'http://localhost/tramiton2/solucion/index?sol='. $dato_tramite_solucion['sol_id']; ?>" class="name"><?php echo $dato_tramite_solucion["sol_titulo"] ?></a>
                                        <a href="javascript:;" class="image"><img src="<?php echo URL_IMG . $this->_datosUser->usu_imagen; ?>" alt="" /></a>
                                        <div class="message">
                                           <?php echo $dato_tramite_solucion["sol_descripcion"] ?>
                                        </div>
                                    </li>
                                   <?php } ?>
                                    
                                </ul>
                                <!-- end chats -->
                            </div>
                            <!-- end scrollbar -->
                        </div>
                        <!-- end col-4 -->
                       
                    </div>
                    <!-- end row -->
                </div>
                <!-- end profile-section -->
            </div>
			<!-- end profile-container -->
		</div>
		<!-- end #content -->
		