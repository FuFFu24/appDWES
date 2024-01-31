<?php include("funciones.php");

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            $nombre = isset($_POST["nombre"]) ? sanearDatos($_POST["nombre"]) : '';
            $contrasena = isset($_POST["contrasena"]) ? sanearDatos($_POST["contrasena"]) : '';

            if (!empty($nombre) && !empty($contrasena)) {
                try {
                    $conn = conectarBbdd("datos_empleados");

                    $stmt = $conn->prepare("
                        SELECT * FROM User WHERE username = ? AND passwd = ?
                    ");
                    // Bind
                    $stmt->bindParam(1, $nombre);
                    $stmt->bindParam(2, $contrasena);
                    // Excecute
                    $stmt->execute();

                    if ($stmt->rowCount() != 0) {
                        $_SESSION["sesion"] = true;
                        header("Location: index.php");
                    } else {
                        header("Location: login.php");
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                header("Location: login.php");
            }
        } else {
            echo "<p>ERROR</p>";
        }
    } else {
        echo "<p>ERROR</p>";
    }
?>