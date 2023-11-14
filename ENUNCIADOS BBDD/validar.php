<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['iniciar'])) {
            $usuario = isset($_POST['usuario']) ? htmlspecialchars(trim(strip_tags($_POST['usuario'])),ENT_QUOTES,"utf-8") : '';
            $password = isset($_POST['password']) ? htmlspecialchars(trim(strip_tags($_POST['password'])),ENT_QUOTES,"utf-8") : '';

            if ($usuario === "admin" && $password === "1234") {
                header("Location: menu.php");
            } else {
                header("Location: BBDD.php?error=errorCredenciales");
            }
        }
    }
    ?>
</body>
</html>