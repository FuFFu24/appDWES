<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

$nombre = isset($_POST['nombre']) ? htmlspecialchars(trim(strip_tags($_POST['nombre'])),ENT_QUOTES,"utf-8") : '';
$email = isset($_POST['email']) ? htmlspecialchars(trim(strip_tags($_POST['email'])),ENT_QUOTES,"utf-8") : '';
$asunto = "Correo eJemplo con un archivo adjunto";
$mensaje = isset($_POST['mensaje']) ? htmlspecialchars(trim(strip_tags($_POST['mensaje'])),ENT_QUOTES,"utf-8") : '';

// Validar datos (puedes agregar más validaciones según tus necesidades)
if (empty($nombre) || empty($email) || empty($mensaje)) {
    header("Location: ej2-1.php"); // Redirige al formulario si hay campos vacíos
    exit();
}

//Indicar cabecera con el nombre del remitente. Si no indicamos la dirección de correo puede que no se realice el envío a otros servicios como Hotmail o Yahoo

$cabeceras = "From: alonsofloresdaw@gmail.com"."\r\n";
$cabeceras .= "Reply-To: alonsofloresdaw@gmail.com"."\r\n";

if (is_uploaded_file ($_FILES['archivo']['tmp_name'])) {
    $nombreDirectorio = "files/";
    $nombreFichero = $_FILES['archivo']['name'];
    $nombreCompleto = $nombreDirectorio.$nombreFichero;
    if (is_file($nombreCompleto)) {
        $idUnico = time();
        $nombreFichero = $idUnico."-".$nombreFichero;
        $nombreCompleto = $nombreDirectorio.$nombreFichero;
    }
    move_uploaded_file ($_FILES['archivo']['tmp_name'],$nombreCompleto);
        echo "Fichero subido con el nombre: $nombreFichero<br>";
        // echo "<img src='$nombreCompleto' alt=''>";
} else {
    print ("No se ha podido subir el fichero\n");
}   

//SI LO HACES A TRAVÉS DE FORMULARIO AQUI SE VERIA SI HA LLEGADO EL $_FILES Y SI SE HA DESCARGADO DE FORMA SEGURA
$archivo_adjunto = $_FILES['archivo']['name'];
$contenido_adjunto = file_get_contents("files/".$archivo_adjunto);
$adjunto_codificado = chunk_split(base64_encode($contenido_adjunto));

// Creamos la cabecera del mensaje:

$cabeceras .= "MIME-Version: 1.0" . "\r\n" .
    "Content-Type: multipart/mixed; boundary=\"separador de ls partes del mensaje\"\r\n\r\n" .//frontera unica(boundary)
    "--separador de ls partes del mensaje\r\n" .   // Construimos el cuerpo del mensaje (para el texto):
    "Content-Type: text/plain; charset=\"utf-8\"\r\n" . 
    "Content-Transfer-Encoding: 7bit\r\n\r\n" .
    "$mensaje\r\n\r\n" .
    "--separador de ls partes del mensaje\r\n" .     // Continuamos construyendo el cuerpo del mensaje, añadiendo el archivo:
    "Content-Type: $_FILES[archivo][type]; name=\"$_FILES[archivo][name]\"\r\n" . 
    "Content-Transfer-Encoding: base64\r\n" .
    "Content-Disposition: attachment\r\n\r\n" .
    "$adjunto_codificado\r\n" .
    "--separador de ls partes del mensaje--";    // Separador de final del mensaje

    $ok =mail($email, $asunto, $mensaje, $cabeceras);
	
	if( $ok == true ) {
			echo "<p>El E-Mail ha sido enviado</p>";
            echo '<p>Haz <a href="ej2-1.php">click para volver al formulario</a></p>';
     } else {
			echo "<p>ERROR al enviar el E-Mail</p>";
     }
}