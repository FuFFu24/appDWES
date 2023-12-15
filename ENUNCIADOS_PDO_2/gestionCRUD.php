<?php
session_start();

if (!isset($_SESSION['sesion'])) {
    header("Location: login.php?error=noSesion");
}

function conectarBbdd() {
    try {
        //Conectamos a la BBDD
        $conexion = new PDO('mysql:host=localhost; charset=utf8', 'root', '');
        // Elección del modo de controlar los errores en la instancia de la conexión
        $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Retorna el manejador de la conexión
        return $conexion;
    } catch (PDOException $e) {
        //En caso de error se captura el mensaje
        print ('<p>Error no se puede conectar con la BBDD por\n'. $e->getMessage().'</p>');
    }
}

$conexion = conectarBbdd();

try {
    // Crear la base de datos Agenda
    $sql = "CREATE DATABASE IF NOT EXISTS Agenda";

    $conexion->exec($sql);

    // Usar la base de datos Agenda
    $sql = "USE Agenda";

    $conexion->exec($sql);

    // Crear la tabla personas
    $sql = "CREATE TABLE IF NOT EXISTS personas (
        id INT AUTO_INCREMENT,
        nombre CHAR(15) NOT NULL,
        apellidos CHAR(25) NOT NULL,
        direccion CHAR(25),
        tf VARCHAR(9),
        PRIMARY KEY (id)
    )";

    $conexion->exec($sql);
} catch (PDOException $e) {
    die('<p>Se ha producido un Error: '. $e->getMessage().'</p>');
}

$conexion =null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASES DE DATOS 2-1 - LOGIN</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>BASES DE DATOS 2-1 - INICIO</h1>
    <ul>
        <li><a href="anadir.php">Añadir registro</a></li>
        <li><a href="listar.php">Listar</a></li>
        <li><a href="borrar.php">Borrar</a></li>
        <li><a href="buscar.php">Buscar</a></li>
        <li><a href="modificar.php">Modificar</a></li>
        <li><a href="borrarTodo.php">Borrar todo</a></li>
    </ul>
</body>
</html>