<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Autenticacion</h1>
    <form action="validarLogin.php" method="post">
        <p>
            <label for="usuario">Usuario: </label>
            <input type="text" name="usuario" id="usuario">
        </p>
        <p>
            <label for="password">Password: </label>
            <input type="text" name="password" id="password">
        </p>
        <?php
        if (isset($_GET['error']) && $_GET['error'] == "datosIncorrectos") {
            echo "<span style='color:red'>Datos incorrectos</span>";
        }
        ?>
        <p>
            <input type="submit" value="Iniciar Sesion" name="enviar">
        </p>
    </form>
</body>
</html>