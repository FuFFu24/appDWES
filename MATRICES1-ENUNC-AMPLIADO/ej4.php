<!-- Escriba un programa en una página que genere una matriz de un
número aleatorio de valores numéricos (entre 5 y 15 valores) . Los
valores se encontrarán entre 0 y 10, obtenidos también de forma
aleatoria.
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
        // Generar un número aleatorio de elementos entre 5 y 15
        $numElementos = rand(5, 15);

        // Inicializar una matriz vacía
        $matriz = array();

        // Llenar la matriz con valores aleatorios entre 0 y 10
        for ($i = 0; $i < $numElementos; $i++) {
            $valor = rand(0, 10);
            $matriz[] = $valor;
        }

        // Imprimir la matriz
        echo "<pre>";
        print_r($matriz);
        echo "</pre>";
    ?>
 </body>
 </html>