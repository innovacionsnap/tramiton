<?php

//$insertar_tarea= $_POST['insertar_tarea'];
$insertar_participantes = $_POST['insertar_participantes'];

//echo $insertar_participantes;

include 'protected/extensions/validacion/config.inc.php';

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
		$id_usuario_responsable = $_POST['id_usuario_responsable'];


		
		$insertar_tarea = $_POST['insertar_tarea'];
		
	
		echo "Caretegoria: ".$id_categoria."<br>";
		echo "Nombre: ".$nombre_tarea."<br>";
		echo "descripcion: ".$descripcion_tarea."<br>";
		echo "Fecha Ini: ".$star."<br>";
		echo "fecha Fin: ".$end."<br>";
		echo "Meta Tarea: ".$meta_tarea."<br>";
		echo "Instituicion:".$id_institucion."<br>";
		echo "Usario R".$id_usuario_responsable."<br>";

		

		$hoy = date("Y-m-d"); 
		
		//echo "<Br>Insertar tramite".$insertar_tramite;
		
		

		$insertar_tarea = "INSERT INTO tarea(
            tar_id, tar_nombre, tar_descripcion, tar_meta, tar_fechainicio, 
            tar_fechafin, tar_fecharegistro, tar_estado, ins_id, cat_id,usu_id)
    VALUES (default, '$nombre_tarea', '$descripcion_tarea', '$meta_tarea', '$star', 
            '$end', '2015-09-08', 1, $id_institucion, $id_categoria ,$id_usuario);";
					
		echo "<Br>sqL DE TRAMITES: <BR>".$insertar_tarea;
			$resultado_insert = pg_query($con, $insertar_tarea) or die("Error en la Consulta SQL");
			$consulta_max_tarea = "select MAX(tar_id) as tarea_id from tarea";
			$resultado_max_tarea = pg_query($con, $consulta_max_tarea) or die("Error en la Consulta SQL");
			$fila_max_tarea=pg_fetch_array($resultado_max_tarea);
			$max_tarea= $fila_max_tarea ['tarea_id'];

			// ingreso de usuario 
			$insert_tarea_usuario= "INSERT INTO tarea_usuario(taru_id, tar_id, taru_estado, usu_id,taru_categoria)VALUES (DEFAULT, '$max_tarea', 1, '$id_usuario_responsable',1);";
			echo "<BR> Tramite Solucion: ".$insert_tarea_usuario;
			$resultado_tarea_usuario = pg_query($con, $insert_tarea_usuario) or die("Error en la Consulta SQL");
					
					/*
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

if (isset($insertar_participantes)) {

	$id_usuario_participante = $_POST['id_usuario_participante'];
	$tar_id = $_POST['tar_id'];

	echo $id_usuario_participante."<br>";
	echo $tar_id."<br>";

	$insertar_participante_tarea = "INSERT INTO tarea_usuario(
            taru_id, tar_id, taru_estado, usu_id, taru_categoria)
    VALUES (default, $tar_id, 1, $id_usuario_participante, 2);";
					
		echo "<Br>sqL DE TRAMITES: <BR>".$insertar_participante_tarea;
			$resultado_insert = pg_query($con, $insertar_participante_tarea) or die("Error en la Consulta SQL");
}	
?>
