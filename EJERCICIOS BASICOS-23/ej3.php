<?php 
-/* Escriba un programa que cada vez que se ejecute muestre
un número diferente comprendidos entre 0 y 10. */ 

$numero_diferente = rand(0, 10);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mostrar numero diferente</title>
</head>
<body>
    <?php echo $numero_diferente ?>
</body>
</html>