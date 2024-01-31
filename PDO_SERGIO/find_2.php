<?php
include("funciones.php");
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location:login_1.php");
} else {
    include("includes/header.php");

    if (isset($_POST["submit"])) {
        $name    = sanitized_data($_POST["name"]);
        $surname = sanitized_data($_POST["surname"]);
        
        $_SESSION["name"]    = $name;
        $_SESSION["surname"] = $surname;
    }
    
    if(isset($_GET["nombre"])){
        $campoOrden = "nombre";
        $tipoOrden = $_GET["nombre"];
    }
    
    if(isset($_GET["apellidos"])){
        $campoOrden = "apellidos";
        $tipoOrden = $_GET["apellidos"];
    }
    
    $query = "SELECT * FROM persona WHERE nombre LIKE :nombre AND apellidos LIKE :apellidos";

    if (isset($campoOrden) && isset($tipoOrden)) {
        $query .= " ORDER BY $campoOrden $tipoOrden";
    }


    try {
        $conn = connectDB("agenda");
        $stm = $conn->prepare($query);
        $modName = "%{$_SESSION['name']}%";
        $modSurname = "%{$_SESSION['surname']}%";
        $stm->bindParam(":nombre", $modName);
        $stm->bindParam(":apellidos", $modSurname);
        $stm->execute();
    } catch (Exception $e) {
        logError($e->getMessage());
        echo $e->getMessage();
    }

    
?>
<p>Registros encontrados:</p>
<table>
    <tbody>
        <tr>
            <th><a href="find_2.php?nombre=DESC">&darr;</a>Nombre<a href="find_2.php?nombre=ASC">&uarr;</a></th>
            <th><a href="find_2.php?apellidos=DESC">&darr;</a>Apellidos<a href="find_2.php?apellidos=ASC">&uarr;</a></th>
        </tr>
        <?php
        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['nombre']}</td>";
            echo "<td>{$row['apellidos']}</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<a href='find_1.php'>Volver</a>

<?php
    include("includes/footer.php");
}
?>
