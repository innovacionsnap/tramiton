<?php
include 'config.inc.php';

if ($_GET['buscar']=="hijos")
{
	$var_padre = $_GET['id_provincia'];
	//echo $var_padre;
	
	$consulta_canton = "SELECT * FROM canton WHERE pro_id='".$var_padre."' order by can_nombre";	
	
	$resultado_canton = pg_query($con, $consulta_canton) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_canton);
	echo "<div class='col-md-10'> <div class='form-group'>";
	echo "<label>Canton:</label>";
	echo "<select class='form-control' data-parsley-group='wizard-step-1' required name='idhijo' id='idhijo'>";
	while ($fila=pg_fetch_array($resultado_canton)) 
	{
	echo "<option value=".$fila['can_id'].">".$fila['can_nombre']."</option>";
	}
	echo "</select>";
	echo "</div> </div>";
	 
}

?>