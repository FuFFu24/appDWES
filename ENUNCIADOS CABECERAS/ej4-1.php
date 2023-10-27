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
    <form action="ej4-2.php" method="post">
        <p>
            <label for="edad">Escriba su edad (entre 18 y 130 años): </label>
            <input type="text" name="edad" id="edad">
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 1) {
                    echo '<span style="color: red">No ha introducido nada</span>';
                } elseif ($_GET['error'] == 2) {
                    echo '<span style="color: red">No ha introducido un número</span>';
                } elseif ($_GET['error'] == 3) {
                    echo '<span style="color: red">No ha introducido un número entre 18 y 130</span>';
                }
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