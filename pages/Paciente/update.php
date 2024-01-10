<?php include("../../db.php")?>
<?php
if(isset($_GET['id'])){
    $id_paciente = $_GET['id'];
    $query = "SELECT * FROM paciente WHERE id_paciente = $id_paciente";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $id_paciente = $row['id_paciente'];
        $fecha_nacimiento = $row['fecha_nacimiento'];
        $direccion = $row['direccion'];
        $telefono = $row['telefono'];
        $historial_medico = $row['historial_medico'];
    }
}
if(isset($_POST['update2'])){
    $id_paciente = $_GET['id'];
    $nombre = $_POST['nombre'];
    $id_paciente = $_POST['id_paciente'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $historial_medico = $_POST['historial_medico'];
    $query = "UPDATE paciente SET nombre = '$nombre', id_paciente = '$id_paciente', fecha_nacimiento = '$fecha_nacimiento', direccion = '$direccion', telefono = '$telefono', historial_medico = '$historial_medico' WHERE id_paciente = $id_paciente";
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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Paciente</title>
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

        input {
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
<h1>Actualizar Datos</h1>

<form action="update.php?id=<?php echo $_GET['id']; ?>" method="POST">
    <div>
        <input type="text" name="nombre" value="<?php print $nombre;?>" placeholder="Actualizar nombre">
    </div>
    <div>
        <input type="text" name="id_paciente" value="<?php print $id_paciente;?>" placeholder="Actualizar DNI">
    </div>
    <div>
        <input type="date" name="fecha_nacimiento" value="<?php print $fecha_nacimiento;?>" placeholder="Actualizar fecha de nacimiento">
    </div>
    <div>
        <input type="text" name="direccion" value="<?php print $direccion;?>" placeholder="Actualizar direccion">
    </div>
    <div>
        <input type="text" name="telefono" value="<?php print $telefono;?>" placeholder="Actualizar telefono">
    </div>
    <div>
        <input type="text" name="historial_medico" value="<?php print $historial_medico;?>" placeholder="Actualizar historial medico">
    </div>
    <button name="update2">Actualizar</button>
</form>
</body>
    <?php
}

