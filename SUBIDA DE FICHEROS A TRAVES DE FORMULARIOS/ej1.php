<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $edad = $_POST["edad"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];

    // Validación de datos
    $errores = array();

    if (empty($nombre)) {
        $errores[] = "El campo Nombre es obligatorio.";
    }

    if (empty($apellidos)) {
        $errores[] = "El campo Apellidos es obligatorio.";
    }

    if (empty($edad) || !is_numeric($edad) || $edad < 0) {
        $errores[] = "El campo Edad debe ser un número válido y mayor o igual a cero.";
    }

    if (empty($telefono) || !preg_match("/^\d{9}$/", $telefono)) {
        $errores[] = "El campo Teléfono debe contener 9 dígitos numéricos.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El campo Email debe ser una dirección de correo válida.";
    }

    // Validación del archivo de imagen (foto)
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
    } else {
        print ("No se ha podido subir el fichero\n");
    }

    if (!empty($errores)) {
        // Mostrar errores en pantalla
        echo "Errores en el formulario:<br>";
        foreach ($errores as $error) {
            echo "<span style='color: red;'>$error</span><br>";
        }
    }
}
?>

</body>
</html>