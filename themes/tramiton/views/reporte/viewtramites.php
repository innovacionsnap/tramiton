<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><?php echo CHtml::link('Inicio',array('dashboard/index')); ?></li>
                <li><?php echo CHtml::link('Regresar',array('reporte/tramites')); ?></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Total de Trámites por Instituciones <?php $tram1?><small></small></h1>

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
                    <h4 class="panel-title">Trámites registrados </h4>
                </div>
                <div class="panel-body">
                    <?php //echo CHtml::link('<li class="fa fa-plus-circle"></li>&nbsp;&nbsp;Nuevo&nbsp;', array('admin/#role-modal'), array('class' => 'btn btn-primary btn-xs m-r-5', 'data-toggle' => "modal")); ?>
                    <hr>
                    <?php $cont = 1; ?>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>Institucion</th>
                                    
                                    <th>Total Casos</th>
                                    <th>Detalle</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                
                                <?php foreach ($datosTramites as $datos) : ?>
                                    <tr class="odd gradeX">
                                        
                                        <td><?php echo $datos['ins_nombre']; ?></td>
                                        
                                        <td><?php echo $datos['total']; ?></td>
                                        <td><?php
                                        //$inst=$datos['ins_id'];
                                        $tramite=$tram1;
                                        $inst = Yii::app()->encriptaParam->codificaParamGet($datos['ins_id']); 
                                            echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-eye"></i> Mostrar</button>', array("reporte/viewtramites2", 'inst' => $inst,'tram'=>$tramite), array('title' => 'Mostrar'));
                                            ?>
                                        </td>
                                    </tr>
                                <?php 
                                $cont++; 
                                endforeach; ?>

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


