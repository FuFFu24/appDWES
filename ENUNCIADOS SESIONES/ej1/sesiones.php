<?php
session_start();

if (isset($_POST['confirmar'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['clave'] = $_POST['clave'];
        header("Location: sesionesb.php");
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
    <form action="sesiones.php" method="post">
        <p>
            <label for="nombre">Introduzca nombre de usuario: </label>
            <input type="text" name="nombre" id="nombre">
        </p>
        <p>
            <label for="clave">Introduzca clave: </label>
            <input type="password" name="clave" id="clave">
        </p>
        <p>
            <input type="submit" value="confirmar" name="confirmar">
        </p>
    </form>
</body>
</html>