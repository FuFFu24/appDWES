<?php
if (isset($_GET['archivo'])) {
    $archivo = $_GET['archivo'];
    $ruta = './files/' . $archivo;

    if (file_exists($ruta)) {
        unlink($ruta);
        header('Location: index-1.php');
    } else {
        header('Location: index-1.php?error=2');
    }
}
?>