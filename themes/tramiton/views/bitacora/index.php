
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
    <h1 class="page-header">Bitácora Personal<small></small></h1>

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
                    <a href="actividad" class="btn btn-info actividad" role="button">
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
                                    <th>Pendientes</th>
                                    <th>Quipux / Correo</th>
                                    <th>Estatus</th>
                                    <th>Prioridad</th>
                                    <th>%</th>
                                    <th><div><span style="background-color: green;">&nbsp;&nbsp;&nbsp;&nbsp;</span></div></th>
                                    <th><div><span style="background-color: orange;">&nbsp;&nbsp;&nbsp;&nbsp;</span></div></th>
                                    <th><div><span style="background-color: red;">&nbsp;&nbsp;&nbsp;&nbsp;</span></div></th>
                                    <th>Cierre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  foreach ($datosTarea as $dato){ ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $dato["tar_id"]  ?></td>
                                        <!--<td><?php echo $dato["cat_nombre"] ?></td> 
                                        <td><?php  echo substr($dato["ins_nombre"],0,40);?>...</td>-->
                                        <td><?php echo $dato["tar_nombre"] ?></td>
                                        <td><?php echo $dato["tar_descripcion"] ?></td>
                                        <td><?php //echo $dato["tar_estatus"]." ";
                                                if ($dato["tar_estatus"] == 0){
                                                    echo "Abierto";
                                                }
                                                if ($dato["tar_estatus"] == 1){
                                                    echo "Cerrado";
                                                }

                                                 ?>
                                        </td>
                                        <td>
                                            <?php //echo $dato["tar_importancia"];
                                                if ($dato["tar_importancia"] == 1){
                                                    echo "Baja";
                                                }
                                                if ($dato["tar_importancia"] == 2){
                                                    echo "Media";
                                                }
                                                if ($dato["tar_importancia"]==3){
                                                    echo "Alta";
                                                }
                                            ?>
                                        </td>
                                        <td> 
                                        <?php 
                                                $model=Bitacora::model();
                                                $contador_accion=$model->getNumeroActiviades($dato["tar_id"]);

                            
                                    
                                            
                                        ?></td>
                                        <?php $model=Bitacora::model();
                                        $contador_colores=$model->getColor($dato["tar_id"]);//$rojo = Yii::app()->Bitacora; 
                                        ?>
                                        <td>
                                        <?php
                                        echo $contador_colores['verde'];
                                        ?></td>
                                        <td>
                                            <?php
                                            echo $contador_colores['amarillo'];
                                            ?>

                                        </td>
                                        <td>
                                            <?php
                                            echo $contador_colores['rojo'];
                                            ?>

                                        </td>
                                        <td><small><?php echo $dato["tar_fecharegistro"] ?></small></td>
                                        <td>
                                            <?php
                                            echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-eye"></i> Mostrar</button>'
                                            ,array("/bitacora/viewActividad", 'tar_id' => $dato['tar_id']), array('title' => 'Mostrar'));
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