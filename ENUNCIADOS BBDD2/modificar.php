<?php
//Datos de la base de datos
$usuario = "root";
$password = "";
$servidor = "localhost";
$basededatos = "registros";

// creación de la conexión a la base de datos con mysql
$conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");

$crearDatabase = "CREATE DATABASE IF NOT EXISTS registros";

mysqli_query( $conexion, $crearDatabase ) or die ( "Algo ha ido mal en la consulta a la base de datos (crearDatabase)");

$usarDatabase = "USE registros";

mysqli_query( $conexion, $usarDatabase ) or die ( "Algo ha ido mal en la consulta a la base de datos (usarDatabase)");

// establecer y realizar consulta. guardamos en variable.
$consulta = "SELECT * FROM usuario";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos (consulta)");

// Motrar el resultado de los registro de la base de datos
// Encabezado de la tabla

echo '<form action="modificar2.php" method="post">';
echo "<table>";
echo "<tr>";
echo "<th>MODIFICAR</th>";
echo "<th>USUARIO</th>";
echo "<th>APELLIDOS</th>";
echo "</tr>";
// Bucle while que recorre cada registro y muestra cada campo en la tabla.
while ($columna = mysqli_fetch_array( $resultado ))
{
echo "<tr>";
echo "<td><input type='radio' name='modificar' id='". $columna['id'] ."' value='". $columna['id'] ."'></td><td>" . $columna['nombre'] . "</td><td>" . $columna['apellido'] . "</td>";
echo "</tr>";
}
echo "</table>"; // Fin de la tabla
echo '<p><input type="submit" value="Enviar" name="enviar"></p>';
echo "</form>";

// cerrar conexión de base de datos
mysqli_close( $conexion );
?>
