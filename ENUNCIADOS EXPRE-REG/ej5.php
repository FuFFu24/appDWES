<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
function validarFecha($fecha) {
    // Verificar si la fecha tiene el formato correcto
    if (preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $fecha)) {
        // Separar la fecha en día, mes y año
        list($dia, $mes, $anio) = explode('/', $fecha);

        // Verificar si la fecha es válida usando checkdate
        if (checkdate($mes, $dia, $anio)) {
            return "La fecha '$fecha' es una fecha válida.";
        } else {
            return "La fecha '$fecha' no es una fecha válida.";
        }
    } else {
        return "El formato de fecha '$fecha' es incorrecto. Debe ser 'dd/mm/yyyy'.";
    }
}

// Ejemplo de uso:
$fecha1 = '25/09/2023';
echo validarFecha($fecha1) . '<br>';

$fecha2 = '31/02/2023'; // Fecha inválida (febrero no tiene 31 días)
echo validarFecha($fecha2) . '<br>';

$fecha3 = '2023-09-25'; // Formato incorrecto
echo validarFecha($fecha3) . '<br>';

    ?>
</body>
</html>