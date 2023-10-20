<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fcomentarios = fopen("comentarios.txt", "a+");
        

        $nombre = isset($_POST['nombre']) ? htmlspecialchars(trim(strip_tags($_POST['nombre'])),ENT_QUOTES,"utf-8") : '';
        $comentario = isset($_POST['comentario']) ? htmlspecialchars(strip_tags($_POST['comentario']),ENT_QUOTES,"utf-8") : '';

        $errores = array();

        if (empty($nombre)) {
            $errores[] = "El nombre es obligatorio (esta vacio).";
        }

        if (empty($comentario)) {
            $errores[] = "El comentario es obligatorio (esta vacio).";
        }

        if (empty($errores)) {
            echo "Datos del formulario procesados con éxito. La foto se ha subido correctamente.<br>";
            echo "Pulse <a href='comentarios.txt'>aqui</a> para ver todo el contenido del fichero.";

            // Puedes poner esto si abres el fichero con r+ o poner directamente a+
            /* fseek($fcomentarios, filesize("comentarios.txt")); */
            $texto = "\n$nombre\n$comentario\n------------------------------------------------------------";

            // Tambien se puede poner asi (tal cual como lo ves)
            /* $texto = ''.$nombre.'
'.$comentario.'
------------------------------------------------------------
'; */

            fwrite($fcomentarios, $texto);
            fclose($fcomentarios);
        } else {
            echo "Errores en el formulario:<br>";
            foreach ($errores as $error) {
                echo "<p style='color: red;'>$error</p>";
            }
        }
    }
    ?>
</body>
</html>