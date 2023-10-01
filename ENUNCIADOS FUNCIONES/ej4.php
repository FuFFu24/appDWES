<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $puntuaciones = $_POST['puntuaciones'];
    
        // Calcular la fila con la puntuación más alta
        $maxPuntuacion = 0;
        $filaMasAlta = 0;
    
        foreach ($puntuaciones as $indice => $fila) {
            $puntuacionFila = array_sum($fila);
            echo "La suma de la fina $indice es: $puntuacionFila";
            echo '<br>';
            if ($puntuacionFila > $maxPuntuacion) {
                $maxPuntuacion = $puntuacionFila;
                $filaMasAlta = $indice;
            }
        }
    
        echo "La fila con la puntuación más alta es la fila $filaMasAlta.";
    } else {
        echo "No se ha enviado ningún formulario.";
    }
?>
</body>
</html>