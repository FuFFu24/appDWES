<?php
    session_start();

    if(!isset($_SESSION["usuario"])){
        header("Location:login_1.php");
    }else{
        if($_POST["submit"]){
            $numero_pokedex = isset($_POST['numero_pokedex']) ? htmlspecialchars(trim(strip_tags($_POST['numero_pokedex'])),ENT_QUOTES,"utf-8") : '';
            $nombre = isset($_POST['nombre']) ? htmlspecialchars(trim(strip_tags($_POST['nombre'])),ENT_QUOTES,"utf-8") : '';
            $peso = isset($_POST['peso']) ? htmlspecialchars(trim(strip_tags($_POST['peso'])),ENT_QUOTES,"utf-8") : '';
            $altura = isset($_POST['altura']) ? htmlspecialchars(trim(strip_tags($_POST['altura'])),ENT_QUOTES,"utf-8") : '';
            
            if(!empty($numero_pokedex) || !empty($nombre) || !empty($peso) || !empty($altura)){
                try {
                    function conectarBbdd() {
                        try {
                            $dbname = "pokemondb";
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

                    $query = "SELECT * FROM pokemon WHERE numero_pokedex = :numero_pokedex AND nombre = :nombre";
                        $stm = $conn->prepare($query);
                        $stm ->bindParam(":numero_pokedex", $numero_pokedex);
                        $stm ->bindParam(":nombre", $nombre);
                        $stm ->execute();

                        if($stm->rowCount() > 0){
                            echo "<p class='error'>El registro {$numero_pokedex} {$nombre} ya existe.</p>";
                        }else{
                            $query  = "INSERT INTO pokemon (numero_pokedex, nombre, peso, altura) VALUES (:numero_pokedex, :nombre, :peso, :altura)";
                                $stm = $conn->prepare($query);
                                $stm ->bindParam(":numero_pokedex", $numero_pokedex);
                                $stm ->bindParam(":nombre", $nombre);
                                $stm ->bindParam(":peso", $peso);
                                $stm ->bindParam(":altura", $altura);
                                $stm ->execute();
                                echo "<p>El registro <strong>{$numero_pokedex} {$nombre}</strong> creado correctamente.</p>";
                        }
                    }catch(Exception $e){
                        //En caso de error se captura el mensaje
                        print '<p>Error'. $e->getMessage().'</p>';
                }
            }else{
                echo "<p class='error'>Hay que rellenar al menos uno de los campos. No se ha guardado el registro.</p>";
            }
            
        }
        echo "<a href='index.php'>Pagina principal</a>";
    }