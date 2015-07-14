<?php

$id_institucion = $_POST['id_institucion'];
$id_provincia = $_POST['id_provincia'];
$unidad_prestadora = $_POST['unidad_prestadora'];
$idhijo = $_POST['idhijo'];
$id_tramite = $_POST['id_tramite'];
$experiencia = $_POST['experiencia'];
$titulo_solucion = $_POST['titulo_solucion'];
$propuesta_solucion = $_POST['propuesta_solucion'];
//$problematica = $_POST['problematica'];


if (isset($_POST['problematica'])) {
    $optionArray = $_POST['problematica'];
    for ($i=0; $i<count($optionArray); $i++) {
        echo "Problematica: ".$optionArray[$i]."<br />";
    }
}


echo $id_institucion."<br>";
echo $id_provincia."<br>";
echo $unidad_prestadora."<br>";
echo $idhijo."<br>";
echo $id_tramite."<br>";
echo $titulo_solucion."<br>";
echo $experiencia."<br>";
echo $propuesta_solucion."<br>";
//echo "problematica: ".$problematica."<br>";

include 'config.inc.php';

INSERT INTO datos_tramite(
            datt_id, par_id, usu_id, trai_id, datt_unidadprestadora, datt_experiencia, 
            datt_fechainicio, datt_fechafin, datt_titulosolucion, datt_propuestasolucion, 
            datt_fecharegistro, datt_ipingreso, datt_edicion, datt_codigoconfirmacion, 
            datt_otronombretramite, datt_calificado, datt_descripcionbreve, 
            datt_estado, datt_contadorlike, can_id, datt_otronombreinstitucion, 
            datt_fecha_actualizacion)
    VALUES (default,1500, 6518, 4173, 'tumbaco', 'prueba expe', 
            '2015-07-14', '2015-07-14', 'prueba titulo', 'prueba propuesta', 
            '2015-07-14', '192.0.0.99', 2015, 'codigo prueba', 
            'n/a', 0, 'prueba descripcion', 
            1, 0, 185, 'n/a',
            '2015-07-14');



?>