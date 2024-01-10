<?php
include("../../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    $tipo_usuario = $_POST["tipo_usuario"];

    // Verificar si el usuario ya existe
    $checkQuery = "SELECT id_usuario FROM usuarios WHERE usuario = ?";
    $stmtCheck = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($stmtCheck, 's', $usuario);
    mysqli_stmt_execute($stmtCheck);
    mysqli_stmt_store_result($stmtCheck);

    if (mysqli_stmt_num_rows($stmtCheck) > 0) {
        echo "El usuario ya existe.";
    } else {
        // Insertar nuevo usuario
        $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);
        $insertQuery = "INSERT INTO usuarios (usuario, contrasena, tipo_usuario) VALUES (?, ?, ?)";
        $stmtInsert = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($stmtInsert, 'sss', $usuario, $hashed_password, $tipo_usuario);

        if (mysqli_stmt_execute($stmtInsert)) {
            ?>
            <script>
                alert("Registro Guardado");
                window.location = "read.php";
            </script>
            <?php
        } else {
            echo "Error al registrar el usuario.";
        }
    }
}?>