<?php 
-/* Realiza un programa en php que cada vez que se actualiza la
página cambie el tamaño de la letra del saludo, tal y como se
muestra. */ 

$tamanio_fuente = rand(10, 50);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cambiar Tamaño de Fuente</title>
</head>
<body>
    <h1 style= "font-size: <?php echo $tamanio_fuente ?>px;">¡Hola!</h1>
</body>
</html>