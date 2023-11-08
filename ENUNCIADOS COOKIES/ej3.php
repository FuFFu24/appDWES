<!-- Realiza un programa php que cambie el color de fondo de una página ente 5
colores que tu elijas dependiendo del resto de la división entre 5 y número de
visitas efectuadas hasta el momento. Los colores estarán metidos en un array. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    $colores = ['red','blue','green','yellow','orange'];

    // Nombre de la cookie para el contador
    $cookieVisitas = "visitas";

    // Comprueba si la cookie existe
    if (isset($_COOKIE[$cookieVisitas])) {
        $contador = $_COOKIE[$cookieVisitas] + 1;
    } else {
        $contador = 1;
    }

    setcookie($cookieVisitas, $contador, time() + 86400, "/");

    $colorMostrado = $colores[$contador % 5];
    ?>
    <style>
        * {
            background-color: <?php echo "$colorMostrado" ?>;
        }
    </style>
</head>
<body>
    <h1>Cambiar color de pagina</h1>
</body>
</html>