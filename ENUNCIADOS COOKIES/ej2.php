<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>¿Cuanta gente a visitado nuestra pagina?</p>
    <?php
    setcookie('visitas', '1', time() + 86400, '/');
    if (isset($_COOKIE['visitas'])) {
        $mensage = $_COOKIE['visitas'] + 1;
        setcookie('visitas', ''.$mensage.'', time() + 86400, '/');
        echo $mensage;
    } else {
        echo $mensage = 1;
    }
    ?>
</body>
</html>