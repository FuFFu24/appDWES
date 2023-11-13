<?php
session_start();

if (isset($_POST['inicio'])) {
    $nombre = isset($_POST['nombre']) ? htmlspecialchars(trim(strip_tags($_POST['nombre'])),ENT_QUOTES,"utf-8") : '';
    $contrasena = isset($_POST['contrasena']) ? htmlspecialchars(trim(strip_tags($_POST['contrasena'])),ENT_QUOTES,"utf-8") : '';

    if ($nombre == "usuario" && $contrasena == 123) {
        header("Location: aplicacion.php");
    } else {
        header("Location: login.php");
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
    <h2>Formulario de autenticacion</h2>
    <p>Aun no se ha autenticado rellene el formulario.</p>
    <p>Introduce tu nombre y contaseña.</p>
    <form action="acreditacion.php" method="post">
        <p>
            <label for="nombre">Nombre de usuario: </label>
            <input type="text" name="nombre" id="nombre">
        </p>
        <p>
            <label for="contrasena">Contraseña: </label>
            <input type="password" name="contrasena" id="contrasena">
        </p>
        <p>
            <input type="submit" value="Inicio de sesion" name="inicio">
        </p>
    </form>
    <p>Para ENTRAR, debes INTRODUCIR <strong>usuario</strong> en el 1er campo y <strong>123</strong> en el 2do.</p>
</body>
</html>