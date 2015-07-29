<?php
include 'config.inc.php';

if ($_GET['buscar_institucion']=="institucion")
{
	
	$var_institucion = $_GET['id_institucion'];
	//	echo $var_institucion;
		
	$consulta_tramite = "select ins.ins_id,ins.ins_nombre,tra.tra_nombre from tramite tra, tramite_institucion trai, institucion ins where tra.tra_id = trai.tra_id and trai.ins_id = ins.ins_id and ins.ins_id='".$var_institucion."' order by tra.tra_nombre";	
	
	//echo "<br>".$consulta_tramite."<br>";
	$resultado_tramite = pg_query($con, $consulta_tramite) or die("Error en la Consulta SQL");
    $numReg = pg_num_rows($resultado_tramite);
	
	$resultado_tramite2 = pg_query($con, $consulta_tramite) or die("Error en la Consulta SQL");


	
		$fila=pg_fetch_array($resultado_tramite);
		echo "<div class='col-md-12'> <div class='form-group block1'>";
		echo "<label>Tramite</label>";
	
	
		if($numReg == 1 and $fila['tra_nombre'] =='Otro...'){
			 echo "<input type='text' name='otro_tramite' placeholder='Escriba otro tramite' class='form-control' data-parsley-group='wizard-step-1' required />";
	    }else{
	    	echo "<select class='form-control' data-parsley-group='wizard-step-1' name='id_tramite' id='id_tramite' required>";
			
			while ($fila2=pg_fetch_array($resultado_tramite2)){
				echo "<option value=".$fila2['ins_id'].">".$fila2['tra_nombre']."</option>";
			}
			echo "</select>";
		}
		echo "</div>";		
	
	
	
}




 
?>