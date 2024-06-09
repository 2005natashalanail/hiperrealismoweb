<?php 
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login de Usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            background-color: #E8DFCA;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            max-width: 800px;
            text-align: center;
        }
        .container::before {
            content: '';
            position: absolute;
            top: -50px;
            left: -50px;
            width: 200%;
            height: 200%;
            background-image: url('https://www.example.com/hiperrealismo-bg.jpg'); /* Imagen de hiperrealismo */
            background-size: cover;
            filter: blur(30px);
            transform: scale(1.2);
            z-index: -1;
        }
        h1 {
            color: #343a40;
        }
        .btn {
            background-color: #FF0000;
            color: white;
            border-radius: 25px;
            padding: 10px 20px;
            font-weight: bold;
            border: none;
            transition: transform 0.3s;
            margin: 10px;
        }
        .btn:hover {
            transform: scale(1.1);
        }
        .panel-link {
            display: block;
            margin-top: 20px;
            color: #343a40;
            font-weight: bold;
            text-align: center;
        }
        .panel-link:hover {
            color: #8B0000;
            text-decoration: none;
        }
        .interest-section {
            margin-top: 30px;
        }
        .interest-section h2 {
            color: #343a40;
            margin-bottom: 20px;
        }
        .embed-responsive {
            margin-bottom: 20px;
        }
        .spotify-embed {
            margin: 10px 0;
        }
    </style>
</head>
<body>

<div class="container text-center">
    <?php
    $usuario = $_POST['usuario'];
    $password = md5($_POST['password']);

    include("conexion.php");

    $consulta = mysqli_query($conexion, "SELECT nombre, apellido FROM usuarios WHERE usuario='$usuario' AND clave='$password'");
    $resultado = mysqli_num_rows($consulta);

    if ($resultado != 0) {
        $respuesta = mysqli_fetch_array($consulta);
        
        $_SESSION['nombre'] = $respuesta['nombre'];
        $_SESSION['apellido'] = $respuesta['apellido'];
        
        echo "<h1>Bienvenido, ".$_SESSION['nombre']." ".$_SESSION['apellido']."</h1>";
        echo "<p>Acceso al panel de usuarios.</p>";
        echo "<a href='panel.php' class='btn'>Ir al Panel</a>";
    } else {
        echo "<h1>No es un usuario registrado</h1>";
        if (file_exists('form_registro.php')) {
            include("form_registro.php");
        }
        echo "<a href='ingresar.html' class='btn'>Registrate</a>"; // Botón "Volver a inicio"
    }
    ?>
    <div class="interest-section">
        <h2>Te puede interesar:</h2>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/cFqDFC8j_j4" allowfullscreen></iframe>
        </div>
        <div class="spotify-embed">
            <iframe src="https://open.spotify.com/embed/track/3IPDrJv26f5Gkvl2rHH4hL?si=H3WRVj-NS127eMPOsFVrcg" width="300" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
        </div>
        <div class="spotify-embed">
            <iframe src="https://open.spotify.com/embed/track/2ZPjptfNCQFLKH9nPJQx3w?si=rhML34R3TNahoXwbun0baA" width="300" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/js/bootstrap.min.js"></script>
</body>
</html>
