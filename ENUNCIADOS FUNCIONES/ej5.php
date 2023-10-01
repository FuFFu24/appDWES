<!-- Dada una matriz $A cuadrada de NxN, hacer una función que cambie el orden de las filas. La
primera fila pasa a ser la última, la segunda la penúltima etc. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ej5.php" method="post">
        <p>Filas <input type="number" name="filas" id="filas"></p>
        <p>Columnas <input type="number" name="columnas" id="columnas"></p>
        <p>
            <button type="submit">Enviar</button>
            <button type="reset">Reset</button>
        </p>
    </form>
    <form action="ej5.php" method="post">
        <table border="1">
            <?php
            $filas = $_REQUEST['filas'];
            $columnas = $_REQUEST['columnas'];
            // Generar la matriz de inputs
            for ($i = 0; $i < $filas; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $columnas; $j++) {
                    echo "<td><input type='number' name='puntuaciones[$i][$j]' required></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
        <p>
            <button type="submit">Enviar</button>
            <button type="reset">Reset</button>
        </p>
    </form>
    <?php
    if(isset($_REQUEST['puntuaciones'])){
        $puntuaciones = $_REQUEST['puntuaciones'];
        echo "<table border='1'>";
        foreach ($puntuaciones as $fila) {
            echo "<tr>";
            foreach ($fila as $valor) {
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    if (isset($_REQUEST['puntuaciones'])) {
        $puntuaciones = $_REQUEST['puntuaciones'];
    
        // Invertir las filas de la matriz
        $puntuacionesInvertidas = array_reverse($puntuaciones);
    
        echo "<table border='1'>";
        foreach ($puntuacionesInvertidas as $fila) {
            echo "<tr>";
            foreach ($fila as $valor) {
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
