<?php include ('funciones.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = isset($_POST['nombre']) ? sanearTexto($_POST['nombre']) : '';
        $edad = isset($_POST['edad']) ? sanearTexto($_POST['edad']) : '';
        
        if (empty($nombre)) {
            if (empty($edad)) {
                header("Location: ej5-1.php?error=1&nombre=$nombre&edad=$edad");
            } else if (!is_numeric($edad)) {
                header("Location: ej5-1.php?error=2&nombre=$nombre&edad=$edad");
            } else if ($edad < 18 || $edad > 130) {
                header("Location: ej5-1.php?error=3&nombre=$nombre&edad=$edad");
            } else {
                header("Location: ej5-1.php?error=4&edad=$edad");
            }
        } else {
            if (empty($edad)) {
                header("Location: ej5-1.php?error=1&nombre=$nombre");
            } else if (!is_numeric($edad)) {
                header("Location: ej5-1.php?error=2&nombre=$nombre");
            } else if ($edad < 18 || $edad > 130) {
                header("Location: ej5-1.php?error=3&nombre=$nombre");
            } else {
                echo "<p>Su nombre es <strong>$nombre</strong>.</p>";
                echo "<p>Su edad es <strong>$edad</strong>.</p>";
                echo "<a href='ej5-1.php'>Volver al formulario.</a>";
            }
        }
    }
?>