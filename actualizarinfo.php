<?php
include("conexion.php");
$con = conectar();

$idActualizar = $_POST['id'];
$nuevoNombre = $_POST['R_nombre'];
$nuevoCorreo = $_POST['R_correo'];
$nuevoFono = $_POST['R_fono'];
$nuevoCargo = $_POST['R_cargo'];
$nuevaDescripcion = $_POST['I_descripcion'];
$nuevoGrado = $_POST['R_grado'];
$nuevaContrasena = password_hash($_POST['R_contrasena'], PASSWORD_DEFAULT);
$nuevaConfirmacionContrasena = password_hash($_POST['R_confirmacion_contrasena'], PASSWORD_DEFAULT);
$nuevasAreasInteres = isset($_POST['areasInteres']) ? implode(", ", $_POST['areasInteres']) : "";

$nombreImagen = $_FILES['imagen']['name'];
$rutaImagen = "imagenes/" . $nombreImagen;

if ($_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen)) {
        echo "Imagen subida correctamente.";
        header("refresh:0;url=panel.php");
    } else {
        echo "Error al mover la imagen al directorio de destino.";
    }
} else {
    echo "Error en la carga de la imagen: " . $_FILES['imagen']['error'];
}

$sql = "UPDATE informacion SET 
            nombre = ?, 
            correo = ?, 
            fono = ?, 
            cargo = ?, 
            descripcion = ?, 
            grado = ?, 
            contrasena = ?, 
            areasInteres = ?, 
            imagen = ? 
        WHERE id = ?";

$stmt = $con->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssssssssi", $nuevoNombre, $nuevoCorreo, $nuevoFono, $nuevoCargo, $nuevaDescripcion, $nuevoGrado, $nuevaContrasena, $nuevasAreasInteres, $nombreImagen, $idActualizar);

    if ($stmt->execute()) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error al actualizar registro: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $con->error;
}

$con->close();
?>
