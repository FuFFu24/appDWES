<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Listado de Directorio</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Fecha de Modificación</th>
            <th>Tamaño (bytes)</th>
        </tr>

        <?php
        $directorio = opendir(".");
        print "El directorio actual es:"; 
        echo getcwd() ;

        while($archivo = readdir($directorio)) { 
            if ($archivo != "." && $archivo != "..") {
                if(is_dir($archivo)) {
                    echo "<tr>";
                    echo "<td>[$archivo]</td>";
                    echo '<td>'.date("d-m-Y H:i:s", filemtime($archivo)).'</td>';
                    echo "</tr>";
                } else {
                    echo "<tr>";
                    echo "<td>$archivo</td>";
                    echo '<td>'.date("d-m-Y H:i:s", filemtime($archivo)).'</td>';
                    echo '<td>'.filesize($archivo).'</td>';
                    echo "</tr>";
                }
            }
        }
        closedir($directorio);
        ?>
    </table>
</body>
</html>