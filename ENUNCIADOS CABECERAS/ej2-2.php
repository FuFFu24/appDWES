<?php include ('funciones.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $clave = isset($_POST['clave']) ? sanearTexto($_POST['clave']) : '';
        
        if(!empty($clave) && $clave == 'z80') {
            header('Location: ej2-3.php');
        } else {
            header('Location: ej2-1.php?error=1');
        }
    }
?>