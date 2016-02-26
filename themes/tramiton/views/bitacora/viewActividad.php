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
        afterClose : function() {
            location.reload();
        }
    });
});

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
    $(".actividad_d").fancybox({
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
<?php 
 $modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
        $id_usuario = $modelUser['usu_id'];
        $tar_id = $_GET['tar_id'];

?>
<!-- begin #content -->
        <div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li><a href="../dashboard/index">Inicio</a></li>
                <li class= "active"><a href="../bitacora/index">Regresar</a></li>
                
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Detalle Tarea <small></small></h1>
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
                                                <?php  echo $datosTarea_Actividad_detalle["tar_nombre"] ?>
                                                </h4>
                                                <small><strong>Elaborado por:</strong> 
                                                    <?php 
                                                     foreach ($datosTarea_Generador as $datosTarea_Generador_detalle)
                                                        echo $datosTarea_Generador_detalle["usu_nombre"]." &nbsp; Fecha:".$datosTarea_Generador_detalle["tar_fecharegistro"] ;
                                                    
                                                    ?></small>
                                                
                                         
                                                </small>
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
                                            <td class="field">Quipux / Correo</td>
                                            <td><?php echo $datosTarea_Actividad_detalle["tar_descripcion"] ?></td>
                                        </tr>
                                        
                                         <tr>
                                            <td class="field">Resolucion / Comentario</td>
                                            <td><?php echo $datosTarea_Actividad_detalle["tar_meta"] ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="field">Estatus</td>
                                            <td><?php

                                                if ($datosTarea_Actividad_detalle["tar_estatus"] == 0){
                                                    echo "Abierto";
                                                }
                                                if ($datosTarea_Actividad_detalle["tar_estatus"] == 1){
                                                    echo "Cerrado";
                                                }

                                            ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Institución</td>
                                            <td><?php echo $datosTarea_Actividad_detalle["ins_nombre"] ?></td>
                                        </tr>
                                        <?php } ?>
                                         <tr>
                                            <td class="field">Cumplimiento</td>

                                            <td >
                                                <?php 
                                                $model=Bitacora::model();
                                                $model->getNumeroActiviades($datosTarea_Actividad_detalle["tar_id"]);

                                        //echo $contador_accion;
                                        ?>

                                            </td>
                                            
                                        <tr>
                                            <td class="field">Participantes </td>
                                            <td>
                                                <?php 
                                            foreach ($datosTarea_Participantes as $datosTarea_Participantes_detalle){
                                                 echo $datosTarea_Participantes_detalle["usu_nombre"]." / ";
                                             } 
                                        ?> 
                                            <?php 
                                                foreach ($datosTarea_Generador as $datosTarea_Generador_detalle){
                                                    $creador_id = $datosTarea_Generador_detalle["usu_id"];  
                                                        if($creador_id==$id_usuario)  {
                                                            ?>
                                                            <a href="Participantes?tar_id=<?php echo  $datosTarea_Actividad_detalle['tar_id'] ?>" class="solucion" title="Añadir Paricipantes">
                                            <li class="fa fa-plus-circle"></li></a>
                                                            
                                                            <?php 
                                                        }
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
                                            <h4>Actividades
                                                
                                            </h4>
                                           
                                            <?php
                                                $id = Empresa::model()->codificaGet('tar_id='. $datosTarea_Actividad_detalle["tar_id"].'&'.'acc_tipo=1'.'&'.'accion=insert');
                                                echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-plus-circle (alias)"></i> Añadir</button>', array('bitacora/actividad_detalle/?'.$id), array('title' => 'Añadir'));
                                            ?>
                                            
                            <table class="table table-hover">
                                <thead>

                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                        <th>Nivel</th>
                                        <th>Fecha Registro</th>
                                        <th>Elaborado Por:</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>    
                                     <?php  foreach ($datosActividad as $datosActividad_detalle) {?>
                                    <tr class="odd gradeA">
                                       
                                        <td>
                                            <?php  echo $datosActividad_detalle["acc_nombre"] ?>
                                        </td>
                                        <td>
                                            <?php  echo $datosActividad_detalle["acc_descripcion"] ?>
                                        </td>
                                        
                                        <td>
                                        
                                        <?php  
                                            if ($datosActividad_detalle["acc_estado"]==1){?>
                                                
                                                <div><span style="background-color: green;">&nbsp;&nbsp;&nbsp;&nbsp;</span></div>
                                            <?php 
                                            }
                                            elseif ($datosActividad_detalle["acc_estado"]==2){ ?>
                                                <div><span style="background-color: orange;">&nbsp;&nbsp;&nbsp;&nbsp;</span></div>
                                            <?php
                                            }
                                            if ($datosActividad_detalle["acc_estado"]==3){ ?>
                                                <div><span style="background-color: red;">&nbsp;&nbsp;&nbsp;&nbsp;</span></div>
                                            <?php 
                                            }

                                        
                                            # code...
                                         ?>
                                        <td>
                                            <?php   echo $datosActividad_detalle["acc_nivel"] ?>%
                                        </td>
                                     
                                        <td>
                                            <?php  echo $datosActividad_detalle["acc_fecharegistro"] ?>
                                        </td>
                                        <td>
                                            <?php  echo $datosActividad_detalle["usu_nombre"] ?>
                                        </td>
                                        <td>
                                            <?php 
                                             //$id = $datosActividad_detalle["acc_id"];
                                             //$id2 = $datosTarea_Actividad_detalle['tar_id'];
                                             if ( $datosActividad_detalle["acc_nivel"] == 100 ){
                                                echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-smile-o (alias)"></i> Finalizado</button>', array('title' => 'Finalizado'));
                                             }else{
                                                if ($datosActividad_detalle['usu_id']==$id_usuario){

                                                    $id = Empresa::model()->codificaGet('acc_id='. $datosActividad_detalle["acc_id"].'&'.'tar_id='. $datosActividad_detalle["tar_id"].'&'.'acc_tipo=1'.'&'.'accion=edit');
                                                echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-edit (alias)"></i> Editar</button>', array('bitacora/actividad_detalle/?'.$id), array('title' => 'Editar'));

                                                }
                                                
                                             }

                                              
                                            ?>
                                           <!--  <a href="actividad_detalle?tar_id=<?php //echo  $datosTarea_Actividad_detalle['tar_id'] ?>&acc_id=<?php  //echo $datosActividad_detalle["acc_id"] ?>" class="btn btn-inverse active btn-xs m-r-5" role="button">
                                                <li class="fa fa-plus-circle">&nbsp;&nbsp;</li>Mostrar</a> -->
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
            <!-- fin view -->
        </div>
        <!-- end #content -->
        