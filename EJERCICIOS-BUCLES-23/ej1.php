<!-- Escriba un programa que dibuje entre 1 y 10 círculos negros (al
azar) en una fila de tabla.
 -->

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,td {
            border: 1px solid black;
        }
    </style>
 </head>
 <body>
    <?php
        echo '<p>Actualice la pagina para mostrar un nuevo dibujo.</p>';
        
        $rand=rand(1,10);
        echo '<h3>'.$rand.' circulos</h3>';

        echo '<table>';
            for ($i=0; $i < $rand; $i++) { 
                echo '<td>
                    <svg width="80" height="80" viewBox="0 0 120 120">
                    <circle cx="60" cy="60" r="50" />
                </svg></td>';
            }
        echo '</table>';
    ?>
 </body>
 </html>