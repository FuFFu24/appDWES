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

    $id = $_REQUEST["personas"];
    // CONSULTA PREPARADA CON INTERRORGACIONES PDO PUEDE DESINFECTAR LOS DATOS
    foreach ($id as $key) {
        $consulta = "SELECT * FROM personas WHERE id=?";

        try {
            $resultado = $conexion->prepare($consulta);
            $resultado ->execute([$key]);

            if ($resultado->rowCount() != 0) {
                try {
                    $conexion->query('DELETE FROM personas WHERE id = '.$key.'');
                } catch (Exception $e){
                    echo "Ha habido algún error, voy a deshacer los cambios ";
                }
            } else {
                echo "<p>El registro ya existe</p>";
            }
        } catch (PDOException $e) {
            die('<p>Se ha producido un Error: '. $e->getMessage().'</p>');
        }
    }
    
    header("Location: borrar_1.php");

    $conexion =null;
    ?>
</body>
</html>