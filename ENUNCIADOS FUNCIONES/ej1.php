<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $n = $_REQUEST['n'];
    $primo = true;

    if (($n == $_REQUEST['n'])) {
        if ($n <= 1) {
            $primo = false;
        }
        if ($n <= 3) {
            $primo = true;
        }
    
        if ($n % 2 == 0 || $n % 3 == 0) {
            $primo = false;
        }
    
        for ($i = 5; $i * $i <= $n; $i = $i + 6) {
            if ($n % $i == 0 || $n % ($i + 2) == 0) {
                $primo = false;
            }
        }

        if ($primo) {
            echo "$n es un número primo.";
        } else {
            echo "$n no es un número primo.";
        }
    } else {
        echo '<p>Introduce un valor valido.</p>';
    }
    
?>
    <br><br>
    <a href="ej1.html">Volver al formulario.</a>
</body>
</html>