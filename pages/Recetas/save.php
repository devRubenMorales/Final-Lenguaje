<?php include("../../db.php")?>
<?php
session_start();
$usuario = $_SESSION['usuario'];

if(!isset($usuario)){
    header('location: ../../asistente.php');
    exit();
} else {
if (isset($_POST['guardar_registro'])){
    $id_paciente = $_POST['id_paciente'];
    $id_medico = $_POST['id_medico'];
    $fecha_receta = $_POST['fecha_receta'];
    $medicamentos = $_POST['medicamentos'];
    $dosis = $_POST['dosis'];
    $indicaciones = $_POST['indicaciones'];
}

$query = "INSERT INTO recetas(id_paciente, id_medico, fecha_receta, medicamentos, dosis, indicaciones) VALUES ('$id_paciente','$id_medico','$fecha_receta','$medicamentos','$dosis','$indicaciones')";
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