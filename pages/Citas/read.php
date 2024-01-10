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
    <title>Lista de Citas</title>
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

<body>
    <a href="create.php">
        <button type="button">Agregar Citas y Pacientes</button>
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
                <th>Paciente</th>
                <th>Medico</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Observaciones</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM Citas JOIN paciente ON paciente.id_paciente = citas.id_paciente JOIN medico ON medico.id_medico = citas.id_medico";
            $result_citas = mysqli_query($conn, $query);

            while($row = mysqli_fetch_array($result_citas)){?>
                <tr>
                    <td><?php echo $row['nombre']?></td>
                    <td><?php echo $row['nombre_medico']?></td>
                    <td><?php echo $row['fecha_cita']?></td>
                    <td><?php echo $row['hora_cita']?></td>
                    <td><?php echo $row['observaciones']?></td>
                    <td class="action-buttons">
                        <a href="delete.php?id=<?php echo $row['id_cita']?>">
                            <button type="button" >Eliminar</button>
                        </a>
                        <a href="update.php?id=<?php echo $row['id_cita']?>">
                            <button type="button" name="update">Modificar</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
<?php
}
?>