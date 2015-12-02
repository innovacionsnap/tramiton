<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="../dashboard/index">Inicio</a></li>
        <li class="active">Mis Empresas</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Mis Empresas<small></small></h1>

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
                    <h4 class="panel-title">Empresas registradas</h4>
                </div>
                <div class="panel-body">
                    <?php echo CHtml::link('<button type="button" class="btn btn-primary">Nueva Empresa</button>', array("empresa/ingresarempresa"), array('title' => 'Nueva empresa'));?>
                    <hr>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Empresa</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($empresas as $empresa): ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $empresa['emp_razon']; ?></td>
                                        <td><?php
                                            $id=Empresa::model()->codificaGet('emp='.$empresa['emp_id']);
                                            echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-edit (alias)"></i> Editar</button>', array('empresa/ingresarempresa/?'.$id), array('title' => 'Editar'));
                                            echo "&nbsp;&nbsp;";
                                            echo CHtml::link('<button type="button" class="btn btn-inverse active btn-xs m-r-5"><i class="fa fa-trash-o"></i>Registrar caso</button>', array('ciudadano/index/?'.$id), array('title' => 'Registrar caso'));
                                            ?>
                                        </td>
                                    
                                <?php endforeach; ?>
                                </tr>

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

<!--  ================================================  -->
<?php
// $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
//     'id' => 'mydialog',
//     // additional javascript options for the dialog plugin
//     'options' => array(
//         'title' => 'Dialog box 1',
//         'autoOpen' => false,
//     ),
// ));



// $this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<!-- ============================================ -->

<?php
/** Start Widget * */
// $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
//     'id' => 'dialog-animation',
//     'options' => array(
//         'title' => 'Dialog box - Animation',
//         'autoOpen' => false,
//         'show' => array(
//             'effect' => 'blind',
//             'duration' => 1000,
//         ),
//         'hide' => array(
//             'effect' => 'explode',
//             'duration' => 500,
//         ),
//     ),
// ));



// $this->endWidget('zii.widgets.jui.CJuiDialog');

/** End Widget * */

?>