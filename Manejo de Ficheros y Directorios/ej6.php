<!-- Creación de un archivo de información de imágenes de manera que teniendo
imágenes en un directorio de imágenes , cree una página PHP en la cual se
genere un archivo de texto que contenga el nombre y el tamaño de estas
imágenes.
A continuación, copiara estas imágenes en un directorio nuevo que esté al
mismo nivel que el directorio de imágenes. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $directorio = opendir("directorio_imagenes");
    $finfoImagen = fopen("informacion_imagenes.txt", "w+");

    while($archivo = readdir($directorio)) { 
        if(!is_dir($archivo)) {
            $datos = 'Nombre: '.$archivo.' - Tamano: '.filesize('directorio_imagenes/'.$archivo).' bytes.'."\n";
            fwrite($finfoImagen, $datos);
        } 
    }

    echo "<p>Contenido del fichero: <a href='informacion_imagenes.txt'>aqui</a></p>";

    fclose($finfoImagen);
    closedir($directorio);
    ?>
</body>
</html>