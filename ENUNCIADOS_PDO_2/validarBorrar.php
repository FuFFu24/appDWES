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
    <title>BASES DE DATOS 2-1 - BORRAR 2</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>BASES DE DATOS 2-1 - BORRAR 2</h1>
    <ul>
        <li>
            <a href="gestionCRUD.php">Volver</a>
        </li>
    </ul>
    <div class="contenido">
    <?php include "funciones.php";
    $conexion = conectarBbdd();

    $id = [];
    if (isset($_POST['borrar']) && is_array($_POST['borrar'])) {
        foreach ($_POST['borrar'] as $value) {
            // Realizar validación si es necesario
            // Por ejemplo, verificar si $value cumple con ciertos criterios antes de aplicar htmlspecialchars()
            
            // Aplicar htmlspecialchars() a cada elemento del array
            $id[] = htmlspecialchars($value, ENT_QUOTES, 'utf-8');
        }
    }

    // CONSULT5A PREPARADA CON INTERRORGACIONES PDO PUEDE DESINFECTAR LOS DATOS
    if (empty($id)) {
        echo "<p style='color : red'>No se ha seleccionado ningun registro.</p>";
    } else {
        foreach ($id as $key) {
            $consulta = "SELECT * FROM personas WHERE id=?";

            try {
                $resultado = $conexion->prepare($consulta);
                $resultado ->execute([$key]);

                if ($resultado->rowCount() != 0) {
                    try {
                        $conexion->query('DELETE FROM personas WHERE id = '.$key.'');
                    } catch (Exception $e){
                        echo "<p>Ha habido algún error, voy a deshacer los cambios.</p>";
                    }
                } else {
                    echo "<p>El registro ya existe</p>";
                }
            } catch (PDOException $e) {
                die('<p>Se ha producido un Error: '. $e->getMessage().'</p>');
            }
        }
        echo "<p>Registro borrado correctamente.</p>";
    }

    $conexion =null;
    ?>
    </div>
</body>
</html>