<?php include("../../db.php")?>
<?php 
session_start();
$usuario = $_SESSION['usuario'];

if(!isset($usuario)){
    header('location: ../../asistente.php');
    exit();
} else {
    ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Paciente</title>
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

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<button onclick="goBack()">Volver</button>
<script>
function goBack() {
  window.history.back();
}
</script>
<form action="save.php" method="POST">
    <h2>Ingrese los datos del Paciente</h2>
    <div>
        <input type="text" name="nombre" placeholder="Ingrese Nombre del Paciente">
    </div>
    <div>
        <input type="text" name="id_paciente" placeholder="Ingrese DNI del Paciente">
    </div>
    <div>
        <input type="date" name="fecha_nacimiento" placeholder="Ingrese Fecha Nacimiento">
    </div>
    <div>
        <input type="text" name="direccion" placeholder="Ingrese Direccion del Paciente">
    </div>
    <div>
        <input type="text" name="telefono" placeholder="Ingrese Telefono del Paciente">
    </div>
    <div>
        <input type="text" name="historial_medico" placeholder="Ingrese Historial Medico">
    </div>
    <div>
        <input type="submit" name="guardar_registro" value="Guardar">
    </div>
</form>
</body>
</html>
    <?php
}
?>
