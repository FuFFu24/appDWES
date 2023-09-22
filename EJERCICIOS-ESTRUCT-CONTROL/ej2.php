<!-- Escriba un programa que cada vez que se ejecute muestre la tirada
de dos jugadores que tiran un dado al azar cada uno y diga quién ha
ganado.
En este juego, gana el jugador que ha obtenido una puntuación más
alta que el otro jugador.
Si no gana ningún jugador, lógicamente se habrá producido un
empate. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        span {
            font-weight: bold;
        }

        div {
            display: inline-block;
        }
    </style>
</head>
<body>
    <?php
        echo '<p>Actualice la pagina para mostrar una nueva tirada.</p>';

        $rand1=rand(1,6);
        $rand2=rand(1,6);

        echo '<p>Jugador 1</p><div><img src="img/'.$rand1.'.svg" alt="dado1"></div>';
        echo '<div><span>Jugador 2</span><img src="img/'.$rand2.'.svg" alt="dado2"></div>';
        
        if ($rand1 != $rand2) {
            if ($rand1 > $rand2) {
                echo '<p>Ha ganado el juegador 1.</p>';
            } else {
                echo '<p>Ha ganado el juegador 2.</p>';
            }
            
        } else {
            echo '<p>Empate.</p>';
        }
        
    ?>
</body>
</html>