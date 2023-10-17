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
    $errores = array();
    
    // Recogida de datos
    $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
    $texto = isset($_POST["texto"]) ? $_POST["texto"] : "";
    $categoria = isset($_POST["categoria"]) ? $_POST["categoria"] : "";
    
    // Verificación de existencia
    if (empty($titulo)) {
        $errores[] = "El campo Titulo es obligatorio.";
    }
    if (empty($texto)) {
        $errores[] = "El campo Texto es obligatorio.";
    }
    
    // Validación de datos
    if (strlen($titulo) > 255) {
        $errores[] = "El campo Titulo no debe exceder los 255 caracteres.";
    }
    if (strlen($texto) > 1000) {
        $errores[] = "El campo Texto no debe exceder los 1000 caracteres.";
    }
    
    // Saneamiento (opcional)
    $titulo = htmlspecialchars($titulo, ENT_QUOTES);
    $texto = htmlspecialchars($texto, ENT_QUOTES);
    
    // Procesamiento de la imagen
    if (is_uploaded_file ($_FILES['imagen']['tmp_name'])) {
        $nombreDirectorio = "img/";
        $nombreFichero = $_FILES['imagen']['name'];
        $nombreCompleto = $nombreDirectorio.$nombreFichero;
        if (is_file($nombreCompleto)) {
            $idUnico = time();
            $nombreFichero = $idUnico."-".$nombreFichero;
            $nombreCompleto = $nombreDirectorio.$nombreFichero;
        }
        move_uploaded_file ($_FILES['imagen']['tmp_name'],$nombreCompleto);
            echo "Fichero subido con el nombre: $nombreFichero<br>";
            echo '<img src="'.$nombreCompleto.'" alt="">';
    } else {
        print ("No se ha podido subir el fichero\n");
    }
    
    if (!empty($errores)) {
        echo "Errores en el formulario:<br>";
        foreach ($errores as $error) {
            echo "<span style='color: red;'>$error</span><br>";
        }
    } else {
        echo "<p>Formulario procesado con éxito.</p>";
        echo "<p>Titulo: $titulo</p>";
        echo "<p>Texto: $texto</p>";
        echo "<p>Categoria: $categoria</p>";
        echo "<p>Imagen: <a href='$nombreCompleto'>$nombreFichero</a></p>";
    }
}
?>

</body>
</html>