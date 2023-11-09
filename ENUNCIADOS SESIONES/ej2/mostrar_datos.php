<?php
session_start();

if (isset($_POST['reiniciar']) && $_POST['eliminar'] == 'on') {
    // Eliminar todas las variables de sesión
    session_unset();
    // Destruir la sesión
    session_destroy();
}

if (isset($_POST['reiniciar']) && $_POST['acabar'] == 'on') {
    // Eliminar todas las variables de sesión
    session_unset();
    // Destruir la sesión
    session_destroy();
    // Iniciar una nueva sesión
    session_start();
}

// Incrementar el contador de páginas recorridas
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 1;
} else {
    $_SESSION['contador']++;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador y Sesión</title>
</head>
<body>
    <h2>Información y cerrar sesión.</h2>
    <p>Has recorrido o recargado <?php echo isset($_SESSION['contador']) ? $_SESSION['contador'] : 0; ?> páginas hasta ahora.</p>
    <table>
        <tr>
            <td>
                <h2>Informacion de la sesion.</h2>
                <p>id de sesion = <?php echo session_id(); ?></p>
                <p>nombre de sesion = <?php echo session_name(); ?></p>
                <p>Ruta de guardar variables = <?php echo session_save_path(); ?></p>
                <p>Variables guardadas hasta ahora: </p>
                <ul>
                    <li>contar = <?php echo $_SESSION['lista']; ?>.</li>
                </ul>
            </td>
            <td>
                <h2>Eliminar variables y reiniciar/terminar sesión:</h2>
                <form action="contador.php" method="post">
                    <p>
                        <input type="checkbox" name="eliminar" id="eliminar">
                        <label for="eliminar">Eliminar todos los datos.</label>
                    </p>
                    <p>
                        <input type="checkbox" name="acabar" id="acabar">
                        <label for="acabar">Terminar la sesión (inicia otra nueva, todos los datos se eliminan).</label>
                    </p>
                    <p>
                        <input type="submit" name="reiniciar" value="Reiniciar">
                    </p>
                </form>
                <p>Para comprobarlo, debes abrir otra página o recargar esta.</p>
                <h3>Cambiar de página: </h3>
                <p>Página 1: <a href="contador.php">Recargar y contar.</a></p>
                <p>Página 2: <a href="guardar_datos.php">Recoger datos.</a></p>
                <p>Recargar esta página: <a href="mostrar_datos.php">Información y cierre.</a></p>
            </td>
        </tr>
    </table>
</body>
</html>