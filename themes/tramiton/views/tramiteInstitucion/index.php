<?php 
//$usu_id = $modelUser->usu_id;
$usu_id = $this->_datosUser->usu_id;
?>
<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Inicio</a></li>
				<li class="active">Bitácora</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Casos reportados<small> de la institución</small></h1>

			<!-- end page-header -->
			
		<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Datos principales</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                           
                                            <th>N° de casos</th>
                                            <th>Trámite</th>
                                            <th>Acciones</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                        <?php
                                            foreach ($datosgetTramiteInstitucion as $dato){
                                           ?>
                                            <tr class="odd gradeA">
                                              
                                                <td>
                                               <?php  echo $dato["total"] ?>
                                                </td>
                                                <td>
                                               <?php  echo $dato["tra_nombre"] ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                    $id_tramite=Empresa::model()->codificaGet('tra_id='.$dato['tra_id']);
                                                    $id_usuario=Empresa::model()->codificaGet('usu_id='.$usu_id);
                                                echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-eye"></i> Mostrar</button>'
                                            ,array("tramiteInstitucion/viewTramite_Institucion?".$id_tramite."and".$id_usuario), array('title' => 'Mostrar'));
                                            ?>
                                             <?php 
                                                echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-eye"></i> AC</button>'
                                            ,array("tramiteInstitucion/viewTramite_Accion_Correctiva?".$id_tramite), array('title' => 'Mostrar'));
                                            ?>
                                                </td>

                                            </tr>
                                           <?php
                                            }
                                           ?>
                                       
                                    </tbody>
                                      
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
            <!-- end row -->
    </div>
<!-- end #content -->
