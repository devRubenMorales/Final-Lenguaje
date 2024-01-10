<?php
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $result = mysqli_query($conn, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        if (password_verify($contrasena, $row["contrasena"])) {
            // Inicio de sesión exitoso, redirigir según el tipo de usuario
            session_start();
            $_SESSION["id_usuario"] = $row["id_usuario"];
            $_SESSION["usuario"] = $row["usuario"];
            $_SESSION["tipo_usuario"] = $row["tipo_usuario"];

            if ($row["tipo_usuario"] == "asistente") {
                header("Location: ../asistente.php");
            } elseif ($row["tipo_usuario"] == "superadmin") {
                header("Location: ../superadmin.php");
            }
        } else {
            ?>
            <script>
            alert("Contraseña Incorrecta");
            window.location = "../login.php";
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("Usuario no encontrado");
            window.location = "../login.php";
        </script>
        <?php
    }
}
?>