<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $dni=$_REQUEST['dni'];

        if (is_numeric($dni) && strlen($dni) == 8) {
            // Calcular la letra del DNI
            $indiceLetra = $dni % 23;
            $letrasDNI = "TRWAGMYFPDXBNJZSQVHLCKE";
            $letraDNI = $letrasDNI[$indiceLetra];

            // Mostrar el resultado
            echo "<p>El número DNI $dni con letra sería: $dni$letraDNI</p>";
        } else {
            echo "<p>Por favor, introduce un número de DNI válido.</p>";
        }
        
    ?>
    <a href="ej7.html">Volver al formulario.</a>
</body>
</html>