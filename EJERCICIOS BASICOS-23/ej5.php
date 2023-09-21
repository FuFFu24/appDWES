<!-- Escriba un programa que cada vez que se ejecute muestre
dos tiradas de dados entre 1 y 6, al azar, e indique el
resultado total. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tirada de Dados</title>
    <style>
        .dice {
            display: inline-block;
            margin: 10px;
        }

        .die {
            width: 60px;
            height: 60px;
            border: 4px solid #000;
            position: relative;
            border-radius: 10px;
            background-color: lightgrey;
        }

        .dot {
            width: 12px;
            height: 12px;
            background-color: #000;
            border-radius: 50%;
            position: absolute;
        }

        .top-left {
            top: 5px;
            left: 5px;
        }

        .top-right {
            top: 5px;
            right: 5px;
        }

        .middle {
            top: 24px;
            left: 24px;
        }

        .middle-left {
            top: 24px;
            left: 5px;
        }

        .middle-right {
            top: 24px;
            right: 5px;
        }

        .top-middle {
            top: 5px;
            left: 24px;
        }

        .bottom-left {
            bottom: 5px;
            left: 5px;
        }

        .bottom-right {
            bottom: 5px;
            right: 5px;
        }

        .bottom-middle {
            bottom: 5px;
            left: 24px;
        }

        .resultado {
            display: inline-block;
            margin: 10px;
            width: 60px;
            height: 60px;
            border: 1px solid #000;
        }
    </style>
</head>
<body>
    <?php
    // Realiza dos tiradas de dados aleatorias
    $tirada1 = rand(1, 6);
    $tirada2 = rand(1, 6);

    // Calcula el resultado total
    $total = $tirada1 + $tirada2;

    // Dibuja los dados en CSS
    echo '<div class="dice">' . drawDice($tirada1) . '</div>';
    echo '<div class="dice">' . drawDice($tirada2) . '</div';

    // Función para dibujar un dado en CSS
    function drawDice($number) {
        $dice = '<div class="die">';

        if ($number == 1) {
            $dice .= '<div class="dot middle"></div>';
        } elseif ($number == 2) {
            $dice .= '<div class="dot top-left"></div>';
            $dice .= '<div class="dot bottom-right"></div>';
        } elseif ($number == 3) {
            $dice .= '<div class="dot top-left"></div>';
            $dice .= '<div class="dot middle"></div>';
            $dice .= '<div class="dot bottom-right"></div>';
        } elseif ($number == 4) {
            $dice .= '<div class="dot top-left"></div>';
            $dice .= '<div class="dot top-right"></div>';
            $dice .= '<div class="dot bottom-left"></div>';
            $dice .= '<div class="dot bottom-right"></div>';
        } elseif ($number == 5) {
            $dice .= '<div class="dot top-left"></div>';
            $dice .= '<div class="dot top-right"></div>';
            $dice .= '<div class="dot middle"></div>';
            $dice .= '<div class="dot bottom-left"></div>';
            $dice .= '<div class="dot bottom-right"></div>';
        } elseif ($number == 6) {
            $dice .= '<div class="dot middle-left"></div>';
            $dice .= '<div class="dot middle-right"></div>';
            $dice .= '<div class="dot top-left"></div>';
            $dice .= '<div class="dot top-right"></div>';
            $dice .= '<div class="dot bottom-left"></div>';
            $dice .= '<div class="dot bottom-right"></div>';
        }

        $dice .= '</div>';
        return $dice;
    }

    // Imprime los resultados
    echo "<p>Total: <div class='resultado'>$total</div></p>";
    ?>
</body>
</html>
