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
    $especializacion = $_POST['especializacion'];
    $descripcion = $_POST['descripcion'];

    // Validar si la especialización ya existe
    $checkQuery = "SELECT id_especializacion FROM especializaciones WHERE especializacion = ?";
    $stmtCheck = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($stmtCheck, 's', $especializacion);
    mysqli_stmt_execute($stmtCheck);
    mysqli_stmt_store_result($stmtCheck);

    if (mysqli_stmt_num_rows($stmtCheck) > 0) {
        ?>
        <script>alert("Esta especializacion ya existe");</script>
        <script>
            window.location = "create.php";
        </script>
        <?php
    }

    // Si no hay duplicados, proceder con la inserción
    $query = "INSERT INTO especializaciones(especializacion, descripcion) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $especializacion, $descripcion);
    $result = mysqli_stmt_execute($stmt);

    if(!$result){
        die("Fallo en el query. Existe un problema en la base de datos");
    } else {
        ?>
        <script>alert("Registro Guardado");</script>
        <?php
    }

    // Redirigir a la página de lectura
    ?>
    <script>
        window.location = "read.php";
    </script>
    <?php
    }
}
?>