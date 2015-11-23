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
            <!-- end breadcrumb -->
            <h1 class="page-header">Detalle trámite</h1>

            <div class="row">
            <!-- <div class="table-responsive"> -->
                <table class="table table-profile" style="margin:auto;">
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
                        <tr class="divider">
                            <td colspan="2"></td>
                        </tr>
                        <tr class="highlight">
                            <td class="field">Experiencia</td>
                            <td><?php echo $dato_tramite_detalle["datt_experiencia"] ?></td>
                        </tr>
                        <tr class="divider">
                            <td colspan="2"></td>
                        </tr>
                        
                        
                    </tbody>
                </table>
            <!-- </div> -->
            </div>
                <!-- begin profile-section -->
                <div class="profile-section">
                    <!-- begin row -->
                    <div class="row">
                        <!-- begin col-4 -->
                        <div class="col-md-12">
                            <h4 class="title">Soluciones</small></h4>
                            <!-- begin scrollbar -->
                            <div data-scrollbar="true" data-height="280px" class="bg-silver" style="border-radius:10px;">
                                <!-- begin chats -->
                                <ul class="chats">
                                    
                                     
                                    <?php foreach ($datosTramite_Solucion as $dato_tramite_solucion){ ?>
                                   
                                    <li class="left">
                                        <span class="date-time"><?php echo $dato_tramite_solucion["sol_fecha"] ?></span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../solucion/index?sol=<?php echo  $dato_tramite_solucion['sol_id'] ?>" class="solucion"><?php echo $dato_tramite_solucion["sol_titulo"] ?></a>
                                        <a href="javascript:;" class="image"><img src="<?php echo URL_IMG . $this->_datosUser->usu_imagen; ?>" alt="" /></a>
                                        <div class="message">
                                           <?php echo $dato_tramite_solucion["sol_descripcion"] ?>
                                        </div>
                                    </li>
                                   <?php } ?>
                                   <?php //$usuario = Usuario::model()->findByPk(id);
                                   //echo $usuario;
                                    ?>
                                    
                                </ul>
                                <!-- end chats -->
                            </div>
                            <!-- end scrollbar -->
                        </div>
                        <!-- end col-4 -->
                       
                    </div>
                    <!-- end row -->
                </div>
                <!-- end profile-section -->
            </div>
            <!-- end profile-container -->
        </div>
        <!-- end #content -->
        