	

<?php 
/* Agregar funciones de combox provincia  */

function provincia($nombre,$valor)
{

	include("config.inc.php");
		
	$consulta_provincia = "select * from provincia";
    $resultado_provincia = pg_query($con, $consulta_provincia) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_provincia);
	echo "<div class='col-md-10'> <div class='form-group'>";
	echo "<select class='form-control' name='$nombre' id='$nombre'>";
	echo "<option value=''>Selecciona una Provincia...</option>";
	while ($fila=pg_fetch_array($resultado_provincia)) 
	{
		echo "<option value='".$fila["pro_id"]."'";
		if ($fila["pro_id"]==$valor) echo " selected";
		echo ">".$fila["pro_nombre"]."</option>\r\n";
	}
	echo "</select>";
	echo "</div> </div>";
	
}


function canton($nombre,$valor)
{
	include("config.inc.php");
		
	$consulta_canton = "select * from canton";
    $resultado_canton = pg_query($con, $consulta_canton) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_canton);
    
	
	echo "<select name='$nombre' id='$nombre'>";
	echo "<option value=''>Selecciona un Canton...</option>";
	while ($fila=pg_fetch_array($resultado_canton)) 
	{
		echo "<option value='".$fila["can_id"]."'";
		if ($fila["can_id"]==$valor) echo " selected";
		echo ">".$fila["can_nombre"]."</option>\r\n";
	}
	echo "</select>";
	
}


function institucion($nombre,$valor)
{

	include("config.inc.php");
		
	$consulta_institucion = "select * from institucion order by ins_nombre";
    $resultado_institucion = pg_query($con, $consulta_institucion) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_institucion);
	echo "<div class='col-md-12'> <div class='form-group'>";
	echo "<select class='form-control' name='$nombre' id='$nombre'>";
	echo "<option value=''>Selecciona una Institucion...</option>";
	while ($fila=pg_fetch_array($resultado_institucion)) 
	{
		echo "<option value='".$fila["ins_id"]."'";
		if ($fila["ins_id"]==$valor) echo " selected";
		echo ">".$fila["ins_nombre"]."</option>\r\n";
	}
	echo "</select>";
	echo "</div></div>";
	
}


function tramite($nombre,$valor)
{

	include("config.inc.php");
		
	$consulta_tramite = "select ins.ins_id,ins.ins_nombre,tra.tra_nombre
from tramite tra, tramite_institucion trai, institucion ins where tra.tra_id = trai.tra_id and trai.ins_id = ins.ins_id";
    $resultado_tramite = pg_query($con, $consulta_tramite) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_tramite);
	
	echo "<select name='$nombre' id='$nombre'>";
	echo "<option value=''>Selecciona un tramite...</option>";
	while ($fila=pg_fetch_array($resultado_tramite)) 
	{
		echo "<option value='".$fila["ins_id"]."'";
		if ($fila["ins_id"]==$valor) echo " selected";
		echo ">".$fila["ins_nombre"]."</option>\r\n";
	}
	echo "</select>";
	
}


function problema2()
{
	include("config.inc.php");
		
	$consulta_problema = "select DISTINCT pro_prob_id, prob_nombre from problema 
where nivp_ip = 1
order by pro_prob_id limit 4 offset 0";
	//echo $consulta_problema;
    $resultado_problema = pg_query($con, $consulta_problema) or die("Error en la Consulta SQL");
    $numReg1 = pg_num_rows($resultado_problema);
	?>
	<div class="col-md-15">
	    <!-- begin panel-group -->
	    <div class="panel-group m-b-0" id="accordion">
			<?php
			while ($fila=pg_fetch_array($resultado_problema)) 
			{
				$pro_prob_id= $fila['pro_prob_id'];
				$prob_nombre= $fila['prob_nombre']; ?>
				<!-- begin panel -1 -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    	
                                        <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $pro_prob_id ?>"><?php echo $prob_nombre ?></a>
                                    </h4>
                                </div>
                                <?php
								$consulta_problema_2 = "select prob_nombre,nivp_ip, prob_id from problema where nivp_ip = 2 and pro_prob_id =" . $pro_prob_id . "";

								$resultado_problema_2 = pg_query($con, $consulta_problema_2) or die("Error en la Consulta SQL");
								$numReg2 = pg_num_rows($resultado_problema_2);
                                ?>
                                <div id="<?php echo $pro_prob_id ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p><?php
                                        	while ($fila_p2=pg_fetch_array($resultado_problema_2)) 
											{
												 //if ($prob_nombre_otros==1){
												 //echo $prob_nombre_otros;	
												 //}else {?>
												 <input type="checkbox" name="problematica[]" value="<?php echo $fila_p2['prob_id']?>">&nbsp&nbsp<?php echo $fila_p2['prob_nombre']?><br>	
												 <?php
												//}
												 ?>
															
											<?php
											}
                                           ?> 
                                        </p>
                                    </div>
                                </div>
                            </div>
                <!-- end panel-->
				
				<?php

				}
			?>
		<!-- end panel-group -->
		</div>
	</div>
	<?php
	}

	function problema3()
	{
	include("config.inc.php");

	$consulta_problema = "select DISTINCT pro_prob_id, prob_nombre from problema
	where nivp_ip = 1
	order by pro_prob_id limit 4 offset 4";
	//echo $consulta_problema;
	$resultado_problema = pg_query($con, $consulta_problema) or die("Error en la Consulta SQL");
	$numReg1 = pg_num_rows($resultado_problema);
	?>
	<div class="col-md-15">
	    <!-- begin panel-group -->
	    <div class="panel-group m-b-0" id="accordion">
			<?php
			while ($fila=pg_fetch_array($resultado_problema)) 
			{
				$pro_prob_id= $fila['pro_prob_id'];
				$prob_nombre= $fila['prob_nombre']; ?>
				<!-- begin panel -1 -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    	
                                        <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $pro_prob_id ?>"><?php echo $prob_nombre ?></a>
                                    </h4>
                                </div>
                                <?php
								$consulta_problema_2 = "select prob_nombre,nivp_ip, prob_id from problema where nivp_ip = 2 and pro_prob_id =" . $pro_prob_id . "";

								$resultado_problema_2 = pg_query($con, $consulta_problema_2) or die("Error en la Consulta SQL");
								$numReg2 = pg_num_rows($resultado_problema_2);
                                ?>
                                <div id="<?php echo $pro_prob_id ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p><?php
                                        	while ($fila_p2=pg_fetch_array($resultado_problema_2)) 
											{
												 //if ($prob_nombre_otros==1){
												 //echo $prob_nombre_otros;	
												 //}else {?>
												 <input type="checkbox" name="problematica[]" value="<?php echo $fila_p2['prob_id']?>">&nbsp&nbsp<?php echo $fila_p2['prob_nombre']?><br>	
												 <?php
												//}
												 ?>
															
											<?php
											}
                                           ?> 
                                        </p>
                                    </div>
                                </div>
                            </div>
                <!-- end panel-->
				
				<?php

				}
			?>
		<!-- end panel-group -->
		</div>
	</div>
	<?php
	}

	function problema4()
	{
	include("config.inc.php");

	$consulta_problema = "select DISTINCT pro_prob_id, prob_nombre from problema
	where nivp_ip = 1
	order by pro_prob_id limit 4 offset 8";
	//echo $consulta_problema;
	$resultado_problema = pg_query($con, $consulta_problema) or die("Error en la Consulta SQL");
	$numReg1 = pg_num_rows($resultado_problema);
	?>
	<div class="col-md-15">
	    <!-- begin panel-group -->
	    <div class="panel-group m-b-0" id="accordion">
			<?php
			while ($fila=pg_fetch_array($resultado_problema)) 
			{
				$pro_prob_id= $fila['pro_prob_id'];
				$prob_nombre= $fila['prob_nombre'];
				 
				?>
				<!-- begin panel -1 -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    	
                                        <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $pro_prob_id ?>"><?php echo $prob_nombre ?></a>
                                    </h4>
                                </div>
                                <?php
								$consulta_problema_2 = "select prob_nombre,nivp_ip, prob_id from problema where nivp_ip = 2 and pro_prob_id =" . $pro_prob_id . "";
								//echo $consulta_problema_2;

								$resultado_problema_2 = pg_query($con, $consulta_problema_2) or die("Error en la Consulta SQL");
								$numReg2 = pg_num_rows($resultado_problema_2);
                                ?>
                                <div id="<?php echo $pro_prob_id ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p><?php
                                        	while ($fila_p2=pg_fetch_array($resultado_problema_2)) 
											{
												?>											
												 <input type="checkbox" name="problematica[]" value="<?php echo $fila_p2['prob_id']?>">&nbsp&nbsp<?php echo $fila_p2['prob_nombre']?><br>	
															
											<?php
											}

											if ($prob_nombre =='Otros'){
											$prob_nombre_otros = $prob_nombre;
											?>
											<!--
											<div class="controls">
                                                    <input type="text" name="problematica_otro" placeholder="Otra Problematica" data-parsley-range="[20,140]" class="form-control" data-parsley-group="wizard-step-3" required />
                                            </div>
											-->	
											<?php
											}
                                           ?> 
                                        </p>
                                    </div>
                                </div>
                            </div>
                <!-- end panel-->
				
				<?php

				}
			?>
		<!-- end panel-group -->
		</div>
	</div>
	<?php
	}
?>



<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Inicio</a></li>
        <li class="active">Ciudadano</li>
        <?php

		$modelUser = Usuario::model() -> findByPk(Yii::app() -> user -> id);
		$id_usuario = $modelUser['usu_id'];
        ?>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Ciudadano<small></small></h1>
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

                    <h4 class="panel-title">Ingrese su trámite</h4>
                </div>
                <div class="panel-body">
                    <form action="themes/tramiton/views/ciudadano/prueba.php" method="POST" data-parsley-validate="true" name="form_wizard">
                    	 <div id="wizard">
                            <ol>
                                <li>
                                    Detalle del trámites 
                                    <small>Identifica los detalles del tramite.</small>
                                </li>
                                <li>
                                    Identifica los problemas
                                    <small>Idenficar los problemas.</small>
                                </li>
                                <li>
                                    Solucion
                                    <small>Propon un solucion para tu tramite.</small>
                                </li>
                                <li>
                                    Gracias
                                    <small>Sed nunc neque, dapibus non leo sed, rhoncus dignissim elit.</small>
                                </li>
                            </ol>
                            <!-- begin wizard step-1 -->
                            <div class="wizard-step-1">
                                <fieldset>
                                    <legend class="pull-left width-full">Identificaci&oacute;n</legend>
                                    	<label>Institucion:</label>
		                                    <div class="controls">
		                                          <?php institucion("id_institucion", "0"); ?>  
		                                 	</div>
		                               
		                                
		                                        <p id="pidhijo2"> <?php //institucion("id_institucion","0"); ?>  
		                                 	
		                                 <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Unidad Prestadora</label>
                                                	 <input type="text" name="unidad_prestadora" placeholder="Unidad Prestadora" class="form-control" data-parsley-group="wizard-step-1" required />
                                            </div>
                                        
                                        </div>
		                                <label>Provincia:</label>
		                                    <div class="controls">
		                                          <?php provincia("id_provincia", "0"); ?>  
		                                    </div>
		                                
		                                    <div class="controls">
		                                          <p id="pidhijo"> <?php //institucion("id_institucion","0"); ?>  
		                                    </div>
		                                
                                </fieldset>
                            </div>
                            <!-- end wizard step-1 -->
                            <!-- begin wizard step-2 -->
                            <div class="wizard-step-2">
                            	<fieldset>
                                            <legend class="pull-left width-full">Identification</legend>
                                            <!-- begin row -->
                                            <div class="row">
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group block1">
														<?php echo problema2() ?>
													</div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group">
														<?php echo problema3() ?>
													</div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group">
														<?php echo problema4() ?>
													</div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                     	   <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Experiencia</label>
                                                <div class="controls">
                                                    <textarea class="form-control" id="message" name="experiencia" rows="4" data-parsley-range="[20,200]" placeholder="experiencia"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                            </div>
                                            <!-- end row -->
								</fieldset>
                            </div>
                            <!-- end wizard step-2 -->
                            <!-- begin wizard step-3 -->
                            <div class="wizard-step-3">
                                <fieldset>
                                    <legend class="pull-left width-full">Login</legend>
                                    <!-- begin row -->
                                    <div class="row">
                                        <!-- begin col-4 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Titulo del problemassss</label>
                                                <div class="controls">
                                                    <input type="text" name="titulo_solucion" placeholder="Escribir el titulo de la solucion" data-parsley-range="[20,200]" class="form-control" data-parsley-group="wizard-step-3" required />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                         <!-- begin col-4 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Propuesta de la solucion</label>
                                                <div class="controls">
                                                    <textarea class="form-control" id="message" name="propuesta_solucion" rows="4" data-parsley-range="[20,200]" placeholder="Rango 20 - 200"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-4 -->
                                    </div>
                                    <!-- end row -->
                                </fieldset>
                            </div>
                            <!-- end wizard step-3 -->
                            <!-- begin wizard step-4 -->
                            <div>
                                <div class="jumbotron m-b-0 text-center">
                                    <h1>Gracias por ingresar el tramite</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat commodo porttitor. Vivamus eleifend, arcu in tincidunt semper, lorem odio molestie lacus, sed malesuada est lacus ac ligula. Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin. </p>
                                    <!--  <p><a class="btn btn-success btn-lg" role="button">Guardar y enviar</a></p> -->
                                    <input type="submit" value="Submit"> 
                                    <input type="hidden" name="insertar_tramite" value="1">
                                    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                                </div>
                            </div>
                            <!-- end wizard step-4 -->
                        </div>
                    </form>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content -->


<script>
	$(document).ready(function() {
		FormWizard.init();
	});
</script>