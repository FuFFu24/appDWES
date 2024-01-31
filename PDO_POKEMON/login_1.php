<?php
    session_start();
    $msjError = "<p class='error'>Datos incorrectos<p>";

    if(isset($_SESSION["usuario"])){
        header("Location:index.php");
    }else{
?>
        <div>
            <form action="login_2.php" method="post">
                <label for="user">USARIO:</label>
                <input type="text" name="user" required>
                <label for="pass">CONTRASEÑA:</label>
                <input type="password" name="pass" required>
                <input type="submit" value="Iniciar Sesión" name="submit"><input type="reset" value="Reiniciar Formulario">
            </form>
            <?php echo isset($_GET["error"]) ? $msjError : "" ?>
        </div>
<?php
    }
?>