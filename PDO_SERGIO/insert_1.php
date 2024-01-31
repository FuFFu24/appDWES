<?php
    session_start();

    if(!isset($_SESSION["usuario"])){
        header("Location:login_1.php");
    }else{
        include("includes/header.php");
?>
            <p>Escriba los datos del nuevo registro:</p>
            <form action="insert_2.php" method="post">
                <label for="name">Nombre:</label>
                <input type="text" name="name">
                <label for="surname">Apellidos:</label>
                <input type="text" name="surname">
                <input type="submit" value="Añadir" name="submit"> <input type="reset" value="Reiniciar Formulario">
            </form>
            <a href='index.php'>Volver</a>

<?php
        include("includes/footer.php");
    }