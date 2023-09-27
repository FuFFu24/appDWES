<!-- Crea un array $dias con los días de la semana y muestra todas sus
parejas índices/valores mediante un bucle foreach y for.
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
        $dias = ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];

        // Mostrar las parejas índices/valores usando foreach
        echo "Parejas índices/valores usando foreach:<br>";
        foreach ($dias as $indice => $valor) {
            echo "Índice: $indice, Valor: $valor<br>";
        }

        // Mostrar las parejas índices/valores usando for
        echo "<br>Parejas índices/valores usando for:<br>";
        $longitud = count($dias);
        for ($i = 0; $i < $longitud; $i++) {
            echo "Índice: $i, Valor: " . $dias[$i] . "<br>";
        }
    ?>
 </body>
 </html>