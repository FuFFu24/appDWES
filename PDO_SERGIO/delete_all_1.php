<?php
    session_start();

    if(!isset($_SESSION["usuario"])){
        header("Location:login_1.php");
    }else{
        include("includes/header.php");
?>
            <p>¿Estas seguro?:</p>
            <form action="delete_all_2.php" method="post">
                <button type="submit" name="yes">SI</button>    
                <button type="submit" name="no">NO</button>    
            </form>
            <a href='index.php'>Volver</a>

<?php
        include("includes/footer.php");
    }