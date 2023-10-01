<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de Validación</title>
</head>
<body>
    <?php
    // Obtener el texto ingresado desde el formulario
    $texto = isset($_POST['texto']) ? $_POST['texto'] : '';

    echo '<p>Ha escrito: <strong>' . $texto . '</strong></p>';

    // Validaciones
    function esLetra($cadena) {
        return preg_match('/^[A-Za-z]+$/', $cadena);
    }

    function esFechaNacimiento($cadena) {
        return preg_match('/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/(\d{4})$/', $cadena);
    }

    function esNumero($cadena) {
        return preg_match('/^[+-]?\d+(\.\d+)?$/', $cadena);
    }

    function esContrasena($cadena) {
        return preg_match('/^[\w*+.\-]{6,}$/', $cadena);
    }

    echo '<ol>';
    if (preg_match('/^[A-Za-z\s]+$/', $texto)) {
        echo '<li>La cadena <strong>"' . $texto . '"</strong> son uno o más letras sueltas separadas por espacios.</li>';
    } else {
        echo '<li>La cadena <strong>"' . $texto . '"</strong> <span style="color:red">no</span> son uno o más letras sueltas separadas por espacios.</li>';
    }
    if (preg_match('/^[A-Za-z\s]+[A-Za-z\s]+$/', $texto)) {
        echo '<li>La cadena <strong>"' . $texto . '"</strong> son dos o más letras sueltas separadas por espacios.</li>';
    } else {
        echo '<li>La cadena <strong>"' . $texto . '"</strong> <span style="color:red">no</span> son dos o más letras sueltas separadas por espacios.</li>';
    }
    if (preg_match('/^[a-z\s]+$/', $texto)) {
        echo '<li>La cadena <strong>"' . $texto . '"</strong> son una o más palabras (sólo letras inglesas minúsculas, separadas por uno o varios espacios).</li>';
    } else {
        echo '<li>La cadena <strong>"' . $texto . '"</strong> <span style="color:red">no</span> son una o más palabras (sólo letras inglesas minúsculas, separadas por uno o varios espacios).</li>';
    }
    if (preg_match('/^[A-Z]+$/', $texto)) {
        echo '<li>La cadena <strong>"' . $texto . '"</strong> es una única palabra en mayúsculas.</li>';
    } else {
        echo '<li>La cadena <strong>"' . $texto . '"</strong> <span style="color:red">no</span> es una única palabra en mayúsculas.</li>';
    }
    if (esFechaNacimiento($texto) || $texto == '00/00/0000') {
        echo '<li>La cadena <strong>"' . $texto . '"</strong> es una fecha de nacimiento válida (dd/mm/aaaa) o "00/00/0000".</li>';
    } else {
        echo '<li>La cadena <strong>"' . $texto . '"</strong> <span style="color:red">no</span> es una fecha de nacimiento válida (dd/mm/aaaa) ni "00/00/0000".</li>';
    }
    if (esNumero($texto)) {
        echo '<li>La cadena <strong>"' . $texto . '"</strong> es un único número (sin signo y con como mucho dos decimales).</li>';
    } else {
        echo '<li>La cadena <strong>"' . $texto . '"</strong> <span style="color:red">no</span> es un único número (sin signo y con como mucho dos decimales).</li>';
    }
    if (esContrasena($texto)) {
        echo '<li>La cadena <strong>"' . $texto . '"</strong> es una contraseña válida (al menos seis caracteres, letras, números y los caracteres * + . - _).</li>';
    } else {
        echo '<li>La cadena <strong>"' . $texto . '"</strong> <span style="color:red">no</span> es una contraseña válida (al menos seis caracteres, letras, números y los caracteres * + . - _).</li>';
    }
    echo '</ol>';
    ?>
</body>
</html>
