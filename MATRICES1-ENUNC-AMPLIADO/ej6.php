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
        $eliminar=$_REQUEST['eliminar'];
        if (($numMinVal==$_REQUEST['numMinVal']) && ($numMaxVal==$_REQUEST['numMaxVal']) 
            && ($minVal==$_REQUEST['minVal']) && ($maxVal==$_REQUEST['maxVal']) && ($eliminar==$_REQUEST['eliminar'])) {

            echo '<h3>Datos iniciales</h3>';
            
            $rand1=rand($numMinVal,$numMaxVal);

            echo '<p>Número de valores en la matriz: '.$rand1.'</p>';
            echo '<p>Valores elegidos al azar entre '.$minVal.' y '.$maxVal.'</p>';
        
            echo '<h3>Matriz inicial de valores</h3>';
            
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

            echo '<h3>Matriz con valor eliminado</h3>';

            echo '<p>Valor a eliminar: '.$eliminar.'</p>';

            $cont=0;

            // Verifica si se encontró el valor antes de eliminarlo

            for ($i=0; $i < count($matriz); $i++) { 
                $posicion = array_search($eliminar, $matriz);
                if ($posicion !== false) {
                    // Elimina el valor de la matriz
                    unset($matriz[$posicion]);
                    $cont++;
            }}

            // Reorganiza los índices de la matriz
            $matriz = array_values($matriz);
            
            if ($cont != 0) {
                echo '<p>Se han eliminado '.$cont.' valor(es).</p>';

                /* echo '<p>Array</p>';
                echo '<p>(</p>';
                // Imprimir la matriz
                foreach ($matriz as $key => $value) {
                    echo '<blockquote>['.$key.'] => '.$value.'</blockquote>';
                }
                echo '<p>)</p>'; */
                
                echo "<pre>";
                print_r($matriz);
                echo "</pre>";
            } else {
                echo "<p>El valor indicado no se encuentra en la matriz</p>";
            }
                        

        } else {
            echo "<p>No se han proporcionado datos correctos.</p>";
        }
        
    ?>
    <a href="ej6.html">Volver al formulario.</a>
</body>
</html>