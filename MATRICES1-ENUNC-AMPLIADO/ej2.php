<!-- Crea un array de dos dimensiones, de manera que en una
dimensión contenga el tipo de colores (fuerte o suave) y en la otra
3 colores de cada tipo. Muestra una tabla como la siguiente
recorriendo el array: -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $colores = array(
            'Colores fuertes' => array('rojo'=>'#FF0000', 'verde'=>'#00FF00', 'azul'=>'#0000FF'),
            'Colores suaves' => array('rosa'=>'#FE9ABC', 'amarillo'=>'#FDF189', 'malva'=>'#BC8F8F')
        );
        
        echo "Colores fuertes: ";
        foreach ($colores['Colores fuertes'] as $ind => $color) {
            echo '<span style="background-color: '.$color.'; margin: 2px;">'. $ind .'</span>';
        }
        
        echo "<br>Colores suaves: ";
        foreach ($colores['Colores suaves'] as $ind => $color) {
            echo '<span style="background-color: '.$color.'; margin: 2px;">'. $ind .'</span>';
        }

        echo "<table>";
        foreach ($colores as $ind1 => $tipo) {
            echo '<tr><td>'.$ind1.': </td>';
                foreach ($tipo as $ind2 => $color) {
                    echo '<td style="background-color: '.$color.'; margin: 2px;">'.$ind2.'</td>';
                }
            echo '</tr><br>';
        }
    ?>
</body>
</html>