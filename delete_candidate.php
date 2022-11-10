<?php
include("connection_db.php");
$connection_db = conectar();

$id_user = $_GET['id'];

$sql = "DELETE FROM aspirante WHERE id_aspirante = '$id_user' ";
$query = mysqli_query($connection_db, $sql);

if($query){
    Header("Location: index.php");
}

?>