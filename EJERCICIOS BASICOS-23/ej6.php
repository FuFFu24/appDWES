<!-- Escriba un programa que cada vez que se ejecute muestre
una tirada de dados entre 1 y 6, al azar, y coloque la ficha en
la posición correspondiente. -->

<?php
// Realiza una tirada de dados aleatoria
$dado = rand(1, 6);

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
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Avance de ficha.
    Variables. Sin formularios.
    Ejercicios. PHP. Bartolomé Sintes Marco. www.mclibre.org
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>

.dice {
            display: inline-block;
            margin: 10px;
        }

        .die {
            width: 100px;
            height: 100px;
            border: 4px solid #000;
            position: relative;
            border-radius: 10px;
            background-color: lightgrey;
        }

        .dot {
            width: 16px;
            height: 16px;
            background-color: #000;
            border-radius: 50%;
            position: absolute;
        }

        .top-left {
            top: 10px;
            left: 10px;
        }

        .top-right {
            top: 10px;
            right: 10px;
        }

        .middle {
            top: 42px;
            left: 42px;
        }

        .middle-left {
            top: 42px;
            left: 10px;
        }

        .middle-right {
            top: 42px;
            right: 10px;
        }

        .top-middle {
            top: 10px;
            left: 42px;
        }

        .bottom-left {
            bottom: 10px;
            left: 10px;
        }

        .bottom-right {
            bottom: 10px;
            right: 10px;
        }

        .bottom-middle {
            bottom: 10px;
            left: 42px;
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

    // Dibuja los dados en CSS
    echo '<div class="dice">' . drawDice($dado) . '</div>';
    ?>

<p>
    <svg version="1.1" width="620" height="120" viewBox="-15 -15 620 120" style="background-color: white;" font-family="sans-serif">
      <rect x="0" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="none" />
      <text x="50" y="80" text-anchor="middle" font-size="80" fill="lightgray">1</text>
      <rect x="100" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="none" />
      <text x="150" y="80" text-anchor="middle" font-size="80" fill="lightgray">2</text>
      <rect x="200" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="none" />
      <text x="250" y="80" text-anchor="middle" font-size="80" fill="lightgray">3</text>
      <rect x="300" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="none" />
      <text x="350" y="80" text-anchor="middle" font-size="80" fill="lightgray">4</text>
      <rect x="400" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="none" />
      <text x="450" y="80" text-anchor="middle" font-size="80" fill="lightgray">5</text>
      <rect x="500" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="none" />
      <text x="550" y="80" text-anchor="middle" font-size="80" fill="lightgray">6</text>
      <?php
      switch ($dado) {
        case 1:
            echo '<circle cx="50" cy="50" r="30" stroke="black" stroke-width="2" fill="red" />';
            break;
        case 2:
            echo '<circle cx="150" cy="50" r="30" stroke="black" stroke-width="2" fill="red" />';
            break;
        case 3:
            echo '<circle cx="250" cy="50" r="30" stroke="black" stroke-width="2" fill="red" />';
            break;
        case 4:
            echo '<circle cx="350" cy="50" r="30" stroke="black" stroke-width="2" fill="red" />';
            break;
        case 5:
            echo '<circle cx="450" cy="50" r="30" stroke="black" stroke-width="2" fill="red" />';
            break;
        case 6:
            echo '<circle cx="550" cy="50" r="30" stroke="black" stroke-width="2" fill="red" />';
            break;
        default:
            break;
      }
      ?>
    </svg>
  </p>
</body>
</html>

