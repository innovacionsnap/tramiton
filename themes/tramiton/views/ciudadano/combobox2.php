<?php
include 'config.inc.php';

if ($_GET['buscar_institucion']=="institucion")
{
	
	$var_institucion = $_GET['id_institucion'];
	//	echo $var_institucion;
		
	$consulta_tramite = "select ins.ins_id,ins.ins_nombre,tra.tra_nombre from tramite tra, tramite_institucion trai, institucion ins where tra.tra_id = trai.tra_id and trai.ins_id = ins.ins_id and ins.ins_id='".$var_institucion."' order by tra.tra_nombre";	

	$resultado_tramite = pg_query($con, $consulta_tramite) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_tramite);
	$fila=pg_fetch_array($resultado_tramite);
	echo "<div class='col-md-12'> <div class='form-group'>";
	
	if ($fila['tra_nombre']== 'Otros...'){
		echo "<label>".$fila['tra_nombre']."</label>";
        echo "<div class='controls'>";
              echo "<input type='text' name='username' placeholder='Escriba otro tramite' class='form-control' data-parsley-group='wizard-step-3' required />";
         echo "</div></div>";
		
	}else {
		echo "<label> Tramite: </label>";
		echo "<div class='controls'>";
		echo "<select class='form-control' name='id_tramite' id='id_tramite'>";
		
		while ($fila=pg_fetch_array($resultado_tramite)) 
		{
			echo "<option value=".$fila['ins_id'].">".$fila['tra_nombre']."</option>";
		}
		echo "</select>";
		echo "</div></div>";
	}
	
}




 
?>