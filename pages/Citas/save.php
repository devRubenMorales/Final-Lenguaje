<?php include("../../db.php"); ?>

<?php
    if (isset($_POST['guardar_registro'])) {
        $nombre = $_POST['nombre'];
        $id_paciente = $_POST['id_paciente'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $historial_medico = $_POST['historial_medico'];
        $id_medico = $_POST['id_medico'];
        $fecha_cita = $_POST['fecha_cita'];
        $hora_cita = $_POST['hora_cita'];
        $observaciones = $_POST['observaciones'];

        // Verificar si el paciente ya existe
        $query_verificar_paciente = "SELECT * FROM paciente WHERE id_paciente = '$id_paciente'";
        $result_verificar_paciente = mysqli_query($conn, $query_verificar_paciente);

        if (mysqli_num_rows($result_verificar_paciente) == 0) {
            // El paciente no existe, insertar datos del paciente
            $query_paciente = "INSERT INTO paciente(nombre, id_paciente, fecha_nacimiento, direccion, telefono, historial_medico) VALUES ('$nombre', '$id_paciente','$fecha_nacimiento','$direccion','$telefono','$historial_medico')";
            $result_paciente = mysqli_query($conn, $query_paciente);

            if (!$result_paciente) {
                die("Fallo en el query del paciente. Existe un problema en la base de datos");
            }
        }

        // Insertar datos de la cita
        $query_cita = "INSERT INTO citas(id_paciente, id_medico, fecha_cita, hora_cita, observaciones) VALUES ('$id_paciente','$id_medico','$fecha_cita','$hora_cita','$observaciones')";
        $result_cita = mysqli_query($conn, $query_cita);

        if (!$result_cita) {
            die("Fallo en el query de la cita. Existe un problema en la base de datos");
        } else {
            ?>
            <script>alert("Turno Agendado");</script>
            <?php
        }
    }
?>
<script>
    window.location = "read.php";
</script>