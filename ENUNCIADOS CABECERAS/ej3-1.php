<!-- Escriba un programa que conste de dos páginas y que solicite un
nombre.
 En la primera página se solicita el nombre.
 La segunda página comprueba si se ha escrito algo de texto.
o Si se ha escrito algo de texto, lo muestra.
o Si no se ha escrito ningún texto, al volver
automáticamente a la primera página muestre un aviso. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>FORMULARIO</h2>
    <form action="ej3-2.php" method="post">
        <p>
            <label for="nombre">Escriba su nombre: </label>
            <input type="text" name="nombre" id="nombre">
            <?php
            if (isset($_GET['error'])) {
                echo '<span style="color: red">No ha introducido su nombre, o los caracteres no son los esperados.</span>';
            }
            ?>
        </p>
        <p>
            <button type="submit">Comprobar</button>
            <button type="reset">Borrar</button>
        </p>
    </form>
</body>
</html>