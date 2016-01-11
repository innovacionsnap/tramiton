<?php

function provincia($nombre,$valor)
{

	include("config.inc.php");
		
	$consulta_provincia = "select * from provincia";
    $resultado_provincia = pg_query($con, $consulta_provincia) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_provincia);
	
	echo "<select name='$nombre' id='$nombre'>";
	echo "<option value=''>Selecciona una Provincia...</option>";
	while ($fila=pg_fetch_array($resultado_provincia)) 
	{
		echo "<option value='".$fila["pro_id"]."'";
		if ($fila["pro_id"]==$valor) echo " selected";
		echo ">".$fila["pro_nombre"]."</option>\r\n";
	}
	echo "</select>";
	
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
		
	$consulta_institucion = "select * from institucion order by ins_funcion_ejecutiva desc,ins_nombre";
    $resultado_institucion = pg_query($con, $consulta_institucion) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_institucion);
	
	echo "<select name='$nombre' id='$nombre'>";
	echo "<option value=''>Selecciona un Padre...</option>";
	while ($fila=pg_fetch_array($resultado_institucion)) 
	{
		echo "<option value='".$fila["ins_id"]."'";
		if ($fila["ins_id"]==$valor) echo " selected";
		echo ">".$fila["ins_nombre"]."</option>\r\n";
	}
	echo "</select>";
	
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



?>

	


<div id="resultados">
<?php

if (isset($_POST)) print_r($_POST);
?>
</div>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
	<fieldset>
		<p><label>Institucion:</label><?php institucion("id_institucion","0"); ?></p>
		<p id="pidhijo2"><label>Tramite:</label><?php //tramite("id_institucion","0"); ?></p>
		
		<p><label>Provincia:</label><?php provincia("id_provincia","0"); ?></p>
		<p id="pidhijo"><label>canton:</label><?php //canton("idhijo","0"); ?></p>
		
		
		<p id="pidhijo"><label></label><?php// problema("nieto","3"); ?></p>
		
		<p><input type="submit" name="submit" value="Mostrar resultados" /></p>
	</fieldset>
</form>
