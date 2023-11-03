<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = isset($_POST['usuario']) ? htmlspecialchars(trim(strip_tags($_POST['usuario'])), ENT_QUOTES, "utf-8") : "";
    $edad = isset($_POST['edad']) ? htmlspecialchars(trim(strip_tags($_POST['edad'])), ENT_QUOTES, "utf-8") : "";

    $errores = array();

    $errorUsuario = "";
    $errorEdad = "";
    $errorFile = "";

    $patronUsuario = '/^[A-ZÁÉÍÓÚÑ][a-záéíóúA-ZÁÉÍÓÚÑ]*$/u';
    if (!preg_match($patronUsuario, $usuario)) {
        $errores[] = "Usuario no cumple con las expectativas.\n";
        $errorUsuario = "errorUsuario=1&";
    }

    $patronEdad = '/^\d{1,2}$/';
    if (preg_match($patronEdad, $edad)) {
        $valorNumerico = (int) $edad;
        if ($valorNumerico < 18 || $valorNumerico > 40) {
            $errores[] = "Edad debe estar entre 18 y 40.\n";
            $errorEdad = "errorEdad=2&";
        }
    } else {
        $errores[] = "Edad debe contener un maximo de 2 digitos.\n";
        $errorEdad = "errorEdad=1&";
    }

    if (is_uploaded_file($_FILES['titulo']['tmp_name'])) {
        $nombreDirectorio = "files/";
        $nombreFichero = $_FILES['titulo']['name'];
        $nombreCompleto = $nombreDirectorio.$nombreFichero;
        if (is_file($nombreCompleto)) {
            $idUnico = time();
            $nombreFichero = $idUnico."-".$nombreFichero;
            $nombreCompleto = $nombreDirectorio.$nombreFichero;
        }
    } else {
        $errores[] = "No se ha podido subir el fichero.\n";
        $errorFile = "errorFile=1&";
    } 

    if (!empty($errores)) {
        $ferrores = fopen("errores.txt", "a+");
        foreach ($errores as $key) {
            fwrite($ferrores, $key);
        }
        fclose($ferrores);
        header('Location: index-1.php?'.$errorUsuario.$errorEdad.$errorFile);
    } else {
        move_uploaded_file ($_FILES['titulo']['tmp_name'],$nombreCompleto);
        header("Location: index-1.php");
    }
}
?>