<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $numMinVal=$_REQUEST['numMinVal'];
        $numMaxVal=$_REQUEST['numMaxVal'];
        $minVal=$_REQUEST['minVal'];
        $maxVal=$_REQUEST['maxVal'];
        if (($numMinVal==$_REQUEST['numMinVal']) && ($numMaxVal==$_REQUEST['numMaxVal']) 
            && ($minVal==$_REQUEST['minVal']) && ($maxVal==$_REQUEST['maxVal'])) {

            echo '<h3>Datos iniciales</h3>';
            
            $rand1=rand($numMinVal,$numMaxVal);

            echo '<p>Número de valores en la matriz: '.$rand1.'</p>';
            echo '<p>Valores elegidos al azar entre '.$minVal.' y '.$maxVal.'</p>';
        
            echo '<h3>Matriz de valores</h3>';
            
            // Crear la matriz
            $matriz=[];
            for ($i=0; $i < $rand1; $i++) { 
                $rand2=rand($minVal,$maxVal);
                $matriz[]=$rand2;
            }

            // Imprimir la matriz
            echo "<pre>";
            print_r($matriz);
            echo "</pre>";
        } else {
            echo "<p>No se han proporcionado datos correctos.</p>";
        }
        
    ?>
    <a href="ej5.html">Volver al formulario.</a>
</body>
</html>