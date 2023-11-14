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
            $lugar = isset($_POST['lugar']) ? htmlspecialchars(trim(strip_tags($_POST['lugar'])),ENT_QUOTES,"utf-8") : '';
            $fecha = isset($_POST['fecha']) ? htmlspecialchars(trim(strip_tags($_POST['fecha'])),ENT_QUOTES,"utf-8") : '';
            $direccion = isset($_POST['direccion']) ? htmlspecialchars(trim(strip_tags($_POST['direccion'])),ENT_QUOTES,"utf-8") : '';
            $telefono = isset($_POST['telefono']) ? htmlspecialchars(trim(strip_tags($_POST['telefono'])),ENT_QUOTES,"utf-8") : '';
            $puesto = isset($_POST['puesto']) ? htmlspecialchars(trim(strip_tags($_POST['puesto'])),ENT_QUOTES,"utf-8") : '';

            $consulta = 'select * from empleados where nombres = "'.$nombre.'"';
            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos (consulta)");
            $resultado = mysqli_num_rows($resultado);

            if ($resultado == 0) {
                $insertarDatos = 'INSERT INTO empleados (nombres, lugar_nacimiento, fecha_nacimiento, direccion, telefono, puesto) 
                    VALUES ("'.$nombre.'", "'.$lugar.'", "'.$fecha.'", "'.$direccion.'", '.$telefono.', "'.$puesto.'")';
                mysqli_query( $conexion, $insertarDatos ) or die ( "Algo ha ido mal en la consulta a la base de datos (insertarDatos)");
                header("Location: lista-empleados.php");
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
    <form action="agregar-datos.php" method="post">
        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre">
        </p>
        <p>
            <label for="lugar">Lugar nacimiento: </label>
            <input type="text" name="lugar" id="lugar">
        </p>
        <p>
            <label for="fecha">Fecha nacimiento: </label>
            <input type="text" name="fecha" id="fecha">
        </p>
        <p>
            <label for="direccion">Direccion: </label>
            <input type="text" name="direccion" id="direccion">
        </p>
        <p>
            <label for="telefono">Telefono: </label>
            <input type="text" name="telefono" id="telefono">
        </p>
        <p>
            <label for="puesto">Puesto: </label>
            <input type="text" name="puesto" id="puesto">
        </p>
        <p>
            <input type="submit" value="Enviar" name="enviar">
        </p>
    </form>
</body>
</html>