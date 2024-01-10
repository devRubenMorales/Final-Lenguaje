<?php include("../../db.php")?>
<?php
if(isset($_GET['id'])){
    $id_usuario = $_GET['id'];
    $query = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $usuario = $row['usuario'];
        $tipo_usuario = $row['tipo_usuario'];
    }
}
if(isset($_POST['update2'])){
    $id_usuario = $_GET['id_usuario'];
    $usuario = $_POST['usuario'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $query = "UPDATE usuarios SET usuario = '$usuario', tipo_usuario = '$tipo_usuario' WHERE id_usuario = $id_usuario";
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
    <title>Actualizar Usuarios</title>
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
<h1>Actualizar Datos</h1>

<form action="update.php?id=<?php echo $_GET['id']; ?>" method="POST">
    <div>
        <input type="text" name="usuario" value="<?php print $usuario;?>" placeholder="Actualizar usuario">
    </div>
    <div>
        <input type="text" name="tipo_usuario" value="<?php print $tipo_usuario;?>" placeholder="Actualizar tipo de usuario">
    </div>
    <button name="update2">Actualizar</button>
</form>
</body>
    <?php
}
?>
