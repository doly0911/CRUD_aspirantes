<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="funciones.js"></script>
    <script src="jquery-3.6.1.min.js"></script>
    
    <title>CRUD_aspirantes</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h1>Datos aspirante</h1>
                <!-- <form> -->
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input type="text" class="form-control" id="nombre">
                    </div>
                    <div class="form-group">
                        <label>Apellidos:</label>
                        <input type="text" class="form-control" id="apellido">
                    </div>
                    <div class="form-group">
                        <label>Estado:</label>
                        <input type="text" class="form-control" id="estado">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="crearUsuario()">Crear</button>
                <!-- </form> -->
            </div>

            <div class="col-md-9">
                <h1>Resultados</h1>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Estado</th>
                            <th>Detalles</th>
                        </tr>
                    </thead>
                    <tbody  id="tableBody">

                    
                        <?php
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

                while ($row=mysqli_fetch_assoc($result)) {
                    ?>  
                        <tr>
                        <td><?php echo $row['id_aspirante']?></td>      
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['apellido'] ?></td>
                        <td><?php echo $row['id_estado'] ?></td>
                        <td><a href="edit_candidate.php?id=<?php echo $row['id_aspirante'] ?>" class="btn btn-info">Editar</a> 
                        <a href="delete_candidate.php?id=<?php echo $row['id_aspirante'] ?>"  class="btn btn-danger">Eliminar</a>                         
                        </td>
                        </tr>
                    <?php 
                    }
                    ?>

            </tbody>

            </div>
        </div>

    </div>
</body>

</html>