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
    <h2>DATOS PERSONALES 6 (RESULTADO)</h2>

    <?php
    $nombre = ""; $patronNombre = "/^[a-zA-Z]+$/";
    $apellidos = ""; $patronApellidos = "/^[a-zA-Z\s]+$/";
    $edad = ""; $patronEdad = "/^[a-zA-Z0-9\s]*[a-zA-Z]$/";
    $peso = ""; $patronPeso = "/^[0-9]+$/";
    $sexo = ""; $patronSexo = "/^[a-z]+$/";
    $estado = ""; $patronEstado = "/^[a-z]+$/";
    $aficiones = []; $patronAficiones = "/^[a-z]+$/";
    // ------------------------------------------------------------
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        if (empty($_POST["nombre"])) {
            echo "<p>Por favor, ingresa tu nombre.</p>";
        } else if (preg_match($patronNombre, $nombre)) {
            echo '<p>Su nombre es '.$nombre.'</p>';
        } else {
            echo '<p style="color:red;">¿Que haces?</p>';
        }
        // ------------------------------------------------------------
        $apellidos = $_POST["apellidos"];
        if (empty($_POST["apellidos"])) {
            echo "<p>Por favor, ingresa tus apellidos.</p>";
        } else if (preg_match($patronApellidos, $apellidos)) {
            echo '<p>Sus apellidos son '.$apellidos.'</p>';
        } else {
            echo '<p style="color:red;">¿Que haces?</p>';
        }
        // ------------------------------------------------------------
        $edad = $_POST["edad"];
        if ($edad == "...") {
            echo '<p style="color:red;">No ha indicado ninguna edad.</p>';
        } else if (preg_match($patronEdad, $edad)) {
            echo '<p>Tienes <strong>'.$edad.'</strong></p>';
        } else {
            echo '<p style="color:red;">¿Que haces?</p>';
        }
        // ------------------------------------------------------------
        $peso = $_POST["peso"];
        if (empty($_POST["peso"])) {
            echo "<p>Por favor, ingresa tu peso.</p>";
        } else if (preg_match($patronPeso, $peso)) {
            echo '<p>Su peso son '.$peso.'kg</p>';
        } else {
            echo '<p style="color:red;">¿Que haces?</p>';
        }
        // ------------------------------------------------------------
        $sexo = $_POST["sexo"];
        if (preg_match($patronSexo, $sexo)) {
            echo '<p>Es un@ <strong>'.$sexo.'</strong></p>';
        } else if (empty($sexo)) {
            echo '<p style="color:red;">No ha indicado su sexo.</p>';
        } else {
            echo '<p style="color:red;">¿Que haces?</p>';
        }
        // ------------------------------------------------------------
        $estado = $_POST["estado"];
        if (preg_match($patronEstado, $estado)) {
            echo '<p>Esta <strong>'.$estado.'</strong></p>';
        } else if (empty($estado)) {
            echo '<p style="color:red;">No ha indicado su estado civil.</p>';
        } else {
            echo '<p style="color:red;">¿Que haces?</p>';
        }
        // ------------------------------------------------------------
        $aficiones = $_POST["aficiones"];
        if (!isset($_POST["aficiones"])) {
            echo "<p>No ha seleccionado ningun campo.</p>";
        } else {
            foreach ($aficiones as $key => $value) {
                if (!preg_match($patronAficiones, $value)) {
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

    <a href="ej6.html">Volver al formulario.</a>
</body>
</html>