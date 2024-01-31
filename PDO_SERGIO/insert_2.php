<?php
    session_start();
    include("funciones.php");

    if(!isset($_SESSION["usuario"])){
        header("Location:login_1.php");
    }else{
        include("includes/header.php");
        if($_POST["submit"]){
            $name    = sanitized_data($_POST["name"]);
            $surname = sanitized_data($_POST["surname"]);
            
            if(!empty($name) || !empty($surname)){
                try {
                    $conn   = connectDB("agenda");

                    $query = "SELECT * FROM persona WHERE nombre = :nombre AND apellidos = :apellidos";
                        $stm = $conn->prepare($query);
                        $stm ->bindParam(":nombre", $name);
                        $stm ->bindParam(":apellidos", $surname);
                        $stm ->execute();

                        if($stm->rowCount() > 0){
                            echo "<p class='error'>El registro {$name} {$surname} ya existe.</p>";
                        }else{
                            $query  = "INSERT INTO persona (nombre, apellidos) VALUES (:nombre, :apellidos)";
                                $stm = $conn->prepare($query);
                                $stm ->bindParam(":nombre", $name);
                                $stm ->bindParam(":apellidos", $surname);
                                $stm ->execute();
                                echo "<p>El registro <strong>{$name} {$surname}</strong> creado correctamente.</p>";
                        }
                    }catch(Exception $e){
                        logError($e->getMessage());
                }
            }else{
                echo "<p class='error'>Hay que rellenar al menos uno de los campos. No se ha guardado el registro.</p>";
            }
            
        }
        echo "<a href='index.php'>Pagina principal</a>";
        include("includes/footer.php");
    }