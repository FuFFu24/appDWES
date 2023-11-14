<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //Datos de la base de datos
    $usuario = "root";
    $password = "";
    $servidor = "localhost";
    $basededatos = "datos_empleados";

    // creación de la conexión a la base de datos con mysql
    $conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");

    $crearDatabase = "CREATE DATABASE IF NOT EXISTS datos_empleados";

    mysqli_query( $conexion, $crearDatabase ) or die ( "Algo ha ido mal en la consulta a la base de datos (crearDatabase)");

    // Selección del a base de datos a utilizar
    mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

    $crearTablaUsuario = "CREATE TABLE IF NOT EXISTS usuario (
        user VARCHAR(30),
        pass VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,
        PRIMARY KEY (user)
    )";

    mysqli_query($conexion, $crearTablaUsuario) or die ( "Algo ha ido mal en la consulta a la base de datos (crearTablaUsuario)");

    $insertarDatos1 = "INSERT INTO usuario (user, pass, email) 
    VALUES ('User1', 'admin1', 'user1@gmail.com')";

    $insertarDatos2 = "INSERT INTO usuario (user, pass, email) 
    VALUES ('User2', 'admin2', 'user2@gmail.com')";

    $insertarDatos3 = "INSERT INTO usuario (user, pass, email) 
    VALUES ('User3', 'admin3', 'user3@gmail.com')";

    $consulta = "select * from usuario";
    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos (consulta)");
    $resultado = mysqli_num_rows($resultado);

    if ($resultado == 0) {
        mysqli_query( $conexion, $insertarDatos1 ) or die ( "Algo ha ido mal en la consulta a la base de datos (insertarDatos1)");
        mysqli_query( $conexion, $insertarDatos2 ) or die ( "Algo ha ido mal en la consulta a la base de datos (insertarDatos2)");
        mysqli_query( $conexion, $insertarDatos3 ) or die ( "Algo ha ido mal en la consulta a la base de datos (insertarDatos3)");
    }

    $crearTablaEmpleados = "CREATE TABLE IF NOT EXISTS empleados (
        codigo INT NOT NULL AUTO_INCREMENT,
        nombres VARCHAR(30) NOT NULL,
        lugar_nacimiento VARCHAR(30) NOT NULL,
        fecha_nacimiento DATE NOT NULL,
        direccion VARCHAR(30) NOT NULL,
        telefono INT NOT NULL,
        puesto VARCHAR(30) NOT NULL,
        PRIMARY KEY (codigo)
    )";
    
    mysqli_query( $conexion, $crearTablaEmpleados ) or die ( "Algo ha ido mal en la consulta a la base de datos (crearTablaEmpleados)");

    // establecer y realizar consulta. guardamos en variable.
    $consulta = "SELECT * FROM usuario";
    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos (consulta)");

    // Motrar el resultado de los registro de la base de datos
    // Encabezado de la tabla
    echo "<table borde='2'>";
    echo "<tr>";
    echo "<th>USER</th>";
    echo "<th>PASS</th>";
    echo "<th>EMAIL</th>";
    echo "</tr>";
    // Bucle while que recorre cada registro y muestra cada campo en la tabla.
    while ($columna = mysqli_fetch_array( $resultado ))
    {
    echo "<tr>";
    echo "<td>" . $columna['user'] . "</td><td>" . $columna['pass'] . "</td><td>" . $columna['email'] . "</td>";
    echo "</tr>";
    }
    echo "</table>"; // Fin de la tabla

    // cerrar conexión de base de datos
    mysqli_close( $conexion );

    ?>

    <form action="validar.php" method="post">
        <p>
            <label for="usuario">Usuario: </label>
            <input type="text" name="usuario" id="usuario">
        </p>
        <p>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password">
        </p>
        <?php
            if (isset($_GET['error']) && $_GET['error'] == "errorCredenciales") {
                echo '<p style="color: red">No ha bien las credenciales</p>';
            }
        ?>
        <p>
            <input type="submit" value="Iniciar Sesion" name="iniciar">
        </p>
    </form>
</body>
</html>