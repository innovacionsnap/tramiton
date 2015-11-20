<?php

$insertar_tramite = $_POST['insertar_tramite'];

if (isset($insertar_tramite)) {
    $id_institucion = $_POST['id_institucion'];
    $id_provincia = $_POST['id_provincia'];
    $unidad_prestadora = $_POST['unidad_prestadora'];
    $idhijo = $_POST['idhijo'];
    $empresa = $_POST['empresa'];
    //$id_tramite = isset ($_POST['id_tramite']);

    if (isset($_POST['id_tramite2'])) {
        $id_tramite = $_POST['id_tramite2'];
    } else {
        $id_tramite = 4173;
    }
    $experiencia = $_POST['experiencia'];
    $titulo_solucion = $_POST['titulo_solucion'];


    if (isset($_POST['otro_tramite'])) {
        $otro_tramite = $_POST['otro_tramite'];
    } else {
        $otro_tramite = "n/a";
    }

    $propuesta_solucion = $_POST['propuesta_solucion'];
    $id_usuario = $_POST['id_usuario'];
    $problematica_otro = $_POST['problematica_otro'];
    $url = $_POST['url'];

    $insertar_tramite = $_POST['insertar_tramite'];

    $hoy = date("Y-m-d");

    include 'config.inc.php';

/*
    $insert_tramite = "INSERT INTO datos_tramite(
		            datt_id, par_id, usu_id, trai_id, datt_unidadprestadora, datt_experiencia, 
		            datt_fechainicio, datt_fechafin, datt_fecharegistro, datt_ipingreso, 
		            datt_edicion, datt_codigoconfirmacion, datt_otronombretramite, 
		            datt_calificado, datt_descripcionbreve, datt_estado, can_id, 
		            datt_otronombreinstitucion, datt_fecha_actualizacion)
		    VALUES (default, 1500, $id_usuario, $id_tramite, '$unidad_prestadora', '$experiencia', 
		            '$hoy', '$hoy', '$hoy', '0.0.0.0', 
		            '2015', 'N/A', '$otro_tramite', 
		            0, 'prueba decripcion', 1, 150, 
		            'N/A', '$hoy');";


    $resultado_insert = pg_query($con, $insert_tramite) or die("Error en la Consulta SQL");


    $consulta_max_tramite = "select MAX(datt_id) as detalle_id from datos_tramite";
    $resultado_max_tramite = pg_query($con, $consulta_max_tramite) or die("Error en la Consulta SQL");
    $fila_max_tramite = pg_fetch_array($resultado_max_tramite);
    $max_tramite = $fila_max_tramite ['detalle_id'];

    if ($empresa != 0) {
        $consulta = "INSERT INTO empresa_tramite(etr_id,emp_id,datt_id) values(default,'$empresa','$max_tramite');";
        $resultado_empresa = pg_query($con, $consulta) or die("Error en la Consulta SQL");
    }
    $insert_solucion = "INSERT INTO solucion(sol_id, datt_id, usu_id, sol_titulo, sol_descripcion, sol_vistas, sol_fecha, sol_estado)
				    VALUES (default, '$max_tramite', '$id_usuario', '$titulo_solucion', '$propuesta_solucion', 0,'$hoy', 1);";


    $resultado_solucion = pg_query($con, $insert_solucion) or die("Error en la Consulta SQL");


    if (isset($_POST['problematica_otro'])) {

        $insert_problem_tramite = "INSERT INTO problema_tramite(prob_id, datt_id, prot_estado_, prot_nombreotroproblema) VALUES (41,$max_tramite, 0,'$problematica_otro');";
        $resultado_problem_tramite = pg_query($con, $insert_problem_tramite) or die("Error en la Consulta SQL");
    }

    if (isset($_POST['problematica'])) {
        $optionArray = $_POST['problematica'];
        for ($i = 0; $i < count($optionArray); $i++) {

            $insert_problem_tramite = "INSERT INTO problema_tramite(
				            prob_id, datt_id, prot_estado_, prot_nombreotroproblema)
				   			VALUES ($optionArray[$i],$max_tramite, 0,'');";


            $resultado_problem_tramite = pg_query($con, $insert_problem_tramite) or die("Error en la Consulta SQL");
        }
    }*/
}
?>
