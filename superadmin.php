<?php 
session_start();
$usuario = $_SESSION['usuario'];
$tipo_usuario = $_SESSION['tipo_usuario'];

if(!isset($usuario) || $tipo_usuario !== 'superadmin') {
    header('location: asistente.php');
    exit();
} else {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel Administrador</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
            }

            .welcome-message {
                font-size: 24px;
                color: #333;
            }

            .links-container {
                display: flex;
                flex-direction: column;
                margin-top: 20px;
            }

            .links-container a {
                margin-bottom: 10px;
                padding: 10px;
                background-color: #3498db;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
                text-align: center;
            }

            .links-container a:hover {
                background-color: #2980b9;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <p class="welcome-message">Bienvenido, Administrador.</p>
            <div class="links-container">
                <a href="pages/Medico/read.php">Lista de Medicos</a>
                <a href="pages/Especializaciones/read.php">Lista de Especializaciones</a>
                <a href="pages/Paciente/read.php">Lista de Pacientes</a>
                <a href="pages/Recetas/read.php">Lista de Recetas Médicas</a>
                <a href="pages/Citas/read.php">Lista de Citas</a>
                <a href="pages/Usuarios/read.php">Lista de Usuarios</a>
                <a href="components/salir.php">Salir</a>
            </div>
        </div>
    </body>
    </html>
    <?php
}
?>