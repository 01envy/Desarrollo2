<?php
include("conexion.php");

// Inicia la sesión
session_start();

$con = conectar();

<<<<<<< HEAD
if (isset($_GET["btnIngresar_sesion"])) {
    $correo_login = $_GET["Sesion_correo"];
    $Contrasena_login = $_GET["Sesion_contrasena"];
=======

if (isset($_POST["btnIngresar_sesion"])) {
    $correo_login = $_POST["sesion_correo"];
    $Contrasena_login = $_POST["sesion_contrasena"];
>>>>>>> 5ff8292774f80e8929d1dd0ad5a8e3ef543980e2


    // Obtener el hash almacenado en la base de datos
    $query = "SELECT contrasena FROM informacion WHERE correo = '$correo_login'";
    $result = mysqli_query($con, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $hashed_contrasena_db = $row["contrasena"];

        // Verificar si la contraseña ingresada coincide con el hash almacenado
        if (password_verify($Contrasena_login, $hashed_contrasena_db)) {
            // Inicio de sesión exitoso, establece la variable de sesión
            $query = "SELECT * FROM informacion WHERE correo = '$correo_login'";
            $result = mysqli_query($con, $query);
            $usuarioData = mysqli_fetch_assoc($result);

            $_SESSION["correo"] = $correo_login;
            $_SESSION["nombre"] = $usuarioData["nombre"];
            $_SESSION["id"] = $usuarioData["id"];

            echo "<script>alert('¡Inicio de sesión exitoso!');</script>";
            header("refresh:0;url=index.php");
            exit();
        } else {
            echo "<script>alert('¡Usuario o contraseña incorrectas!');</script>";
            header("refresh:0;url=inicio_de_sesion.php");
        }
    } else {
        echo "<script>alert('¡Usuario no encontrado!');</script>";
        header("refresh:0;url=inicio_de_sesion.php");
    }
}
?>