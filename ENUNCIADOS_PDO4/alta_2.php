<?php include("funciones.php");
    comprobarSesion();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            $dni = isset($_POST["dni"]) ? sanearDatos($_POST["dni"]) : '';
            $nombre = isset($_POST["nombre"]) ? sanearDatos($_POST["nombre"]) : '';
            $apellidos = isset($_POST["apellidos"]) ? sanearDatos($_POST["apellidos"]) : '';
            $direccion = isset($_POST["direccion"]) ? sanearDatos($_POST["direccion"]) : '';
            $telefono = isset($_POST["telefono"]) ? sanearDatos($_POST["telefono"]) : '';
            $foto = isset($_FILES["foto"]["name"]) ? sanearDatos($_FILES["foto"]["name"]) : '';

            if (!validarNombre($nombre)) {
                header("Location: alta_1.php?error=1");
            } else if (!validarApellidos($apellidos)) {
                header("Location: alta_1.php?error=2");
            } else if (!validarDireccion($direccion)) {
                header("Location: alta_1.php?error=3");
            } else if (!validarTelefono($telefono)) {
                header("Location: alta_1.php?error=4");
            } else if (!validarExtensionImagen($foto)) {
                header("Location: alta_1.php?error=5");
            } else {
                $directorio = 'imagenes';

                if (!is_dir($directorio)) {
                    mkdir($directorio, 0777);
                }

                if (is_uploaded_file ($_FILES['foto']['tmp_name'])) {
                    $nombreDirectorio = "imagenes/";
                    $nombreFichero = $_FILES['foto']['name'];
                    $nombreCompleto = $nombreDirectorio.$nombreFichero;
                    if (is_file($nombreCompleto)) {
                        $idUnico = time();
                        $nombreFichero = $idUnico."-".$nombreFichero;
                        $nombreCompleto = $nombreDirectorio.$nombreFichero;
                    }
                    move_uploaded_file ($_FILES['foto']['tmp_name'],$nombreCompleto);

                    try {
                        $conn = conectarBbdd("datos_empleados");
    
                        $stmt = $conn->prepare("
                            SELECT * FROM Alumno WHERE dni = ?
                        ");
                        // Bind
                        $stmt->bindParam(1, $dni);
                        // Excecute
                        $stmt->execute();
    
                        if ($stmt->rowCount() == 0) {
                            $stmt = $conn->prepare("
                                INSERT INTO Alumno (dni, nombre, apellidos, direccion, telefono, foto) 
                                VALUES (?,?,?,?,?,?)
                            ");
                            
                            $stmt->bindParam(1, $dni);
                            $stmt->bindParam(2, $nombre);
                            $stmt->bindParam(3, $apellidos);
                            $stmt->bindParam(4, $direccion);
                            $stmt->bindParam(5, $telefono);
                            $stmt->bindParam(6, $foto);
                        
                            $stmt->execute();
                        } else {
                            header("Location: alta_1.php?error=2");
                        }
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                } else {
                    print ("No se ha podido subir el fichero\n");
                }
            }
        } else {
            echo "<p>ERROR</p>";
        }
    } else {
        echo "<p>ERROR</p>";
    }
?>