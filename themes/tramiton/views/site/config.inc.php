<?php
/*
$dbhost="localhost";
$dbname="tubasededatos";
$dbuser="tuusuario";
$dbpass="tuclave";
$db = mysql_connect($dbhost,$dbuser,$dbpass);
 */

$user = "postgres";
$password = "12345";
$dbname = "tramiton";
$port = "5432";
$host = "localhost";
$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";
$con = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
*/

$user = "postgres";
$password = "postgres";
$dbname = "tramitonV2";
$port = "5432";
$host = "localhost";
$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";
$con = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());

?>
