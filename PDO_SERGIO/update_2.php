<?php
    session_start();
    include("funciones.php");

    if(!isset($_SESSION["usuario"])){
        header("Location:login_1.php");
    }else{
        include("includes/header.php");

        if($_POST["submit"]){
            $updateUser  = isset($_POST["id"]) ? implode("," ,$_POST["id"]) : [];
            
            $_SESSION["id"] = $updateUser;

            if(!empty($updateUser)){
                try {
                        $conn   = connectDB("agenda");

                        $query = "SELECT * FROM persona WHERE id = :id";
                            $stm = $conn->prepare($query);
                            $stm ->bindParam(":id", $updateUser);
                            $stm ->execute();

                            $row = $stm->fetch(PDO::FETCH_ASSOC);
                            $name    = $row["nombre"];
                            $surname = $row["apellidos"];
   
                    }catch(Exception $e){
                        logError($e->getMessage());
                        echo "<p class='error'>No se ha podido modificar el registro.</p>";
                }
                include("includes/header.php");
?>
                <p>Modifique los campos que desee:</p>
                <form action="update_3.php" method="post">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" value=<?php echo $name ?>>
                    <label for="surname">Apellidos:</label>
                    <input type="text" name="surname" value=<?php echo $surname ?>>
                    <input type="submit" value="Actualizar" name="submit"> <input type="reset" value="Reiniciar Formulario">
                </form>
<?php
            }else{
                echo "<p class='error'>No se ha seleccionado ningun registro.</p>";
            }
            
        }
        echo "<a href='update_1.php'>Volver</a>";
        include("includes/footer.php");
    }