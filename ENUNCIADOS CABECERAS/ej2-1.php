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
        echo '<p style="color: red">La clave es incorrecta, intentelo de nuevo.</p>';
    }
?>
<form action="ej2-2.php" method="post">
    <p>
        <label for="clave">Introduzca una clave (z80): </label>
        <input type="text" name="clave" id="clave">
    </p>
    <p>
        <button type="submit">Confirmar</button>
    </p>
</form>
</body>
</html>