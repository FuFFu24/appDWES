<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['enviar'])) {
        //Datos de la base de datos
        $usuario = "root";
        $password = "";
        $servidor = "localhost";
        $basededatos = "registros";

        // creación de la conexión a la base de datos con mysql
        $conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");

        $crearDatabase = "CREATE DATABASE IF NOT EXISTS registros";

        mysqli_query( $conexion, $crearDatabase ) or die ( "Algo ha ido mal en la consulta a la base de datos (crearDatabase)");
        
        $usarDatabase = "USE registros";

        mysqli_query( $conexion, $usarDatabase ) or die ( "Algo ha ido mal en la consulta a la base de datos (usarDatabase)");

        $id = isset($_POST['id']) ? htmlspecialchars(trim(strip_tags($_POST['id'])),ENT_QUOTES,"utf-8") : '';
        $nombre = isset($_POST['nombre']) ? htmlspecialchars(trim(strip_tags($_POST['nombre'])),ENT_QUOTES,"utf-8") : '';
        $apellidos = isset($_POST['apellidos']) ? htmlspecialchars(trim(strip_tags($_POST['apellidos'])),ENT_QUOTES,"utf-8") : '';

        $insertarDatos1 = 'UPDATE usuario SET nombre = "'.$nombre.'" WHERE id = '.$id.'';
        $insertarDatos2 = 'UPDATE usuario SET apellido = "'.$apellidos.'" WHERE id = '.$id.'';

        $consulta = 'select * from usuario where id = '.$id.'';
        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos (consulta)");
        $resultado = mysqli_num_rows($resultado);

        if ($resultado != 0) {
            mysqli_query( $conexion, $insertarDatos1 ) or die ( "Algo ha ido mal en la consulta a la base de datos (insertarDatos1)");
            mysqli_query( $conexion, $insertarDatos2 ) or die ( "Algo ha ido mal en la consulta a la base de datos (insertarDatos2)");
            echo "Nombre y apellidos modificado.";
        } else {
            echo "Nombre y apellidos error.";
        }

        // cerrar conexión de base de datos
        mysqli_close( $conexion );
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Pagina principal</a>
</body>
</html>