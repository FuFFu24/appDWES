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

    // establecer y realizar consulta. guardamos en variable.
    $consulta = "SELECT * FROM empleados";
    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos (consulta)");

    // Motrar el resultado de los registro de la base de datos
    // Encabezado de la tabla
    echo "<table borde='2'>";
    echo "<tr>";
    echo "<th>CODIGO</th>";
    echo "<th>NOMBRES</th>";
    echo "<th>LUGAR NACIMIENTO</th>";
    echo "<th>FECHA NACIMIENTO</th>";
    echo "<th>DIRECCION</th>";
    echo "<th>TELEFONO</th>";
    echo "<th>PUESTO</th>";
    echo "</tr>";
    // Bucle while que recorre cada registro y muestra cada campo en la tabla.
    while ($columna = mysqli_fetch_array( $resultado ))
    {
    echo "<tr>";
    echo "<td>" . $columna['codigo'] . "</td><td>" . $columna['nombres'] . "</td><td>" . $columna['lugar_nacimiento'] . "</td><td>" . $columna['fecha_nacimiento'] . "</td><td>" . $columna['direccion'] . "</td><td>" . $columna['telefono'] . "</td><td>" . $columna['puesto'] . "</td>";
    echo "</tr>";
    }
    echo "</table>"; // Fin de la tabla

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
    
</body>
</html>