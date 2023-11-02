<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 10px;
        }
    </style>
</head>
<body>
    <form action="index_2.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre">
            <?php
            if (isset($_GET['error1'])) {
                if ($_GET['error1'] == 1) {
                    echo "<p style='color: red'>El nombre no cumple con las expectativas.</p>";
                }
            }
            ?>
        </p>
        <p>
            <label for="direccion">Direccion: </label>
            <input type="text" name="direccion" id="direccion">
            <?php
            if (isset($_GET['error2'])) {
                if ($_GET['error2'] == 2) {
                    echo "<p style='color: red'>La direccion no cumple con las expectativas.</p>";
                }
            }
            ?>
        </p>
        <p>
            <label for="email">Email: </label>
            <input type="email" name="email" id="email">
            <?php
            if (isset($_GET['error3'])) {
                if ($_GET['error3'] == 3) {
                    echo "<p style='color: red'>El email no cumple con las expectativas.</p>";
                }
            }
            ?>
        </p>
        <p>
            <label for="adjuntar">Adjuntar: </label>
            <input type="file" name="adjuntar[]" id="adjuntar" multiple="multiple">
            <?php
            if (isset($_GET['error4'])) {
                if ($_GET['error4'] == 4) {
                    echo "<p style='color: red'>El archivo no cumple con las expectativas.</p>";
                }
            }
            ?>
        </p>
        <p>
            <button type="submit">Enviar</button>
        </p>
    </form>
</body>
</html>