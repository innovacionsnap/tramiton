<style>
    .cortar{
        width:300px;
        //height:20px;
        //padding:20px;
        //border:1px solid blue;
        text-overflow:ellipsis;
        white-space:nowrap; 
        overflow:hidden;
        -webkit-transition: all 1s;
        -moz-transition: all 1s;
        transition: all 1s;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    .cortar:hover {
        position: absolute;
        border:1px solid #666;
        border-radius: 5px;
        background-color: #666;
        color: #FFF;
        word-wrap: break-word;
        width: 450px;
        //height:30px;
        white-space: initial;
        overflow:visible;
        cursor: pointer;
    }

</style>
<script type="text/javascript">
    $(document).ready(function () {
        $(".actividad").fancybox({
            'titleShow': false,
            'width': '65%',
            'height': '65%',
            'autoScale': false,
            'transitionIn': 'none',
            'transitionOut': 'none',
            'type': 'iframe',
            afterClose: function () {
                location.reload();
            }
        });
    });
    $(document).ready(function () {
        $(".actividad-new").fancybox({
            'titleShow': false,
            'width': '65%',
            'height': '65%',
            'autoScale': false,
            'transitionIn': 'none',
            'transitionOut': 'none',
            'type': 'iframe',
            afterClose: function () {
                location.reload();
            }
        });
    });
</script>

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><?php echo CHtml::link('Inicio',array('dashboard/index')); ?></li>
                <li class= "active"><a href="javascript:history.go(-1)">Regresar</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    
    
    <h1 class="page-header">Acciones Correctivas <small></small></h1>

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
                    <h4 class="panel-title">Acciones Registradas</h4>
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
                                    <th>Fecha de Ingreso</th>
                                    <th>Nombre de la Acción Correctiva</th>
                                    <th>Descripción</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php foreach ($datosAccionesc as $datos) : ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $cont; ?></td>
                                        <td>
                                            
                                            <?php echo $datos['accc_fechaingreso']; ?>
                                            
                                        </td>
                                        <td>
                                            <div class="cortar">
                                            <?php echo $datos['accc_nombre']; ?>
                                            </div>    
                                        </td>
                                    
                                        <td>
                                            <div class="cortar">
                                            <?php echo $datos['accc_descripcion']; ?>
                                            </div>    
                                        </td>
                                        
                                        
                                        <?php
                                        //$inst=$datos['trai_id'];
                                        //$inst = Yii::app()->encriptaParam->codificaParamGet($datos['ins_id']); 
                                          //  echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-eye"></i> Mostrar</button>', array("ciudadano/viewtramite_usuario2", 'inst' => $inst), array('title' => 'Mostrar'));
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



