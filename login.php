<?php include("db.php") ?>
<?php 
session_start();
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$tipo_usuario = isset($_SESSION['tipo_usuario']) ? $_SESSION['tipo_usuario'] : null;

if ($usuario && $tipo_usuario == "superadmin") {
    header('location: superadmin.php');
} elseif ($usuario && $tipo_usuario == "asistente") {
    header('location: asistente.php');  
} else {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            background-color: #ffffff; /* Blanco */
            color: #333333; /* Texto oscuro */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff; /* Blanco */
            border: 1px solid #e0e0e0; /* Borde gris claro */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sutil sombra */
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333333; /* Texto oscuro */
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #cccccc; /* Borde gris */
            border-radius: 4px;
        }

        button {
            background-color: #4285f4; /* Azul de Google */
            color: #ffffff; /* Texto blanco */
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #307ae8; /* Azul más oscuro al pasar el ratón */
        }

        .go-to-index {
            text-align: center;
            margin-top: 20px;
        }

        .go-to-index a {
            color: #4285f4; /* Azul de Google */
            text-decoration: none;
        }

        .go-to-index a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="components/validar.php" method="post">
        <h2>Iniciar Sesión</h2>
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="contrasena">Contraseña</label>
        <input type="password" id="contrasena" name="contrasena" required>

        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>
<?php
}
?>