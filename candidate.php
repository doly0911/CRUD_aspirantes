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
$result = $conexion->query($query);
?>

<tbody id="tableBody">
<?php
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr id=<?php echo $row['id_aspirante'] ?>>
    <td>
        <?php echo $row['id_aspirante'] ?>
    </td>
    <td>
        <?php echo $row['nombre'] ?>
    </td>
    <td>
        <?php echo $row['apellido'] ?>
    </td>
    <td>
        <?php echo $row['id_estado'] ?>
    </td>
    <td><button
            onclick="edit_candidate(<?php echo $row['id_aspirante'] ?>)"
            class="btn btn-info">Editar</button>
        <button
            onclick="delete_candidate(<?php echo $row['id_aspirante'] ?>)"
            class="btn btn-danger">Eliminar</button>
    </td>
</tr>
<?php
}
?>
</tbody>