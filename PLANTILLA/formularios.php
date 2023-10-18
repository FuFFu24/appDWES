<!-- 
1. Recoger y sanear los datos.
2. Crear variable para guardar errores.
3. Verificar datos.
4. Validar foto.
5. Mostrar datos o errores.
-->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y sanear los datos
    // Texto ()
    $texto = isset($_POST['texto']) ? htmlspecialchars(trim(strip_tags($_POST['texto'])),ENT_QUOTES,"utf-8") : '';
    // Numero (entero y decimal)
    $entero = isset($_POST['entero']) ? intval(htmlspecialchars(trim(strip_tags($_POST['entero'])),ENT_QUOTES,"utf-8")) : '';
    $decimal = isset($_POST['decimal']) ? floatval(htmlspecialchars(trim(strip_tags($_POST['decimal'])),ENT_QUOTES,"utf-8")) : '';
    // Checkbox array
    $checkbox = [];
    if (isset($_POST['checkbox']) && is_array($_POST['checkbox'])) {
        foreach ($_POST['checkbox'] as $value) {
            // Realizar validación si es necesario
            // Por ejemplo, verificar si $value cumple con ciertos criterios antes de aplicar htmlspecialchars()
            
            // Aplicar htmlspecialchars() a cada elemento del array
            $checkbox[] = htmlspecialchars($value, ENT_QUOTES, 'utf-8');
        }
    }

    // Sanear los datos por separado
    $texto = htmlspecialchars(trim(strip_tags($texto)),ENT_QUOTES,"utf-8");
    
    // Validación de datos - guardar errores
    $errores = array();

    // Verificar si se ha introducido algo
    if (empty($texto)) {
        $errores[] = "El texto es obligatorio (esta vacio).";
    }

    // Validación de nombre y apellidos (existencia y longitud)
    if (empty($nombre) || strlen($nombre) > 50) {
        $errores[] = "El campo Nombre es inválido.";
    }

    if (empty($apellidos) || strlen($apellidos) > 100) {
        $errores[] = "El campo Apellidos es inválido.";
    }

    // Validación de edad (existencia y rango)
    if (empty($edad) || !is_numeric($edad) || $edad < 0 || $edad > 120) {
        $errores[] = "El campo Edad es inválido.";
    }

    // Validación de teléfono (existencia y formato)
    if (empty($telefono) || !preg_match("/^\d{9}$/", $telefono)) {
        $errores[] = "El campo Teléfono es inválido.";
    }

    // Validación de email (existencia y formato)
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El campo Email es inválido.";
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
            // echo "<img src='$nombreCompleto' alt=''>";
    } else {
        print ("No se ha podido subir el fichero\n");
    }   

    // Procesar los datos y la foto (por ejemplo, guardar en una base de datos y mover la foto a una carpeta)
    // Aquí puedes agregar tu lógica para guardar los datos en una base de datos y mover la foto a una carpeta

    if (empty($errores)) {
        // Procesar los datos (puedes guardarlos en una base de datos)
        // y mostrar un mensaje de éxito
        echo "Datos del formulario procesados con éxito. La foto se ha subido correctamente.";
    } else {
        // Mostrar errores en pantalla
        echo "Errores en el formulario:<br>";
        foreach ($errores as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
?>
