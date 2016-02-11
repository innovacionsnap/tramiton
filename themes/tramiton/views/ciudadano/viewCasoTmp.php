<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><?php echo CHtml::link('Inicio',array('dashboard/index')); ?></li>
        <li><?php echo CHtml::link('Casos Temporales',array('ciudadano/casosTemporales')); ?></li>
        <li class="active">Vista Caso Temporal</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Casos temporales registrados</small></h1>

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
                    <h4 class="panel-title">Detalle caso temporal</h4>
                </div>
                <?php echo $casoTemporal['idRegistroCaso'];  ?>
                <div class="panel-body">
                    <div class="col-md-8">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><strong>Institución</strong></td>
                                    <td><?php echo $casoTemporal['nombreInstit']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Trámite</strong></td>
                                    <td><?php echo $casoTemporal['nombreTramite']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Experiencia</strong></td>
                                    <td><?php echo $casoTemporal['experienciaUsr']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Título de Solución</strong></td>
                                    <td><?php echo $casoTemporal['tituloSolucion']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Detalle de la Solución</strong></td>
                                    <td><?php echo $casoTemporal['propuestaSolucion']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Ubicación</strong></td>
                                    <td><?php echo $casoTemporal['nombreCanton']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Fecha de registro</strong></td>
                                    <td><?php echo $casoTemporal['fechaRegistro']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        problemas
                        <?php
                        $problemas = array(
                            'catProblemaId' => '1',
                            'catProblemaNom' => 'Alto Costo',
                            'problemas' => array(
                                'idProblema1' => array(
                                    'problemaId' => '5',
                                    'problemaNom' => 'alto costo de la vida'
                                ),
                                'idProblema2' => array(
                                    'problemaId' => '2',
                                    'problemaNom' => 'cuesta mucha plata'
                                ),
                                'idProblema3' => array(
                                    'problemaId' => '12',
                                    'problemaNom' => 'cuesta mucha plata por las cosas'
                                ),

                            )
                        );
                        
                        var_dump($problemas);
                        ?>

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
