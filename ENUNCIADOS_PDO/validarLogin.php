<?php
function conectarBbdd() {
    try {
        //Conectamos a la BBDD
        $conexion = new PDO('mysql:host=localhost; dbname=datos_empleados; charset=utf8', 'root', '');
        // Elección del modo de controlar los errores en la instancia de la conexión
        $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Retorna el manejador de la conexión
        return $conexion;
    } catch (PDOException $e) {
        //En caso de error se captura el mensaje
        print ('<p>Error no se puede conectar con la BBDD por\n'. $e->getMessage().'</p>');
    }
}

$conexion = conectarBbdd();

$usuario = $_REQUEST["usuario"];
$password = $_REQUEST["password"];

// CONSULTA PREPARADA CON INTERRORGACIONES PDO PUEDE DESINFECTAR LOS DATOS
$consulta = "SELECT * FROM usuario WHERE user=? AND pass=?";

try {
    $resultado = $conexion->prepare($consulta);
    $resultado ->execute([$usuario, $password]);

    if ($resultado->rowCount() != 0) {
        header("Location: gestionAT.php");
    } else {
        header("Location: login.php?error=datosIncorrectos");
    }
} catch (PDOException $e) {
    die('<p>Se ha producido un Error: '. $e->getMessage().'</p>');
}

$conexion =null;
?>