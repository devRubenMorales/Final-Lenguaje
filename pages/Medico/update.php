<?php include("../../db.php")?>
<?php
if(isset($_GET['id'])){
    $id_medico = $_GET['id'];
    $query = "SELECT * FROM medico WHERE id_medico = $id_medico";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $nombre_medico = $row['nombre_medico'];
        $id_especializacion = $row['id_especializacion'];
        $email = $row['email'];
        $telefono = $row['telefono'];
        $horario_trabajo = $row['horario_trabajo'];
    }
}
if(isset($_POST['update2'])){
    $id_paciente = $_GET['id'];
    $nombre_medico = $_POST['nombre_medico'];
    $id_especializacion = $_POST['id_especializacion'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $horario_trabajo = $_POST['horario_trabajo'];
    $query = "UPDATE medico SET nombre_medico = '$nombre_medico', id_especializacion = '$id_especializacion', email = '$email', telefono = '$telefono', horario_trabajo = '$horario_trabajo' WHERE id_medico = $id_medico";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "El query actualizar falló";
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
$tipo_usuario = $_SESSION['tipo_usuario'];

if(!isset($usuario) || $tipo_usuario !== 'superadmin') {
    header('location: ../../asistente.php');
    exit();
} else {
    ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Datos Médico</title>
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
<button onclick="goBack()">Volver</button>
<script>
function goBack() {
  window.history.back();
}
</script>
    <h1>Actualizar Datos de Médico</h1>
    <form action="update.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div>
            <label for="nombre_medico">Nombre Médico</label>
            <input type="text" name="nombre_medico" value="<?php print $nombre_medico;?>" placeholder="Actualizar nombre" required>
        </div>
        <div>
            <label for="id_especializacion">Especialización</label>
            <select name="id_especializacion" id="especializacion">
                <?php
                    $query = "SELECT * FROM especializaciones";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                ?>
                <?php foreach ($result as $opciones): ?>
                    <option value="<?php echo $opciones['id_especializacion']?>" <?php echo ($id_especializacion == $opciones['id_especializacion']) ? 'selected' : ''; ?>><?php echo $opciones['especializacion']?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php print $email;?>" placeholder="Actualizar email" required>
        </div>
        <div>
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" value="<?php print $telefono;?>" placeholder="Actualizar teléfono" required>
        </div>
        <div>
            <label for="horario_trabajo">Horarios de Trabajo</label>
            <input type="text" name="horario_trabajo" value="<?php print $horario_trabajo;?>" placeholder="Actualizar horarios de trabajo" required>
        </div>
        <button name="update2">Actualizar</button>
    </form>
</body>

</html>
    <?php
}
?>