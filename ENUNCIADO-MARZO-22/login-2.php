<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["entrar"])) {
        $usuario = isset($_POST["usuario"]) ? htmlspecialchars(trim(strip_tags($_POST['usuario'])),ENT_QUOTES,"utf-8") : '';
        $clave = isset($_POST["clave"]) ? htmlspecialchars(trim(strip_tags($_POST['clave'])),ENT_QUOTES,"utf-8") : '';

        if (!empty($usuario) && !empty($clave)) {

            function conectarBbdd() {
                try {
                    //Conectamos a la BBDD
                    $conn = new PDO("mysql:host=localhost;dbname=marzo;charset=utf8", 'root', '');
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
                $stmt = $conn->prepare("
                    SELECT * FROM User WHERE username = ? AND passwd = ?
                ");
                // Bind
                $stmt->bindParam(1, $usuario);
                $stmt->bindParam(2, $clave);
                // Excecute
                $stmt->execute();

                if ($stmt->rowCount() != 0) {
                    $_SESSION["examenOrdMarzo"] = true;
                    header("Location: index.php");
                } else {
                    header("Location: login-1.php?error=errorLogin");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            header("Location: login-1.php?error=camposVacios");
        }
    } else {
        header("Location: login-1.php?error=errorGeneral");
    }
} else {
    header("Location: login-1.php?error=errorGeneral");
}
?>