<?php
    include("funciones.php");
    session_start();

   if(isset($_POST["submit"])){
        $user = sanitized_data($_POST["user"]);
        $pass = sanitized_data($_POST["pass"]);

        try{
            $conn = connectDB("datos_usuario");
    
            $query = "SELECT * FROM usuarios WHERE user = :user AND pass = :pass";
            $stm = $conn->prepare($query);
            $stm->bindParam(":user", $user);
            $stm->bindParam(":pass", $pass);
            $stm->execute();

            if($stm->rowCount() > 0){
                $_SESSION["usuario"] = $user;
                header("Location:index.php");
            }else{
                header("Location:login_1.php?error");
            }
        }catch(Exception $e){
            logError($e->getMessage());
            die("Error: [" . $e -> getMessage() . "]");
        }
        
   }else{
        header("Location: login_1.php");
   }
