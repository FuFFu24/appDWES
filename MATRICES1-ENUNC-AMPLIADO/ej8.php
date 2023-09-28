<!-- Almacena dentro de una misma tabla el nombre, moneda antigua y
lengua hablada en los países siguientes: España, peseta, catellano,
Italia lira, italiano, Francia, francés, franco, Reino Unido, Inglés, Libra,
Alemania, alemán, marco.
Para hacerlo emplea un array llamado país que vendrá definido por
estas tres características que utilizarás como índices. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    
    /* $paises = array('Nombre' => array('España','Francia','Reino Unido','Alemania'),
        'Lengua' => array('Castellano','Frances','Ingles','Aleman'),
        'Moneda' => array('Peseta','Franco','Libra','Marco')
    );
    
    echo '<table>';
    foreach ($paises as $key => $value) {
        echo '<thead>
            <tr>
                <td colspan="3">PAISES MONEDAS E IDIOMA OFICIAL</td>
            </tr>
            <tr>
                <th>'.$key.'</th>
                <th>'.$key.'</th>
                <th>'.$key.'</th>
            </tr>
        </thead>';
        foreach ($value as $key => $value) {
            echo '<tbody>
            <tr>
                <td>'.$value.'</td>
                <td>'.$value.'</td>
                <td>'.$value.'</td>
            </tr>';
        }
    }
    echo '</table>'; */

    $paises = array(
        "España" => array(
            "MonedaAntigua" => "peseta",
            "LenguaHablada" => "castellano"
        ),
        "Italia" => array(
            "MonedaAntigua" => "lira",
            "LenguaHablada" => "italiano"
        ),
        "Francia" => array(
            "MonedaAntigua" => "franco",
            "LenguaHablada" => "francés"
        ),
        "Reino Unido" => array(
            "MonedaAntigua" => "libra",
            "LenguaHablada" => "inglés"
        ),
        "Alemania" => array(
            "MonedaAntigua" => "marco",
            "LenguaHablada" => "alemán"
        )
    );
    
    // Mostrar la tabla con los datos de los países
    echo "<table border='1'>";
    echo "<thead>
        <tr>
            <td colspan='3'><strong>PAISES MONEDAS E IDIOMA OFICIAL</strong></td>
        </tr>
        <tr>
            <th>Nombre</th>
            <th>Moneda</th>
            <th>Lengua</th>
        </tr></thead>";
    
    foreach ($paises as $pais => $datos) {
        echo "<tbody><tr>";
        echo "<td>$pais</td>";
        echo "<td>{$datos['MonedaAntigua']}</td>";
        echo "<td>{$datos['LenguaHablada']}</td>";
        echo "</tr></tbody>";
    }
    
    echo "</table>";

?>
</body>
</html>