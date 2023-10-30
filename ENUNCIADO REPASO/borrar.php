<?php
if (isset($_GET['archivo'])) {
    $archivo = $_GET['archivo'];
    $ruta = './files/' . $archivo;

    if (file_exists($ruta)) {
        unlink($ruta);
        header('Location: index-1.php');
    } else {
        echo "El archivo no existe.";
    }
}
?>