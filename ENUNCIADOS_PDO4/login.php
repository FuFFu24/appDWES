<?php
function conectarBbdd() {
    try {
        //Conectamos a la BBDD
        $conn = new PDO("mysql:host=localhost;charset=utf8", 'root', '');
        // Elección del modo de controlar los errores en la instancia de la conexión
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Retorna el manejador de la conexión
        return $conn;
    } catch (PDOException $e) {
        //En caso de error se captura el mensaje
        echo $e->getMessage();
    }
}

$conn = conectarBbdd();

try {
    // Prepare
    $stmt = $conn->prepare("
        CREATE DATABASE IF NOT EXISTS datos_empleados
    ");
    // Excecute
    $stmt->execute();

    $stmt = $conn->prepare("
        USE datos_empleados
    ");
    $stmt->execute();

    $stmt = $conn->prepare("
        CREATE TABLE IF NOT EXISTS User (
            username VARCHAR(50) PRIMARY KEY,
            passwd VARCHAR(50) NOT NULL,
            email VARCHAR(100) NOT NULL
        )
    ");
    $stmt->execute();

    $stmt = $conn->prepare("
        SELECT * FROM User
    ");
    $stmt->execute();
    if ($stmt->rowCount() == 0) {
        $stmt = $conn->prepare("
            INSERT INTO User (username, passwd, email) VALUES ('User1', 'admin1', 'user1@gmail.com')
        ");
        $stmt->execute();
        $stmt = $conn->prepare("
            INSERT INTO User (username, passwd, email) VALUES ('User2', 'admin2', 'user2@gmail.com')
        ");
        $stmt->execute();
        $stmt = $conn->prepare("
            INSERT INTO User (username, passwd, email) VALUES ('User3', 'admin3', 'user3@gmail.com')
        ");
        $stmt->execute();
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$conn = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="validarLogin.php" method="post">
        <p>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">
        </p>
        <p>
            <label for="contrasena">Contraseña:</label>
            <input type="text" name="contrasena" id="contrasena">
        </p>
        <p>
            <input type="submit" value="Enviar" name="submit">
        </p>
    </form>
</body>
</html>