<?php
    session_start();

   if(isset($_POST["submit"])){
        $user = isset($_POST['user']) ? htmlspecialchars(trim(strip_tags($_POST['user'])),ENT_QUOTES,"utf-8") : '';
        $pass = isset($_POST['pass']) ? htmlspecialchars(trim(strip_tags($_POST['pass'])),ENT_QUOTES,"utf-8") : '';

        try{
            function conectarBbdd() {
                try {
                    $dbname = "datos_usuario";
                    //Conectamos a la BBDD
                    $conn = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", 'root', '');
                    // Elección del modo de controlar los errores en la instancia de la conexión
                    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //Retorna el manejador de la conexión
                    return $conn;
                } catch (PDOException $e) {
                    //En caso de error se captura el mensaje
                    print '<p>Error no se puede conectar con la BBDD por\n'. $e->getMessage().'</p>';
                }
            }

            $conn = conectarBbdd();
    
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
?>