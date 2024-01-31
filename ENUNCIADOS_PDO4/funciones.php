<?php
    function conectarBbdd($dbname) {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", 'root', '');
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    function sanearDatos($elemento) {
        return htmlspecialchars(trim(strip_tags($elemento)),ENT_QUOTES,"utf-8");
    }

    function comprobarSesion() {
        session_start();

        if (!isset($_SESSION["sesion"])) {
            header("Location: login.php?error=noSesion");
        }

        //session_unset();
        //session_destroy();
    }

    function validarNombre($nombre) {
        return preg_match('/^[A-Za-záéíóúñ]+([ -][A-Za-záéíóúñ]+)?$/u', $nombre) && strlen($nombre) <= 30;
    }
    
    function validarApellidos($apellidos) {
        return preg_match('/^[A-Za-záéíóúñ]+([ -][A-Za-záéíóúñ]+)?$/u', $apellidos) && strlen($apellidos) <= 50;
    }
    
    function validarDireccion($direccion) {
        return preg_match('/^(calle|plaza|avenida) [A-Za-z0-9áéíóúñ\s,-]+$/u', $direccion);
    }
    
    function validarTelefono($telefono) {
        return preg_match('/^(91|6)\d{7,8}$/', $telefono);
    }
    
    function validarExtensionImagen($foto) {
        return preg_match('/\.(jpg|png)$/i', $foto);
    }

    function validarEdad($edad) {
        return preg_match('/^\d+$/', $edad) && $edad >= 18 && $edad <= 65;
    }

    function validarDNI($dni) {
        return preg_match('/^\d{8}[A-Z]$/', $dni);
    }

    function guardarErrores($comentario) {
        $directorio = 'errores';

        if (!is_dir($directorio)) {
            mkdir($directorio, 0777);
        }

        $hoy = date("Y-m-d H:i:s");

        $fErrores = fopen("errores/errores.txt", "a+");

        $texto = "[$hoy] $comentario\n";

        fwrite($fErrores, $texto);
        fclose($fErrores);
    }
?>

<!-- LOGIN -->

<?php
function conectarBbdd() {
    try {
        $conn = new PDO("mysql:host=localhost;charset=utf8", 'root', '');
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

$conn = conectarBbdd();

try {
    $stmt = $conn->prepare("
        CREATE DATABASE IF NOT EXISTS BBDD
    ");

    $stmt->execute();

    $stmt = $conn->prepare("
        USE BBDD
    ");

    $stmt->execute();

    $stmt = $conn->prepare("
        CREATE TABLE IF NOT EXISTS User (
            username VARCHAR(50) PRIMARY KEY,
            passwd VARCHAR(50) NOT NULL,
            email VARCHAR(100) NOT NULL
        )
    ");

    $stmt->execute();

    $stmt = $conn->prepare("
        SELECT * FROM User
    ");

    $stmt->execute();

    if ($stmt->rowCount() == 0) {

        $stmt = $conn->prepare("
            INSERT INTO User (username, passwd, email) VALUES ('User1', 'admin1', 'user1@gmail.com')
        ");
        $stmt->execute();

        $stmt = $conn->prepare("
            INSERT INTO User (username, passwd, email) VALUES ('User2', 'admin2', 'user2@gmail.com')
        ");
        $stmt->execute();

        $stmt = $conn->prepare("
            INSERT INTO User (username, passwd, email) VALUES ('User3', 'admin3', 'user3@gmail.com')
        ");
        $stmt->execute();
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$conn = null;
?>

<!-- VALIDAR LOGIN -->

<?php include("funciones.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        $nombre = isset($_POST["nombre"]) ? sanearDatos($_POST["nombre"]) : '';
        $contrasena = isset($_POST["contrasena"]) ? sanearDatos($_POST["contrasena"]) : '';

        if (!empty($nombre) && !empty($contrasena)) {
            try {
                $conn = conectarBbdd("datos_empleados");

                $stmt = $conn->prepare("
                    SELECT * FROM User WHERE username = ? AND passwd = ?
                ");
                
                $stmt->bindParam(1, $nombre);
                $stmt->bindParam(2, $contrasena);
                
                $stmt->execute();

                if ($stmt->rowCount() != 0) {
                    $_SESSION["sesion"] = true;
                    header("Location: index.php");
                } else {
                    header("Location: login.php");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            header("Location: login.php");
        }
    } else {
        echo "<p>ERROR</p>";
    }
} else {
    echo "<p>ERROR</p>";
}
?>

<!-- BBDD -->

<?php include("funciones.php");

$conn = conectarBbdd("BBDD");

try {
    $stmt = $conn->prepare("
        CREATE TABLE Viviendas (
            Id INT PRIMARY KEY AUTO_INCREMENT,
            Tipo ENUM ('Piso', 'Chalet', 'Casa', 'Adosado') NOT NULL DEFAULT 'Piso',
            Zona ENUM ('Centro', 'Nervion', 'Triana', 'Aljarafe', 'Macarena') NOT NULL DEFAULT 'Centro',
            Direccion CHAR NOT NULL,
            Dormitorios INT NOT NULL DEFAULT 3,
            Precio INT NOT NULL,
            Tamano INT NOT NULL,
            Extras ENUM ('Piscina', 'Jardin', 'Garaje') NOT NULL,
            Foto VARCHAR(255)
        )
    ");

    $stmt->execute();

} catch (PDOException $e) {
    echo $e->getMessage();
}

$conn = null;
?>

<!-- FILES -->

<?php
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
}
?>

<!-- CHECKBOX -->

<?php
$checkbox = [];

if (isset($_POST['checkbox']) && is_array($_POST['checkbox'])) {
    foreach ($_POST['checkbox'] as $value) {
        $checkbox[] = htmlspecialchars($value, ENT_QUOTES, 'utf-8');
    }
}

$cadena = implode(' ', $checkbox);
?>

<!-- LISTAR -->

<?php
$stmt = $conn->prepare("SELECT * FROM pokemon LIMIT ?, 5");

$stmt->setFetchMode(PDO::FETCH_ASSOC);

$desde = $cont * 5;

$stmt->bindParam(1, $desde, PDO::PARAM_INT);

$stmt->execute();

while ($row = $stmt->fetch()){
    echo "<tr>";
    echo "<td>{$row['numero_pokedex']}</td>";
    echo "<td>{$row['nombre']}</td>";
    echo "<td>{$row['peso']}</td>";
    echo "<td>{$row['altura']}</td>";
    echo "</tr>";
}
?>