
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/lib/jquery-1.10.1.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/source/jquery.fancybox.js?v=2.1.5"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/source/jquery.fancybox.css?v=2.1.5"></script>


<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Inicio</a></li>
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
                                            <td class="field">U. Prestado </td>
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
                            <h4 class="title">Soluciones <a class="fancybox fancybox.iframe" href="iframe.html?uno=2">Iframe</a></small></h4>
                            <!-- begin scrollbar -->
                            <div data-scrollbar="true" data-height="280px" class="bg-silver">
                                <!-- begin chats -->
                                <ul class="chats">

                                        <tr>
                                        <td>Modal Dialog Box with fade out animation.</td>
                                        <td><a href="#modal-without-animation" class="btn btn-sm btn-default" data-toggle="modal">Demo</a></td>
                                        </tr>

                                        <!-- #modal-without-animation -->
                                        <div class="modal" id="modal-without-animation">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Modal Without Animation</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Modal body content here...
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal" id="modal-without-animation2">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Modal Without Animation</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Modal body content here...
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal" id="modal-without-animation3">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Modal Without Animation</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Modal body content here...
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                	<?php foreach ($datosTramite_Solucion as $dato_tramite_solucion){ ?>
                                    <li class="left">
                                    	<span class="date-time"><?php echo $dato_tramite_solucion["sol_fecha"] ?></span>
                                    	<a href="#modal-without-animation" data-toggle="modal" class="name"><?php echo $dato_tramite_solucion["sol_titulo"] ?></a>
                                        <a href="javascript:;" class="image"><img src="<?php echo URL_IMG . $this->_datosUser->usu_imagen; ?>" alt="" /></a>
                                        <div class="message">
                                           <?php echo $dato_tramite_solucion["sol_descripcion"] ?>
                                        </div>
                                    </li>
                                   <?php } ?>
                                   <?php //$usuario = Usuario::model()->findByPk(id);
                                   //echo $usuario;
                                    ?>
                                    
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
		