<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (($cantidad=$_REQUEST['cantidad']) && $divisa=$_REQUEST['divisa']) {
        switch ($divisa) {
            case 'dolares':
                echo '<p>'.round($cantidad,2).' dolares son '.$cantidad.' euros.</p>';
                break;
            case 'pesos':
                $total = $cantidad / 20.08;
                echo '<p>'.round($total,2).' pesos son '.$cantidad.' euros.</p>';
                break;
            case 'yenes':
                $total = $cantidad / 143.05;
                echo '<p>'.round($total,2).' yenes son '.$cantidad.' euros.</p>';
                break;
            case 'pesetas':
                $total = $cantidad / 166.386;
                echo '<p>'.round($total,2).' pesetas son '.$cantidad.' euros.</p>';
                break;                        
            default:
                # code...
                break;
        }
    } else {
        echo "<p>No se ha proporcionado tipo divisa.</p>";
    }
    ?>
    <a href="ej4.html">Volver a la página anterior</a>
</body>
</html>