<?php include("funciones.php");
    comprobarSesion();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            $checkbox = [];
            if (isset($_POST['checkbox']) && is_array($_POST['checkbox'])) {
                foreach ($_POST['checkbox'] as $value) {
                    $checkbox[] = htmlspecialchars($value, ENT_QUOTES, 'utf-8');
                }
            }
            
            foreach ($checkbox as $value) {
                try {
                    $conn = conectarBbdd("datos_empleados");

                    $stmt = $conn->prepare("
                        SELECT * FROM Alumno WHERE dni = ?
                    ");
                    
                    $stmt->bindParam(1, $value);
                    
                    $stmt->execute();

                    if ($stmt->rowCount() != 0) {
                        $stmt = $conn->prepare("
                            DELETE FROM Alumno WHERE dni = ?
                        ");
                        
                        $stmt->bindParam(1, $value);
                    
                        $stmt->execute();

                        header("Location: baja_1.php");
                    } else {
                        header("Location: baja_1.php?error=2");
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
        } else {
            echo "<p>ERROR</p>";
        }
    } else {
        echo "<p>ERROR</p>";
    }
?>