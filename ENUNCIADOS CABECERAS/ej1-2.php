<?php include ('funciones.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $url = isset($_POST['url']) ? sanearTexto($_POST['url']) : '';
        $url = validarURL($url);

        if ($url != 1) {
            header('Location: ' . $url);
        } else {
            header('Location: ej1-1.php?error=1');
        }
    }
?>