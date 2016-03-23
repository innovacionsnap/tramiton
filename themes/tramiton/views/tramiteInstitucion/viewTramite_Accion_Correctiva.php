<?php
//$usu_id = $modelUser->usu_id;
$baseUrl = Yii::app()->baseUrl;
$usu_id = $this->_datosUser->usu_id;
?>

<script type="text/javascript">
 $(document).ready(function() {
    $(".actividad").fancybox({
        'titleShow'         : false,
        'width'             : '65%',
        'height'            : '65%',
        'autoScale'         : false,
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        'type'              : 'iframe',
       afterClose : function() {
            location.reload();
        }
    });
});
 $(document).ready(function() {
    $(".actividad-new").fancybox({
        'titleShow'         : false,
        'width'             : '65%',
        'height'            : '65%',
        'autoScale'         : false,
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        'type'              : 'iframe',
       afterClose : function() {
            location.reload();
       }
    });
});
</script>

<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Inicio</a></li>
                <li><a href="index">Mi institución</a></li>
				<li class="active">Acciones correctivas</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Tramites <small> de la institucion<br>Acciones correctivas</small></h1>
            <?php
            //echo $_GET["tra_id"];
             //foreach ($datoAccioneCorrectiva as $datoAccioneCorrectivaDetalle){
             //  $tra_id = $datoAccioneCorrectivaDetalle["tra_id"];
             // }
                if ($rol!=2){
                    echo '<div class="m-b-10"><a class="btn btn-success p-l-40 p-r-40 btn-sm actividad-new" href="'.$baseUrl.'/tramiteInstitucion/accion_correctiva?tra_id='.$_GET["tra_id"].'"> + Añadir </a> </div>';
                }
             ?>


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

                                            <th>Id AC</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>F. Ingreso</th>


                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                            foreach ($datoAccioneCorrectiva as $datoAccioneCorrectivaDetalle){
                                           ?>
                                            <tr class="odd gradeA">


                                                <td>
                                               <?php
                                                 if( $datoAccioneCorrectivaDetalle["accc_id"]!=''){
                                                    echo $datoAccioneCorrectivaDetalle["accc_id"];
                                                 }
                                                ?>
                                                </td>
                                                <td>
                                               <?php  echo $datoAccioneCorrectivaDetalle["accc_nombre"] ?>
                                                </td>
                                                <td>
                                               <?php  echo $datoAccioneCorrectivaDetalle["accc_descripcion"] ?>
                                                </td>
                                                <td>
                                               <?php  echo $datoAccioneCorrectivaDetalle["accc_fechaingreso"] ?>
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
