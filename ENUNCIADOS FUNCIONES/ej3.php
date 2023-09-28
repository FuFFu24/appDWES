<!DOCTYPE html>
<html>
<head>
    <title>Verificar Tipo de Carácter</title>
</head>
<body>
    <h1>Verificar Tipo de Carácter</h1>
    <form method="POST">
        <label for="caracter">Ingrese un carácter:</label>
        <input type="text" name="caracter" id="caracter">
        <input type="submit" value="Verificar">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $caracter = $_POST["caracter"];

        if (ctype_upper($caracter)) {
            echo "$caracter es una letra mayúscula.";
        } elseif (ctype_lower($caracter)) {
            echo "$caracter es una letra minúscula.";
        } elseif (is_numeric($caracter)) {
            echo "$caracter es un carácter numérico.";
        } elseif ($caracter == " ") {
            echo "$caracter es un espacio en blanco.";
        } elseif (strpos(",.", $caracter) !== false) {
            echo "$caracter es un carácter de puntuación.";
        } else {
            echo "$caracter es otra cosa.";
        }
    }
    ?>
</body>
</html>