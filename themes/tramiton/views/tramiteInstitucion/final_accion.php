<?php

//$insertar_tarea= $_POST['insertar_tarea'];
$insertar_accion = $_POST['insertar_accion'];

//echo $insertar_participantes;

include 'config.inc.php';

if (isset($insertar_accion)) {
	
	
		$nombre_accc = $_POST['nombre_accc'];
		$descripcion_accc = $_POST['descripcion_accc'];
		
		//$id_usuario = $_POST['id_usuario'];
		$tra_id = $_POST['tra_id'];
		$usu_id = $_POST['id_usuario'];


		
		//$insertar_tarea = $_POST['insertar_tarea'];
		
	
		//echo $nombre_accc."<BR>";
		//echo $descripcion_accc."<BR>";
		
		//echo $tra_id."<BR>";


		

		$hoy = date("Y-m-d"); 
		
		//echo "<Br>Insertar tramite".$insertar_tramite;
		
		

		
		$insertar_accion = "INSERT INTO acciones_correctivas(
            accc_id, accc_nombre, accc_descripcion, accc_fechaingreso, usu_id, 
            estado, tra_id)
    VALUES (default, '$nombre_accc','$descripcion_accc', '$hoy', $usu_id, 
            1, '$tra_id');
";
					
		//echo "<Br>sqL DE TRAMITES: <BR>".$insertar_accion;
			$resultado_insert = pg_query($con, $insertar_accion) or die("Error en la Consulta SQL");

			header ("location: http://localhost/tramiton22/tramiteInstitucion/accion_correctiva?tra_id=$tra_id");

			
	
}

?>
