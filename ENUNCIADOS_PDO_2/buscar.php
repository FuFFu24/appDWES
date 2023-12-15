<?php
session_start();

if (!isset($_SESSION['sesion'])) {
    header("Location: login.php?error=noSesion");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASES DE DATOS 2-1 - BUSCAR 1</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>BASES DE DATOS 2-1 - BUSCAR 1</h1>
    <ul>
        <li>
            <a href="gestionCRUD.php">Volver</a>
        </li>
    </ul>
    
    <div class="contenido">
    <p>Escriba el criterio de busqueda (caracteres o numeros): </p>
    <form action="validarBuscar.php" method="post">
        <table>
        <tr>
            <td><label for="nombre">Nombre: </label></td>
            <td><input type="text" name="nombre" id="nombre"></td>
        </tr>
        <tr>
            <td><label for="apellidos">Apellidos: </label></td>
            <td><input type="text" name="apellidos" id="apellidos"></td>
        </tr>
        </table>
        <p>
            <input type="submit" value="Buscar" name="enviar">
            <input type="reset" value="Reiniciar Formulario">
        </p>
    </form>
    </div>
</body>
</html>