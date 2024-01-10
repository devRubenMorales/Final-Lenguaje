
<?php include("../../db.php")?>
<?php
if(isset($_GET['id'])){
    $id_cita = $_GET['id'];
    $query = "SELECT * FROM Citas WHERE id_cita = $id_cita";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $id_paciente = $row['id_paciente'];
        $id_medico = $row['id_medico'];
        $fecha_cita = $row['fecha_cita'];
        $hora_cita = $row['hora_cita'];
        $observaciones = $row['observaciones'];
    }
}
if(isset($_POST['update2'])){ 
    $id_cita = $_GET['id'];
    $id_paciente = $_POST['id_paciente'];
    $id_medico = $_POST['id_medico'];
    $fecha_cita = $_POST['fecha_cita'];
    $hora_cita = $_POST['hora_cita'];
    $observaciones = $_POST['observaciones'];
    
    $query = "UPDATE Citas SET id_paciente = '$id_paciente', id_medico = '$id_medico', fecha_cita = '$fecha_cita', hora_cita  = '$hora_cita ', observaciones = '$observaciones' WHERE id_cita = $id_cita";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "El query actualizar fallo";
    } else {
        ?>
        <script>alert("Registro actualizado");</script>
        <script>
            window.location = "read.php";
        </script>
        <?php
    }
}
?>
<?php 
session_start();
$usuario = $_SESSION['usuario'];

if(!isset($usuario)){
    header('location: ../../asistente.php');
    exit();
} else {
    ?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Datos Citas</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #3498db;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #2980b9;
        }
        </style>
    <body>
<button onclick="goBack()">Volver</button>
    <script>
        function goBack() {
        window.history.back();
        }
   </script>
<h1>Actualizar Datos</h1>


<form action="update.php?id=<?php echo $_GET['id']; ?>" method="POST">
<select name="id_paciente">
            <?php
                $query = "SELECT * FROM paciente";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            ?>
            <?php foreach ($result as $opciones): ?>
                <option value="<?php echo $opciones['id_paciente']?>"><?php echo $opciones['nombre']?></option>
            <?php endforeach ?>

        </select>

    <select name="id_medico">
            <?php
                $query = "SELECT * FROM medico";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            ?>
            <?php foreach ($result as $opciones): ?>
                <option value="<?php echo $opciones['id_medico']?>"><?php echo $opciones['nombre_medico']?></option>
            <?php endforeach ?>

        </select>
    <div>
        <input type="text" name="fecha_cita" value="<?php print $fecha_cita;?>" placeholder="Actualizar fecha de la cita">
    </div>
    <div>
        <input type="text" name="hora_cita" value="<?php print $hora_cita;?>" placeholder="Actualizar hora de la cita">
    </div>
    <div>
        <input type="text" name="observaciones" value="<?php print $observaciones;?>" placeholder="Actualizar observaciones">
    </div>
    <button name="update2">Actualizar</button>
</form>
</body>
    <?php
}
?>        