<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><?php echo CHtml::link('Inicio',array('dashboard/index')); ?></li>
                <li class= "active"><a href="javascript:history.go(-1)">Regresar</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    
    <?php foreach ($datosViewInstitucion as $datos3) ?>
    
    <h1 class="page-header">Trámites: <?php echo $datos3['ins_nombre'] ?><small></small></h1>

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
                    <h4 class="panel-title">Trámites registrados</h4>
                </div>
                <div class="panel-body">
                    <?php //echo CHtml::link('<li class="fa fa-plus-circle"></li>&nbsp;&nbsp;Nuevo&nbsp;', array('admin/#role-modal'), array('class' => 'btn btn-primary btn-xs m-r-5', 'data-toggle' => "modal")); ?>
                    <hr>
                    <?php $cont = 1; ?>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nro.</th>
                                    <th>Nro Caso.</th>
                                    <th>Nombre del Trámite</th>
                                    <th>Experiencia</th>
                                    <th>Fecha de Registro</th>
                                    
                                    
                                    <th>Detalle </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php foreach ($datosViewTramites2 as $datos) : ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $cont; ?></td>
                                        <td><?php echo $datos['datt_id']; ?></td>
                                        <td><?php echo $datos['tra_nombre']; ?></td>                                                                           
                                        <td><?php echo $datos['datt_experiencia']; ?></td>
                                        <td><?php echo $datos['datt_fecharegistro']; ?></td>
                                        
                                        
                                        
                                        <td>
                                        <?php
                                        
                                        $inst=$datos['trai_id'];
                                        $tramite=$tram2;
                                        //$id=$datos['datt_id'];
                                        //$id=Yii::app()->encriptaParam->codificaParamGet($datos['datt_id']);
                                        $id=Empresa::model()->codificaGet('datt_id='.$datos['datt_id']);
                                        $inst = Yii::app()->encriptaParam->codificaParamGet($datos['trai_id']);                                         
                                        //$tramite = Yii::app()->encriptaParam->codificaParamGet($tramite); 
                                        echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-eye"></i> Mostrar</button>'
                                                ,array("reporte/comentarios?".$id), array('title' => 'Mostrar'));    
                                                //, array('reporte/casosreportados', 'traiId' => $inst), array('title' => 'Mostrar'));    
                                                //,array("ciudadano/viewTramite_Usuario2",'i'=>$id), array('title' => 'Mostrar'));    
                                        echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-eye"></i> Mostrar Acciones</button>'
                                                , array("reporte/viewtramacciones", 'inst' => $inst,'tram2'=>$tram2), array('title' => 'Mostrar Acciones'));
                                            
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


