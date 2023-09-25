<!-- Escriba un programa que cada vez que se ejecute muestre la tirada
de dos jugadores que tiran cada uno dos dados al azar y diga quién
ha ganado.
En este juego, gana el jugador que:
 ha obtenido una pareja de dados iguales de mayor valor, si los
dos han obtenido parejas distintas
 ha obtenido una pareja de dados iguales, si el otro jugador no
ha obtenido pareja
 ha obtenido una puntuación total mayor, si ningún jugador ha
obtenido pareja
Si no gana ningún jugador, lógicamente se habrá producido un
empate. -->

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

        echo '<div><p class="centroP">Jugador 1</p><div class="rojo">
            <img src="img/'.$rand1.'.svg" alt="dado1"><img src="img/'.$rand3.'.svg" alt="dado3"></div></div>';
        echo '<div><p class="centroP">Jugador 2</p><div class="azul">
            <img src="img/'.$rand2.'.svg" alt="dado2"><img src="img/'.$rand4.'.svg" alt="dado4"></div></div>';

        if ($rand1==$rand3 && $rand2!=$rand4) {
            echo '<div><p class="centroP">Resultado</p><div style="margin: 2px;">Jugador 1</div></div>';
        } elseif ($rand1!=$rand3 && $rand2==$rand4) {
            echo '<div><p class="centroP">Resultado</p><div style="margin: 2px;">Jugador 2</div></div>';
        } elseif (($rand1+$rand3)>($rand2+$rand4)) {
            echo '<div><p class="centroP">Resultado</p><div style="margin: 2px;">Jugador 1</div></div>';
        } elseif (($rand1+$rand3)<($rand2+$rand4)) {
            echo '<div><p class="centroP">Resultado</p><div style="margin: 2px;">Jugador 2</div></div>';
        } else {
            echo '<div><p class="centroP">Resultado</p><div style="margin: 2px;">Empate</div></div>';
        }
    ?>
</body>
</html>