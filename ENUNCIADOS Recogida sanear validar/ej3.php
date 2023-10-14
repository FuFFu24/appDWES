<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Datos</title>
</head>
<body>
    <h1>Formulario de Datos</h1>
    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password"><br>

        <label for="educacion">Educación:</label>
        <select name="educacion">
            <option value="Sin estudios">Sin estudios</option>
            <option value="Eso">Eso</option>
            <option value="Bachillerato">Bachillerato</option>
            <option value="F.P.">F.P.</option>
            <option value="Universitario">Universitario</option>
            <option value="Otros">Otros</option>
        </select><br>

        <label>Nacionalidad:</label><br>
        <input type="radio" name="nacionalidad" value="Hispana"> Hispana<br>
        <input type="radio" name="nacionalidad" value="Sajona"> Sajona<br>
        <input type="radio" name="nacionalidad" value="Otras"> Otras<br>

        <label>Idiomas:</label><br>
        <input type="checkbox" name="idiomas[]" value="Inglés"> Inglés<br>
        <input type="checkbox" name="idiomas[]" value="Castellano"> Castellano<br>
        <input type="checkbox" name="idiomas[]" value="Francés"> Francés<br>
        <input type="checkbox" name="idiomas[]" value="Alemán"> Alemán<br>

        <label for="email">Email:</label>
        <input type="text" name="email"><br>

        <label for="website">Sitio web:</label>
        <input type="text" name="website"><br>

        <input type="submit" name="submit" value="Enviar">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Realiza la validación y procesamiento de datos aquí
        $errors = array();

        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $educacion = isset($_POST['educacion']) ? $_POST['educacion'] : array();
        $nacionalidad = $_POST['nacionalidad'];
        $idiomas = isset($_POST['idiomas']) ? $_POST['idiomas'] : array();
        $email = $_POST['email'];
        $website = $_POST['website'];

        if (empty($nombre)) {
            $errors[] = 'El campo Nombre es obligatorio.';
        }

        if (strlen($password) < 5) {
            $errors[] = 'La contraseña debe tener al menos 5 caracteres.';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'El formato del correo electrónico no es válido.';
        }

        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $errors[] = 'El formato del sitio web no es válido.';
        }

        if (empty($errors)) {
            echo '<h2>Datos introducidos por el usuario:</h2>';
            echo 'Nombre: ' . $nombre . '<br>';
            echo 'Contraseña: ' . $password . '<br>';
            if (!empty($educacion) && is_array($educacion)) {
                echo 'Educación: ' . implode(', ', $educacion) . '<br>';
            } else {
                echo 'Educación: No se ha seleccionado ninguna opción.<br>';
            }            
            echo 'Nacionalidad: ' . $nacionalidad . '<br>';
            echo 'Idiomas: ' . implode(', ', $idiomas) . '<br>';
            echo 'Correo electrónico: ' . $email . '<br>';
            echo 'Sitio web: ' . $website . '<br>';
        } else {
            echo '<div style="color: red;">';
            foreach ($errors as $error) {
                echo $error . '<br>';
            }
            echo '</div>';
        }
    }
    ?>
</body>
</html>
