<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_POST['nombre']) ? htmlspecialchars(trim(strip_tags($_POST['nombre'])), ENT_QUOTES, "utf-8") : "";
    $direccion = isset($_POST['direccion']) ? htmlspecialchars(trim(strip_tags($_POST['direccion'])), ENT_QUOTES, "utf-8") : "";
    $email = isset($_POST['email']) ? htmlspecialchars(trim(strip_tags($_POST['email'])), ENT_QUOTES, "utf-8") : "";

    $errores = [];

    $patronNombre = '/^[A-ZÁÉÍÓÚÑ][a-záéíóúA-ZÁÉÍÓÚÑ\-\s]+$/u';
    $patronDireccion = '/^(Calle|Avenida|Plaza)\s[a-zA-ZÁÉÍÓÚÑ0-9\s\-]+$/u';

    $errorNombre = "";
    $errorDireccion = "";
    $errorEmail = "";
    $errorFichero = "";

    if (!preg_match($patronNombre, $nombre) || empty($nombre)) {
        $errores[] = "El nombre no cumple con las expectativas.\n";
        $errorNombre = "error1=1&";
    }
    if (!preg_match($patronDireccion, $direccion) || empty($direccion)) {
        $errores[] = "La direccion no cumple con las expectativas.\n";
        $errorDireccion = "error2=2&";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)) {
        $errores[] = "El email no cumple con las expectativas.\n";
        $errorEmail = "error3=3&";
    }

    $nombreFicheros = [];
    $nombreCompletos = [];

    if (isset($_FILES['adjuntar']) && is_array($_FILES['adjuntar']['tmp_name']) && !empty($_FILES['adjuntar']['tmp_name'])) {
        if (!is_dir("./ficheros")) {
            mkdir("./ficheros");
        }
        $nombreDirectorio = "ficheros/";

        for ($i = 0; $i < count($_FILES['adjuntar']['tmp_name']); $i++) {
            $nombreFichero = $_FILES['adjuntar']['name'][$i];
            $nombreCompleto = $nombreDirectorio . $nombreFichero;

            if (is_file($nombreCompleto)) {
                $idUnico = time();
                $nombreFichero = $idUnico . "-" . $nombreFichero;
                $nombreCompleto = $nombreDirectorio . $nombreFichero;
            }

            $nombreFicheros[] = $nombreFichero;
            $nombreCompletos[] = $nombreCompleto;
        }
    } else {
        $errores[] = "No se han seleccionado archivos para subir.\n";
        $errorFichero = "error4=4&";
    }

    if (!empty($errores)) {
        if (!is_dir("./errores")) {
            mkdir("./errores");
        }
        $ferrores = fopen("./errores/errores.txt", "c");
        foreach ($errores as $key) {
            fwrite($ferrores, $key);
        }
        fclose($ferrores);
        header('Location: index_1.php?' . $errorNombre . $errorDireccion . $errorEmail . $errorFichero);
    } else {
        if (is_file("./errores/errores.txt")) {
            unlink("./errores/errores.txt");
        }
        for ($i = 0; $i < count($nombreFicheros); $i++) { 
            move_uploaded_file($_FILES['adjuntar']['tmp_name'][$i], $nombreCompletos[$i]);
        }
        header("Location: index_1.php");
    }
}
?>
