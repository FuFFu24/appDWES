<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
function compararCadenaConPatron($patron, $cadena) {
    if (preg_match($patron, $cadena)) {
        return "La cadena '$cadena' coincide con el patrón '$patron'.";
    } else {
        return "La cadena '$cadena' no coincide con el patrón '$patron'.";
    }
}

// Ejemplos de uso:
$patron1 = '/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/'; // Patrón para validar direcciones de correo electrónico básicas
$cadena1 = 'juanang@alpex.org';
echo compararCadenaConPatron($patron1, $cadena1) . '<br>';

$patron2 = '/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/'; // Patrón para validar direcciones de correo electrónico básicas
$cadena2 = 'juan.ang@al.pex.com';
echo compararCadenaConPatron($patron2, $cadena2) . '<br>';

$patron3 = '/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/'; // Patrón para validar direcciones de correo electrónico básicas
$cadena3 = 'JUANANG@pex.com.es';
echo compararCadenaConPatron($patron3, $cadena3) . '<br>';

    ?>
</body>
</html>