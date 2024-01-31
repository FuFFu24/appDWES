<?php include("funciones.php");
    comprobarSesion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="alta_2.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="dni">DNI:</label>
            <input type="text" name="dni" id="dni">
        </p>
        <p>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">
        </p>
        <p>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos">
        </p>
        <p>
            <label for="direccion">Direccion:</label>
            <input type="text" name="direccion" id="direccion">
        </p>
        <p>
            <label for="telefono">Telefono:</label>
            <input type="text" name="telefono" id="telefono">
        </p>
        <p>
            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto">
        </p>
        <p>
            <input type="submit" value="Enviar" name="submit">
            <input type="reset" value="Reiniciar">
        </p>
    </form>
</body>
</html>