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
                <?php
                if (isset($_GET['errorUsuario'])) {
                    if ($_GET['errorUsuario'] == 1) {
                        echo '<span style="color: red">Usuario no cumple con las expectativas.</span>';
                    }
                }
                ?>
            </div>
            <div class="edad">
                <label for="edad">Edad: </label>
                <input type="text" name="edad" id="edad">
                <?php
                if (isset($_GET['errorEdad'])) {
                    if ($_GET['errorEdad'] == 1) {
                        echo '<span style="color: red">Edad debe contener un maximo de 2 digitos.</span>';
                    } else if ($_GET['errorEdad'] == 2) {
                        echo '<span style="color: red">Edad debe estar entre 18 y 40.</span>';
                    }
                }
                ?>
            </div>
            <div class="titulo">
                <label for="titulo">Titulo aportado: </label>
                <input type="file" name="titulo" id="titulo">
                <?php
                if (isset($_GET['errorFile'])) {
                    if ($_GET['errorFile'] == 1) {
                        echo '<span style="color: red">No se ha podido subir el fichero.</span>';
                    }
                }
                ?>
            </div>
            <div class="cargar">
                <button type="submit">Cargar Fichero</button>
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
                <th>
                    Nombre del Archivo
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 2) {
                            echo '<span style="color: red">El archivo no existe.</span>';
                        }
                    }
                    ?>
                </th>
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