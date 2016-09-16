<?php 
//$usu_id = $modelUser->usu_id;
$usu_id = $this->_datosUser->usu_id;
?>
<!-- begin #content -->
		<div id="content" class="container-fluid">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><?php echo CHtml::link('Inicio',array('dashboard/index')); ?></li>
                <li class= "active"><a href="javascript:history.go(-1)">Regresar</a></li>
               
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Casos reportados <small> de la institucion<br>Detalle trámite</small></h1>

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
                                           
                                            <th>Nro. Caso</th>
                                            <th>Nombre Trámite</th>
                                            <th>Experiencia</th>
                                            <th>Fecha Registro</th>
                                            <th>Detalle</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                        <?php
                                            foreach ($datosgetTramiteInstitucionDetalle as $datoTramiteDetalle){
                                           ?>
                                            <tr class="odd gradeA">
                                              
                                                <td>
                                               <?php  echo $datoTramiteDetalle["datt_id"] ?>
                                                </td>
                                                <td>
                                               <?php  echo $datoTramiteDetalle["tra_nombre"] ?>
                                                </td>
                                                <td>
                                               <?php  echo $datoTramiteDetalle["datt_experiencia"] ?>
                                                </td>
                                               
                                                <td>
                                               <?php  echo $datoTramiteDetalle["datt_fecharegistro"] ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $id=Empresa::model()->codificaGet('datt_id='.$datoTramiteDetalle['datt_id']);
                                                   echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-eye"></i> Mostrar</button>'
                                            ,array("ciudadano/viewTramite_Usuario2?".$id), array('title' => 'Mostrar'));
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
