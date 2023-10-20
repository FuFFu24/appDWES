<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $gestor = fopen("ejemplo.php", "r");
    $contenido = '';
    echo $contenido .= fread($gestor, filesize("ejemplo.php"));
    fclose($gestor);
    echo filesize("ejemplo.php");
    $a = fopen("fich_salida.txt", "w+");
    echo fwrite ( $a, $contenido);
    fclose($a);
    ?>
</body>
</html>