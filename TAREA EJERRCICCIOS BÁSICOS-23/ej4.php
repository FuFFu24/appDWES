<?php
// Generar valores aleatorios para los componentes HSL
$hue1 = rand(0, 360); // Rango de 0 a 360 grados para el matiz
$saturation1 = rand(0, 100); // Rango de 0 a 100 para la saturación
$lightness1 = rand(0, 100); // Rango de 0 a 100 para la luminosidad

$hue2 = rand(0, 360);
$saturation2 = rand(0, 100);
$lightness2 = rand(0, 100);

// Crear representaciones en color HSL
$color1 = "hsl($hue1, $saturation1%, $lightness1%)";
$color2 = "hsl($hue2, $saturation2%, $lightness2%)";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Colores HSL</title>
</head>
<body>
	Color 1: <?php echo $color1; ?>
    <div style="background-color: <?php echo $color1; ?>; width: 200px; height: 40px;">
    </div>
	Color 2: <?php echo $color2; ?>
    <div style="background-color: <?php echo $color2; ?>; width: 200px; height: 40px;">
    </div>
</body>
</html>
