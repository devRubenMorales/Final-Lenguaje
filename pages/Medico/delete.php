<?php include("../../db.php")?>
<?php 
session_start();
$usuario = $_SESSION['usuario'];
$tipo_usuario = $_SESSION['tipo_usuario'];

if(!isset($usuario) || $tipo_usuario !== 'superadmin') {
    header('location: ../../asistente.php');
    exit();
} else {
if(isset($_GET['id'])){
    $id_medico = $_GET['id'];
}
$query = "DELETE FROM medico WHERE id_medico = $id_medico";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("El query para eliminar fallo");
    } else {
        ?>
        <script>alert("Registro eliminado");</script>
        <?php
    }
}
?>
<script>
    window.location = "read.php";
</script>