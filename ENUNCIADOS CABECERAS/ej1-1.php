<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
    if (isset($_GET['error'])) {
        echo '<p style="color: red">Introdujo direccion incorrecta</p>';
    }
?>
    <form action="ej1-2.php" method="post">
        <p>Introduzca una direccion de un sitio web</p>
        <p>
            <label for="url">(ej http://www.google.com)</label>
            <input type="text" name="url" id="url">
        </p>
        <p>
            <button type="submit">Redireccionar</button>
        </p>
    </form>
</body>

</html>