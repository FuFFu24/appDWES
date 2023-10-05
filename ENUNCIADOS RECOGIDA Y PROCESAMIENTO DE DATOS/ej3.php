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
    <h2>DATOS PERSONALES 4 (RESULTADO)</h2>

    <?php
    $aficiones = [];
    $patron = "/^[a-z]+$/";
    $contador = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $aficiones = $_POST["aficiones"];
        if (!isset($_POST["aficiones"])) {
            echo "<p>No ha seleccionado ningun campo.</p>";
        } else {
            foreach ($aficiones as $key => $value) {
                if (!preg_match($patron, $value)) {
                    $contador ++;
                }
            }
            if ($contador == 0) {
                foreach ($aficiones as $key => $value) {
                    echo '<p>Le gusta: <strong>'.$value.'</strong></p>';
                }
            } else {
                echo '<p style="color:red;">¿Que haces?</p>';
            }
        } 
        }
    ?>

    <a href="ej3.html">Volver al formulario.</a>
</body>
</html>