<?php

$insertar_tramite= $_POST['insertar_tramite'];

if (isset($insertar_tramite)) {
	
	
		$id_institucion = $_POST['id_institucion'];
		$id_provincia = $_POST['id_provincia'];
		$unidad_prestadora = $_POST['unidad_prestadora'];
		$idhijo = $_POST['idhijo'];
		$id_tramite = $_POST['id_tramite'];
		$experiencia = $_POST['experiencia'];
		$titulo_solucion = $_POST['titulo_solucion'];
		$propuesta_solucion = $_POST['propuesta_solucion'];
		$id_usuario = $_POST['id_usuario'];
		$problematica_otro = $_POST['problematica_otro'];
		
		echo "Usuario:".$id_usuario.'<br>'; 
		echo "Dos ";
		//$problematica = $_POST['problematica'];
		
		
		$insertar_tramite = $_POST['insertar_tramite'];
		
		
		echo "Institucion: ".$id_institucion."<br>";
		echo "Provincia: ".$id_provincia."<br>";
		echo "Unidad: ".$unidad_prestadora."<br>";
		echo "Experiencia: ".$idhijo."<br>";
		echo "Tramite: ".$id_tramite."<br>";
		echo "Titulo Solucion: ".$titulo_solucion."<br>";
		echo "Experiencia: ".$experiencia."<br>";
		echo "Propuesta Solucion: ".$propuesta_solucion."<br>";
		echo "Otro Problema: ".$problematica_otro."<br>";
		//echo "problematica: ".$problematica."<br>";
		$hoy = date("Y-m-d"); 
		
		include 'config.inc.php';
		
		
		$insert_tramite = "INSERT INTO datos_tramite(
		            datt_id, par_id, usu_id, trai_id, datt_unidadprestadora, datt_experiencia, 
		            datt_fechainicio, datt_fechafin, datt_fecharegistro, datt_ipingreso, 
		            datt_edicion, datt_codigoconfirmacion, datt_otronombretramite, 
		            datt_calificado, datt_descripcionbreve, datt_estado, can_id, 
		            datt_otronombreinstitucion, datt_fecha_actualizacion)
		    VALUES (default, 1500, $id_usuario, $id_tramite, '$unidad_prestadora', '$experiencia', 
		            '$hoy', '$hoy', '$hoy', '0.0.0.0', 
		            '2015', 'N/A', 'PRUEBA OTRO TRAMITE', 
		            0, 'prueba decripcion', 0, 150, 
		            'N/A', '$hoy');";
					
		           // echo $insert_tramite;
		            
		            $resultado_insert_Tramite = pg_query($con, $insert_tramite) or die("Error en la Consulta SQL");
		
					$consulta_max_tramite = "select MAX(datt_id) as detalle_id from datos_tramite";	
					$resultado_max_tramite = pg_query($con, $consulta_max_tramite) or die("Error en la Consulta SQL");
					$fila_max_tramite=pg_fetch_array($resultado_max_tramite);
					$max_tramite= $fila_max_tramite ['detalle_id'];
					
					$insert_solucion= "INSERT INTO solucion(sol_id, datt_id, usu_id, sol_titulo, sol_descripcion, sol_vistas, sol_fecha, sol_estado)
				    VALUES (default, '$max_tramite', '$id_usuario', '$titulo_solucion', '$propuesta_solucion', 1,'$hoy', 0);";
				           // echo $insert_tramite;
				            
				            $resultado_solucion = pg_query($con, $insert_solucion) or die("Error en la Consulta SQL");
					
					
					if (isset($_POST['problematica_otro'])){
						//echo "UNO";
						$insert_problem_tramite = "INSERT INTO problema_tramite(prob_id, datt_id, prot_estado_, prot_nombreotroproblema) VALUES (41,$max_tramite, 0,'$problematica_otro');";
				            //echo $insert_problem_tramite;
				        $resultado_problem_tramite = pg_query($con, $insert_problem_tramite) or die("Error en la Consulta SQL");
						
					}
					
					if (isset($_POST['problematica'])) {
				    $optionArray = $_POST['problematica'];
				    for ($i=0; $i<count($optionArray); $i++) {
				    	echo "Problematica: ".$optionArray[$i]."<br />";
						$insert_problem_tramite = "INSERT INTO problema_tramite(
				            prob_id, datt_id, prot_estado_, prot_nombreotroproblema)
				   			VALUES ($optionArray[$i],$max_tramite, 0,'');";
				            //echo $insert_problem_tramite;
				            
				            $resultado_problem_tramite = pg_query($con, $insert_problem_tramite) or die("Error en la Consulta SQL");
				    	
		    }
		}
	
	
	
}		
	

?>