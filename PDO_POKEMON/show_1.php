<?php
    session_start();

    try {
        function conectarBbdd() {
            try {
                $dbname = "pokemondb";
                //Conectamos a la BBDD
                $conn = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", 'root', '');
                // Elección del modo de controlar los errores en la instancia de la conexión
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //Retorna el manejador de la conexión
                return $conn;
            } catch (PDOException $e) {
                //En caso de error se captura el mensaje
                print '<p>Error no se puede conectar con la BBDD por\n'. $e->getMessage().'</p>';
            }
        }

        $conn = conectarBbdd();

        $cont = isset($_GET["sumar"]) ? $_SESSION["contador"] += 1 : $_SESSION["contador"];
        $cont = isset($_GET["restar"]) ? $_SESSION["contador"] -= 1 : $_SESSION["contador"];

        // FETCH_ASSOC
        $stmt = $conn->prepare("SELECT * FROM pokemon");
        // Especificamos el fetch mode antes de llamar a fetch()
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // Ejecutamos
        $stmt->execute();

        if ($cont <= 0) {
            $cont = 0;
            $_SESSION["contador"] = 0;
        } else if ($cont >= $stmt->rowCount()) {
            $cont = $stmt->rowCount();
            $_SESSION["contador"] = $stmt->rowCount();
        }
    } catch (PDOException $e) {
        //En caso de error se captura el mensaje
        print '<p>Error no se puede conectar con la BBDD por\n'. $e->getMessage().'</p>';
    }

    if(!isset($_SESSION["usuario"])){
        header("Location:login_1.php");
    }else{
        // FETCH_ASSOC
        $stmt = $conn->prepare("SELECT * FROM pokemon LIMIT ?, 5");
        // Especificamos el fetch mode antes de llamar a fetch()
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $desde = $cont * 5;

        $stmt->bindParam(1, $desde, PDO::PARAM_INT);
        // Ejecutamos
        $stmt->execute();
?>
            <p>Listado completo de registros:</p>
            <table>
                <thead>
                    <tr>
                        <th>Numero pokedex</th>
                        <th>Nombre</th>
                        <th>Peso</th>
                        <th>Altura</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Mostramos los resultados
                        while ($row = $stmt->fetch()){
                            echo "<tr>";
                            echo "<td>{$row['numero_pokedex']}</td>";
                            echo "<td>{$row['nombre']}</td>";
                            echo "<td>{$row['peso']}</td>";
                            echo "<td>{$row['altura']}</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
            <p><a href="show_1.php?restar"><--</a>          <a href="show_1.php?sumar">--></a></p>
        <a href='index.php'>Volver</a>

<?php
    }
?>