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
    <h2>DATOS PERSONALES 3 (RESULTADO)</h2>

    <?php
    $sexo = "";
    $patron = "/^[a-z]+$/";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $sexo = $_POST["sexo"];
        if (preg_match($patron, $sexo)) {
            echo '<p>Es un@ <strong>'.$sexo.'</strong></p>';
        } else if (empty($sexo)) {
            echo '<p style="color:red;">No ha indicado su sexo.</p>';
        } else {
            echo '<p style="color:red;">¿Que haces?</p>';
        }
    }
    ?>

    <a href="ej2.html">Volver al formulario.</a>
</body>
</html>