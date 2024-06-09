<?php
$servername = "localhost";
$username = "root";
$password = "";  // Deja esto vacío si no has configurado una contraseña
$dbname = "pd3";

// Crear la conexión
$conexion = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
