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
            <h1 class="page-header">Detalle trámite <small></small></h1>
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
                                                <?php foreach ($datosTramite_Usuario as $dato_tramite_detalle) ?>
                                                <h4><?php echo $dato_tramite_detalle["ins_nombre"] ?><small><strong>Registro:</strong> <?php echo $dato_tramite_detalle["datt_fecharegistro"] ?></small></h4>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="highlight">
                                            <td class="field">Trámite</td>
                                            <td><?php echo $dato_tramite_detalle["tra_nombre"] ?></td>
                                        </tr>
                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Provincia</td>
                                            <td><?php echo $dato_tramite_detalle["pro_nombre"] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Cantón</td>
                                            <td><?php echo $dato_tramite_detalle["can_nombre"] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Fecha </td>
                                            <td><?php echo $dato_tramite_detalle["datt_fecharegistro"] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="field">U. Prestado </td>
                                            <td><?php echo $dato_tramite_detalle["datt_unidadprestadora"] ?></td>
                                        </tr>
                                      
                                        <tr>
                                            <td class="field">Experiencia</td>
                                            <td><?php echo $dato_tramite_detalle["datt_experiencia"] ?></td>
                                        </tr>
                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        
                                        <!--///////////cambio w///////////-->
                                        <tr class="highlight">
                                            <td class="field">Problemas</td>
                                            <td>
                                                <?php
                                                
                                                    foreach ($datosTramite_Problemas as $datos_tramite_problemas){ 
                                                        $id=Empresa::model()->codificaGet('sol='.$datos_tramite_problemas['prob_nombre']);?>
                                                    
                                                    <div class="message">
                                                        <strong><?php echo $datos_tramite_problemas["prob_nombre_principal"];?></strong>
                                                                <?php echo "<br>" ;echo $datos_tramite_problemas["prob_nombre"] ?>
                                                    </div>
                                                    <br>

                                                     
                                                <?php } ?>
                                                   
                                            </td>
                                        </tr>
                                        
                                        <!--///////////cambio w///////////-->
                                        <tr class="highlight">
                                            <td class="field">Soluciones</td>
                                            <td>
                                                <?php
                                                
                                                    foreach ($datosTramite_Solucion as $dato_tramite_solucion){ 
                                                        $id=Empresa::model()->codificaGet('sol='.$dato_tramite_solucion['sol_id']);?>
                                                    <a href="../solucion/index?<?php echo $id;?>" class="solucion"><?php echo $dato_tramite_solucion["sol_titulo"] ?></a>
                                                    <div class="message">
                                                        <?php echo $dato_tramite_solucion["sol_descripcion"] ?>
                                                    </div>
                                                    <br>

                                                    <a href="../solucion/index?<?php echo  $id; ?>" class="btn btn-blue-tramiton solucion" role="button">Responder</a>
                                                <?php } ?>

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
        