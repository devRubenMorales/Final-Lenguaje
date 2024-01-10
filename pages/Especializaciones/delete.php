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
    $id_especializacion = $_GET['id'];
}
$query = "DELETE FROM especializaciones WHERE id_especializacion = $id_especializacion";
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