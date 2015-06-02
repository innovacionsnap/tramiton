<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->

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
                                            <th>N°</th>
                                            <th>Tramite</th>
                                            <th>N° de quejas</th>
                                            <th>Estrategias</th>
                                            <th>verificado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr class="even gradeC">
                                            <td>1</td>
                                            <td>Actualización de Personeria Jurídica</td>
                                            <td>45</td>
                                            <td>NO</td>
                                            <td>SI</td>
                                            <td>
                                             	 <a href="form_wizards_validation_tramite.html" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                       			 <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                       			 <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
						                    </td>
                                        </tr>
                                        <tr class="odd gradeA">
                                            <td>2</td>
                                            <td>abuso y reclamo por devolucion de 1300 dólares que me cobraron de mas en una multa que me interpuso el Ministerio de Relaciones laborales y van 2 meses sin devolver y piden documentación</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td>
                                            	<div class="panel-heading-btn">
						                        	<a class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						                        </div> 
                                            </td>
                                        </tr>
                                        <tr class="even gradeA">
                                            <td>3</td>
                                            <td>abuso y reclamo por devolucion de 1300 dólares que me cobraron de mas en una multa que me interpuso el Ministerio de Relaciones laborales y van 2 meses sin devolver y piden documentación</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td>
                                            	<div class="panel-heading-btn">
						                        	<a class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						                        </div> 
                                            </td>
                                        </tr>
                                        <tr class="odd gradeA">
                                            <td>4</td>
                                            <td>abuso y reclamo por devolucion de 1300 dólares que me cobraron de mas en una multa que me interpuso el Ministerio de Relaciones laborales y van 2 meses sin devolver y piden documentación</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td> 
                                            	<div class="panel-heading-btn">
						                        	<a class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						                        </div> 
                                            </td>
                                        </tr>
                                        <tr class="even gradeA">
                                            <td>5</td>
                                            <td>Aprobación de la Reclasificación de Puestos</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td> </td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>6</td>
                                            <td>abuso y reclamo por devolucion de 1300 dólares que me cobraron de mas en una multa que me interpuso el Ministerio de Relaciones laborales y van 2 meses sin devolver y piden documentación</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td> </td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>7</td>
                                            <td>Aprobación de la Reclasificación de Puestos</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td> </td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>8</td>
                                            <td>abuso y reclamo por devolucion de 1300 dólares que me cobraron de mas en una multa que me interpuso el Ministerio de Relaciones laborales y van 2 meses sin devolver y piden documentación</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td> </td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>9</td>
                                            <td>abuso y reclamo por devolucion de 1300 dólares que me cobraron de mas en una multa que me interpuso el Ministerio de Relaciones laborales y van 2 meses sin devolver y piden documentación</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td> </td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>10</td>
                                            <td>abuso y reclamo por devolucion de 1300 dólares que me cobraron de mas en una multa que me interpuso el Ministerio de Relaciones laborales y van 2 meses sin devolver y piden documentación</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td> </td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>11</td>
                                            <td>abuso y reclamo por devolucion de 1300 dólares que me cobraron de mas en una multa que me interpuso el Ministerio de Relaciones laborales y van 2 meses sin devolver y piden documentación</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td> </td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>12</td>
                                            <td>abuso y reclamo por devolucion de 1300 dólares que me cobraron de mas en una multa que me interpuso el Ministerio de Relaciones laborales y van 2 meses sin devolver y piden documentación</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td> </td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>13</td>
                                            <td>abuso y reclamo por devolucion de 1300 dólares que me cobraron de mas en una multa que me interpuso el Ministerio de Relaciones laborales y van 2 meses sin devolver y piden documentación</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td> </td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>14</td>
                                            <td>abuso y reclamo por devolucion de 1300 dólares que me cobraron de mas en una multa que me interpuso el Ministerio de Relaciones laborales y van 2 meses sin devolver y piden documentación</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td> </td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>15</td>
                                            <td>abuso y reclamo por devolucion de 1300 dólares que me cobraron de mas en una multa que me interpuso el Ministerio de Relaciones laborales y van 2 meses sin devolver y piden documentación</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td> </td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>16</td>
                                            <td>Aprobación del Manual de Valoración y Clasificación de Puestos</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td> </td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>17</td>
                                            <td>Asesoramiento en el cálculo de Pensión de Jubilación Patronal solicitada por el trabajador y/o empleador</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td> </td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>18</td>
                                            <td>abuso y reclamo por devolucion de 1300 dólares que me cobraron de mas en una multa que me interpuso el Ministerio de Relaciones laborales y van 2 meses sin devolver y piden documentación</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td> </td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>19</td>
                                            <td>abuso y reclamo por devolucion de 1300 dólares que me cobraron de mas en una multa que me interpuso el Ministerio de Relaciones laborales y van 2 meses sin devolver y piden documentación</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td> </td>
                                        </tr>
                                        <tr class="gradeA">
                                           <td>20<td>
                                            <td>Autorización de Actividades Complementarias a las empresas prestadoras de servicios</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td> </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>21</td>
                                            <td>abuso y reclamo por devolucion de 1300 dólares que me cobraron de mas en una multa que me interpuso el Ministerio de Relaciones laborales y van 2 meses sin devolver y piden documentación</td>
                                            <td>45</td>
                                            <td>SI</td>
                                            <td>NO</td>
                                            <td> </td>
                                        </tr>
                                        
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
		</div>
<!-- end #content -->
<!-- begin theme-panel -->
        <div class="theme-panel">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
            <div class="theme-panel-content">
                <h5 class="m-t-0">Color Theme</h5>
                <ul class="theme-list clearfix">
                    <li class="active"><a href="javascript:;" class="bg-green" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
                </ul>
                <div class="divider"></div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Header Styling</div>
                    <div class="col-md-7">
                        <select name="header-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">inverse</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Header</div>
                    <div class="col-md-7">
                        <select name="header-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Styling</div>
                    <div class="col-md-7">
                        <select name="sidebar-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">grid</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Sidebar</div>
                    <div class="col-md-7">
                        <select name="sidebar-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
                    <div class="col-md-7">
                        <select name="content-gradient" class="form-control input-sm">
                            <option value="1">disabled</option>
                            <option value="2">enabled</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Content Styling</div>
                    <div class="col-md-7">
                        <select name="content-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">black</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <a href="#" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage"><i class="fa fa-refresh m-r-3"></i> Reset Local Storage</a>
                    </div>
                </div>
            </div>
        </div>
<!-- end theme-panel -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'assets/plugins/DataTables/js/jquery.dataTables.js',CClientScript::POS_END); ?>	
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'assets/js/table-manage-default.demo.min.js',CClientScript::POS_END); ?>	
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'assets/js/apps.min.js',CClientScript::POS_END); ?>	


<!-- ================== END PAGE LEVEL JS prueba ================== -->
<script>
		$(document).ready(function() {
			App.init();
			TableManageDefault.init();
		});
</script>