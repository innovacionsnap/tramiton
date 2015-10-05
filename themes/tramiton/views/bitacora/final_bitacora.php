<?php

$insertar_tarea= $_POST['insertar_tarea'];

if (isset($insertar_tarea)) {
	
	
		$id_categoria = $_POST['id_categoria'];
		$nombre_tarea = $_POST['nombre_tarea'];
		$descripcion_tarea = $_POST['descripcion_tarea'];
		$star = $_POST['start'];
		$end = $_POST['end'];
		$meta_tarea = $_POST['meta_tarea'];
		$id_usuario = $_POST['id_usuario'];
		$url = $_POST['url'];
		$id_institucion = $_POST['id_institucion'];



		
		//$problematica = $_POST['problematica'];
		
		
		$insertar_tarea = $_POST['insertar_tarea'];
		
	
		echo "Caretegoria: ".$id_categoria."<br>";
		echo "Nombre: ".$nombre_tarea."<br>";
		echo "descripcion: ".$descripcion_tarea."<br>";
		echo "Fecha Ini: ".$star."<br>";
		echo "fecha Fin: ".$end."<br>";
		echo "Meta Tarea: ".$meta_tarea."<br>";
		echo "Instituicion:".$id_institucion."<br>";
		

		$hoy = date("Y-m-d"); 
		
		//echo "<Br>Insertar tramite".$insertar_tramite;
		
		include 'config.inc.php';

		$insertar_tarea = "INSERT INTO tarea(
            tar_id, tar_nombre, tar_descripcion, tar_meta, tar_fechainicio, 
            tar_fechafin, tar_fecharegistro, tar_estado, ins_id, cat_id)
    VALUES (default, '$nombre_tarea', '$descripcion_tarea', '$meta_tarea', '$star', 
            '$end', '2015-09-08', 1, $id_categoria, $id_institucion);";
					
		            echo "<Br>sqL DE TRAMITES: <BR>".$insertar_tarea;
		            
		            $resultado_insert = pg_query($con, $insertar_tarea) or die("Error en la Consulta SQL");
		
		/*
					$consulta_max_tramite = "select MAX(datt_id) as detalle_id from datos_tramite";	
					$resultado_max_tramite = pg_query($con, $consulta_max_tramite) or die("Error en la Consulta SQL");
					$fila_max_tramite=pg_fetch_array($resultado_max_tramite);
					$max_tramite= $fila_max_tramite ['detalle_id'];
					
					$insert_solucion= "INSERT INTO solucion(sol_id, datt_id, usu_id, sol_titulo, sol_descripcion, sol_vistas, sol_fecha, sol_estado)
				    VALUES (default, '$max_tramite', '$id_usuario', '$titulo_solucion', '$propuesta_solucion', 0,'$hoy', 1);";
				          echo "<BR> Tramite Solucion: ".$insert_solucion;
				            
				            $resultado_solucion = pg_query($con, $insert_solucion) or die("Error en la Consulta SQL");
					
					
					if (isset($_POST['problematica_otro'])){
						//echo "UNO";
						$insert_problem_tramite = "INSERT INTO problema_tramite(prob_id, datt_id, prot_estado_, prot_nombreotroproblema) VALUES (41,$max_tramite, 0,'$problematica_otro');";
				            echo "<BR> Problematica Otro".$insert_problem_tramite;
				        $resultado_problem_tramite = pg_query($con, $insert_problem_tramite) or die("Error en la Consulta SQL");
						
					}
					
					if (isset($_POST['problematica'])) {
				    $optionArray = $_POST['problematica'];
				    for ($i=0; $i<count($optionArray); $i++) {
				    	echo "Problematica: ".$optionArray[$i]."<br />";
						$insert_problem_tramite = "INSERT INTO problema_tramite(
				            prob_id, datt_id, prot_estado_, prot_nombreotroproblema)
				   			VALUES ($optionArray[$i],$max_tramite, 0,'');";
				           // echo $insert_problem_tramite;
				            
				            $resultado_problem_tramite = pg_query($con, $insert_problem_tramite) or die("Error en la Consulta SQL");
				    	
		    }
		}
	  */	
	
	
}	 
	
	
?>
