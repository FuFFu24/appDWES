<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <?php
    // Obtener los segundos ingresados desde la página anterior
    if ($segundos=$_REQUEST['segundos']) {

        // Verificar si los segundos son válidos (mayores o iguales a cero)
        if ($segundos >= 0) {
            // Calcular minutos y segundos
            $minutos = $segundos / 60;
            $segundosRestantes = $segundos % 60;

            echo "<p>$segundos segundos son ".(int)$minutos." minutos y $segundosRestantes segundos.</p>";
        } else {
            echo "<p>Por favor, ingrese un número entero mayor o igual a cero.</p>";
        }
    } else {
        echo "<p>No se han proporcionado segundos válidos.</p>";
    }
    ?>
    <a href="ej1.html">Volver a la página anterior</a>
</body>
</html>