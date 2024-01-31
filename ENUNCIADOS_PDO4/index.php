<?php include("funciones.php");
    comprobarSesion();

    $conn = conectarBbdd("datos_empleados");

    try {    
        $stmt = $conn->prepare("
            CREATE TABLE IF NOT EXISTS Alumno (
                dni VARCHAR(9) PRIMARY KEY,
                nombre VARCHAR(50) NOT NULL,
                apellidos VARCHAR(50) NOT NULL,
                direccion VARCHAR(100),
                telefono VARCHAR(50) NOT NULL,
                foto VARCHAR(100)
            )
        ");
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    session_unset();
    session_destroy();
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
        <li><a href="alta_1.php">Alta</a></li>
        <li><a href="baja_1.php">Baja</a></li>
        <li><a href="modificar_1.php">Modificar</a></li>
        <li><a href="consultar_1.php">Consultar</a></li>
        <li><a href="listar_1.php">Listar</a></li>
    </ul>
</body>
</html>
