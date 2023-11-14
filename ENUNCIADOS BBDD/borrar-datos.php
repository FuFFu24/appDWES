<?php
    //Datos de la base de datos
    $usuario = "root";
    $password = "";
    $servidor = "localhost";
    $basededatos = "datos_empleados";

    // creación de la conexión a la base de datos con mysql
    $conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");

    $crearDatabase = "CREATE DATABASE IF NOT EXISTS datos_empleados";

    mysqli_query( $conexion, $crearDatabase ) or die ( "Algo ha ido mal en la consulta a la base de datos (crearDatabase)");

    // Selección del a base de datos a utilizar
    mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['enviar'])) {
            $nombre = isset($_POST['nombre']) ? htmlspecialchars(trim(strip_tags($_POST['nombre'])),ENT_QUOTES,"utf-8") : '';

            $consulta = 'select * from empleados where nombres = "'.$nombre.'"';
            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos (consulta)");
            $resultado = mysqli_num_rows($resultado);

            if ($resultado == 1) {
                $insertarDatos = 'DELETE FROM empleados WHERE nombres = "'.$nombre.'"';
                mysqli_query( $conexion, $insertarDatos ) or die ( "Algo ha ido mal en la consulta a la base de datos (insertarDatos)");
            }
        }
    }

    // cerrar conexión de base de datos
    mysqli_close( $conexion );

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="borrar-datos.php" method="post">
        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre">
        </p>
        <p>
            <input type="submit" value="Enviar" name="enviar">
        </p>
    </form>
</body>
</html>