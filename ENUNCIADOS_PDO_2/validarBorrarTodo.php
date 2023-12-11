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
    <title>BASES DE DATOS 2-1 - BORRAR TODO 2</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>BASES DE DATOS 2-1 - BORRAR TODO 2</h1>
    <ul>
        <li>
            <a href="gestionCRUD.php">Volver</a>
        </li>
    </ul>
    <div class="contenido">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["si"])) {
                try {
                    // Borrar la base de datos Agenda
                    $sql = "DROP DATABASE IF EXISTS Agenda";
                    
                    $conexion->exec($sql);

                    echo "<p>Base de datos borrada correctamente.";
                } catch (PDOException $e) {
                    die('<p>Se ha producido un Error: '. $e->getMessage().'</p>');
                }

                function conectarBbddNueva() {
                    try {
                        //Conectamos a la BBDD
                        $conexion = new PDO('mysql:host=localhost; charset=utf8', 'root', '');
                        // Elección del modo de controlar los errores en la instancia de la conexión
                        $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        //Retorna el manejador de la conexión
                        return $conexion;
                    } catch (PDOException $e) {
                        //En caso de error se captura el mensaje
                        print ('<p>Error no se puede conectar con la BBDD por\n'. $e->getMessage().'</p>');
                    }
                }
                
                $conexion = conectarBbddNueva();
                
                try {
                    // Crear la base de datos Agenda
                    $sql = "CREATE DATABASE IF NOT EXISTS Agenda";
                
                    $conexion->exec($sql);

                    echo "<p>Base de datos creada correctamente.";
                
                    // Usar la base de datos Agenda
                    $sql = "USE Agenda";
                
                    $conexion->exec($sql);
                
                    // Crear la tabla personas
                    $sql = "CREATE TABLE IF NOT EXISTS personas (
                        id INT AUTO_INCREMENT,
                        nombre CHAR(15) NOT NULL,
                        apellidos CHAR(25) NOT NULL,
                        direccion CHAR(25),
                        tf VARCHAR(9),
                        PRIMARY KEY (id)
                    )";
                
                    $conexion->exec($sql);

                    echo "<p>Tabla creada correctamente.";
                } catch (PDOException $e) {
                    die('<p>Se ha producido un Error: '. $e->getMessage().'</p>');
                }

                $nombre = session_name();
                setcookie($nombre,'',time()-1);
                session_unset();
                session_destroy();

                if (!isset($_SESSION['sesion'])) {
                    echo "<p>Sesion borrada correctamente.";
                }
                
                $conexion =null;
            } else if (isset($_POST["no"])) {
                header("Location: gestionCRUD.php");
            }
        }
        ?>
    </div>
</body>
</html>