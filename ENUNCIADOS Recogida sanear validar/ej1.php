<?php
// Variables para almacenar los valores de entrada y los errores
$name = "";
$phone = "";
$email = "";
$errors = [];

// Función para validar el nombre (solo letras y espacios)
function validateName($name) {
    return preg_match("/^[a-zA-Z ]+$/", $name);
}

// Función para validar el número de teléfono (exactamente 9 números)
function validatePhone($phone) {
    return preg_match("/^[0-9]{9}$/", $phone);
}

// Función para validar la dirección de correo (contiene @, un punto y letras inglesas)
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    // Validar nombre
    if (!validateName($name)) {
        $errors[] = "El nombre solo debe contener letras y espacios.";
    }

    // Validar número de teléfono
    if (!validatePhone($phone)) {
        $errors[] = "El número de teléfono debe tener exactamente 9 números.";
    }

    // Validar dirección de correo
    if (!validateEmail($email)) {
        $errors[] = "La dirección de correo no es válida.";
    }

    // Si no hay errores, mostrar los datos
    if (empty($errors)) {
        echo "Nombre: $name<br>";
        echo "Teléfono: $phone<br>";
        echo "Correo electrónico: $email<br>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Validación de Datos</title>
</head>
<body>
    <?php
    // Mostrar errores si los hay
    if (!empty($errors)) {
        echo "<div style='color: red;'>";
        foreach ($errors as $error) {
            echo "$error<br>";
        }
        echo "</div>";
    }
    ?>

    <form method="post" action="">
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="<?php echo $name; ?>" required><br>

        <label for="phone">Número de Teléfono:</label>
        <input type="text" name="phone" value="<?php echo $phone; ?>" required><br>

        <label for="email">Correo Electrónico:</label>
        <input type="text" name="email" value="<?php echo $email; ?>" required><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
