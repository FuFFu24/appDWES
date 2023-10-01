<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Resultado de Validación</title>
</head>
<body>
    <?php
    // Obtener el texto ingresado desde el formulario
    $texto = isset($_POST['texto']) ? $_POST['texto'] : '';

    echo '<p>Ha escrito: <strong>'.$texto.'</strong></p>';

    // Función para validar si es una cadena de vocales minúsculas sin acentuar
    function esCadenaDeVocales($cadena) {
        return preg_match('/^[aeiou]+$/', $cadena);
    }

    // Realizar la validación y mostrar el resultado
    echo '<ol>';
    if (empty($texto)) {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> de texto está vacía.</li>';
    } else {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> <span style="color:red">no</span> de texto está vacía.</li>';
    }
    if (preg_match('/^[A-Za-z]+$/', $texto)) {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> es una única palabra (sólo letras).</li>';
    } else {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> <span style="color:red">no</span> es una única palabra (sólo letras).</li>';
    }
    if (preg_match('/^[A-Za-z]+\s[A-Za-z]+$/', $texto)) {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> son dos palabras (sólo letras, separadas por espacios).</li>';
    } else {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> <span style="color:red">no</span> son dos palabras (sólo letras, separadas por espacios).</li>';
    }
    if (preg_match('/^[A-Za-z]+$/', $texto) && preg_match('/^[A-Za-z]+$/', $texto)) {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> es una única palabra que contiene solamente letras inglesas.</li>';
    } else {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> <span style="color:red">no</span> es una única palabra que contiene solamente letras inglesas.</li>';
    }
    if (esCadenaDeVocales(strtolower($texto))) {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> es una cadena de vocales minúsculas sin acentuar en orden alfabético.</li>';
    } else {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> <span style="color:red">no</span> es una cadena de vocales minúsculas sin acentuar en orden alfabético.</li>';
    }
    if (preg_match('/^[0-9]+$/', $texto)) {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> es un único número (sin decimales ni signo).</li>';
    } else {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> <span style="color:red">no</span> es un único número (sin decimales ni signo).</li>';
    }
    if (preg_match('/^[0-9]+$/', $texto) && $texto % 2 == 0) {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> es un único número par (sin decimales ni signo).</li>';
    } else {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> <span style="color:red">no</span> es un único número par (sin decimales ni signo).</li>';
    }
    if (preg_match('/^[69][0-9]{8}$/', $texto)) {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> es un único número de teléfono (9 cifras, empezando por 6 o 9).</li>';
    } else {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> <span style="color:red">no</span> es un único número de teléfono (9 cifras, empezando por 6 o 9).</li>';
    }
    if (preg_match('/^[0-9]{1,8}[A-Za-z]$/', $texto)) {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> es un único número del DNI (de 1 a 8 números, con letra inglesa final mayúscula o sin ella).</li>';
    } else {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> <span style="color:red">no</span> es un único número del DNI (de 1 a 8 números, con letra inglesa final mayúscula o sin ella).</li>';
    }
    if (preg_match('/^[0-9]{5}$/', $texto)) {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> es un único código postal (cinco cifras, empezando por 0, 1, 2, 3 o 4).</li>';
    } else {
        echo '<li>La cadena <strong>"'.$texto.'"</strong> <span style="color:red">no</span> es un único código postal (cinco cifras, empezando por 0, 1, 2, 3 o 4).</li>';
    }
    echo '</ol>';
    ?>
</body>
</html>
