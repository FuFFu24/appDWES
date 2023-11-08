<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Creacion y destruccion de cookies</h2>
    <p>Elija una opcion</p>
    <form action="ej4-2.php" method="post">
        <ul>
            <li>
                Crear una cookie con una duracion de <input type="text" name="duracion" id="duracion"> segundos (entre 1 y 60) <input type="submit" name="Crear" value="Crear">
                <?php
                if (isset($_GET['errorDuracion'])) {
                    if ($_GET['errorDuracion'] == 2) {
                        echo '<p style="color: green">La cookie ha sido creada</p>';
                    } else if ($_GET['errorDuracion'] == 1) {
                        echo '<p style="color: red">Ha introducido mal la duracion</p>';
                    }
                }
                ?>
            </li>
            <li>
                Comprobar la cookie <input type="submit" name="Comprobar" value="Comprobar">
                <?php
                if (isset($_GET['isExiste'])) {
                    if ($_GET['isExiste'] == 1) {
                        echo '<p style="color: green">La cookie existe</p>';
                    } else if ($_GET['isExiste'] == 2) {
                        echo '<p style="color: red">La cookie no existe</p>';
                    }
                }
                ?>
            </li>
            <li>
                Destruir la cookie <input type="submit" name="Destruir" value="Destruir">
                <?php
                if (isset($_GET['isDestruir'])) {
                    if ($_GET['isDestruir'] == 1) {
                        echo '<p style="color: green">La cookie ha sido destruida</p>';
                    } else if ($_GET['isDestruir'] == 2) {
                        echo '<p style="color: red">La cookie no ha sido destruida</p>';
                    }
                }
                ?>
            </li>
        </ul>
    </form>

</body>
</html>