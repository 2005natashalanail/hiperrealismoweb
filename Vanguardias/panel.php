<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<style>
    body {
        background-color: #E8DFCA;
        font-family: 'Arial', sans-serif;
    }
    .container {
        background: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 600px;
        margin: 20px auto;
    }
    h1 {
        color: #343a40;
        margin-bottom: 20px;
    }
    img, .gif-image {
        max-width: 100%;
        height: auto;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    .btn-logout {
        background-color: #FF0000;
        color: white;
        border-radius: 25px;
        padding: 10px 20px;
        font-weight: bold;
        border: none;
        transition: transform 0.3s;
        text-decoration: none;
    }
    .btn-logout:hover {
        transform: scale(1.1);
        text-decoration: none;
    }
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
</style>
</head>
<body>
<div class="container">
    <?php
    if (isset($_SESSION['nombre']) && isset($_SESSION['apellido'])) {
        echo "<h1>Hola, " . $_SESSION['nombre'] . " " . $_SESSION['apellido'] . "!</h1>";
        echo "<p><img src='https://i.pinimg.com/originals/e0/4f/79/e04f797f5f0d83fcf3f9941ad9ceca2c.gif' class='gif-image' alt='Hiperrealismo GIF' /></p>";
        echo "<a href='salir.php' class='btn btn-logout'>Cerrar sesión</a>";
    } else {
        echo "<div class='login-container'>";
        echo "<p>Solo usuarios registrados...</p>";
        //include("form_registro.php");
        include("form_login.php");
        echo "</div>";
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/js/bootstrap.min.js"></script>
</body>
</html>
