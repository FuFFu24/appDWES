<!-- Crea un array con los países de la Unión Europea y sus capitales.
Muestra por cada uno de ellos la frase: “La capital de <<país>> es
<<capital>>”. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $paises = array(
            'Italia' => 'Roma',
            'Luxemburgo' => 'Luxemburgo',
            'Belgica' => 'Bruselas',
            'Dinamarca' => 'Copenhage',
            'Finlandia' => 'Helsinki',
            'Francia' => 'Paris',
            'Eslovakia' => 'Bratislava',
            'ESlovenia' => 'Ljubljana',
            'Alemania' => 'Berlin',
            'Grecia' => 'Atenas',
            'Irlanda' => 'Dublín',
            'Holanda' => 'Amsterdam',
            'Portugal' => 'Lisboa',
            'España' => 'Madrid',
            'Suecia' => 'Estocolmo',
            'Reino Unido' => 'Londres',
            'Chipre' => 'Nicosia',
            'República' => 'ChecaPraga',
            'Estonia' => 'Tallin',
            'Hungria' => 'Budapest',
            'Malta' => 'Valetta',
            'Austria' => 'Viena',
            'Polonia' => 'Varsovia'
        );

        foreach ($paises as $key => $value) {
            echo '<p>La capital de '.$key.' es '.$value.'.</p>';
        }
    ?>
</body>
</html>