
<?php $baseUrl = Yii::app()->baseUrl; ?>
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
        <li class="active">Tramites</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Bitácora Simplificacion de Trámites<small></small></h1>

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
                    <a href="actividadTramite" class="btn btn-info actividad" role="button">
                        <li class="fa fa-plus-circle">&nbsp;&nbsp;</li>Nuevo</a>
                    <hr>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <!--<th>Categoria</th> 
                                    <th>Institucion</th>
                                    -->
                                    <th>Sector</th>
                                    <th>Institucion</th>
                                    <th>Servicio Trámite</th>
                                    <th>Problema</th>
                                    <th>Estandar</th>
                                    <th>%</th>
                                    <th>F. Cierre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  foreach ($datosTarea as $dato){ ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $dato["tar_id"]  ?></td>
                                        <!--<td><?php echo $dato["cat_nombre"] ?></td> 
                                        <td><?php  echo substr($dato["ins_nombre"],0,40);?>...</td>-->
                                        <td><?php echo $dato["sec_nombre"] ?></td>
                                        <td><?php echo $dato["ins_nombre"] ?></td>
                                        <td><?php 
                                          $model=Bitacora::model();
                                                $nombreTramite=$model->getInstitucion($dato["tar_nombre"]);
                                         ?></td>
                                        <td>
                                            <?php //echo $dato["tar_importancia"];
                                                if ($dato["tar_descripcion"] == ''){
                                                    
                                                    echo "n/a";  

                                                }else{
                                                    echo $dato["tar_descripcion"];
                                                }
                                               
                                            ?>
                                        </td>
                                        <td>
                                            <?php //echo $datosTarea_Actividad_detalle["tar_estandar"]

                                                $model=Bitacora::model();
                                                $nombreTramite=$model->getEstandar($dato["tar_estandar"]);


                                            ?>
                                        </td>
                                        <td> 
                                        <?php 
                                                $model=Bitacora::model();
                                                $contador_accion=$model->getNumeroActiviades($dato["tar_id"]);

                                            
                                        ?></td>

                                         <td> 
                                            <?php echo $dato["tar_fechafin"] ?>
                                         </td>
                                        
                                        
                                        <td>
                                            <?php
                                            echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-eye"></i> Mostrar</button>'
                                            ,array("/bitacora/viewActividadTramite", 'tar_id' => $dato['tar_id']), array('title' => 'Mostrar'));
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>

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