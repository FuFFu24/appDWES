<?php include "funciones.php";
session_start();

if (!isset($_SESSION['sesion'])) {
    header("Location: login.php?error=noSesion");
}

$conexion = conectarBbdd();

if (isset($_POST['enviar1'])) {
    $modificar = isset($_POST['modificar']) ? htmlspecialchars(trim(strip_tags($_POST['modificar'])),ENT_QUOTES,"utf-8") : '';

    if (empty($modificar)) {
        header("Location: modificar.php?error=noSelect");
    }

    $_SESSION['id'] = $modificar;
}

// CONSULTA PREPARADA CON INTERRORGACIONES PDO PUEDE DESINFECTAR LOS DATOS
$consulta = 'SELECT * FROM personas WHERE id = ?';

try {
    $resultado = $conexion->prepare($consulta);

    // Especificamos el fetch mode antes de llamar a fetch()
    $resultado->setFetchMode(PDO::FETCH_ASSOC);

    $resultado ->execute([$_SESSION['id']]);

    if ($resultado->rowCount() != 0) {

        // Mostramos los resultados
        while ($row = $resultado->fetch()){
            $id = $row["id"];
            $nombre = $row["nombre"];
            $apellidos = $row["apellidos"];
        }
    } 
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
    <title>BASES DE DATOS 2-1 - MODIFICAR 2</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>BASES DE DATOS 2-1 - MODIFICAR 2</h1>
    <ul>
        <li>
            <a href="gestionCRUD.php">Volver</a>
        </li>
    </ul>
    <div class="contenido">
    <p>Modifique los campos que desee: </p>
    <form action="validarModificar2.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table>
        <tr>
            <td><label for="nombre">Nombre: </label></td>
            <td><input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>"></td>
        </tr>
        <tr>
            <td><label for="apellidos">Apellidos: </label></td>
            <td><input type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos; ?>"></td>
        </tr>
        </table>
        <?php
        if (isset($_GET['error']) && $_GET['error'] == "camposVacios") {
            echo "<p style='color : red'>Rellene todos los campos.</p>";
        }
        ?>
        <p>
            <input type="submit" value="Actualizar" name="enviar2">
            <input type="reset" value="Reiniciar Formulario">
        </p>
    </form>
    </div>
</body>
</html>