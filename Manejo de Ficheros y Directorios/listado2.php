<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$directorio = __DIR__;  // Obtener la ruta del directorio actual
$archivos = array_filter(scandir($directorio), function ($item) use ($directorio) {
    $rutaCompleta = $directorio . DIRECTORY_SEPARATOR . $item;
    return is_file($rutaCompleta);  // Filtrar solo archivos, no directorios
});

echo "<h1>Archivos en el directorio:</h1>";
echo "<ul>";
foreach ($archivos as $archivo) {
    $rutaCompleta = $directorio . DIRECTORY_SEPARATOR . $archivo;
    $fechaModificacion = date("Y-m-d H:i:s", filemtime($rutaCompleta));
    $tamano = filesize($rutaCompleta);

    echo "<li>$archivo (Última modificación: $fechaModificacion, Tamaño: $tamano bytes)</li>";
}
echo "</ul>";
?>

</body>
</html>