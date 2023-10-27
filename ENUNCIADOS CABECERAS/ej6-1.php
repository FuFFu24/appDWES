<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h3 {
            text-align: center;
            color: blue;
        }

        table {
            border: 1px solid black;
            margin: 10px;
        }

        table tr th {
            background-color: purple;
            padding: 10px 20px 10px 20px;
        }

        table tr td {
            background-color: yellow;
            padding: 10px 20px 10px 20px;
        }
    </style>
</head>
<body>
    <h3>Agencia de viajes travelmas</h3>
    <div>
        <table>
            <tr>
                <th>nombre</th>
                <th>destino</th>
                <th>duracion</th>
                <th>salida</th>
            </tr>
            <?php
            $fviajes = fopen("viajes.txt", "r");

            while ($linea = fgets($fviajes)) {
                $variable = explode(":", $linea);
                echo "<tr>";
                foreach ($variable as $key) {
                    echo "<td>$key</td>";
                }
                echo "</tr>";
            }

            fclose($fviajes);
            ?>
        </table>
    </div>
    <div>
        <table>
            <form action="ej6-2.php" method="post">
                <tr>
                    <td><label for="nombre">Introduzca el nombre del circuito</label></td>
                    <td><input type="text" name="nombre" id="nombre" value="<?php echo isset($_GET['error']) ? $_GET['nombre'] : ''; ?>"></td>
                    <?php
                    if (isset($_GET['error1']) && $_GET['error1'] == 1) {
                        echo '<p style="color: red">No ha introducido nombre</p>';
                    }
                    ?>
                </tr>
                <tr>
                    <td><label for="destino">Introduzca el destino</label></td>
                    <td><input type="text" name="destino" id="destino" value="<?php echo isset($_GET['error']) ? $_GET['destino'] : ''; ?>"></td>
                    <?php
                    if (isset($_GET['error2']) && $_GET['error2'] == 2) {
                        echo '<p style="color: red">No ha introducido destino</p>';
                    }
                    ?>
                </tr>
                <tr>
                    <td><label for="duracion">Introduzca la duracion</label></td>
                    <td><input type="text" name="duracion" id="duracion" value="<?php echo isset($_GET['error']) ? $_GET['duracion'] : ''; ?>"></td>
                    <?php
                    if (isset($_GET['error3']) && $_GET['error3'] == 3) {
                        echo '<p style="color: red">No ha introducido duracion</p>';
                    }
                    ?>
                </tr>
                <tr>
                    <td><label for="dias">Introduzca dias de salida</label></td>
                    <td><input type="text" name="dias" id="dias" value="<?php echo isset($_GET['error']) ? $_GET['dias'] : ''; ?>"></td>
                    <?php
                    if (isset($_GET['error4']) && $_GET['error4'] == 4) {
                        echo '<p style="color: red">No ha introducido dias</p>';
                    }
                    ?>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit">Enviar</button></td>
                </tr>
            </form>
        </table>
    </div>
</body>
</html>