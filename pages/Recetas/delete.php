<?php include("../../db.php")?>
<?php
session_start();
$usuario = $_SESSION['usuario'];

if(!isset($usuario)){
    header('location: ../../asistente.php');
    exit();
} else {
if(isset($_GET['id'])){
    $id_receta = $_GET['id'];
}
$query = "DELETE FROM recetas WHERE id_receta = $id_receta";
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