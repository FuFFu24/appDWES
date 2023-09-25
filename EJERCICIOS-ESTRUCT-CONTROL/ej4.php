<!-- Escriba un programa que cada vez que se ejecute muestre la tirada
de tres dados al azar y diga si ha salido un trío, una pareja o el
mayor de los valores obtenidos.
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
        echo '<p>Actualice la pagina para mostrar una nueva tirada.</p>';

        $rand1=rand(1,6);
        $rand2=rand(1,6);
        $rand3=rand(1,6);

        $numeros=[$rand1,$rand2,$rand3];

        echo '<div>
            <img src="img/'.$rand1.'.svg" alt="dado1">
            <img src="img/'.$rand2.'.svg" alt="dado2">
            <img src="img/'.$rand3.'.svg" alt="dado3"></div>';
        
        if ($rand1 == $rand2 && $rand2 == $rand3) {
            $ganador = "Ha salido un trío de $rand1.";
        } elseif ($rand1 == $rand2 || $rand2 == $rand3 || $rand1 == $rand3) {
            if ($rand1 == $rand2) {
                $ganador = "Ha salido una pareja de $rand1.";
            } else if ($rand2 == $rand3) {
                $ganador = "Ha salido una pareja de $rand2.";
            } else {
                $ganador = "Ha salido una pareja de $rand3.";
            }
        } else {
            $mayor = max($numeros);
            $ganador = "El número mayor es: $mayor.";
        }

        echo '<div>'.$ganador.'</div>';
    ?>
</body>
</html>