<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>¿ACEPTA COOKIES?</h1>
    <?php
    if (isset($_COOKIE['test_cookie'])) {
        $message = "¡El navegador acepta cookies!";
    } else {
        setcookie('test_cookie', 'test', time() + 3600, '/');
        if (isset($_COOKIE['test_cookie'])) {
            $message = "¡El navegador acepta cookies!";
            setcookie('test_cookie', '', time() - 3600, '/');
        } else {
            $message = "El navegador no acepta cookies.";
        }
    }
    ?>
    <p><?php echo $message; ?></p>
</body>
</html>