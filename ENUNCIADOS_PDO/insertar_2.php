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
            try {
                $conexion->beginTransaction();
                $conexion->query('INSERT INTO personas (nombre, apellidos) VALUES ("'.$nombre.'","'.$apellidos.'")');
                echo "Registro $nombre $apellidos creado correctamente";
            } catch (Exception $e){
                echo "Ha habido algún error, voy a deshacer los cambios ";
                $conexion->rollback();
            }
        } else {
            echo "<p>El registro ya existe</p>";
        }
    } catch (PDOException $e) {
        die('<p>Se ha producido un Error: '. $e->getMessage().'</p>');
    }

    $conexion =null;
    ?>
</body>
</html>