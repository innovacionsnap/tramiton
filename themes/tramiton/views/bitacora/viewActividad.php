<script type="text/javascript">
 $(document).ready(function() {
    $(".solucion").fancybox({
        'titleShow'         : false,
        'width'             : '65%',
        'height'            : '65%',
        'autoScale'         : false,
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        'type'              : 'iframe',
       // afterClose : function() {
       //     location.reload();
       // }
    });
});
</script>   




<!-- begin #content -->
        <div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li><a href="../dashboard/index">Inicio</a></li>
                <li class= "active"><a href="javascript:history.go(-1)">Regresar</a></li>
                
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Detalle Actividad <small></small></h1>
            <!-- end page-header -->
            <!-- begin profile-container -->
            <div class="profile-container">
                <!-- begin profile-section -->
                <div class="profile-section">
                   
                    <!-- begin profile-right -->
                    <div class="profile">
                        <!-- begin profile-info -->
                        <div class="profile-info">
                            <!-- begin table -->
                            <div class="table-responsive">
                                <table class="table table-profile">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>
                                                
                                                    <h4>
                                                <?php  foreach ($datosTarea_Actividad as $datosTarea_Actividad_detalle){ ?>
                            <?php echo $datosTarea_Actividad_detalle["tar_nombre"] ?>
                                                </h4>
                                                <small><strong>Por:</strong> 
                                                    <?php 
                                                    foreach ($datosTarea_Generador as $datosTarea_Generador_detalle)
                                                       echo $datosTarea_Generador_detalle["usu_nombre"]."  ";
                                                    
                                                    ?></small>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="highlight">
                                            <td class="field">Categoría</td>
                                            <td><?php  echo $datosTarea_Actividad_detalle["cat_nombre"]  ?></td>
                                        </tr>
                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Descripción</td>
                                            <td><?php echo $datosTarea_Actividad_detalle["tar_descripcion"] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Intitución</td>
                                            <td><?php echo $datosTarea_Actividad_detalle["ins_nombre"] ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td class="field">Participantes </td>
                                            <td>
                                                <?php 
                                            foreach ($datosTarea_Participantes as $datosTarea_Participantes_detalle){
                                                echo $datosTarea_Participantes_detalle["usu_nombre"]." / ";
                                            } 
                                        ?>

                                            </td>
                                        </tr>
                                        
                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr class="highlight">
                                            <td class="field"></td>
                                            <td>
                                            <h4>Actividades</h4>
                            <table class="table table-hover">
                                <thead>

                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                        <th>Fecha Registro</th>
                                        <th><?php
                                            echo CHtml::link('<button type="button" class="fa fa-plus-circle"></i> Mostrar</button>'
                                            ,array("/bitacora/viewActividad", 'tar_id' =>4), array('title' => 'Mostrar'));
                                            ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                     <?php foreach ($datosActividad as $datosActividad_detalle) {?>
                                    <tr class="odd gradeA">
                                       
                                        <td>
                                        <a href="<?php  echo $datosActividad_detalle["acc_id"] ?>" ><?php  echo $datosActividad_detalle["acc_nombre"] ?></a>
                                        </td>
                                        <td>
                                        <a href="<?php  echo $datosActividad_detalle["acc_id"] ?>" ><?php  echo $datosActividad_detalle["acc_descripcion"] ?></a>
                                        </td>
                                        <td>
                                        <a href="<?php  echo $datosActividad_detalle["acc_id"] ?>" ><?php  if ($datosActividad_detalle["acc_estado"]==1){echo "rojo";}
                                        elseif ($datosActividad_detalle["acc_estado"]==2)
                                            {echo "naranja";}
                                        if ($datosActividad_detalle["acc_estado"]==3){
                                            echo "verde";
                                        }

                                        
                                            # code...
                                         ?></a>
                                        </td>
                                        <td>
                                        <a href="<?php  echo $datosActividad_detalle["acc_id"] ?>" ><?php  echo $datosActividad_detalle["acc_fecharegistro"] ?></a>
                                        </td>
                                     
                                    </tr>
                                      <?php 
                                        } 
                                        ?>
                            </table>
                                                  
                                            </td>
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
                
            </div>
            <!-- end profile-container -->
        </div>
        <!-- end #content -->
        