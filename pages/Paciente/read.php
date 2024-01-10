<?php include("../../db.php")?>
<?php 
session_start();
$usuario = $_SESSION['usuario'];

if(!isset($usuario)){
    header('location: ../../asistente.php');
    exit();
} else {
    ?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-bottom: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }

        button:hover {
            background-color: #2980b9;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<a href="create.php">
    <button type="button">Agregar Paciente</button>
</a>
<button onclick="goBack()">Volver</button>
<script>
function goBack() {
  window.history.back();
}
</script>
<table>
    <thead>
        <tr>
            <th>Nombre paciente</th>
            <th>DNI</th>
            <th>Fecha nacimiento</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Historial Medico</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM paciente";
        $result_paciente = mysqli_query($conn, $query);

        while($row = mysqli_fetch_array($result_paciente)){?>
            <tr>
                <td><?php echo $row['nombre']?></td>
                <td><?php echo $row['id_paciente']?></td>
                <td><?php echo $row['fecha_nacimiento']?></td>
                <td><?php echo $row['direccion']?></td>
                <td><?php echo $row['telefono']?></td>
                <td><?php echo $row['historial_medico']?></td>
                <td>
                    <a href="delete.php?id=<?php echo $row['id_paciente']?>">
                        <button type="button" >Eliminar</button>
                    </a>
                    <br>
                    <a href="update.php?id=<?php echo $row['id_paciente']?>">
                        <button type="button" name="update">Modificar</button>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
    <?php
}
?>