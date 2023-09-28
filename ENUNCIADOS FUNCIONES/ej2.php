<!-- Escribir una función que descomponga y escriba los factores primos de cualquier número .
Factorizar un número es encontrar una forma de escribirlo como multiplicación
 -->

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
 <?php

    $n = $_REQUEST['n'];
    $numero = $n;

    // Inicializar un arreglo para almacenar los factores primos
    $factoresPrimos = array();

    // Dividir el número por 2 hasta que sea impar
    while ($numero % 2 == 0) {
        $factoresPrimos[] = 2;
        $numero = $numero / 2;
    }

    // Ahora, iterar a través de los números impares para encontrar más factores primos
    for ($i = 3; $i <= sqrt($numero); $i = $i + 2) {
        while ($numero % $i == 0) {
            $factoresPrimos[] = $i;
            $numero = $numero / $i;
        }
    }

    // Si el número restante después de la factorización es mayor que 1, también es un factor primo.
    if ($numero > 1) {
        $factoresPrimos[] = $numero;
    }

    echo '<p>Los factores primos de '.$n.' son: '.implode(" * ", $factoresPrimos).'</p>';
?>
<a href="ej2.html">Volver al formulario.</a>
 </body>
 </html>