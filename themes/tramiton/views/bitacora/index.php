<script type="text/javascript">
 $(document).ready(function() {
    $(".actividad").fancybox({
        'titleShow'         : false,
        'width'             : '65%',
        'height'            : '65%',
        'autoScale'         : false,
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        'type'              : 'iframe',
       // afterClose : function() {
       //     location.reload();
       // }
    });
});
 $(document).ready(function() {
    $(".actividad-new").fancybox({
        'titleShow'         : false,
        'width'             : '65%',
        'height'            : '65%',
        'autoScale'         : false,
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        'type'              : 'iframe',
       // afterClose : function() {
       //     location.reload();
       // }
    });
});
</script>   



<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="<?php // echo $baseUrl; ?>/dashboard/">Inicio</a></li>
				
				<li class="active">Bitacora </li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Bitacora<small></small></h1>
				<div class="m-b"><a class="btn btn-success p-l-40 p-r-40 btn-sm actividad-new" href="http://localhost/tramiton2/bitacora/actividad"> + Añadir </a> </div>
			
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
                <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success actividad" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                
                            </div>
                            <h4 class="panel-title">Tareas</h4>
                        </div>
                        <div class="panel-body">
                        	<a href="#" class="actividad">hola</a>
                           
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
		<!-- end #content -->