<?php
session_start();

if (isset($_SESSION['nombre']) && isset($_SESSION['clave'])) {
    $nombre = $_SESSION['nombre'];
    $clave = $_SESSION['clave'];
    echo "Nombre: $nombre<br>";
    echo "Clave: $clave<br>";

    session_destroy();
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
    <a href="sesionesc.php">Ir a la pagina sesionesc</a>
</body>
</html>
