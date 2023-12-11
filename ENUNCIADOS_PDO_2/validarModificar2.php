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
    <title>BASES DE DATOS 2-1 - MODIFICAR 3</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>BASES DE DATOS 2-1 - MODIFICAR 3</h1>
    <ul>
        <li>
            <a href="gestionCRUD.php">Volver</a>
        </li>
    </ul>
    <div class="contenido">
    <?php include "funciones.php";
    $conexion = conectarBbdd();

    $id = $_REQUEST["id"];
    $nombre = $_REQUEST["nombre"];
    $apellidos = $_REQUEST["apellidos"];

    // CONSULTA PREPARADA CON INTERRORGACIONES PDO PUEDE DESINFECTAR LOS DATOS
    $consulta = "SELECT * FROM personas WHERE id = ?";

    try {
        $resultado = $conexion->prepare($consulta);
        $resultado ->execute([$id]);

        if ($resultado->rowCount() != 0) {
            if (empty($nombre) || empty($apellidos)) {
                header("Location: validarModificar.php?error=camposVacios");
            } else {
                try {
                    $conexion->beginTransaction();
                    $conexion->query('UPDATE personas SET nombre = "'.$nombre.'", apellidos = "'.$apellidos.'" WHERE id = '.$id.'');
                    echo "<p>Registro modificado correctamente.</p>";
                } catch (Exception $e){
                    echo "<p>Ha habido algún error, voy a deshacer los cambios.</p>";
                    $conexion->rollback();
                }
            }
        } else {
            echo "<p style='color : red'>El registro no existe.</p>";
        }
    } catch (PDOException $e) {
        die('<p>Se ha producido un Error: '. $e->getMessage().'</p>');
    }

    $conexion =null;
    ?>
    </div>
</body>
</html>