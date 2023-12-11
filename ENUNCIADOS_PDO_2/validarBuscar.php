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
    <title>BASES DE DATOS 2-1 - BUSCAR 2</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>BASES DE DATOS 2-1 - BUSCAR 2</h1>
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

    if (empty($nombre) && empty($apellidos)) {
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

                echo "<p>Listado completo de los registros:</p>";
                echo "<table class='listados'>";
                echo '<form action="validarBuscar.php" method="get">';
                echo "<tr><th><button type='submit' name='nombreDown'>↓</button>Nombre<button type='submit' name='nombreUp'>↑</button></th><th><button type='submit' name='apellidoDown'>↓</button>Apellidos<button type='submit' name='apellido='up'>↑</button></th></tr>";
                echo '</form>';
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

    } else if (empty($nombre)) {
        // CONSULTA PREPARADA CON INTERRORGACIONES PDO PUEDE DESINFECTAR LOS DATOS
        $consulta = 'SELECT * FROM personas WHERE apellidos like :Param2';

        try {
            $resultado = $conexion->prepare($consulta);

            // Especificamos el fetch mode antes de llamar a fetch()
            $resultado->setFetchMode(PDO::FETCH_ASSOC);

            $resultado ->execute([':Param2' => "%$apellidos%"]);

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
            }
        } catch (PDOException $e) {
            die('<p>Se ha producido un Error: '. $e->getMessage().'</p>');
        }

        $conexion =null;

    }else if (empty($apellidos)) {
        // CONSULTA PREPARADA CON INTERRORGACIONES PDO PUEDE DESINFECTAR LOS DATOS
        $consulta = 'SELECT * FROM personas WHERE nombre like :Param1';

        try {
            $resultado = $conexion->prepare($consulta);

            // Especificamos el fetch mode antes de llamar a fetch()
            $resultado->setFetchMode(PDO::FETCH_ASSOC);

            $resultado ->execute([':Param1' => "%$nombre%"]);

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
            }
        } catch (PDOException $e) {
            die('<p>Se ha producido un Error: '. $e->getMessage().'</p>');
        }

        $conexion =null;

    } else {
        // CONSULTA PREPARADA CON INTERRORGACIONES PDO PUEDE DESINFECTAR LOS DATOS
        $consulta = 'SELECT * FROM personas WHERE nombre like :Param1 OR apellidos like :Param2';

        try {
            $resultado = $conexion->prepare($consulta);

            // Especificamos el fetch mode antes de llamar a fetch()
            $resultado->setFetchMode(PDO::FETCH_ASSOC);

            $resultado ->execute([':Param1' => "%$nombre%", 'Param2' => "%$apellidos%"]);

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
            } 
        } catch (PDOException $e) {
            die('<p>Se ha producido un Error: '. $e->getMessage().'</p>');
        }

        $conexion =null;
    }
    ?>
    </div>
</body>
</html>