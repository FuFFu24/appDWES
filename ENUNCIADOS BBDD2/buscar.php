<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="buscarValidar.php" method="post">
        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre">
        </p>
        <p>
            <label for="apellidos">Apellidos: </label>
            <input type="text" name="apellidos" id="apellidos">
        </p>
        <p>
            <input type="submit" value="Enviar" name="enviar">
        </p>
    </form>
</body>
</html>