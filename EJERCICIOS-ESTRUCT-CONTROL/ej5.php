<!-- Escriba un programa que cada vez que se ejecute muestre la tirada
de dos jugadores que tiran cada uno tres dados al azar y diga quién
ha ganado.
En este juego, gana el jugador que:
 ha obtenido un trío de dados iguales de mayor valor, si los dos han
obtenido tríos distintos
 ha obtenido un trío de dados iguales, si el otro jugador no ha
obtenido trío
 ha obtenido una pareja de dados iguales de mayor valor, si los dos
han obtenido parejas distintas
 ha obtenido una puntuación total mayor, si los dos han obtenido la
misma pareja
 ha obtenido una pareja de dados iguales, si el otro jugador no ha
obtenido pareja
 ha obtenido la mayor puntuación total, si ningún jugador ha
obtenido pareja
Si no gana ningún jugador, lógicamente se habrá producido un empate. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .centroP {
            font-weight: bold;
            display: grid;
            place-items: center;
        }

        div {
            display: inline-block;
            margin: auto;
        }

        .rojo {
            border: 10px solid red;
            margin: 1px;
        }

        .azul {
            border: 10px solid blue;
            margin: 1px;
        }
    </style>
</head>
<body>
    <?php
        echo '<p>Actualice la pagina para mostrar una nueva tirada.</p>';

        $rand1=rand(1,6);
        $rand2=rand(1,6);
        $rand3=rand(1,6);
        $rand4=rand(1,6);
        $rand5=rand(1,6);
        $rand6=rand(1,6);

        echo '<div><p class="centroP">Jugador 1</p><div class="rojo">
            <img src="img/'.$rand1.'.svg" alt="dado1">
            <img src="img/'.$rand3.'.svg" alt="dado3">
            <img src="img/'.$rand5.'.svg" alt="dado5"></div></div>';
        echo '<div><p class="centroP">Jugador 2</p><div class="azul">
            <img src="img/'.$rand2.'.svg" alt="dado2">
            <img src="img/'.$rand4.'.svg" alt="dado4">
            <img src="img/'.$rand6.'.svg" alt="dado6"></div></div>';        
    ?>
</body>
</html>