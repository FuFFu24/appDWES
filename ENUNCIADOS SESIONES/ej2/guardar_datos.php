<?php
session_start();

if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 1;
} else {
    $_SESSION['contador']++;
}

if (isset($_POST['enviar'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = isset($_POST['nombre']) ? htmlspecialchars(trim(strip_tags($_POST['nombre'])),ENT_QUOTES,"utf-8") : '';
        $ciudad = isset($_POST['ciudad']) ? htmlspecialchars(trim(strip_tags($_POST['ciudad'])),ENT_QUOTES,"utf-8") : '';
        $email = isset($_POST['email']) ? htmlspecialchars(trim(strip_tags($_POST['email'])),ENT_QUOTES,"utf-8") : '';
        $telefono = isset($_POST['telefono']) ? htmlspecialchars(trim(strip_tags($_POST['telefono'])),ENT_QUOTES,"utf-8") : '';
        $signo = isset($_POST['signo']) ? htmlspecialchars(trim(strip_tags($_POST['signo'])),ENT_QUOTES,"utf-8") : '';

        if (!empty($nombre)) {
            $_SESSION['nombre'] = $nombre;
        } else if (isset($_SESSION['nombre'])) {
            unset($_SESSION['nombre']);
        }
        if (!empty($ciudad)) {
            $_SESSION['ciudad'] = $ciudad;
        } else if (isset($_SESSION['ciudad'])) {
            unset($_SESSION['ciudad']);
        }
        if (!empty($email)) {
            $_SESSION['email'] = $email;
        } else if (isset($_SESSION['email'])) {
            unset($_SESSION['email']);
        }
        if (!empty($telefono)) {
            $_SESSION['telefono'] = $telefono;
        } else if (isset($_SESSION['telefono'])) {
            unset($_SESSION['telefono']);
        }
        if (!empty($signo)) {
            $_SESSION['signo'] = $signo;
        } else if (isset($_SESSION['signo'])) {
            unset($_SESSION['signo']);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Recogemos qui mas datos, los cuales seran almacenados para toda la sesion.</p>
    <p>Has recorrido o recargado <?php echo isset($_SESSION['contador']) ? $_SESSION['contador'] : 0; ?> paginas hasta ahora.</p>
    <form action="guardar_datos.php" method="post">
        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre">
        </p>
        <p>
            <label for="ciudad">Ciudad: </label>
            <input type="text" name="ciudad" id="ciudad">
        </p>
        <p>
            <label for="email">E-mail: </label>
            <input type="text" name="email" id="email">
        </p>
        <p>
            <label for="telefono">Telefono: </label>
            <input type="text" name="telefono" id="telefono">
        </p>
        <p>
            <label for="signo">Signo: </label>
            <select name="signo" id="signo">
                <option value="" selected disabled></option>
                <option value="aries">Aries</option>  
                <option value="tauro">Tauro</option>  
                <option value="geminis">Géminis</option>  
                <option value="cancer">Cáncer</option>  
                <option value="leo">Leo</option>  
                <option value="virgo">Virgo</option>  
                <option value="libra">Libra</option>  
                <option value="escorpio">Escorpio</option>  
                <option value="sagitario">Sagitario</option>  
                <option value="capricornio">Capricornio</option>  
                <option value="acuario">Acuario</option>
                <option value="piscis">Piscis</option>
            </select>
        </p>
        <p>
            <input type="submit" value="enviar" name="enviar">
        </p>
    </form>
    <p>Otras páginas de la sesión: </p>
    <p>Página 1: <a href="contador.php">Reiniciar contador o sesion.</a></p>
    <p>Página 3: <a href="mostrar_datos.php">Datos de la sesión.</a></p>
</body>
</html>