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
    <title>BASES DE DATOS 2-1 - AÑADIR 2</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>BASES DE DATOS 2-1 - AÑADIR 2</h1>
    <ul>
        <li>
            <a href="gestionCRUD.php">Volver</a>
        </li>
    </ul>
    <div class="contenido">
    <?php include "funciones.php";
    $conexion = conectarBbdd();

    $nombre = $_REQUEST["nombre"];
    $apellidos = $_REQUEST["apellidos"];

    // CONSULTA PREPARADA CON INTERRORGACIONES PDO PUEDE DESINFECTAR LOS DATOS
    $consulta = "SELECT * FROM personas WHERE nombre=? AND apellidos=?";

    try {
        $resultado = $conexion->prepare($consulta);
        $resultado ->execute([$nombre, $apellidos]);

        if ($resultado->rowCount() == 0) {
            if (empty($nombre) || empty($apellidos)) {
                echo "<p style='color : red'>Hay rellenar todos los campos. No se ha guardado el registro.</p>";
            } else {
                try {
                    $conexion->beginTransaction();
                    $conexion->query('INSERT INTO personas (nombre, apellidos) VALUES ("'.$nombre.'","'.$apellidos.'")');
                    echo "<p>Registro <strong>$nombre $apellidos</strong> creado correctamente.</p>";
                } catch (Exception $e){
                    echo "<p>Ha habido algún error, voy a deshacer los cambios.</p>";
                    $conexion->rollback();
                }
            }
        } else {
            echo "<p style='color : red'>El registro ya existe.</p>";
        }
    } catch (PDOException $e) {
        die('<p>Se ha producido un Error: '. $e->getMessage().'</p>');
    }

    $conexion =null;
    ?>
    </div>
</body>
</html>