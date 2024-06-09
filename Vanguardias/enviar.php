<?php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$comentario = $_POST["comentario"];

$destino = "mail@mail.com, mail2@mail.com"; // Dirección(es) de correo a donde se enviará el mensaje
$asunto = "Contacto desde el sitio"; // Asunto del correo
$mensaje = "Nombre: " . $nombre . "\nApellido: " . $apellido . "\nEmail: " . $email . "\nMensaje: " . $comentario; // Contenido del mensaje

$cabeceras = "From: $nombre <$email>"; // Cabeceras adicionales

$enviado = mail($destino, $asunto, $mensaje, $cabeceras); // Función para enviar el correo

if ($enviado) {
    // Redirigir al usuario a la página de ingresar
    header('Location: ingresar.html');
    exit; // Asegúrate de que el script se detenga después de enviar la cabecera de redirección
} else {
    echo "Hubo un error en el envío del correo.";
}

// Guardar en la base de datos
include "conexion.php";
$consulta = mysqli_query($conexion, "INSERT INTO contactos (nombre,apellido,email,comentario) VALUES ('$nombre','$apellido','$email','$comentario')") or die(mysqli_error($conexion));
?>
