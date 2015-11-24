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
                <li><a href="javascript:;">Home</a></li>
                <li><a href="javascript:;">Extra</a></li>
                <li class="active">Profile Page</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Detalle tramite <small></small></h1>
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
                                            <td class="field">Tramite</td>
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
                                            <td class="field">Canton</td>
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
                                        <tr class="highlight">
                                            <td class="field">Soluciones</td>
                                            <td>
                                                <?php foreach ($datosTramite_Solucion as $dato_tramite_solucion){ ?>
                                                    <a href="../solucion/index?sol=<?php echo  $dato_tramite_solucion['sol_id'] ?>" class="solucion"><?php echo $dato_tramite_solucion["sol_titulo"] ?></a>
                                                    <div class="message">
                                                        <?php echo $dato_tramite_solucion["sol_descripcion"] ?>
                                                    </div>
                                                    <br>

                                                     <a href="../solucion/index?sol=<?php echo  $dato_tramite_solucion['sol_id'] ?>" class="btn btn-info solucion" role="button">Responder</a>
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
        