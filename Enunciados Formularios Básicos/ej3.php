<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (($a=$_REQUEST['a']) && ($b=$_REQUEST['b']) && ($c=$_REQUEST['c'])) {
            if ($a >= 0 && $b >= 0 && c >= 0) {
                $signo = pow($b,2)-(4*$a*$c);
                 if ($signo > 0) {
                    $resultado1 = (-($b) + (sqrt((pow($b,2))-(4*$a*$c))))/(2*$a);
                    $resultado2 = (-($b) - (sqrt((pow($b,2))-(4*$a*$c))))/(2*$a);

                    echo '<p>La ecuación '.$a.'x<sup>2</sup>+'.$b.'x'.$c.' = 0 tiene dos soluciones: x<sub>1</sub> = '.$resultado1.' ; x<sub>2</sub> = '.$resultado2.'.</p>';
                } else if ($signo < 0) {
                    echo '<p>La ecuación '.$a.'x<sup>2</sup>+'.$b.'x'.$c.' = 0 no tiene solución.</p>';
                } else if ($c == 0 && $b > 0) {
                    $resultado = -($b)/(2*$a);

                    echo '<p>La ecuación '.$b.'x+'.$c.' = 0 tiene una única solución: x = '.$resultado.'</p>';
                }
            } else if ($a == 0 && $b == 0 && c == 0) {
                echo '<p>La ecuación 0 = 0 tiene infinitas soluciones. Todos los números son solución</p>';
            } else {
                echo "<p>Por favor, ingrese un número entero mayor o igual a cero.</p>";
            }
        } else {
            echo "<p>No se ha proporcionado a/b/c válido.</p>";
        }
    ?>
    <a href="ej3.html">Volver a la página anterior</a>
</body>
</html>