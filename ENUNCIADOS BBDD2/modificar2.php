<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['enviar'])) {
        //Datos de la base de datos
        $usuario = "root";
        $password = "";
        $servidor = "localhost";
        $basededatos = "registros";

        // creación de la conexión a la base de datos con mysql
        $conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");

        $crearDatabase = "CREATE DATABASE IF NOT EXISTS registros";

        mysqli_query( $conexion, $crearDatabase ) or die ( "Algo ha ido mal en la consulta a la base de datos (crearDatabase)");
        
        $usarDatabase = "USE registros";

        mysqli_query( $conexion, $usarDatabase ) or die ( "Algo ha ido mal en la consulta a la base de datos (usarDatabase)");

        $modificar = isset($_POST['modificar']) ? htmlspecialchars(trim(strip_tags($_POST['modificar'])),ENT_QUOTES,"utf-8") : '';

        $consulta = 'select * from usuario where id = '.$modificar.'';
        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos (consulta)");
        $resultado = mysqli_num_rows($resultado);

        if ($resultado != 0) {
            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos (consulta)");

            echo '<form action="modificar3.php" method="post">';
            while ($columna = mysqli_fetch_array( $resultado ))
            {
            echo '<input type="hidden" name="id" id="id" value="'. $columna['id'] .'">';

            echo '<p><label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre" value="'. $columna['nombre'] .'"></p>';
            
            echo '<p><label for="apellidos">Apellidos: </label><input type="text" name="apellidos" id="apellidos" value='. $columna['apellido'] .'></p>';
            }
        
            echo '<p><input type="submit" value="Enviar" name="enviar"></p>';
            echo '</form>';
        } else {
            echo "Nombre o apellidos no encontrado.";
        }

        // cerrar conexión de base de datos
        mysqli_close( $conexion );
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Pagina principal</a>
</body>
</html>