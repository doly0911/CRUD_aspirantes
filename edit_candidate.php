<?php
include("connection_db.php");
$connection_db = conectar();

$id= $_POST['id_aspirante'];
$nombres= $_POST['nombre'];
$apellidos= $_POST['apellido'];
$estado= $_POST['estado'];

$sql = "UPDATE aspirante SET nombre = '$nombres', apellido= '$apellidos', estado = '$estado' WHERE id_aspirante = '$id' ";
$query = mysqli_query($connection_db, $query);


