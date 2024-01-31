<?php
    session_start();

    if(!isset($_SESSION["usuario"])){
        header("Location:login_1.php");
    }else{
?>
            <p>Escriba los datos del nuevo registro:</p>
            <form action="insert_2.php" method="post">
                <p>
                <label for="numero_pokedex">Numero pokedex:</label>
                <input type="text" name="numero_pokedex">
                </p>
                <p>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre">
                </p>
                <p>
                <label for="peso">Peso:</label>
                <input type="text" name="peso">
                </p>
                <p>
                <label for="altura">Altura:</label>
                <input type="text" name="altura">
                </p>
                <p>
                <input type="submit" value="Añadir" name="submit"> <input type="reset" value="Reiniciar Formulario">
                </p>
            </form>
            <a href='index.php'>Volver</a>

<?php
    }
    ?>