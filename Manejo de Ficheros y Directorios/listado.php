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
            <th>Tipo</th>
            <th>Fecha de Modificación</th>
            <th>Tamaño (bytes)</th>
        </tr>
        <?php
        // Directorio que deseas listar
        $directorio = "../Manejo de Ficheros y Directorios"; // Puedes cambiar esto a la ruta de tu directorio

        // Abre el directorio
        if (is_dir($directorio)) {
            $files = scandir($directorio);
            foreach ($files as $file) {
                // Ignora los directorios "." y ".."
                if ($file != "." && $file != "..") {
                    $rutaCompleta = $directorio . $file;
                    $esDirectorio = is_dir($rutaCompleta);
                    $tipo = $esDirectorio ? "Directorio" : "Archivo";
                    $tamaño = $esDirectorio ? "" : filesize($file);
                    $modificacion = date("Y-m-d H:i:s", filemtime($file));

                    echo "<tr>";
                    echo "<td>$file</td>";
                    echo "<td>$tipo</td>";
                    echo "<td>$modificacion</td>";
                    echo "<td>$tamaño</td>";
                    echo "</tr>";
                }
            }
        } else {
            echo "El directorio no existe.";
        }
        ?>
    </table>
</body>
</html>