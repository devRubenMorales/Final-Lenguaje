<?php
include("../../db.php");

session_start();
$usuario = $_SESSION['usuario'];

if (!isset($usuario)) {
    header('location: ../../asistente.php');
    exit();
} else {
    if (isset($_GET['id'])) {
        $id_paciente = $_GET['id'];

        // Eliminar recetas asociadas al paciente
        $query_eliminar_recetas = "DELETE FROM recetas WHERE id_paciente = '$id_paciente'";
        $result_eliminar_recetas = mysqli_query($conn, $query_eliminar_recetas);

        if (!$result_eliminar_recetas) {
            die("Fallo al eliminar recetas. Error: " . mysqli_error($conn));
        }

        // Eliminar citas asociadas al paciente
        $query_eliminar_citas = "DELETE FROM citas WHERE id_paciente = '$id_paciente'";
        $result_eliminar_citas = mysqli_query($conn, $query_eliminar_citas);

        if (!$result_eliminar_citas) {
            die("Fallo al eliminar citas. Error: " . mysqli_error($conn));
        }

        // Finalmente, eliminar al paciente
        $query_eliminar_paciente = "DELETE FROM paciente WHERE id_paciente = '$id_paciente'";
        $result_eliminar_paciente = mysqli_query($conn, $query_eliminar_paciente);

        if (!$result_eliminar_paciente) {
            die("Fallo al eliminar paciente. Error: " . mysqli_error($conn));
        }

        // Redireccionar a la página de lectura después de eliminar
        header("Location: read.php");
    } else {
        echo "ID del paciente no especificado.";
    }
}
?>