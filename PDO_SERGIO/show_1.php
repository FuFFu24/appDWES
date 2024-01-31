<?php
    include("funciones.php");
    session_start();

    if(!isset($_SESSION["usuario"])){
        header("Location:login_1.php");
    }else{

        include("includes/header.php");
        $query = "SELECT * FROM persona";

        if(isset($_GET["nombre"])){
            $orden = $_GET["nombre"];
            $query = "SELECT * FROM persona ORDER BY nombre {$orden}";
        }else if(isset($_GET["apellidos"])){
            $orden = $_GET["apellidos"];
            $query = "SELECT * FROM persona ORDER BY apellidos {$orden}";
        }

        $conn = connectDB("agenda");
        $stm = $conn->prepare($query);
        $stm->execute();
?>
            <p>Listado completo de registros:</p>
            <table>
                <tbody>
                    <tr>
                        <th><a href="show_1.php?nombre=DESC">&darr;</a>Nombre<a href="show_1.php?nombre=ASC">&uarr;</a></th>
                        <th><a href="show_1.php?apellidos=DESC">&darr;</a>Apellidos<a href="show_1.php?apellidos=ASC">&uarr;</a></th>
                    </tr>
                    <?php while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                            echo "<tr>";
                            echo "<td>{$row['nombre']}</td>";
                            echo "<td>{$row['apellidos']}</td>";
                            echo "</tr>";
                        }?>
                </tbody>
            </table>
        <a href='index.php'>Volver</a>

<?php
        include("includes/footer.php");
    }