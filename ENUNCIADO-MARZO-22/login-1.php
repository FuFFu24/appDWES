<?php
    session_start();

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
            CREATE DATABASE IF NOT EXISTS marzo
        ");
        // Excecute
        $stmt->execute();
    
        $stmt = $conn->prepare("
            USE marzo
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET["error"]) && $_GET["error"] == "noSesion") {
            echo "<span style='color:red'>Tienes que logearte</span>";
        }

        if (isset($_GET["error"]) && $_GET["error"] == "errorLogin") {
            echo "<span style='color:red'>Datos incorrectos</span>";
        }
    ?>
    <form action="login-2.php" method="post">
        <p>
            <label for="">Usuario: </label>
            <input type="text" name="usuario" id="">
        </p>
        <p>
            <label for="">Clave: </label>
            <input type="text" name="clave" id="">
        </p>
        <p>
            <input type="submit" value="entrar" name="entrar">
        </p>
    </form>
</body>
</html>