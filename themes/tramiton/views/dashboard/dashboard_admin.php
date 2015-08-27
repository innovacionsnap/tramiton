<style type="text/css">
    .linea{
        background-color: #ccccbc;
    }

    .content{
        margin-left: 50px;
        margin-right: 20px;
    }
</style>

<!-- begin #content -->
<div id="content" class="content linea">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Inicio</a></li>
        <li class="active">Trámites</li>

    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Experiencias de Usuarios</h1>

    <!-- begin row -->
    <div class="row">
        <!-- begin col-8 -->
        <div class="col-md-9">
            <!-- inicio mensajes -->

            <div id="contenido_linea" class="height-sm" data-scrollbar="true" style="height:600px; background-color: #fff; padding: 10px;"></div>

            <!-- fin mensajes -->
        </div>
        <div class="col-md-3">
            <!-- inicio noticias -->
            <div class="panel panel-inverse" data-sortable-id="index-1">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Noticias</h4>
                </div>
                <div class="panel-body" style="height: 540px">
                    <div class="height-sm" data-scrollbar="true" style="height:500px" >
                        <?php
                        $noticias = DashboardController::getNoticias();
                        foreach ($noticias as $noticia):
                            ?>
                            <p style=" background-color: #ffffff; border-radius: 8px; padding: 10px">
                                <?php echo $noticia['logs_usu_usuario'] . " "; ?> 
                                <a href="../solucion/index?sol=<?php echo $noticia['logs_id_tabla_destino']; ?>" target="_blank"><?php echo $noticia['logs_accion']; ?></a>
                            </p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- fin noticias -->
        </div>

    </div>
    <!-- end row -->
</div>
<!-- end #content -->
<script type="text/javascript">

    var res1 = {
        loader: $('<div />', {class: 'loader'}),
        container: $('#contenido_linea')
    };
    $(document).ready(function () {
        $.ajax({
            url: 'timeline',
            beforeSend: function () {
                res1.container.append(res1.loader);
            },
            success: function (data) {
                res1.container.html(data);
                res1.container.find(res1.loader).remove();
            }
        });
    });


</script>





