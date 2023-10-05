<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: aqua;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>DATOS PERSONALES 2 (RESULTADO)</h2>
    <?php
        $nombre = "";
        $apellidos = "";
        $patronNombre = "/^[a-zA-Z]+$/";
        $patronApellidos = "/^[a-zA-Z\s]+$/";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            if (empty($_POST["nombre"])) {
                echo "<p>Por favor, ingresa tu nombre.</p>";
            } else if (preg_match($patronNombre, $nombre)) {
                echo '<p>Su nombre es '.$nombre.'</p>';
            } else {
                echo '<p style="color:red;">¿Que haces?</p>';
            }

            $apellidos = $_POST["apellidos"];
            if (empty($_POST["apellidos"])) {
                echo "<p>Por favor, ingresa tus apellidos.</p>";
            } else if (preg_match($patronApellidos, $apellidos)) {
                echo '<p>Sus apellidos son '.$apellidos.'</p>';
            } else {
                echo '<p style="color:red;">¿Que haces?</p>';
            }
        }
    ?>
    <a href="ej1.html">Volve al formulario.</a>
</body>
</html>