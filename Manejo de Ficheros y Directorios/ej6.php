<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$directorioImagenes = "directorio_imagenes/";  // Reemplaza con la ruta de tu directorio de imágenes

// Obtener una lista de archivos en el directorio de imágenes
$archivos = scandir($directorioImagenes);

// Ruta para el archivo de información
$archivoInformacion = "informacion_imagenes.txt";

// Abre el archivo de información para escritura
$archivo = fopen($archivoInformacion, "w");

if ($archivo) {
    foreach ($archivos as $archivoNombre) {
        // Excluye las entradas "." y ".." (directorios) y verifica si es un archivo
        if ($archivoNombre != "." && $archivoNombre != ".." && is_file($directorioImagenes . $archivoNombre)) {
            $tamano = filesize($directorioImagenes . $archivoNombre);
            $linea = "Nombre: " . $archivoNombre . " - Tamaño: " . $tamano . " bytes\n";
            fwrite($archivo, $linea);
        }
    }
    fclose($archivo);
    echo "Archivo de información generado correctamente.";
} else {
    echo "No se pudo abrir el archivo de información para escritura.";
}
?>
<?php
$directorioImagenes = "directorio_imagenes/";  // Directorio de origen
$directorioNuevo = "directorio_nuevo/";        // Directorio de destino

// Obtener una lista de archivos en el directorio de imágenes
$archivos = scandir($directorioImagenes);

if (!is_dir($directorioNuevo)) {
    mkdir($directorioNuevo);
}

foreach ($archivos as $archivoNombre) {
    if ($archivoNombre != "." && $archivoNombre != ".." && is_file($directorioImagenes . $archivoNombre)) {
        copy($directorioImagenes . $archivoNombre, $directorioNuevo . $archivoNombre);
    }
}

echo "Imágenes copiadas al directorio nuevo.";
?>
</body>
</html>