<?php include ('funciones.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $edad = isset($_POST['edad']) ? sanearTexto($_POST['edad']) : '';
        
        if (empty($edad)) {
            header('Location: ej4-1.php?error=1');
        } else if (!is_numeric($edad)) {
            header('Location: ej4-1.php?error=2');
        } else if ($edad < 18 || $edad > 130) {
            header('Location: ej4-1.php?error=3');
        } else {
            echo "<p>Su edad es <strong>$edad</strong>.</p>";
            echo "<a href='ej4-1.php'>Volver al formulario.</a>";
        }
    }
?>