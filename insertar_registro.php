<?php
    include("conexion.php");
    $con = conectar();

    $Nombre_Re = $_POST["R_nombre"];
    $Correo_Re = $_POST["R_correo"];
    $Fono_Re = $_POST["R_fono"];
    $Cargo_Re = $_POST["R_cargo"];
    $Descripcion_Re = $_POST["R_descripcion"];
    $Grado_Re = $_POST["R_grado"];
    $Contrasena_Re = $_POST["R_contrasena"];

    $Areas_de_interes_Re = isset($_POST['AreasInteres']) ? $_POST['AreasInteres'] : [];
    $Areas_de_interes_Re_Str = implode(", ", $Areas_de_interes_Re);

    $Imagen = '';

    if(isset($_FILES["R_imagen_perfil"])){
        $file = $_FILES["R_imagen_perfil"];
        $Nombre_I = $file["name"];

        $Ruta_provisional= $file["tmp_name"];

        $Carpeta = "fotos/";

        $src = $Carpeta.$Nombre_I;
        move_uploaded_file($Ruta_provisional, $src);
        $Imagen_de_Perfil= "fotos/".$Nombre_I;
    }

    $sql = "INSERT INTO profesores (Nombre, Correo, Fono, Cargo, Descripcion, Grado, Contrasena, Areas, Imagen_perfil) 
    VALUES ('$Nombre_Re', '$Correo_Re', '$Fono_Re', '$Cargo_Re', '$Descripcion_Re', '$Grado_Re', '$Contrasena_Re', '$Areas_de_interes_Re_Str', '$Imagen_de_Perfil')";

    $query = mysqli_query($con, $sql);

    if ($query) {
        echo "<script>alert('¡Registro exitoso! Inicie sesión en su cuenta');</script>";
        header("refresh:0;url=inicio_de_sesion.php");
    } else {
        echo "Error al registrar en la base de datos: " . mysqli_error($con);
    }
?>