<!-- Escriba un programa que cada vez que se ejecute muestre la tirada
de entre 1 y 10 dados al azar y diga el número de valores pares e
impares obtenidos. -->

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
        $rand4=rand(1,6);
        $rand5=rand(1,6);

        $numeros=[$rand1,$rand2,$rand3,$rand4,$rand5];

        echo '<div>
            <img src="img/'.$rand1.'.svg" alt="dado1">
            <img src="img/'.$rand2.'.svg" alt="dado2">
            <img src="img/'.$rand3.'.svg" alt="dado3">
            <img src="img/'.$rand4.'.svg" alt="dado4">
            <img src="img/'.$rand5.'.svg" alt="dado5"></div>';
        
        $contPar=0;
        $contImp=0;

        foreach ($numeros as $numero) { 
            if ($numero%2==0) {
                $contPar++;
            } else {
                $contImp++;
            }
            
        }

        echo '<p>Han salido '.$contPar.' numeros pares y '.$contImp.' numeros impares</p>';
    ?>
</body>
</html>