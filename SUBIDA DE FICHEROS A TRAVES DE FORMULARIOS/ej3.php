<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y sanear los datos
    $vivienda = isset($_POST['vivienda']) ? htmlspecialchars($_POST['vivienda']) : '';
    $zona = isset($_POST['zona']) ? htmlspecialchars($_POST['zona']) : '';
    $direccion = isset($_POST['direccion']) ? htmlspecialchars($_POST['direccion']) : '';
    $dormitorios = isset($_POST['dormitorios']) ? htmlspecialchars($_POST['dormitorios']) : '';
    $precio = isset($_POST['precio']) ? floatval(htmlspecialchars($_POST['precio'])) : '';
    $tamano = isset($_POST['tamano']) ? floatval(htmlspecialchars($_POST['tamano'])) : '';

    $extras = isset($_POST['extras']) ? array_map('htmlspecialchars', $_POST['extras']) : [];
    $observaciones = isset($_POST['observaciones']) ? htmlspecialchars($_POST['observaciones']) : '';

    // Validación de datos
    $errores = array();

    if (empty($direccion)) {
        $errores[] = "La dirección es obligatoria.";
    }

    if (empty($dormitorios)) {
        $errores[] = "Debes seleccionar el número de dormitorios.";
    }

    if (empty($precio) || !is_numeric($precio) || $precio <= 0) {
        $errores[] = "El precio es inválido.";
    }

    if (empty($tamano) || !is_numeric($tamano) || $tamano <= 0) {
        $errores[] = "El tamaño es inválido.";
    }

    // Validación de la subida de la foto
    
    if (is_uploaded_file ($_FILES['foto']['tmp_name'])) {
        $nombreDirectorio = "img/";
        $nombreFichero = $_FILES['foto']['name'];
        $nombreCompleto = $nombreDirectorio.$nombreFichero;
        if (is_file($nombreCompleto)) {
            $idUnico = time();
            $nombreFichero = $idUnico."-".$nombreFichero;
            $nombreCompleto = $nombreDirectorio.$nombreFichero;
        }
        move_uploaded_file ($_FILES['foto']['tmp_name'],$nombreCompleto);
            echo "Fichero subido con el nombre: $nombreFichero<br>";
            echo '<img src="'.$nombreCompleto.'" alt="">';
    } else {
        $errores[] = "No se ha podido subir el fichero";
    }   

    // Procesar los datos y la foto (por ejemplo, guardar en una base de datos y mover la foto a una carpeta)
    // Aquí puedes agregar tu lógica para guardar los datos en una base de datos y mover la foto a una carpeta

    if (empty($errores)) {
        // Procesar los datos (puedes guardarlos en una base de datos)
        // y mostrar un mensaje de éxito
        echo "Datos del formulario procesados con éxito. La foto se ha subido correctamente.";
        echo "$direccion";
    } else {
        // Mostrar errores en pantalla
        echo "Errores en el formulario:<br>";
        foreach ($errores as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
?>
