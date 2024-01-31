<?php
    session_start();
    include("funciones.php");

    if(!isset($_SESSION["usuario"])){
        header("Location:login_1.php");
    }else{
        include("includes/header.php");

        if($_POST["submit"]){
            $deletedUsers  = isset($_POST["id"]) ? $_POST["id"] : [];
            
            if(count($deletedUsers) > 0){
                try {
                    $conn   = connectDB("agenda");

                    foreach($deletedUsers as $id){
                        $query = "DELETE FROM persona WHERE id = :id";
                            $stm = $conn->prepare($query);
                            $stm ->bindParam(":id", $id);
                            $stm ->execute();
                        }
                        echo "<p> Registro/s <strong>borrado</strong> correctamente.</p>";      
                    }catch(Exception $e){
                        logError($e->getMessage());
                        echo "<p class='error'>No se ha podido eliminar el registro.</p>";
                }
            }else{
                echo "<p class='error'>No se ha seleccionado ningun registro.</p>";
            }
            
        }
        echo "<a href='delete_1.php'>Volver</a>";
        include("includes/footer.php");
    }