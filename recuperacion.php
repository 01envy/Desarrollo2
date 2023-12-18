<?php
    session_start();
    include('conexion.php');
    $con = conectar();

    $Recu_Correo=$_POST['recuperacion_correo'];

    $verificarUsuario = "SELECT correo FROM informacion WHERE correo = '$Recu_Correo'";
    $resultado = mysqli_query($con, $verificarUsuario);

    if (mysqli_num_rows($resultado) > 0) {
        $_SESSION['Recuperacion_correo'] = $Recu_Correo;
        echo "<script>alert('Correo encontrado.');</script>";
        header("refresh:0;url=restablecer_la_contrasena.php");
    } else {
        echo "<script>alert('El correo no existe.');</script>";
        header("refresh:0;url=recuperar_contra.php");
    }
?>