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
    <title>BASES DE DATOS 2-1 - MODIFICAR 1</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>BASES DE DATOS 2-1 - MODIFICAR 1</h1>
    <ul>
        <li>
            <a href="gestionCRUD.php">Volver</a>
        </li>
    </ul>
    <div class="contenido">
    <?php
    try {
        // con acceso SOLO ES ASOCIATIVO, índice con el nombre de la columnas de la tabla
        if (isset($_GET['nombreDown'])) {
            $resultado = $conexion->prepare("SELECT * FROM personas ORDER BY nombre DESC");

        } else if (isset($_GET['nombreUp'])) {
            $resultado = $conexion->prepare("SELECT * FROM personas ORDER BY nombre ASC");

        } else if (isset($_GET['apellidoDown'])) {
            $resultado = $conexion->prepare("SELECT * FROM personas ORDER BY apellidos DESC");

        } else if (isset($_GET['apellidoUp'])) {
            $resultado = $conexion->prepare("SELECT * FROM personas ORDER BY apellidos ASC");

        } else {
            $resultado = $conexion->prepare("SELECT * FROM personas ORDER BY apellidos ASC");
        }

        // Especificamos el fetch mode antes de llamar a fetch()
        $resultado->setFetchMode(PDO::FETCH_ASSOC);

        // Ejecutamos
        $resultado->execute();

        if ($resultado->rowCount() != 0) {

            echo "<p>Marque los registros que quiere modificar:</p>";
            echo '<form action="validarModificar.php" method="post">';
            echo "<table class='listados'>";
            echo '<form action="modificar.php" method="get">';
            echo "<tr><th>Modificar</th><th><button type='submit' name='nombreDown'>↓</button>Nombre<button type='submit' name='nombreUp'>↑</button></th><th><button type='submit' name='apellidoDown'>↓</button>Apellidos<button type='submit' name='apellido='up'>↑</button></th></tr>";
            echo '</form>';
            // Mostramos los resultados
            while ($row = $resultado->fetch()){
                echo "<tr>";
                echo "<td><input type='radio' name='modificar' id='{$row["id"]}' value='{$row["id"]}'></td>";
                echo "<td>{$row["nombre"]}</td>";
                echo "<td>{$row["apellidos"]}</td>";
                echo "</tr>";
            }
            echo "<table>";
            
            echo "<p>";
            echo '<input type="submit" value="Modificar registro" name="enviar1">';
            echo '<input type="reset" value="Reiniciar Formulario">';
            echo "</p>";
            echo "</form>";
        } else {
            echo "<p>No hay ningun registro.</p>";
        }
    } catch (PDOException $e) {
        die('<p>Se ha producido un Error: '. $e->getMessage().'</p>');
    }

    $conexion =null;
    ?>
    </div>
</body>
</html>