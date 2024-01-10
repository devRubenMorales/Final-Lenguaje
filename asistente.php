<?php
session_start();
$usuario = $_SESSION['usuario'];

if (!isset($usuario)) {
    header('location: index.php');
} else {
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel de Asistente</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #fff;
                color: #333;
                text-align: center;
                margin: 0;
                padding: 0;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }

            h1 {
                color: #3498db;
            }

            .links-container {
                margin-top: 20px;
            }

            a {
                display: block;
                margin-bottom: 10px;
                padding: 10px;
                background-color: #3498db;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
            }

            a:hover {
                background-color: #2980b9;
            }
        </style>
    </head>

    <body>
        <h1>Bienvenido, Asistente</h1>

        <div class="links-container">
            <a href="pages/Paciente/read.php">Lista de Pacientes</a>
            <a href="pages/Recetas/read.php">Lista de Recetas Médicas</a>
            <a href="pages/Citas/read.php">Lista de Citas</a>
            <a href="components/salir.php">Salir</a>
        </div>
    </body>

    </html>
<?php
}
?>