<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="cargarFicheros">
        <div class="tituloGrande">
            <h3>Cargar Ficheros</h3>
        </div>
        <div class="contenidoUno">
        <form action="index-2.php" method="post" enctype="multipart/form-data">
            <div class="usuario">
                <label for="usuario">Usuario: </label>
                <input type="text" name="usuario" id="usuario">
            </div>
            <div class="edad">
                <label for="edad">Edad: </label>
                <input type="text" name="edad" id="edad">
            </div>
            <div class="titulo">
                <label for="titulo">Titulo aportado: </label>
                <input type="file" name="titulo" id="titulo">
            </div>
            <div class="cargar">
                <button type="submit">Cargar Fichero</button>
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 1) {
                        echo '<span style="color: red">No ha introducido bien los datos</span>';
                    }
                }
                ?>
            </div>
        </form>
        </div>
    </div>
    <div class="descargasDisponibles">
        <div class="tituloGrande">
            <h3>Descargas Disponibles</h3>
        </div>
        <div class="contenidoDos">
        <table>
            <tr>
                <th>#</th>
                <th>Nombre del Archivo</th>
                <th>Descargar</th>
                <th>Eliminar</th>
            </tr>
            <?php
            $directorio = opendir("./files");
            $cont = -1;
    
            while($archivo = readdir($directorio)) {
                if ($archivo != "." && $archivo != "..") {
                    if(!is_dir($archivo)) {
                        echo "<tr>";
                        echo "<td>$cont</td>";
                        echo "<td>$archivo</td>";
                        echo '<td><a href="files/'.$archivo.'" download><img src="descargar.png" alt="descargar"></a></td>';
                        echo '<td><a href="borrar.php?archivo='.$archivo.'"><img src="borrar.png" alt="borrar"></a></td>';
                        echo "</tr>";
                    }
                }
                $cont++;
            }
            closedir($directorio);
            ?>
        </table>
        </div>
    </div>
</body>

</html>