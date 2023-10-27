<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fviajes = fopen("viajes.txt", "a+");

        $nombre = isset($_POST['nombre']) ? htmlspecialchars(strip_tags($_POST['nombre']), ENT_QUOTES, "utf-8") : '';
        $destino = isset($_POST['destino']) ? htmlspecialchars(strip_tags($_POST['destino']), ENT_QUOTES, "utf-8") : '';
        $duracion = isset($_POST['duracion']) ? htmlspecialchars(strip_tags($_POST['duracion']), ENT_QUOTES, "utf-8") : '';
        $dias = isset($_POST['dias']) ? htmlspecialchars(strip_tags($_POST['dias']), ENT_QUOTES, "utf-8") : '';

        if (empty($nombre) || empty($destino) || empty($duracion) || empty($dias)) {
            $error = "error&";
            if (empty($nombre)) {
                $error1 = "error1=1&";
            }
            if (empty($destino)) {
                $error2 = "error2=2&";
            }
            if (empty($duracion)) {
                $error3 = "error3=3&";
            }
            if (empty($dias)) {
                $error4 = "error4=4&";
            }
            header('Location: ej6-1.php?'.$error.''.$error1.''.$error2.''.$error3.''.$error4.'nombre='.$nombre.'&destino='.$destino.'&duracion='.$duracion.'&dias='.$dias.'');
            
        } else {
            $texto = "\n$nombre:$destino:$duracion:$dias";

            fwrite($fviajes, $texto);
            fclose($fviajes);

            header("Location: ej6-1.php");
        }
    }
?>