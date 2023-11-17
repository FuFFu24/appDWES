<?php
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

// Selección del a base de datos a utilizar
mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

$crearTablaUsuario = "CREATE TABLE IF NOT EXISTS usuario (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(30),
    apellido VARCHAR(30) NOT NULL,
    PRIMARY KEY (id)
)";

mysqli_query($conexion, $crearTablaUsuario) or die ( "Algo ha ido mal en la consulta a la base de datos (crearTablaUsuario)");

echo "Conectado a la base de datos correctamente.";

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
    <a href="index.php">Pagina principal</a>
</body>
</html>