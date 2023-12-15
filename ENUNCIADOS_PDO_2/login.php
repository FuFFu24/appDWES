<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASES DE DATOS 2-1 - LOGIN</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>BASES DE DATOS 2-1 - LOGIN</h1>
    <div class="contenido">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == "noSesion") {
            echo "<p style='color : red'>Inicia sesion para acceder a la aplicacion.</p>";
        }
        ?>
        <form action="validarLogin.php" method="post">
            <table>
            <tr>
                <td><label for="usuario">Usuario</label></td>
                <td><input type="text" name="usuario" id="usuario"></td>
            </tr>
            <tr>
                <td><label for="contrasena">Contraseña</label></td>
                <td><input type="password" name="contasena" id="contrasena"></td>
            </tr>
            </table>
            <?php
            if (isset($_GET['error']) && $_GET['error'] == "datosIncorrectos") {
                echo "<p style='color : red'>Datos incorrectos.</p>";
            }
            ?>
            <input type="submit" value="Iniciar Sesion" name="enviar">
        </form>
    </div>
</body>
</html>