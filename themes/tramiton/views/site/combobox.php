<?php
include '../../../../protected/extensions/validacion/config.inc.php';

if ($_GET['buscar']=="hijos")
{
	$var_padre = $_GET['id_provincia'];

	if ($var_padre==''){

	}else{

		$consulta_canton = "SELECT * FROM canton WHERE pro_id='".$var_padre."' order by can_nombre";

		$resultado_canton = pg_query($con, $consulta_canton) or die("Error en la Consulta SQL");
	    $numReg = pg_num_rows($resultado_canton);
		// echo "<div class='col-md-10'> <div class='form-group'>";
		echo "<label>Cantón <i class='fa fa-question-circle ayuda' data-toggle='tooltip' data-placement='right' title='Seleccione el cantón donde realizó el trámite'></i></label>";
		echo "<select class='campo-panel2 form-registro' data-parsley-group='wizard-step-1' required name='idhijo' id='idhijo'>";
		while ($fila=pg_fetch_array($resultado_canton))
		{
		echo "<option value=".$fila['can_id'].">".$fila['can_nombre']."</option>";
		}
		echo "</select>";
		// echo "</div> </div>";
	}

}

?>
