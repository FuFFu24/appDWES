<?php include "funciones.php";
session_start();

if (!isset($_SESSION['sesion'])) {
    header("Location: login.php?error=noSesion");
}

$conexion = conectarBbdd();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASES DE DATOS 2-1 - BORRAR TODO 1</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>BASES DE DATOS 2-1 - BORRAR TODO 1</h1>
    <ul>
        <li>
            <a href="gestionCRUD.php">Volver</a>
        </li>
    </ul>
    <div class="contenido">
        <p>¿Estas seguro?</p>
        <form action="validarBorrarTodo.php" method="post">
            <p>
                <input type="submit" value="Si" name="si">
                <input type="submit" value="No" name="no">
            </p>
        </form>
    </div>
</body>
</html>