<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #3498db;
        }

        div {
            margin-bottom: 15px;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        button {
            padding: 10px;
            margin-top: 10px;
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
        }

        select {
            width: 100%;
        }

        textarea {
            width: 100%;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>

<?php
// Tu código PHP aquí
?>
<button onclick="goBack()">Volver</button>
<script>
function goBack() {
  window.history.back();
}
</script>
<form action="register.php" method="post">
    <h2>Registro de Usuario</h2>
   
    <input placeholder="Ingrese usuario" type="text" id="usuario" name="usuario" required>

    
    <input placeholder="Ingrese contraseña" type="password" id="contrasena" name="contrasena" required>

    
    <select id="tipo_usuario" name="tipo_usuario" required>
        <option value="asistente">Asistente</option>
        <option value="superadmin">Superadmin</option>
    </select>

    <button type="submit">Registrarse</button>
</form>

</body>
</html>