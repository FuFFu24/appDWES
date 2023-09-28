<!-- Almacena en un vector el nombre de los siguientes estadios de football
y en qué ciudad están [Barcelona Nou Camp, Real Madrid
Santiago Bernabeu, Valencia Mestalla, Real Sociedad Anoeta]
de manera que:
 Mostramos los estadios y el equipo en forma de lista
ordenada.
 Eliminamos el estadio asociado al Real Madrid y
Comprobamos que se ha eliminado y que su posición
se ha reubicado. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $estadios = array("Barcelona" => "Nou Camp", "Real Madrid" => "Santiago Bernabeu", "Valencia" => "Mestalla", "Real Sociedad" => "Anoeta");

    echo '<ol>';
    foreach ($estadios as $key => $value) {
        echo '<li>El equipo: '.$key.' tiene el estadio: '.$value.'</li>';
    }
    echo '</ol>';

    $posicion = array_search(("Santiago Bernabeu"), $estadios);
    if ($posicion !== false) {
        // Elimina el valor de la estadios
        unset($estadios[$posicion]);
    }

    asort($estadios);

    echo '<ol>';
    foreach ($estadios as $key => $value) {
        echo '<li>El equipo: '.$key.' tiene el estadio: '.$value.'</li>';
    }
    echo '</ol>';
?>
</body>
</html>