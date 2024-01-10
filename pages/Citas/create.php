<?php include("../../db.php")?>
<?php 
session_start();
$usuario = $_SESSION['usuario'];

if(!isset($usuario)){
    header('location: ../../asistente.php');
    exit();
} else {
    ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cita y Paciente</title>
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

        input, select {
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

<button onclick="goBack()">Volver</button>
<script>
function goBack() {
  window.history.back();
}
</script>
<form action="save.php" method="POST">
<h2>Ingrese los datos de la cita y paciente</h2>
    <div>
        <div>
            <input type="text" placeholder="Nombre" name="nombre" autocomplete="off">
        </div>
        <div>
            <input type="text"  placeholder="DNI (Sin puntos)" name="id_paciente" autocomplete="off">
        </div>
        <div>
            <div data-target-input="nearest">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" placeholder="Fecha de Nacimiento" data-target="#date" name="fecha_nacimiento" autocomplete="off" id="fecha_nacimiento">
            </div>
        </div>
        <div>
            <input type="text" placeholder="Domicilio" name="Domicilio" autocomplete="off">
        </div>
        <div>
            <input type="text" name="telefono" placeholder="Telefono" autocomplete="off">
        </div>
        <div>
            <textarea placeholder="Historial Medico (opcional)" name="historial_medico" autocomplete="off"></textarea>
        </div>
        <div>
            <select name="id_medico">
                <?php
                    $query = "SELECT * FROM medico JOIN especializaciones ON especializaciones.id_especializacion = medico.id_especializacion";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                ?>
                <option selected>Elija un Doctor</option>
                <?php foreach ($result as $opciones): ?>
                    <option value="<?php echo $opciones['id_medico']?>"><?php echo $opciones['nombre_medico']?> (<?php echo $opciones['especializacion']?>)</option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <div id="fecha_cita" data-target-input="nearest">
                <label for="fecha_cita">Fecha de la Cita</label>
                <input type="date" placeholder="Fecha de la Cita" data-target="#fecha_cita" name="fecha_cita" autocomplete="off" id="fecha_cita">
            </div>
        </div>
        <div>
            <div id="time" data-target-input="nearest">
                <label for="hora_cita">Hora de la Cita</label>
                <input type="time" placeholder="Hora de la Cita" data-target="#time" name="hora_cita" autocomplete="off" id="hora_cita">
            </div>
        </div>
        <div>
            <textarea placeholder="Observaciones" name="observaciones" autocomplete="off"></textarea>
        </div>
        <div>
            <button type="submit" name="guardar_registro">Agendar Turno</button>
        </div>
    </div>
</form>
<?php
}
?>
