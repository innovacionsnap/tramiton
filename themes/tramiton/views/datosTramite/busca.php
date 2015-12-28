<style type="text/css">
    .content{
        margin-left: 50px;
        margin-right: 20px;
        background-color: #ffffff;
     
    }
    #data-table td{
        text-align: justify; 
    }
</style>
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="<?php echo Yii::app()->getBaseUrl(); ?>/dashboard/index">Inicio</a></li>
        <li class="active">Casos Registrados</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Casos Registrados</h1>

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
                    <h4 class="panel-title">Casos Registrados</h4>
                </div>
                <div class="panel-body">
                    <?php //echo "<pre>"; print_r($tramites); echo "</pre>";?>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Experiencia del Usuario</th>
                                    <th>Institución</th>
                                    <th>Propuesta de solución</th>
                                    <th>Acción</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cont = 1;
                                foreach ($casos as $caso):
                                    ?>
                                    <tr class="odd gradeA">
                                        <td class="sorting_1"><?php echo $cont; ?></td>
                                        <td class="sorting_1"><?php echo substr($caso['datt_experiencia'],0,500).' ...'; ?></td>
                                        <td class="sorting_1"><?php echo $caso['ins_nombre']; ?></td>
                                        <td class="sorting_1"><?php echo substr($caso['sol_descripcion'],0,500).' ...'; ?></td>
                                        <?php $id=Empresa::model()->codificaGet('sol='.$caso['sol_id']);?>
                                        <td><a href="<?php echo Yii::app()->baseUrl; ?>/solucion/index?<?php echo $id; ?>" title="Mostrar caso" class="caso-new" target="_blank"><button class="btn btn-inverse active btn-xs m-r-5" type="button"><i class="fa fa-eye"></i> Mostrar caso</button></a></td>
                                        
                                    </tr>

                                    <?php
                                    $cont++;
                                endforeach;
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
</div>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/plugins/DataTables/js/jquery.dataTables.js', CClientScript::POS_END); ?>	
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/js/table-manage-default.demo.min.js', CClientScript::POS_END); ?>	
<?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/js/apps.min.js', CClientScript::POS_END); ?>	


<!-- ================== END PAGE LEVEL JS prueba ================== -->
<script type="text/javascript">
     $(document).ready(function () {
         $(".caso-new").fancybox({
             'titleShow': false,
             'width': '65%',
             'height': '65%',
             'autoScale': false,
             'transitionIn': 'none',
             'transitionOut': 'none',
             'type': 'iframe',
             // afterClose : function() {
             //     location.reload();
             // }
         });
        
        // App.init();
        // TableManageDefault.init();
        
         
     });
</script>


       
