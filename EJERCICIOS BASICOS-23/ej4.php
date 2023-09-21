<!-- Escriba un programa que cada vez que se ejecute muestre
tres círculos solapados, cada uno de un color elegido al azar
(uno rojo, uno verde y uno azul). El ejemplo siguiente muestra
intensidades de color entre 64 y 255. -->

<?php
// Genera valores de color aleatorios para los círculos
$rojo = rand(64, 255);
$verde = rand(64, 255);
$azul = rand(64, 255);

// Calcula el radio y la posición para los círculos
$radio = 80;
$distancia = -30; // Distancia entre los círculos

// Coordenadas del primer círculo
$x1 = 100;
$y1 = 100;

// Coordenadas del segundo círculo
$x2 = $x1 + 2 * ($radio + $distancia);
$y2 = $y1;

// Coordenadas del tercer círculo
$x3 = $x1 + ($radio + $distancia);
$y3 = $y1 + sqrt(3) * ($radio + $distancia);

// Crea el archivo SVG con CSS para mezclar los colores
$svg = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<svg width="300" height="300" xmlns="http://www.w3.org/2000/svg">
    <style>
        circle {
            mix-blend-mode: multiply;
        }
    </style>
    <circle cx="'.$x1.'" cy="'.$y1.'" r="'.$radio.'" fill="rgb('.$rojo.', 0, 0)" />
    <circle cx="'.$x2.'" cy="'.$y2.'" r="'.$radio.'" fill="rgb(0, '.$verde.', 0)" />
    <circle cx="'.$x3.'" cy="'.$y3.'" r="'.$radio.'" fill="rgb(0, 0, '.$azul.')" />
</svg>';

// Imprime el archivo SVG
echo $svg;
?>
