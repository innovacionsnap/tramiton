<?php
$user = "tramites";
$password = "tramiton2015";
$dbname = "tramitonv2";
$port = "5432";
$host = "181.211.36.240";

$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());

?>