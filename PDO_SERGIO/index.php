<?php
    session_start();
    
    if(!isset($_SESSION["usuario"])){
        header("Location:login_1.php");
    }else{
        include("includes/header.php");
?>
        <a href="insert_1.php">Añadir registro</a>        
        <a href="show_1.php">Listar</a>        
        <a href="delete_1.php">Borrar</a>        
        <a href="find_1.php">Buscar</a>        
        <a href="update_1.php">Modificar</a>        
        <a href="delete_all_1.php">Borrar todo</a>        
<?php
        include("includes/footer.php");
    }