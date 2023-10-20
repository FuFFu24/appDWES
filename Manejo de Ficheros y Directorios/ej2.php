<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $fcontador = fopen("contador.txt", "r+");
    $fdatos = fgets($fcontador);
    // rewind($fcontador);
    $suma = $fdatos + 1;
    fseek($fcontador, 0);
    fwrite($fcontador, $suma);
    fclose($fcontador);
    ?>
</body>
</html>