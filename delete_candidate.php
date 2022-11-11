<?php

include("connection_db.php");
$connection_db = conectar();
  
$id_user = $_POST['id'];

if($id_user){

}

$sql = "DELETE FROM aspirante WHERE id_aspirante = $id_user";
$query = mysqli_query($connection_db, $sql);


if($query){
    die (json_encode(array("status"=>"1", "data" => "Eliminacion exitosa!")));  
   // Header("Location: index.php");
} else {
    die (json_encode(array("status"=>"0", "data" => "Error al eliminar el aspirante"))); 
}

?>