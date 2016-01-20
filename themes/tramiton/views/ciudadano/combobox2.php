<?php
include '../../../../protected/extensions/validacion/config.inc.php';


function dameURL(){
$actual_link="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['PHP_SELF'];
return $actual_link;
}

//echo dameURL();
 
if ($_GET['buscar_institucion']=="institucion")
{
	
	$var_institucion = $_GET['id_institucion'];
	//echo "Id: institucion".$var_institucion."<br>";
	if ($var_institucion==''){

		//echo "Seleccionar una institución";
		
	}else {
		$consulta_tramite = "select trai.trai_id,ins.ins_id,ins.ins_nombre,tra.tra_nombre from tramite tra, tramite_institucion trai, institucion ins where tra.tra_id = trai.tra_id and trai.ins_id = ins.ins_id and ins.ins_id='".$var_institucion."' order by trai.tra_id,tra.tra_nombre";	
	
		//echo "<br>".$consulta_tramite."<br>";
		$resultado_tramite = pg_query($con, $consulta_tramite) or die("Error en la Consulta SQL");
	    $numReg = pg_num_rows($resultado_tramite);
		
		$resultado_tramite2 = pg_query($con, $consulta_tramite) or die("Error en la Consulta SQL");


		
			$fila=pg_fetch_array($resultado_tramite);
			echo "<div class='col-md-12'> <div class='form-group block1'>";
			echo "<label>Trámite </label>";
            echo "<i class='fa fa-question-circle ayuda' data-toggle='tooltip' data-placement='right' title='Seleccione el trámite realizado'></i>";
		
	                /*
			if($numReg == 1 and $fila['tra_nombre'] =='Otro...'){
				 echo "<input type='text' name='otro_tramite' onkeyup = 'Validate(this)' placeholder='Escriba otro tramite' class='form-control' data-parsley-group='wizard-step-1' required />";
		    }else{
                     echo "<select class='form-control' data-parsley-group='wizard-step-1' name='id_tramite2' id='id_tramite2' required>";
				
				while ($fila2=pg_fetch_array($resultado_tramite2)){
					echo "<option value=".$fila2['trai_id'].">".$fila2['tra_nombre']."</option>";
				}
				echo "</select>";
			}
			echo "</div>";		
		
	               */ 
	                echo "<select class='form-control' data-parsley-group='wizard-step-1' name='id_tramite2' id='id_tramite2'  required>";
	                while ($fila2=pg_fetch_array($resultado_tramite2)){
					echo "<option value=".$fila2['trai_id'].">".$fila2['tra_nombre']." </option>";
	                }
				echo "</select>";
	                        if($numReg == 1) {//and $fila['tra_nombre'] ==='Otro...'){
				echo "<br>";
	                         echo "<input type='text' name='otro_tramite' onkeyup = 'Validate(this)' placeholder='Escriba otro tramite' class='form-control' data-parsley-group='wizard-step-1' required />";
				 
	                        }         
                                echo "</div>";                        
                         
                }




	
	
}




 
?>