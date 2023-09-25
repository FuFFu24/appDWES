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
                    <li type:"disc">Valor inicual: '.$valorInicial.'</li>
                    <li type:"disc">Valor final: '.($numeroValores-1).'</li>
                    <li type:"disc">Incremento: '.$incremento.'</li>
                    <li type:"disc">Numero de terminos: '.$numeroValores.'</li>
                </ol>';

            echo '<p>Terminos de la sucesion: </p>';
            echo '<ol>';

            for ($i=$valorInicial; $i < $numeroValores; $i+=$incremento) { 
                        echo '<li>'.$i.'</li>';
            }

            echo '</ol>';

        } else {
            echo "<p>No se ha proporcionado datos validos.</p>";
        }
    ?>
    <a href="ej5.html">Volver a la página anterior</a>
</body>
</html>