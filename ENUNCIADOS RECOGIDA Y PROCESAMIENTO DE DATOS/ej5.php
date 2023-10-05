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
    <h2>DATOS PERSONALES 5 (RESULTADO)</h2>

    <?php
    $edad = "";
    $patron = "/^[a-zA-Z0-9\s]*[a-zA-Z]$/";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $edad = $_POST["edad"];
        if ($edad == "...") {
            echo '<p style="color:red;">No ha indicado ninguna edad.</p>';
        } else if (preg_match($patron, $edad)) {
            echo '<p>Tienes <strong>'.$edad.'</strong></p>';
        } else {
            echo '<p style="color:red;">¿Que haces?</p>';
        }
    }
    ?>

    <a href="ej5.html">Volver al formulario.</a>
</body>
</html>