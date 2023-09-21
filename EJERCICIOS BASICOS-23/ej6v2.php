<!-- Escriba un programa que cada vez que se ejecute muestre
dos tiradas de dados entre 1 y 6, al azar, e indique el
resultado total. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tirada de Dados</title>
    <link rel="stylesheet" href="borrar.css">
</head>
<body>
    <?php
    // Realiza dos tiradas de dados aleatorias
    $tirada1 = rand(1, 6);
    $tirada2 = rand(1, 6);

    // Calcula el resultado total
    $total = $tirada1 + $tirada2;
    ?>

    <div>
        <div class="dado">
            <?php
            switch ($tirada1) {
                case 1:
                    echo '<div class="punto mediox medioy"></div>';
                    break;
                case 2:
                    # code...
                    break;
                case 3:
                    # code...
                    break;
                case 4:
                    # code...
                    break;
                case 5:
                    # code...
                    break;
                case 6:
                    # code...
                    break;
                default:
                    # code...
                    break;
            }
            ?>
        </div>
        <div class="dado"></div>
    </div>
    <?php
    echo "<p>Total: <div class='resultado'>$total</div></p>";
    ?>
</body>
</html>
