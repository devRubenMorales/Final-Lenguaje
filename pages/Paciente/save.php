<?php include("../../db.php")?>
<?php
session_start();
$usuario = $_SESSION['usuario'];

if(!isset($usuario)){
    header('location: ../../asistente.php');
    exit();
} else {
if (isset($_POST['guardar_registro'])){
    $nombre = $_POST['nombre'];
    $id_paciente = $_POST['id_paciente'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $historial_medico = $_POST['historial_medico'];
}

$query = "INSERT INTO paciente(nombre, id_paciente, fecha_nacimiento, direccion, telefono, historial_medico) VALUES ('$nombre', '$id_paciente','$fecha_nacimiento','$direccion','$telefono','$historial_medico')";
$result = mysqli_query($conn, $query);
if(!$result){
    die("Fallo en el query. Existe un problema en la base de datos");
}
}
?>
<script>
    window.history.back();
</script>