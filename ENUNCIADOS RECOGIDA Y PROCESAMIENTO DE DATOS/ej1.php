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

        $nombreError = "";
        $apellidosError = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["nombre"])) {
                $nombreError = "Por favor, ingresa tu nombre.";
            } else {
                $nombre = $_POST["nombre"];
            }

            if (empty($_POST["apellidos"])) {
                $apellidosError = "Por favor, ingresa tus apellidos.";
            } else {
                $apellidos = $_POST["apellidos"];
            }
        }

        if (empty($nombreError) && empty($apellidosError)) {
            echo '<p>Su nombre es '.$nombre.'</p>';
            echo '<p>Sus apellidos son '.$apellidos.'</p>';
        } else {
            if (!empty($nombreError)) {
                echo '<p>'.$nombreError.'</p>';
            } 
            if (!empty($apellidosError)) {
                echo '<p>'.$apellidosError.'</p>';
            }
            
        }
    ?>
    <a href="ej1.html">Volve al formulario.</a>
</body>
</html>