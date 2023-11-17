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

        $nombre = isset($_POST['nombre']) ? htmlspecialchars(trim(strip_tags($_POST['nombre'])),ENT_QUOTES,"utf-8") : '';
        $apellidos = isset($_POST['apellidos']) ? htmlspecialchars(trim(strip_tags($_POST['apellidos'])),ENT_QUOTES,"utf-8") : '';

        $consulta = 'select * from usuario where nombre = "'.$nombre.'" or apellido = "'.$apellidos.'"';
        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos (consulta)");
        $resultado = mysqli_num_rows($resultado);

        if ($resultado != 0) {
            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos (consulta)");

            // Motrar el resultado de los registro de la base de datos
            // Encabezado de la tabla
            echo "<table>";
            echo "<tr>";
            echo "<th>USUARIO</th>";
            echo "<th>APELLIDOS</th>";
            echo "</tr>";
            // Bucle while que recorre cada registro y muestra cada campo en la tabla.
            while ($columna = mysqli_fetch_array( $resultado ))
            {
            echo "<tr>";
            echo "<td>" . $columna['nombre'] . "</td><td>" . $columna['apellido'] . "</td>";
            echo "</tr>";
            }
            echo "</table>";
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