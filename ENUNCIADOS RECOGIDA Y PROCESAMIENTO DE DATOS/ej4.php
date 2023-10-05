<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>COLORES 2(RESULTADO)</h2>

    <?php
    $fondo = "";
    $texto = "";
    $patron = "/^[#]*[a-z0-9]+$/";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["fondo"]) && isset($_POST["texto"])) {
            $fondo = $_POST["fondo"];
            $texto = $_POST["texto"];
            if (preg_match($patron, $fondo) && preg_match($patron, $texto)) {
                echo '<p>Se han cambiado los colores elegidos</p>';
                echo '<style>';
                echo 'body { background-color: '.$fondo.'; }';
                echo 'body { color: '.$texto.'; }';
                echo '</style>';
            } else {
                echo '<p style="color:red;">¿Que haces?</p>';
            }
            
        }
    }
    ?>

    <a href="ej4.html">Volver al formulario.</a>
</body>
</html>