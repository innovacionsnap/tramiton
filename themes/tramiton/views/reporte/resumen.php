<!-- begin #content -->
<?php
$baseUrl = Yii::app()->theme->baseUrl;
?>

<div id="content" class="content">
    
    <!-- begin breadcrumb -->
    
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    

    <!-- end page-header -->
    <h1 class="page-header">Resumen de Datos Tramitón Ciudadano y Productivo </h1>
    <div class="row">
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-green">
						<div class="stats-icon"><i class="fa fa-user"></i></div>
						<div class="stats-info">
                                                    <h4>NÚMERO DE USUARIOS TRAMITÓN CIUDADANO</h4>
                                                    <?php                                                                
                                                foreach ($datosUsuarios as $datosuc) : ?>
                                                    <p><?php echo $datosuc['total'];?></p>
                                                 <?php 
                                
                                                endforeach; ?>   
                                                                     
                                       	
						</div>
						<div class="stats-link">
							<a href="general">Detalle <i class="fa fa-arrow-circle-o-right"></i></a> </a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-purple">
						<div class="stats-icon"><i class="fa fa-tasks"></i></div>
						<div class="stats-info">
							<h4>NÚMERO DE CASOS TRAMITÓN CIUDADANO</h4>
                                                    <?php                                                                
                                                foreach ($datosTramites as $datostc) : ?>
                                                    <p><?php echo $datostc['total'];?></p>
                                                 <?php 
                                
                                                endforeach; ?>   	
						</div>
						<div class="stats-link">
                                                    <a href="general">Detalle <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
                                
                                <!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-blue">
						<div class="stats-icon"><i class="fa fa-users"></i></div>
						<div class="stats-info">
							<h4>NÚMERO DE USUARIOS TRAMITÓN PRODUCTIVO</h4>
                                                    <?php                                                                
                                                foreach ($datosSumaUsuarios as $datosup) : ?>
                                                        <p><?php echo $datosup['total'];?></p>
                                                 <?php 
                                
                                                endforeach; ?> 	
						</div>
						<div class="stats-link">
							<a href="general">Detalle <i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-red">
						<div class="stats-icon"><i class="fa fa-list"></i></div>
						<div class="stats-info">
							<h4>NÚMERO DE CASOS TRAMITÓN PRODUCTIVO</h4>
                                                    <?php                                                                
                                                foreach ($datosSumaTramites as $datostp) : ?>
                                                    <p><?php echo $datostp['total'];?></p>
                                                 <?php 
                                
                                                endforeach; ?>   
						</div>
						<div class="stats-link">
							<a href="general">Detalle<i class="fa fa-arrow-circle-o-right"></i></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
    </div>
			<!-- end row -->
                        
<div class="row">
				<!-- begin col-8 -->
				
                                <div class="col-md-8">
					<div class="panel panel-inverse" data-sortable-id="index-1">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Tendencia de Participación (últimos 10 días)</h4>
						</div>
						<div class="panel-body">
							<div id="interactive-chart" class="height-sm"></div>
						</div>
					</div>
				
                                </div>    
				
                                
					
					
					
                    
					
				
				<!-- end col-8 -->
				<!-- begin col-4 -->
				<div class="col-md-4">
					<div class="panel panel-inverse" data-sortable-id="index-6">
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Datos Tramitón</h4>
						</div>
						<div class="panel-body p-t-0">
							<table class="table table-valign-middle m-b-0">
								<thead>
									<tr>	
										<th>Tipo</th>
										<th>Ciudadano</th>
										<th>Productivo</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><label class="label label-danger" >Acciones Correctivas</label></td>
                                                                                <?php                                                                
                                                                                foreach ($datosTramitones as $datosa) : ?>
                                                                                
                                                                                <?php 
                                
                                                                                endforeach; ?>   
                                                                                <?php                                                                
                                                                                foreach ($datosSumaAcciones as $datosa1) : ?>
                                                                                
                                                                                <?php 
                                
                                                                                endforeach; ?>
										<td><p><?php echo $datosa['total'];?></p> <span class="text-success"></span></td>
										<td><p><?php echo $datosa1['total'];?></p><div id="sparkline-unique-visitor"></div></td>
									</tr>
									<tr>
										<td><label class="label label-warning">Comentarios</label></td>
										<?php                                                                
                                                                                foreach ($datosComentarios as $datosc) : ?>
                                                                                
                                                                                <?php 
                                
                                                                                endforeach; ?>   
                                                                                <?php                                                                
                                                                                foreach ($datosSumaComentarios as $datosc1) : ?>
                                                                                
                                                                                <?php 
                                
                                                                                endforeach; ?>
                                                                                <td><p><?php echo $datosc['totalcom'];?></p></td>
										<td><p><?php echo $datosc1['totalcom'];?></p><div id="sparkline-bounce-rate"></div></td>
									</tr>
									<tr>
										<td><label class="label label-success">Usuarios</label></td>
										<td><p><?php echo $datosuc['total'];?></td>
										<td><p><?php echo $datosup['total'];?><div id="sparkline-total-page-views"></div></td>
									</tr>
									<tr>
										<td><label class="label label-primary">Casos</label></td>
										<td><p><?php echo $datostc['total'];?></td>
										<td><p><?php echo $datostp['total'];?><div id="sparkline-avg-time-on-site"></div></td>
									</tr>
									<tr>
										<td><label class="label label-success">Visitas de Usuarios</label></td>
										<?php                                                                
                                                                                foreach ($datosIngresos1 as $datosi) : ?>
                                                                                
                                                                                <?php 
                                
                                                                                endforeach; ?>   
                                                                                <?php                                                                
                                                                                foreach ($datosIngresos2 as $datosi1) : ?>
                                                                                
                                                                                <?php 
                                
                                                                                endforeach; ?>
                                                                                <?php
                                                                                $vc=0;
                                                                                $vp=0;
                                                                                ?>
                                                                                
                                                                                <td><p><?php echo $datosi['total'];?></td>
										<td><p><?php echo $datosi1['total'];?><div id="sparkline-new-visits"></div></td>
									</tr>
									<tr>
										<td><label class="label label-inverse">Likes           </label></td>
										<?php                                                                
                                                                                foreach ($datosMegusta1 as $datosmg) : ?>
                                                                                
                                                                                <?php 
                                
                                                                                endforeach; ?>   
                                                                                <?php                                                                
                                                                                foreach ($datosMegusta2 as $datosmg1) : ?>
                                                                                
                                                                                <?php 
                                
                                                                                endforeach; ?>
                                                                                
                                                                                <td><p><?php echo $datosmg['totalcom'];?></td>
										<td><p><?php echo $datosmg1['totalcom'];?><div id="sparkline-return-visitors"></div></td>
                                                                                
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					
				
                                
					
					
					
					
					
					
				</div>
                                <!--
                                <div class="col-sm-4">
                                    
                                <div  class="panel panel-inverse" >
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="general" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							
						</div>
						<div class="panel-body">
							<div id="datepicker-inline" class="datepicker-full-width"><div></div></div>
						</div>
					</div>
                                    
                                </div>
                                
                                   
			<!-- end row -->
                           <!-- <div class="row"> 
                                <div class="col-md-12">-->
					<div class="panel panel-inverse" data-sortable-id="index-2">.
                           
                                             <br>
						<div class="panel-heading">
                                                   
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Tendencia de Participación por meses</h4>
						</div>
						<div class="panel-body">
							<div id="interactive-chart1" class="height-sm"></div>
						</div>
					</div>
				
                              <!--  </div>   
                                
                            </div>-->
                        
				<!-- end col-4 -->
                                   <!--
                                <div class="col-md-4">
                                    
                                <div class="panel panel-inverse" >
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="general" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title"align="center">Calendario</h4>
						</div>
						<div class="panel-body">
							<div id="datepicker-inline" class="datepicker-full-width"><div></div></div>
						</div>
					</div>
                                    
                                </div>
                                
                                   
			<!-- end row -->     
</div>
<!-- end #content -->

<?php                                                                
  $c=1;foreach ($datosgrafico as $datosg) : 
        $i[$c]= $datosg['totalg'];                                                              
        $fc[$c]=$datosg['datt_fecharegistro'];                                                              
 
          $c++;                      
 endforeach; ?>    

<?php                                                                
  $c=1;foreach ($datosgraficop as $datosp) : 
        $j[$c]= $datosp['totalg'];                                                              
        $fp[$c]=$datosp['datt_fecharegistro'];                                                              
 
          $c++;                      
 endforeach; ?>  

<?php
$jf1=0;
$jf2=0;
$jf3=0;
$jf4=0;
$jf5=0;
$jf6=0;
$jf7=0;
$jf8=0;
$jf9=0;
$jf10=0;

$if1=0;
$if2=0;
$if3=0;
$if4=0;
$if5=0;
$if6=0;
$if7=0;
$if8=0;
$if9=0;
$if10=0;
?>

<?php                                                                
  foreach ($datosgraficofc1 as $datosfc1) : 
        $if1= $datosfc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficofc2 as $datosfc2) : 
        $if2= $datosfc2['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficofc3 as $datosfc3) : 
        $if3= $datosfc3['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficofc4 as $datosfc4) : 
        $if4= $datosfc4['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficofc5 as $datosfc5) : 
        $if5= $datosfc5['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficofc6 as $datosfc1) : 
        $if6= $datosfc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficofc7 as $datosfc2) : 
        $if7= $datosfc2['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficofc8 as $datosfc3) : 
        $if8= $datosfc3['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficofc9 as $datosfc4) : 
        $if9= $datosfc4['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficofc10 as $datosfc5) : 
        $if10= $datosfc5['totalg'];    
                                 
 endforeach; ?>  



<?php                                                                
  foreach ($datosgraficofp1 as $datosfp1) : 
        $jf1= $datosfc1['totalg'];                                                              
        
 
                                
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficofp2 as $datosfc2) : 
        $jf2= $datosfc2['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficofp3 as $datosfc3) : 
        $jf3= $datosfc3['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficofp4 as $datosfc4) : 
        $jf4= $datosfc4['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficofp5 as $datosfc5) : 
        $jf5= $datosfc5['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficofp6 as $datosfc1) : 
        $jf6= $datosfc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficofp7 as $datosfc2) : 
        $jf7= $datosfc2['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficofp8 as $datosfc3) : 
        $jf8= $datosfc3['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficofp9 as $datosfc4) : 
        $jf9= $datosfc4['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficofp10 as $datosfc5) : 
        $jf10= $datosfc5['totalg'];    
                                 
 endforeach; ?>  

<?php
$hoy = getdate();
$d= $hoy['mday'];
$m =$hoy['mon'];
$a =$hoy['year'];
$d=$d-9;

$fecha=$a . '-' . $m . '-' . $d;

//////////////grafico 2-- datos por meses

$mc1=0;
$mc2=0;
$mc3=0;
$mc4=0;
$mc5=0;
$mc6=0;
$mc7=0;
$mc8=0;
$mc9=0;
$mc10=0;
$mc11=0;
$mc12=0;

$mp1=0;
$mp2=0;
$mp3=0;
$mp4=0;
$mp5=0;
$mp6=0;
$mp7=0;
$mp8=0;
$mp9=0;
$mp10=0;
$mp11=0;
$mp12=0;
?>

<?php                                                                
  foreach ($datosgraficomc1 as $datosmc1) : 
        $mc1+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomc2 as $datosmc1) : 
        $mc2+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomc3 as $datosmc1) : 
        $mc3+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomc4 as $datosmc1) : 
        $mc4+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomc5 as $datosmc1) : 
        $mc5+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomc6 as $datosmc1) : 
        $mc6+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomc7 as $datosmc1) : 
        $mc7+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomc8 as $datosmc1) : 
        $mc8+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomc9 as $datosmc1) : 
        $mc9+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomc10 as $datosmc1) : 
        $mc10+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomc11 as $datosmc1) : 
        $mc11+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomc12 as $datosmc1) : 
        $mc12+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomp1 as $datosmc1) : 
        $mp1+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomp2 as $datosmc1) : 
        $mp2+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomp3 as $datosmc1) : 
        $mp3+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomp4 as $datosmc1) : 
        $mp4+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomp5 as $datosmc1) : 
        $mp5+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomp6 as $datosmc1) : 
        $mp6+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomp7 as $datosmc1) : 
        $mp7+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomp8 as $datosmc1) : 
        $mp8+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomp9 as $datosmc1) : 
        $mp9+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomp10 as $datosmc1) : 
        $mp10+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomp11 as $datosmc1) : 
        $mp11+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  

<?php                                                                
  foreach ($datosgraficomp12 as $datosmc1) : 
        $mp12+= $datosmc1['totalg'];    
                                 
 endforeach; ?>  






<script >
    
    c1=<?php echo $if1 ?>;
    c2=<?php echo $if2 ?>;
    c3=<?php echo $if3 ?>;
    c4=<?php echo $if4 ?>;
    c5=<?php echo $if5 ?>;
    c6=<?php echo $if6 ?>;
    c7=<?php echo $if7 ?>;
    c8=<?php echo $if8 ?>;
    c9=<?php echo $if9 ?>;
    c10=<?php echo $if10 ?>;
    
    p1=<?php echo $jf1 ?>;
    p2=<?php echo $jf2 ?>;
    p3=<?php echo $jf3 ?>;
    p4=<?php echo $jf4 ?>;
    p5=<?php echo $jf5 ?>;
    p6=<?php echo $jf6 ?>;
    p7=<?php echo $jf7 ?>;
    p8=<?php echo $jf8 ?>;
    p9=<?php echo $jf9 ?>;
    p10=<?php echo $jf10 ?>;
    
    
    fc1=<?php echo $fecha ?>;
    fc2=<?php echo $fc[2] ?>;
    fc3=<?php echo $fc[3] ?>;
    fc4=<?php echo $fc[4] ?>;
    fc5=<?php echo $fc[5] ?>;
    fc6=<?php echo $fc[6] ?>;
    fc7=<?php echo $fc[7] ?>;
    fc8=<?php echo $fc[8] ?>;
    fc9=<?php echo $fc[9] ?>;
    fc10=<?php echo $fc[10] ?>;
    
    fp1=<?php echo $fp[1] ?>;
    fp2=<?php echo $fp[2] ?>;
    fp3=<?php echo $fp[3] ?>;
    fp4=<?php echo $fp[4] ?>;
    fp5=<?php echo $fp[5] ?>;
    fp6=<?php echo $fp[6] ?>;
    fp7=<?php echo $fp[7] ?>;
    fp8=<?php echo $fp[8] ?>;
    fp9=<?php echo $fp[9] ?>;
    fp10=<?php echo $fp[10] ?>;
    
    a=<?php echo $a ?>;
    m=<?php echo $m ?>;
    d=<?php echo $d ?>;
   
    mc1=<?php echo $mc1 ?>;
    mc2=<?php echo $mc2 ?>;
    mc3=<?php echo $mc3 ?>;
    mc4=<?php echo $mc4 ?>;
    mc5=<?php echo $mc5 ?>;
    mc6=<?php echo $mc6 ?>;
    mc7=<?php echo $mc7 ?>;
    mc8=<?php echo $mc8 ?>;
    mc9=<?php echo $mc9 ?>;
    mc10=<?php echo $mc10 ?>;
    mc11=<?php echo $mc11 ?>;
    mc12=<?php echo $mc12 ?>;
    
    mp1=<?php echo $mp1 ?>;
    mp2=<?php echo $mp2 ?>;
    mp3=<?php echo $mp3 ?>;
    mp4=<?php echo $mp4 ?>;
    mp5=<?php echo $mp5 ?>;
    mp6=<?php echo $mp6 ?>;
    mp7=<?php echo $mp7 ?>;
    mp8=<?php echo $mp8 ?>;
    mp9=<?php echo $mp9 ?>;
    mp10=<?php echo $mp10 ?>;
    mp11=<?php echo $mp11 ?>;
    mp12=<?php echo $mp12 ?>;
    
   
    
    $(document).ready(function () {
        App.init();
        //Dashboard.init();
        handleDashboardDatepicker();
        handleInteractiveChart();
        handleInteractiveChart1();
        viewElements();
        bodyPadding();
    });
    $(window).resize(function(){
        viewElements();
        bodyPadding();
    });
</script>

<script>
var blue		= '#348fe2',
    blueLight	= '#5da5e8',
    blueDark	= '#1993E4',
    aqua		= '#49b6d6',
    aquaLight	= '#6dc5de',
    aquaDark	= '#3a92ab',
    green		= '#00acac',
    greenLight	= '#33bdbd',
    greenDark	= '#008a8a',
    orange		= '#f59c1a',
    orangeLight	= '#f7b048',
    orangeDark	= '#c47d15',
    dark		= '#2d353c',
    grey		= '#b6c2c9',
    purple		= '#727cb6',
    purpleLight	= '#8e96c5',
    purpleDark	= '#5b6392',
    red         = '#ff5b57';
    
    

var handleInteractiveChart = function () {
        fc1=a+'-'+m+'-'+d;
        d++;
        fc2=a+'-'+m+'-'+d;
        d++;
        fc3=a+'-'+m+'-'+d;
        d++;
        fc4=a+'-'+m+'-'+d;
        d++;
        fc5=a+'-'+m+'-'+d;
        d++;
        fc6=a+'-'+m+'-'+d;
        d++;
        fc7=a+'-'+m+'-'+d;
        d++;
        fc8=a+'-'+m+'-'+d;
        d++;
        fc9=a+'-'+m+'-'+d;
        d++;
        fc10=a+'-'+m+'-'+d;
	"use strict";
    function showTooltip(x, y, contents) {
        $('<div id="tooltip" class="flot-tooltip">' + contents + '</div>').css( {
            top: y - 45,
            left: x - 55
        }).appendTo("body").fadeIn(200);
    }
	if ($('#interactive-chart').length !== 0) {
	
        var data1 = [ 
            [1, c1], [2, c2], [3, c3], [4, c4], [5, c5], [6, c6], [7, c7], [8, c8], [9, c9], [10, c10] 
            //[11, 110], [12, 110]//, [13, 120], [14, 130], [15, 135],[16, 145], [17, 132], [18, 123], [19, 135], [20, 150] 
        ];
        var data2 = [
            [1, p1],  [2, p2], [3, p3], [4, p4], [5, p5], [6, p6], [7, p7], [8, p8], [9, p9], [10, p10] 
            //[11, 18], [12, 30], [13, 25], [14, 25], [15, 30], [16, 27], [17, 20], [18, 18], [19, 31], [20, 23]
        ];
        var xLabel = [
            [1,fc1],[2,fc2],[3,fc3],[4,fc4],[5,fc5],[6,fc6],[7,fc7],[8,fc8],[9,fc9],[10,fc10]
            //[11,''],[12,'May&nbsp;25'],[13,''],[14,''],[15,'May&nbsp;28'],[16,''],[17,''],[18,'May&nbsp;31'],[19,''],[20,'']
        ];
        $.plot($("#interactive-chart"), [
                {
                    data: data1, 
                    label: "Tramitón Ciudadano", 
                    color: blue   ,
                    lines: { show: true, fill:false, lineWidth: 2 },
                    points: { show: true, radius: 3, fillColor: '#fff' },
                    shadowSize: 0
                }, {
                    data: data2,
                    label: 'Tramitón Productivo',
                    color: orange,
                    lines: { show: true, fill:false, lineWidth: 2 },
                    points: { show: true, radius: 3, fillColor: '#fff' },
                    shadowSize: 0
                }
            ], 
            {
                xaxis: {  ticks:xLabel, tickDecimals: 0, tickColor: '#ddd' },
                yaxis: {  ticks: 10, tickColor: '#ddd', min: 0, max: 20 },
                grid: { 
                    hoverable: true, 
                    clickable: true,
                    tickColor: "#ddd",
                    borderWidth: 1,
                    backgroundColor: '#fff',
                    borderColor: '#ddd'
                },
                legend: {
                    labelBoxBorderColor: '#ddd',
                    margin: 10,
                    noColumns: 1,
                    show: true
                }
            }
        );
        var previousPoint = null;
        $("#interactive-chart").bind("plothover", function (event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));
            if (item) {
                if (previousPoint !== item.dataIndex) {
                    previousPoint = item.dataIndex;
                    $("#tooltip").remove();
                    var y = item.datapoint[1].toFixed(2);
                    
                    var content = item.series.label + " " + y;
                    showTooltip(item.pageX, item.pageY, content);
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;            
            }
            event.preventDefault();
        });
    }
};

var handleInteractiveChart1 = function () {
        
	"use strict";
    function showTooltip(x, y, contents) {
        $('<div id="tooltip" class="flot-tooltip">' + contents + '</div>').css( {
            top: y - 45,
            left: x - 55
        }).appendTo("body").fadeIn(200);
    }
	if ($('#interactive-chart1').length !== 0) {
	
        var data1 = [ 
            [1, mc1], [2, mc2], [3, mc3], [4, mc4], [5, mc5], [6, mc6], [7, mc7], [8, mc8], [9,mc9]//, [10, mc10], 
            //[11, mc11], [12, mc12] //, [13, 120], [14, 130], [15, 135],[16, 145], [17, 132], [18, 123], [19, 135], [20, 150] 
        ];
        var data2 = [
            [1, mp1],  [2, mp2], [3, mp3], [4, mp4], [5, mp5], [6, mp6], [7, mp7], [8, mp8], [9, mp9]//, [10, mp10], 
            //[11, mp11], [12, mp12] //, [13, 25], [14, 25], [15, 30], [16, 27], [17, 20], [18, 18], [19, 31], [20, 23]
        ];
        var xLabel = [
            [1,'ENERO'],[2,'FEBRERO'],[3,'MARZO'],[4,'ABRIL'],[5,'MAYO'],[6,'JUNIO'],[7,'JULIO'],[8,'AGOSTO'],[9,'SEPTIEMBRE']
            //,[10,'OCTUBRE'],[11,'NOVIEMBRE'],[12,'DICIEMBRE'] //,[13,''],[14,''],[15,'May&nbsp;28'],[16,''],[17,''],[18,'May&nbsp;31'],[19,''],[20,'']
        ];
        $.plot($("#interactive-chart1"), [
                {
                    data: data1, 
                    label: "Tramitón Ciudadano", 
                    color: blue,
                    lines: { show: true, fill:false, lineWidth: 2 },
                    points: { show: true, radius: 3, fillColor: '#fff' },
                    shadowSize: 0
                }, {
                    data: data2,
                    label: 'Tramitón Productivo',
                    color: orange,
                    lines: { show: true, fill:false, lineWidth: 2 },
                    points: { show: true, radius: 3, fillColor: '#fff' },
                    shadowSize: 0
                }
            ], 
            {
                xaxis: {  ticks:xLabel, tickDecimals: 0, tickColor: '#ddd' },
                yaxis: {  ticks: 10, tickColor: '#ddd', min: 0, max: 50 },
                grid: { 
                    hoverable: true, 
                    clickable: true,
                    tickColor: "#ddd",
                    borderWidth: 1,
                    backgroundColor: '#fff',
                    borderColor: '#ddd'
                },
                legend: {
                    labelBoxBorderColor: '#ddd',
                    margin: 10,
                    noColumns: 1,
                    show: true
                }
            }
        );
        var previousPoint = null;
        $("#interactive-chart1").bind("plothover", function (event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));
            if (item) {
                if (previousPoint !== item.dataIndex) {
                    previousPoint = item.dataIndex;
                    $("#tooltip").remove();
                    var y = item.datapoint[1].toFixed(2);
                    
                    var content = item.series.label + " " + y;
                    showTooltip(item.pageX, item.pageY, content);
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;            
            }
            event.preventDefault();
        });
    }
};

var handleDashboardDatepicker = function() {
	"use strict";
    $('#datepicker-inline').datepicker({
        todayHighlight: true
    });
};
</script>