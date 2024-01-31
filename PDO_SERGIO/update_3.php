<?php
    session_start();
    include("funciones.php");

    if(!isset($_SESSION["usuario"])){
        header("Location:login_1.php");
    }else{
        if(isset($_POST["submit"])){
            $id      = sanitized_data($_SESSION["id"]); 
            $name    = sanitized_data($_POST["name"]);
            $surname = sanitized_data($_POST["surname"]);

            if(!empty($name) && !empty($surname)){
                try {
                    $conn   = connectDB("agenda");
                    $query  = "UPDATE persona SET nombre = :name, apellidos = :surname WHERE id = :id ";
                    $stm    = $conn->prepare($query);
                    $stm->bindParam(":id", $id);
                    $stm->bindParam(":name", $name);
                    $stm->bindParam(":surname", $surname);
                    $stm->execute();
                } catch (Exception $e) {
                    logError($e->getMessage());
                    die("Error: [" . $e -> getMessage() . "]");
                }
            }
            include("includes/header.php");
            echo "<p>El registro <strong>{$name} {$surname}</strong> actualizado correctamente.</p>"; 
        }
        
    }
        echo "<a href='update_1.php'>Volver</a>";
        include("includes/footer.php");
    