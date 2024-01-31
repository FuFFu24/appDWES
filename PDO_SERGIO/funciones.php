<?php

    function sanitized_data($data) {
        return isset($data)
            ? htmlspecialchars(trim(strip_tags($data)))
            : " ";
    }

    function logError($errorMessage) {
        $fileName = "error_logs.txt";
        $logMessage = "[" . date("Y-m-d H:i:s") . "]" . $errorMessage . PHP_EOL;
        file_put_contents($fileName, $logMessage, FILE_APPEND);
    }

    function connectDB($dbname) {
        try {
            $conn = new PDO("mysql:host=localhost;dbname={$dbname};charset=utf8","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (Exception $e) {
            die("Error: [" . $e->getMessage() . "]");
        }
    }

    function connectBBDD() {
        try {
            $conn = new PDO("mysql:host=localhost;charset=utf8","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (Exception $e) {
            die("Error: [" . $e->getMessage() . "]");
        }
    }
    
    function createDB($nameDB) {
        try {
            $conn = connectBBDD();
            $query = "CREATE DATABASE IF NOT EXISTS {$nameDB}";
            $stm    = $conn->prepare($query);
            $stm->execute();
            
                return "<p>Base de datos {$nameDB} <strong>creada</strong> correctamente</p>"; 
        } catch (Exception $e) {
            die("Error: [" . $e->getMessage() . "]");
        }
    }

    function deleteDB($nameDB) {
        try {
            $conn = connectBBDD();
            $query  = "DROP DATABASE IF EXISTS {$nameDB}";
            $stm    = $conn->prepare($query);
            $stm->execute();
            
                return "<p>Base de datos {$nameDB} <strong>borrada</strong> correctamente</p>"; 
        } catch (Exception $e) {
            die("Error: [" . $e->getMessage() . "]");
        }
    }
    

//Tabla agenda

    function createAgendaTable() {
        try {
            $conn   = connectDB("agenda");
            $query  = "CREATE TABLE IF NOT EXISTS persona (
                        id int(11) AUTO_INCREMENT PRIMARY KEY,
                        nombre varchar(15) NOT NULL,
                        apellidos varchar(25) NOT NULL
                    )";
            $stm    = $conn->prepare($query);
            $stm->execute();
            
                return "<p>Tabla agenda <strong>creada</strong> correctamente</p>"; 
        } catch (Exception $e) {
            die("Error: [" . $e->getMessage() . "]");
        }
    }

    function addAgendaPersonasPrueba () {
        try {
            $conn   = connectDB("agenda");
            $query  = "INSERT INTO `persona` (`id`, `nombre`, `apellidos`) VALUES
                            (1, 'Sergio', 'Hernandez'),
                            (2, 'Blanca', 'Garcia'),
                            (3, 'Marcos', 'Cobo'),
                            (4, 'Mercedes', 'Bergantiños'),
                            (5, 'Alonso', 'Flores'),
                            (6, 'Andres', 'Flores')";
            $stm = $conn->prepare($query);
            $stm->execute();
            
                return "<p>Usuarios de ejemplo tabla agenda <strong>creados</strong> correctamente</p>"; 
        } catch (Exception $e) {
            die("Error: [" . $e->getMessage() . "]");
        }
    }

    //Tabla usuarios
    function crearDatos_usuarioTable () {
        
        try{
            $conn = connectDB("datos_usuario");
            $query  = "CREATE TABLE IF NOT EXISTS usuarios (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user    VARCHAR(25) NOT NULL,
                pass    VARCHAR(25) NOT NULL,
                email   VARCHAR(25) NOT NULL
            )";
            $stm = $conn ->prepare($query);
            $stm->execute();

                return "<p>Tabla datos_usuarios <strong>creada</strong> correctamente</p>"; 
        }catch(Exception $e){
            die("Error: [" . $e -> getMessage() . "]");
        }
    }

    function addDatos_UsuarioUsuariosPrueba () {
        try{
            $conn   = connectDB("datos_usuario");
            $query  = "INSERT INTO `usuarios` (`user`, `pass`, `email`) VALUES
                            ('User1', 'Admin1', 'user1@example.com'),
                            ('User2', 'Admin2', 'user2@example.com'),
                            ('User3', 'Admin3', 'user3@example.com')";
            $stm    = $conn->prepare($query);
            $stm->execute();
                return "<p>Usuarios de ejemplo tabla datos_usuarios <strong>creados</strong> correctamente</p>"; 
        }catch(Exception $e){
            die("Error: [" . $e -> getMessage() . "]");
        }
    }
    
