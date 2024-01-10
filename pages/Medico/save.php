<?php include("../../db.php")?>
<?php 
session_start();
$usuario = $_SESSION['usuario'];
$tipo_usuario = $_SESSION['tipo_usuario'];

if(!isset($usuario) || $tipo_usuario !== 'superadmin') {
    header('location: ../../asistente.php');
    exit();
} else {
if (isset($_POST['guardar_registro'])){
    $nombre_medico = $_POST['nombre_medico'];
    $id_especializacion = $_POST['id_especializacion'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $horario_trabajo = $_POST['horario_trabajo'];
}

$query = "INSERT INTO medico(nombre_medico, id_especializacion, email, telefono, horario_trabajo) VALUES ('$nombre_medico','$id_especializacion','$email','$telefono','$horario_trabajo')";
$result = mysqli_query($conn, $query);
if(!$result){
    die("Fallo en el query. Existe un problema en la base de datos");
} else {
    ?>
    <script>alert("Registro Guardado");</script>
    <?php
}
}
?>
<script>
    window.location = "read.php";
</script>