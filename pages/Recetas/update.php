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
    <title>Actualizar Receta Médica</title>
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
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $id_receta = $_GET['id'];
        $query = "SELECT * FROM recetas WHERE id_receta = $id_receta";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $id_paciente = $row['id_paciente'];
            $id_medico = $row['id_medico'];
            $fecha_receta = $row['fecha_receta'];
            $medicamentos = $row['medicamentos'];
            $dosis = $row['dosis'];
            $indicaciones = $row['indicaciones'];
        }
    }
    if (isset($_POST['update2'])) {
        $id_receta = $_GET['id'];
        $id_paciente = $_POST['id_paciente'];
        $id_medico = $_POST['id_medico'];
        $fecha_receta = $_POST['fecha_receta'];
        $medicamentos = $_POST['medicamentos'];
        $dosis = $_POST['dosis'];
        $indicaciones = $_POST['indicaciones'];

        $query = "UPDATE recetas SET id_paciente = '$id_paciente', id_medico = '$id_medico', fecha_receta = '$fecha_receta',
     medicamentos  = '$medicamentos ', dosis = '$dosis' , indicaciones = '$indicaciones'  WHERE id_receta = $id_receta";
        $result = mysqli_query($conn, $query);
        if (!$result) {
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
            <?php foreach ($result as $opciones) : ?>
                <option value="<?php echo $opciones['id_paciente'] ?>" <?php echo ($opciones['id_paciente'] == $id_paciente) ? 'selected' : ''; ?>><?php echo $opciones['nombre'] ?></option>
            <?php endforeach ?>
        </select>

        <select name="id_medico">
            <?php
            $query = "SELECT * FROM medico";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            ?>
            <?php foreach ($result as $opciones) : ?>
                <option value="<?php echo $opciones['id_medico'] ?>" <?php echo ($opciones['id_medico'] == $id_medico) ? 'selected' : ''; ?>><?php echo $opciones['nombre_medico'] ?></option>
            <?php endforeach ?>
        </select>
        <div>
            <input type="date" name="fecha_receta" value="<?php echo $fecha_receta; ?>" placeholder="Actualizar fecha de la receta">
        </div>
        <div>
            <input type="text" name="medicamentos" value="<?php echo $medicamentos; ?>" placeholder="Actualizar medicamentos">
        </div>
        <div>
            <input type="text" name="dosis" value="<?php echo $dosis; ?>" placeholder="Actualizar dosis">
        </div>
        <div>
            <input type="text" name="indicaciones" value="<?php echo $indicaciones; ?>" placeholder="Actualizar indicaciones">
        </div>
        <button name="update2">Actualizar</button>
    </form>
</body>
</html>
<?php
}
?>