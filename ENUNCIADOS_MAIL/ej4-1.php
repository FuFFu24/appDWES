<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ej4-2.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="email">EMail:</label>
        <input type="text" name="email" id="email">
        <br>
        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
        <br>
        <input type="file" name="archivo" id="archivo">
        <br>
        <input type="submit" value="Envia" name="enviar">
    </form>
</body>
</html>