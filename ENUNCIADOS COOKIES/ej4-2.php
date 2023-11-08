<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $duracion = isset($_POST['duracion']) ? htmlspecialchars(trim(strip_tags($_POST['duracion'])), ENT_QUOTES, "utf-8") : "";

    if (isset($_POST['Crear'])) {
        if (empty($duracion) || !is_numeric($duracion) || $duracion <= 1 || $duracion >= 60) {
            $errorDuracion = "errorDuracion=1&";
        } else {
            if (!isset($_COOKIE['nuevaCookie'])) {
                setcookie('nuevaCookie', 'cookieCreadaPorUsuario', time() + $duracion, '/');
            }
            $errorDuracion = "errorDuracion=2&";
        }
    }
    if (isset($_POST['Comprobar'])) {
        if (isset($_COOKIE['nuevaCookie'])) {
            $mensajeExiste = "isExiste=1&";
        } else {
            $mensajeExiste = "isExiste=2&";
        }
    }
    if (isset($_POST['Destruir'])) {
        if (isset($_COOKIE['nuevaCookie'])) {
            $mensajeDestruir = "isDestruir=1&";
            setcookie('nuevaCookie', '', time() - 1, '/');
        } else {
            $mensajeDestruir = "isDestruir=2&";
        }
    }
    header("Location: ej4-1.php?".$errorDuracion.$mensajeExiste.$mensajeDestruir);
}
?>