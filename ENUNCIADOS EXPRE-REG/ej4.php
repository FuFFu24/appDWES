<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
function verificarNumeroEspana($numero) {
    // Eliminar espacios en blanco y guiones
    $numero = preg_replace('/\s|-/', '', $numero);

    // Verificar si el número tiene 9 dígitos y comienza con 6, 7, 8 o 9
    if (preg_match('/^[6789]\d{8}$/', $numero)) {
        return "El número '$numero' es un número de teléfono de España válido.";
    } else {
        return "El número '$numero' no es un número de teléfono de España válido.";
    }
}

// Ejemplo de uso:
$numero1 = '912345678';
echo verificarNumeroEspana($numero1) . '<br>';

$numero2 = '612-34-56-78';
echo verificarNumeroEspana($numero2) . '<br>';

$numero3 = '555123456'; // No válido en España
echo verificarNumeroEspana($numero3) . '<br>';

    ?>
</body>
</html>