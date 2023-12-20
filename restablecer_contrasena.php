<?php
    include('conexion.php');
    $con = conectar();

    // Obtener datos del formulario
    $nuevaContrasena = $_POST['recuperacion_contrasena'];
    $recucorreo = $_POST['recu_correo'];

    $hashed_contrasena = password_hash($nuevaContrasena, PASSWORD_DEFAULT);

    // Actualizar la contraseña en la base de datos
    $sql = "UPDATE informacion SET contrasena = '$hashed_contrasena' WHERE correo = '$recucorreo'";
    $query = mysqli_query($con, $sql);

    if ($query) {
        echo "<script>alert('Contraseña restablecida con éxito.');</script>";
        header("refresh:0;url=inicio_de_sesion.php");
    } else {
        echo "<script>alert('Error al restablecer la contraseña.');</script>";
        header("refresh:0;url=restablecer_la_contrasena.php");
    }
?>