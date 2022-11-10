<?php


$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$estado = $_POST["estado"];

//Validaciones
if($nombre == ""){
    
}


// Datos de la base de datos
$usuario = "root";
$password = "root";
$servidor = "localhost";
$basededatos = "test_konecta";

// creación de la conexión a la base de datos con mysql_connect()
$conexion = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al servidor de Base de datos");

// Selección de la BD
mysqli_select_db($conexion, $basededatos) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");

$query = "INSERT INTO aspirante(nombre, apellido, id_estado) VALUES ('$nombre', '$apellido' , '$estado') ";

//var_export($query);
if($conexion->query($query) === true ){
    die (json_encode(array("status"=>"1", "data" => "Se guardo con exito el aspirante")));     
}



