<?php
// Datos de la base de datos
$usuario = "root";
$password = "root";
$servidor = "localhost";
$basededatos = "test_konecta";

//creación de la conexión a la base de datos con mysql_connect()
$conexion = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al servidor de Base de datos");

// Selección de la BD
mysqli_select_db($conexion, $basededatos) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");

$query = "SELECT * FROM aspirante";

//var_export($query);

$result = $conexion->query($query);
//$row = $result->fetch_array(MYSQLI_ASSOC);


$json = array();

while ($row=mysqli_fetch_assoc($result)) {
    array_push($json, $row);
}
die (json_encode(array("status"=>"1", "data" => $json)));     
