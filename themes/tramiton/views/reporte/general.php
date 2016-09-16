<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><?php echo CHtml::link('Resumen',array('reporte/resumen')); ?></li>
        <!--<li class="active">Total</li>-->
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Total de Usuarios<small></small></h1>

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
                    <?php 
                    $totalCasos = 0;
                foreach ($datosSumaUsuarios as $suma){
                    $totalCasos += $suma["total"];
                }
                ?>
                    <?php  ?>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>Nro.</th>
                                    <th>Tipo de Usuario</th>
                                    <th>Total de Usuarios<br><?php echo "(" . $totalCasos . ")"?></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                    
                                <?php $i=1;$cont=1;$usuarioT['1']="Tramitón Ciudadano - Usuarios Institucionales";
                                        $usuarioT['2']="Tramitón Ciudadano - Usuarios Ciudadanos";
                                        $usuarioT['3']="Tramitón Productivo - Usuarios Institucionales";
                                        $usuarioT['4']="Tramitón Productivo - Usuarios Ciudadanos";
                                        
                                
                                
                                foreach ($datosUsuarios as $datos) : ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $cont; ?></td>                                                                             
                                        <td><?php echo $usuarioT[$i]; ?></td>
                                        <td><?php echo $datos['total']; ?></td>
                                        <?php
                                        //$inst=$datos['ins_id'];
                                        //$tram=$datos['usu_tramiton'];
                                        //$tram = Yii::app()->encriptaParam->codificaParamGet($datos['usu_tramiton']); 
                                          //  echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-eye"></i> Mostrar</button>', array("reporte/viewusuarios", 'tram' => $tram), array('title' => 'Mostrar'));
                                            ?>
                                        
                                    </tr>
                                <?php 
                                $i++;$cont++;
                                endforeach; ?>

                            </tbody>

                        </table>
                    </div>
                </div>
            
                <!-------------segunda tabla-->
                <h1 class="page-header">Total de Acciones Correctivas<small></small></h1>
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
                 <?php 
                    $totalCasos = 0;
                foreach ($datosSumaAcciones as $suma){
                    $totalCasos += $suma["total"];
                }
                ?>
                       
                <?php  ?>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>Nro.</th>
                                    <th>Nombre del Proyecto</th>
                                    <th>Total Acciones Correctivas<br><?php echo "(" . $totalCasos . ")"?></th>
                                    <th>Detalle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $tramiton="Tramitón Ciudadano";$cont=1;foreach ($datosTramitones as $datos) : ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $cont; ?></td>                                                                              
                                        <td><?php echo $tramiton; ?></td>
                                        <td><?php echo $datos['total']; ?></td>
                                        <td><?php
                                        //$inst=$datos['ins_id'];
                                        $tram = Yii::app()->encriptaParam->codificaParamGet($datos['accc_productivo']); 
                                            echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-eye"></i> Mostrar</button>', array("reporte/acciones", 'tram' => $tram), array('title' => 'Mostrar'));
                                            ?>
                                        </td>
                                    </tr>
                                <?php 
                                $tramiton="Tramitón Productivo";$cont++;
                                endforeach; ?>
                                    </tbody>

                        </table>
                    </div>
                </div>
                <!--                     -->
                <!--tabla3-->
                <h1 class="page-header">Total de Trámites<small></small></h1>
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
                    
                    <?php 
                    $totalCasos = 0;
                foreach ($datosSumaTramites as $suma){
                    $totalCasos += $suma["total"];
                }
                ?>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>Nro.</th>
                                    <th>Nombre del Proyecto</th>
                                    <th>Total de Trámites<br><?php echo "(" . $totalCasos . ")"?></th>
                                    <th>Detalle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $tramiton="Tramitón Ciudadano";$cont=1;foreach ($datosTramites as $datos) : ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $cont; ?></td>                                                                              
                                        <td><?php echo $tramiton; ?></td>
                                        <td><?php echo $datos['total']; ?></td>
                                        <td><?php
                                        //$inst=$datos['ins_id'];
                                        $tram = Yii::app()->encriptaParam->codificaParamGet($datos['datt_productivo']); 
                                            echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-eye"></i> Mostrar</button>', array("reporte/viewtramites", 'tram' => $tram), array('title' => 'Mostrar'));
                                            ?>
                                        </td>
                                    </tr>
                                <?php 
                                $tramiton="Tramitón Productivo";$cont++;
                                endforeach; ?>
                                

                            </tbody>

                        </table>
                    </div>
                </div>
                
                <!--fin tabla 3 -->
                
                <!-- TABLA5 -->
                <h1 class="page-header">Total de Comentarios<small></small></h1>
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
                    
                    <?php 
                    $totalCasos = 0;
                foreach ($datosSumaComentarios as $suma){
                    $totalCasos += $suma["totalcom"];
                }
                ?>
                   
                    <?php  ?>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>Nro.</th>
                                    <th>Tipo de Usuario</th>
                                    <th>Total de Comentarios<br><?php echo "(" . $totalCasos . ")"?></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                    
                                <?php $i=1;$cont=1;$usuarioT['1']="Tramitón Ciudadano - Usuarios Institucionales";
                                        $usuarioT['2']="Tramitón Ciudadano - Usuarios Ciudadanos";
                                        $usuarioT['3']="Tramitón Productivo - Usuarios Institucionales";
                                        $usuarioT['4']="Tramitón Productivo - Usuarios Ciudadanos";
                                        
                                
                                
                                foreach ($datosComentarios as $datos) : ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $cont; ?></td>                                                                              
                                        <td><?php echo $usuarioT[$i]; ?></td>
                                        <td><?php echo $datos['totalcom']; ?></td>
                                        <?php
                                        //$inst=$datos['ins_id'];
                                        //$tram=$datos['usu_tramiton'];
                                        //$tram = Yii::app()->encriptaParam->codificaParamGet($datos['usu_tramiton']); 
                                          //  echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-eye"></i> Mostrar</button>', array("reporte/viewusuarios", 'tram' => $tram), array('title' => 'Mostrar'));
                                            ?>
                                        
                                    </tr>
                                <?php 
                                $i++;$cont++;
                                endforeach; ?>

                            </tbody>

                        </table>
                    </div>
                </div>
                <!--FIN TABLA 4-->
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
    <!-- end row -->
</div>
<!-- end #content -->






