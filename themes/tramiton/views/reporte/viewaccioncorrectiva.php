
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
        <li><a href="../dashboard/index">Inicio</a></li>
        <li class= "active"><a href="javascript:history.go(-1)">Regresar</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    
    <?php foreach ($datosViewUsuario as $datos1) ?>
         
                                           
                                
                                
          
    <h1 class="page-header"> <?php echo $datos1['usu_nombre']; ?><br> <small>  Responsable   <?php echo $datos1['usu_responsable_inst']; ?></small> <br> <small>  Ultimo Ingreso   <?php echo $datos1['usu_fecha']; ?></small></h1>
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
                    <h4 class="panel-title">Detalle Acciones Correctivas</h4>
                </div>
                <div class="panel-body">
                    <?php //echo CHtml::link('<li class="fa fa-plus-circle"></li>&nbsp;&nbsp;Nuevo&nbsp;', array('admin/#role-modal'), array('class' => 'btn btn-primary btn-xs m-r-5', 'data-toggle' => "modal")); ?>
                    <hr>
                    <div class="panel-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>Fecha</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Nombre Trámite</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datosViewAcciones as $datos) : ?>
                                    <tr class="odd gradeA">
                                        
                                        
                                        <td><?php echo $datos['accc_fechaingreso']; ?></td>
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
                                        
                                        <td><?php echo $datos['tra_nombre']; ?></td>
                                        
                                        
                                    </tr>
                                <?php 
                                
                                endforeach; ?>

                            </tbody>

                        </table>
                    </div>
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



