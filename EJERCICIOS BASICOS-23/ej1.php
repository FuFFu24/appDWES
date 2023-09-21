<?php 
-/* Hacer un programa que sume dos variables que almacenan
dos números distintos y muestre el resultado, indicando que
operación se ha hecho, y de que números partimos. */ 

$numero1 = 5;
$numero2 = 3;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sumar dos variables</title>
</head>
<body>
	Numero 1: <?php echo $numero1 ?>
	<br>
	Numero 2: <?php echo $numero2 ?>
	<?php print "<p>Suma: $numero1 + $numero2 = " . ($numero1 + $numero2) . "</p>"; ?>
</body>
</html>