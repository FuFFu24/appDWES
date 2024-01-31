<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="baja_2.php" method="post">
        <table>
            <thead>
                <tr>
                    <th>Borrar</th>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php include("funciones.php");
                    $conn = conectarBbdd("datos_empleados");
                    // FETCH_ASSOC
                    $stmt = $conn->prepare("SELECT * FROM Alumno");
                    // Especificamos el fetch mode antes de llamar a fetch()
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    // Ejecutamos
                    $stmt->execute();
                    // Mostramos los resultados
                    while ($row = $stmt->fetch()){
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='checkbox[]' id='{$row['dni']}' value='{$row['dni']}'></td>";
                        echo "<td>{$row['dni']}</td>";
                        echo "<td>{$row['nombre']}</td>";
                        echo "<td>{$row['apellidos']}</td>";
                        echo "<td>{$row['direccion']}</td>";
                        echo "<td>{$row['telefono']}</td>";
                        echo "<td><img src='imagenes/{$row['foto']}' width='75'></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <input type="submit" value="Enviar" name="submit">
    </form>
</body>
</html>