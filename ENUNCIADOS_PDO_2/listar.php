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
    <title>BASES DE DATOS 2-1 - LISTAR</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>BASES DE DATOS 2-1 - LISTAR</h1>
    <ul>
        <li>
            <a href="gestionCRUD.php">Volver</a>
        </li>
    </ul>
    <div class="contenido">
    <?php
    try {
        // con acceso SOLO ES ASOCIATIVO, índice con el nombre de la columnas de la tabla
        $resultado = $conexion->prepare("SELECT * FROM personas");

        // Especificamos el fetch mode antes de llamar a fetch()
        $resultado->setFetchMode(PDO::FETCH_ASSOC);

        // Ejecutamos
        $resultado->execute();

        if ($resultado->rowCount() != 0) {

            echo "<p>Listado completo de los registros:</p>";
            echo "<table class='listados'>";
            echo "<tr><th>Nombre</th><th>Apellidos</th></tr>";
            // Mostramos los resultados
            while ($row = $resultado->fetch()){
                echo "<tr>";
                echo "<td>{$row["nombre"]}</td>";
                echo "<td>{$row["apellidos"]}</td>";
                echo "</tr>";
            }
            echo "<table>";
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