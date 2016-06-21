<?php
//$usu_id = $modelUser->usu_id;
$baseUrl = Yii::app()->baseUrl;
$usu_id = $this->_datosUser->usu_id;
?>

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
        <li><?php echo CHtml::link('Inicio', array('dashboard/index')); ?></li>
        <li><a href="index">Mi institución</a></li>
        <li class="active">Acciones correctivas</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Acciones correctivas <small> <br>Casos de la Institución</small></h1>
    <?php
    //echo $_GET["tra_id"];
    //foreach ($datoAccioneCorrectiva as $datoAccioneCorrectivaDetalle){
    //  $tra_id = $datoAccioneCorrectivaDetalle["tra_id"];
    if ($rol != 2) {
        echo '<div class="m-b-10"><a class="btn btn-success p-l-40 p-r-40 btn-sm actividad-new" href="' . $baseUrl . '/tramiteInstitucion/accion_correctiva?traiId=' . Yii::app()->encriptaParam->decodificaParamGet($_GET["traiId"]) . '&traId=' . Yii::app()->encriptaParam->decodificaParamGet($_GET["traId"]) . '"> + Añadir </a> </div>';
    }
    ?>


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
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id AC</th>
                                    <th>Nombre Acción</th>
                                    <th>Descripcion</th>
                                    <th>Fecha Ingreso</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($datoAccioneCorrectiva as $datoAccioneCorrectivaDetalle) {
                                    ?>
                                    <tr class="odd gradeA">
                                        <td>
                                            <?php
                                            if ($datoAccioneCorrectivaDetalle["accc_id"] != '') {
                                                echo $datoAccioneCorrectivaDetalle["accc_id"];
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="cortar">
                                                <?php echo $datoAccioneCorrectivaDetalle["accc_nombre"] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cortar">
                                                <?php echo $datoAccioneCorrectivaDetalle["accc_descripcion"] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo $datoAccioneCorrectivaDetalle["accc_fechaingreso"] ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

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
