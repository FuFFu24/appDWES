<?php include "funciones.php";
$conexion = conectarBbdd();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li>
            <a href="gestionAT.php">Pagina Principal</a>
        </li>
    </ul>
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
            echo '<form action="borrar_2.php" method="post"><table>';
            echo "<tr><th>Borrar</th><th>Nombre</th><th>Apellidos</th></tr>";
            // Mostramos los resultados
            while ($row = $resultado->fetch()){
                echo "<tr>";
                echo '<td><input type="checkbox" name="personas[]" value="'.$row["id"].'"></td>';
                echo "<td>{$row["nombre"]}</td>";
                echo "<td>{$row["apellidos"]}</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo '<p><input type="submit" value="Borrar registro" name="enviar"><input type="reset" value="Reiniciar Formulario"></p>';
            echo "</form>";
        } else {
            echo "<p>No hay ningun registro.</p>";
        }
    } catch (PDOException $e) {
        die('<p>Se ha producido un Error: '. $e->getMessage().'</p>');
    }

    $conexion =null;
    ?>
</body>
</html>