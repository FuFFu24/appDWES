<!-- Escriba un programa que cada vez que se ejecute muestre
tres círculos contiguos con un radio entre 50 y 150 píxeles, al
azar. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $cx=160;
        $r=rand(50,150);
        echo '<svg width="1000" height="400">';
        for ($i = 0; $i < 3; $i++) { 
            if ($i != 0) {
                $aux=$r;
                $r=rand(50,150);
                $cx = $cx + $r + $aux;
            }
            switch ($i) {
                case 0:
                    $color = 'red';
                    break;
                case 1:
                    $color = 'green';
                    break;
                case 2:
                    $color = 'blue';
                    break;
                default:
                    # code...
                    break;
            }
            echo
                '<circle cx="'.$cx.'" cy="200" r="'.$r.'" fill="'.$color.'" stroke="black" stroke-width="2" />';
        }
        echo '</svg>';
    ?>
</body>
</html>