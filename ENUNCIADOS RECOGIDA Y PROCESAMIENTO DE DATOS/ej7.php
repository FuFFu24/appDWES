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
    $email = ""; $patronEmail = "/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/";
    $contrasena = ""; $patronContrasena = "/^[\w*+.\-]{6,}$/";
    $sexo = ""; $patronSexo = "/^[a-z]+$/";
    $estudios = []; $patronEstudios = "/^[a-zA-Z\s]+$/";
    $temas = []; $patronTemas = "/^[a-z]+$/";
    $dia = ""; $patronDia = "/^[a-z]+$/";
    $opinion = ""; $patronOpinion = "/[\w\s\d.,'¡!¿?():;ÁÉÍÓÚáéíóúüÜñÑ-]+/";
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
        $email = $_POST["email"];
        if (empty($_POST["email"])) {
            echo "<p>Por favor, ingresa tu email.</p>";
        } else if (preg_match($patronEmail, $email)) {
            echo '<p>Su email es '.$email.'</p>';
        } else {
            echo '<p style="color:red;">¿Que haces?</p>';
        }
        // ------------------------------------------------------------
        $contrasena = $_POST["contrasena"];
        if (empty($_POST["contrasena"])) {
            echo "<p>Por favor, ingresa tu contrasena.</p>";
        } else if (preg_match($patronContrasena, $contrasena)) {
            echo '<p>Su contrasena es '.$contrasena.'</p>';
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
        $estudios = $_POST["estudios"];
        if (!isset($_POST["estudios"])) {
            echo "<p>No ha seleccionado ningun campo.</p>";
        } else {
            foreach ($estudios as $key => $value) {
                if (!preg_match($patronEstudios, $value)) {
                    $contador ++;
                }
            }
            if ($contador == 0) {
                foreach ($estudios as $key => $value) {
                    echo '<p>Tiene: <strong>'.$value.'</strong></p>';
                }
            } else {
                echo '<p style="color:red;">¿Que haces?</p>';
            }
        }
        // ------------------------------------------------------------
        $temas = $_POST["temas"];
        if (!isset($_POST["temas"])) {
            echo "<p>No ha seleccionado ningun campo.</p>";
        } else {
            foreach ($temas as $key => $value) {
                if (!preg_match($patronTemas, $value)) {
                    $contador ++;
                }
            }
            if ($contador == 0) {
                foreach ($temas as $key => $value) {
                    echo '<p>Le gusta: <strong>'.$value.'</strong></p>';
                }
            } else {
                echo '<p style="color:red;">¿Que haces?</p>';
            }
        }
        // ------------------------------------------------------------
        $dia = $_POST["dia"];
        if ($dia == "dia") {
            echo '<p style="color:red;">No ha indicado ningun dia.</p>';
        } else if (preg_match($patronDia, $dia)) {
            echo '<p>Dia preferido el <strong>'.$dia.'</strong></p>';
        } else {
            echo '<p style="color:red;">¿Que haces?</p>';
        }
        // ------------------------------------------------------------
        $opinion = $_POST["opinion"];
        if ($opinion == "Comentario:") {
            echo "<p>Por favor, ingresa tu opinion.</p>";
        } else if (preg_match($patronOpinion, $opinion)) {
            echo '<p>Su opinion es '.$opinion.'</p>';
        } else {
            echo '<p style="color:red;">¿Que haces?</p>';
        }
    }
    ?>

    <a href="ej7.html">Volver al formulario.</a>
</body>
</html>