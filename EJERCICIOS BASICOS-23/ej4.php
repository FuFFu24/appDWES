<?php 
-/* Escriba un programa que cada vez que se ejecute muestre
tres círculos solapados, cada uno de un color elegido al azar
(uno rojo, uno verde y uno azul). El ejemplo siguiente muestra
intensidades de color entre 64 y 255. */ 

$numero_diferente = rand(0, 10);
?>

<!DOCTYPE html>
<html>
<head>
	<style>
		.circulo1{
			background-color: blue;
			opacity: 0.8;
			width: 100px;
			height: 100px;
			border-radius: 50%;
			position: relative;
		}
		.circulo2{
			background-color: green;
			opacity: 0.8;
			width: 100px;
			height: 100px;
			border-radius: 50%;
			position: relative;
			top: -100px;
			left: 50px;
		}
		.circulo3{
			background-color: red;
			opacity: 0.8;
			width: 100px;
			height: 100px;
			border-radius: 50%;
			position: relative;
			top: -150px;
			left: 25px;
		}
	</style>
    <title>Mostrar numero diferente</title>
</head>
<body>
    <div class="circulo1"></div>
	<div class="circulo2"></div>
	<div class="circulo3"></div>
</body>
</html>