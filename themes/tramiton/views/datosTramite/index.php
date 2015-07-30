<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="<?php echo Yii::app()->getBaseUrl();?>/dashboard/index">Home</a></li>
        <li class="active">Total Trámites</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Trámites <small> de la Institución</small></h1>

    <!-- end page-header -->



    <!-- begin row -->
    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                Total de Trámites
            </div>
            <div class="panel-body">
                <div id="data-table_wrapper" class="dataTables_wrapper no-footer">
                    <table id="data-table" class="table table-striped table-bordered nowrap dataTable no-footer dtr-inline" width="100%" role="grid" aria-describedby="data-table_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" style="width: 148px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" style="width: 215px;" aria-label="Fecha de Registro: activate to sort column ascending">Fecha de Registro</th>
                                <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" style="width: 196px;" aria-label="Trámite: activate to sort column ascending">Trámite</th>
                                <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" style="width: 124px;" aria-label="Entidad: activate to sort column ascending">Entidad</th>
                                <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" style="width: 88px;" aria-label="Sector: activate to sort column ascending">Sector</th>
                                <th class="sorting" tabindex="0" aria-controls="data-table" rowspan="1" colspan="1" style="width: 88px;" aria-label="Usuario: activate to sort column ascending">Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cont= 1;
                            foreach ($tramites as $tramite):
                                ?>
                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1"><?php echo $cont; ?></td>
                                    <td class="sorting_1"><?php echo $tramite['datt_fecharegistro'] ?></td>
                                    <td class="sorting_1"><?php echo $tramite['datt_otronombretramite'] ?></td>
                                    <td class="sorting_1"><?php echo $tramite['trai_id'] ?></td>
                                    <td class="sorting_1"><?php echo $tramite['trai_id'] ?></td>
                                    <td class="sorting_1"><?php //echo $tramite->usu['usu_nombreusuario'] ?></td>
                                </tr>

                                <?php
                                $cont++;
                            endforeach;
                            ?>

                            <!--<tr class="gradeA odd" role="row">
                                <td class="sorting_1">Gecko</td>
                                <td>Firefox 1.0</td>
                                <td>Win 98+ / OSX.2+</td>
                                <td>1.7</td>
                                <td>A</td>
                            </tr>-->

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

