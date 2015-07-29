                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Form Wizards</h4>
                        </div>
                        <div class="panel-body">
                            <form action="themes/tramiton/views/ciudadano/prueba.php" method="POST" data-parsley-validate="true" name="form-wizard">
								<div id="wizard">
									<ol>
										<li>
										    Identification 
										    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</small>
										</li>
										<li>
										    Contact Information
										    <small>Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin.</small>
										</li>
										<li>
										    Login
										    <small>Phasellus lacinia placerat neque pretium condimentum.</small>
										</li>
										<li>
										    Completed
										    <small>Sed nunc neque, dapibus non leo sed, rhoncus dignissim elit.</small>
										</li>
									</ol>
									<!-- begin wizard step-1 -->
									<div class="wizard-step-1">
                                        <fieldset>
                                            <legend class="pull-left width-full">Identification</legend>
                                            <!-- begin row -->
                                            <div class="row">
                                                
                                                <!-- begin col-12 -->
                                                <div class="col-md-12">
													<div class="form-group">
														<label>Unidad Prestadora</label>
														<?php institucion("id_institucion", "0"); ?>  
														
													</div>
                                                </div>
                                                <!-- end col-12 -->
                                                <!-- begin col-12 -->
                                                	 <p id="pidhijo2">
                                                <!-- end col-12 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-12">
													<div class="form-group">
														<label>Provincia</label>
														<?php provincia("id_provincia","0")?>
													</div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-12 -->
                                                	 <p id="pidhijo">
                                                <!-- end col-12 -->
                                                
                                                <!-- begin col-12 -->
                                                <div class="col-md-12">
													<div class="form-group block1">
														<label>Unidad Prestadora</label>
														<input type="text" name="unidad_prestadora" placeholder="Unidad Prestadora" class="form-control" data-parsley-group="wizard-step-1" required />
													</div>
                                                </div>
                                                <!-- end col-12 -->
                                            </div>
                                            <!-- end row -->
										</fieldset>
									</div>
									<!-- end wizard step-1 -->
									<!-- begin wizard step-2 -->
									<div class="wizard-step-2">
										<fieldset>
											<legend class="pull-left width-full">Problemas</legend>
                                            <!-- begin row -->
                                            <div class="row">
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group">
														<?php echo problema2() ?>
														
													</div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group">
														<?php echo problema3() ?>
														
													</div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group">
														<?php echo problema4() ?>
														
													</div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-12 -->
                                                <div class="col-md-12">
													<div class="form-group">
														<label>Detalle d</label>
														 <textarea class="form-control" data-parsley-group="wizard-step-2" required id="message" name="experiencia" rows="4" data-parsley-range="[20,200]" placeholder="experiencia"></textarea>
													</div>
                                                </div>
                                                <!-- end col-6 -->
                                                
                                            </div>
                                            <!-- end row -->
										</fieldset>
									</div>
									<!-- end wizard step-2 -->
									<!-- begin wizard step-3 -->
									<div class="wizard-step-3">
										<fieldset>
											<legend class="pull-left width-full">Login</legend>
                                            <!-- begin row -->
                                            <div class="row">
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <div class="controls">
                                                            <input type="text" name="username" placeholder="johnsmithy" class="form-control" data-parsley-group="wizard-step-3" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>calve</label>
                                                        <div class="controls">
                                                            <input type="password" name="password" placeholder="Your password" class="form-control" data-parsley-group="wizard-step-3" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col-4 -->
                                                
                                            </div>
                                            <!-- end row -->
                                        </fieldset>
									</div>
									<!-- end wizard step-3 -->
									<!-- begin wizard step-4 -->
									<div>
									    <div class="jumbotron m-b-0 text-center">
                                            <h1>Login Successfully</h1>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat commodo porttitor. Vivamus eleifend, arcu in tincidunt semper, lorem odio molestie lacus, sed malesuada est lacus ac ligula. Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin. </p>
                                            <p><a class="btn btn-success btn-lg" role="button">Proceed to User Profile</a></p>
                                        </div>
									</div>
									<!-- end wizard step-4 -->
								</div>
							</form>
                        </div>
                    </div>
                    <!-- end panel -->