<?php
    session_start();
    include("funciones.php");

    if(!isset($_SESSION["usuario"])){
        header("Location:login_1.php");
    }else{
        if(isset($_POST["yes"])){

            include("includes/header.php");
            
                echo deleteDB("agenda");
                echo deleteDB("datos_usuarios");

                echo createDB("agenda");
                echo createAgendaTable();
                echo addAgendaPersonasPrueba();

                echo createDB("datos_usuario");
                echo crearDatos_usuarioTable();
                echo addDatos_UsuarioUsuariosPrueba();

                session_destroy();
                echo "<a href='index.php'>Volver</a>";
            include("includes/footer.php");

        }else if(isset($_POST["no"])){
            header("Location:index.php");
        }
    }