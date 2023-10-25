<?php include ('funciones.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $url = isset($_POST['url']) ? sanear($_POST['url']) : '';
        $url = validar($url);

        if ($url != 1) {
            header('Location: ' . $url);
        } else {
            header('Location: ej1-1.php?error=1');
        }
    }
?>