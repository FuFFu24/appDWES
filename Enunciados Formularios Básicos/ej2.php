<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (($peso=$_REQUEST['peso']) && ($altura=$_REQUEST['altura'])) {
            if ($peso >= 0 && $altura >=0) {
                $imc = $peso / (pow($altura/100, 2));
                echo '<p>Con un peso de <strong>'.$peso.' kg</strong> y una altura de <strong>'.$altura.' cm</strong>, su indice 
                de masa corporal es <strong>'.round($imc).'</strong>.</p>';
                echo '<p>Un imc muy alto indica obesidad. Los valores "normales" de imc estan entre 20 y 25, pero esos limites 
                dependen de la edad, del sexo, de la constitucion fisica, etc.</p>';
            } else {
                echo "<p>Por favor, ingrese un número entero mayor o igual a cero.</p>";
            }
        } else {
            echo "<p>No se ha proporcionado peso/altura válido.</p>";
        }
    ?>
    <a href="ej2.html">Volver a la página anterior</a>
</body>
</html>