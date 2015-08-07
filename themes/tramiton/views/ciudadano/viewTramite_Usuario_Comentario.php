<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/parsley/dist/parsley.js"></script>

<!-- begin #content -->
		<div id="content" class="content">
			
			<!-- begin page-header -->
			<h1 class="page-header">Comentarios <small></small></h1>
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
                                                <?php foreach ($datosTramite_Solucion_Comentario as $datosTramite_Solucion_Comentario_detalle) ?>
                                                <h4><?php echo $datosTramite_Solucion_Comentario_detalle["com_descripcion"] ?><small><strong>Registro:</strong> <?php //echo $dato_tramite_detalle["datt_fecharegistro"] ?></small></h4>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        
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
                
            </div>
			<!-- end profile-container -->
		</div>
		<!-- end #content -->
		