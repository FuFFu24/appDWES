<?php
function conectarBbdd() {
    try {
        //Conectamos a la BBDD
        $conexion = new PDO('mysql:host=localhost; dbname=Agenda; charset=utf8', 'root', '');
        // Elección del modo de controlar los errores en la instancia de la conexión
        $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Retorna el manejador de la conexión
        return $conexion;
    } catch (PDOException $e) {
        //En caso de error se captura el mensaje
        print ('<p>Error no se puede conectar con la BBDD por\n'. $e->getMessage().'</p>');
    }
}
?>