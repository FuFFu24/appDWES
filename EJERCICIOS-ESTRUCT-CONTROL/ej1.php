<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo '<p>Actualice la pagina para mostrar una nueva tirada.</p>';

        $rand1=rand(1,6);
        $rand2=rand(1,6);

        print '<img src="img/'.$rand1.'.svg" alt="dado1">';
        print '<img src="img/'.$rand2.'.svg" alt="dado2">';

        if ($rand1 != $rand2) {
            if ($rand1 > $rand2) {
                echo '<p>No ha sacado pareja. El valor mas alto es '.$rand1.'</p>';
            } else {
                echo '<p>No ha sacado pareja. El valor mas alto es '.$rand2.'</p>';
            }
            
        } else {
            echo '<p>Ha sacado pareja de '.$rand1.'.</p>';
        }
        
    ?>
</body>
</html>