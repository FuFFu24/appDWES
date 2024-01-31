<?php
session_start();

if(!isset($_SESSION["usuario"])){
    header("Location:login_1.php");
}else{

    $_SESSION["contador"] = 0;

    echo '<p><a href="insert_1.php">Añadir registro</a></p>';
    echo '<p><a href="show_1.php">Listar</a></p>';
    echo '<p><a href="delete_1.php">Borrar</a></p>';
    echo '<p><a href="find_1.php">Buscar</a></p>';
    echo '<p><a href="update_1.php">Modificar</a></p>';
    echo '<p><a href="delete_all_1.php">Borrar todo</a></p>';
}
?>