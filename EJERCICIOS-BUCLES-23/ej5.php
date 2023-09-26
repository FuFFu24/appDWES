<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (($valorInicial=$_REQUEST['valorInicial']) && ($incremento=$_REQUEST['incremento']) && ($numeroValores=$_REQUEST['numeroValores'])) {
            
            echo '<p>Datos: </p>
                <ol>
                    <li type="disc">Valor inicial: '.$valorInicial.'</li>
                    <li type="disc">Valor final: </li>
                    <li type="disc">Incremento: '.$incremento.'</li>
                    <li type="disc">Numero de terminos: '.$numeroValores.'</li>
                </ol>';

            echo '<p>Terminos de la sucesion: </p>';
            echo '<ol>';

            $resultado = $valorInicial;

            for ($i=0; $i < $numeroValores; $i++) { 
                $resultado += $incremento;
                echo '<li>'.$resultado.'</li>';
            }

            echo '</ol>';

        } else {
            echo "<p>No se ha proporcionado datos validos.</p>";
        }
    ?>
    <a href="ej5.html">Volver a la página anterior</a>
</body>
</html>