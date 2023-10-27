<?php include ('funciones.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = isset($_POST['nombre']) ? sanearTexto($_POST['nombre']) : '';

        if (!empty($nombre)) {
            echo "<p>Su nombre es <strong>$nombre</strong>.</p>";
            echo "<a href='ej3-1.php'>Volver al formulario.</a>";
        } else {
            header('Location: ej3-1.php?error=1');
        }
    }
?>