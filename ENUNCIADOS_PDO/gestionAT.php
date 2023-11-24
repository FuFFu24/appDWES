<?php include "funciones.php";
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
    <title>Document</title>
</head>
<body>
    <h1>Base de datos PDO Bloque 2: aplicacion de gestion de una bbdd</h1>
    <ul>
        <li>
            <a href="insertar_1.php">Insertar registros</a>
        </li>
        <li>
            <a href="Listar.php">Listado</a>
        </li>
        <li>
            <a href="borrar_1.php">Borrar un Registro</a>
        </li>
    </ul>
</body>
</html>