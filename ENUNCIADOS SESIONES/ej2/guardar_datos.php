<?php
session_start();

if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 1;
} else {
    $_SESSION['contador']++;
}

if (isset($_POST['enviar'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['ciudad'] = $_POST['ciudad'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['telefono'] = $_POST['telefono'];
        $_SESSION['signo'] = $_POST['signo'];
        $_SESSION['lista'] = [
            $_SESSION['nombre'],
            $_SESSION['ciudad'],
            $_SESSION['email'],
            $_SESSION['telefono'],
            $_SESSION['signo']
        ];
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
            <input type="submit" value="enviar">
        </p>
    </form>
    <p>Otras páginas de la sesión: </p>
    <p>Página 1: <a href="contador.php">Reiniciar contador o sesion.</a></p>
    <p>Página 3: <a href="mostrar_datos.php">Datos de la sesión.</a></p>
</body>
</html>