<!-- Escriba un programa que cada vez que se ejecute muestre
tres círculos solapados, cada uno de un color elegido al azar
(uno rojo, uno verde y uno azul). El ejemplo siguiente muestra
intensidades de color entre 64 y 255. -->

<!-- Escriba un programa que cada vez que se ejecute muestre
tres círculos solapados, cada uno de un color elegido al azar
(uno rojo, uno verde y uno azul). El ejemplo siguiente muestra
intensidades de color entre 64 y 255. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $rand1 = rand(64,255);
        $rand2 = rand(64,255);
        $rand3 = rand(64,255);
        echo '<svg width="1000" height="600">';
        for ($i = 0; $i < 3; $i++) {
            switch ($i) {
                case 0:
                    echo
                        '<circle cx="150" cy="150" r="100" stroke="black" stroke-width="2" fill="rgb(0,0,'.$rand1.')" fill-opacity="0.8"/>';
                    break;
                case 1:
                    echo
                        '<circle cx="250" cy="150" r="100" stroke="black" stroke-width="2" fill="rgb(0,'.$rand2.',0)" fill-opacity="0.8"/>';
                    break;
                case 2:
                    echo
                        '<circle cx="200" cy="250" r="100" stroke="black" stroke-width="2" fill="rgb('.$rand3.',0,0)" fill-opacity="0.8"/>';
                    break;
                default:
                    # code...
                    break;
            }
        }
        echo '</svg>';
    ?>
</svg>
</body>
</html>