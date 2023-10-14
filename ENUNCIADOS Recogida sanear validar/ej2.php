<?php
// Función para sanear los datos en un vector asociativo
function sanitizeArray($data, $default = '') {
    foreach ($data as $key => $value) {
        // Sanea el valor y asigna el valor predeterminado si está vacío o no definido
        $data[$key] = isset($value) ? filter_var($value, FILTER_SANITIZE_STRING) : $default;
    }
    return $data;
}

// Vector con datos (pueden ser datos del formulario, por ejemplo)
$data = [
    'nombre' => $_POST['nombre'] ?? '', // Valor predeterminado vacío
    'telefono' => $_POST['telefono'] ?? '', // Valor predeterminado vacío
    'email' => $_POST['email'] ?? '', // Valor predeterminado vacío
    'direccion' => $_POST['direccion'] ?? '', // Valor predeterminado vacío
];

// Llama a la función para sanear el vector de datos
$sanitizedData = sanitizeArray($data);

// Los datos saneados ahora se encuentran en $sanitizedData
// Puedes acceder a ellos de esta manera:
$nombre = $sanitizedData['nombre'];
$telefono = $sanitizedData['telefono'];
$email = $sanitizedData['email'];
$direccion = $sanitizedData['direccion'];

// Puedes usar los valores saneados como sea necesario
// Por ejemplo, imprimirlos o almacenarlos en una base de datos
?>
