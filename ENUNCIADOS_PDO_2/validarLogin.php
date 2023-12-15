<?php
session_start();

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
$contasena = $_REQUEST["contasena"];

// CONSULTA PREPARADA CON INTERRORGACIONES PDO PUEDE DESINFECTAR LOS DATOS
$consulta = "SELECT * FROM usuario WHERE user=? AND pass=?";

try {
    $resultado = $conexion->prepare($consulta);
    $resultado ->execute([$usuario, $contasena]);

    if ($resultado->rowCount() != 0) {
        $_SESSION['sesion'] = true;
        header("Location: gestionCRUD.php");
    } else {
        header("Location: login.php?error=datosIncorrectos");
    }
} catch (PDOException $e) {
    die('<p>Se ha producido un Error: '. $e->getMessage().'</p>');
}

$conexion =null;
?>