<?php
session_start();

if (isset($_POST['enviar']) && isset($_POST['reiniciar']) == 'on') {
    $_SESSION['contador'] = 0;
} else if (!isset($_POST['enviar']) && !isset($_POST['reiniciar'])) {
    if (!isset($_SESSION['contador'])) {
        $_SESSION['contador'] = 1;
    } else {
        $_SESSION['contador']++;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Contador</title>
    <style>
        span {
            background-color: #00FFFF;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <p>Número de páginas recorridas o recargadas: <span><?php echo isset($_SESSION['contador']) ? $_SESSION['contador'] : 0; ?></span></p>
    <p>Recargar la página <a href="contador.php">aquí</a>. El contador se incrementa en 1.</p>
    <h2>Reiniciar el contador</h2>
    <form action="contador.php" method="post">
        <p>
            <input type="checkbox" name="reiniciar" id="reiniciar">
            <label for="reiniciar">Elige esta opción y pulsa en enviar.</label>
        </p>
        <p>
            <input type="submit" name="enviar" value="Enviar">
        </p>
    </form>
    <p>Otras páginas de la sesión: </p>
    <p>Página 2: <a href="guardar_datos.php">Insertar más variables.</a></p>
    <p>Página 3: <a href="mostrar_datos.php">Datos de la sesión.</a></p>
</body>
</html>
