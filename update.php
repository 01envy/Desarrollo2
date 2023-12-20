<?php
include("conexion.php");
$con = conectar();

// Obtener los datos actualizados del formulario
$idActualizar = $_POST['id']; // Suponiendo que recibes el ID a través del formulario
$nuevoNombre = $_POST['R_nombre'];
$nuevoCorreo = $_POST['R_correo'];
$nuevoFono = $_POST['R_fono'];
$nuevoCargo = $_POST['R_cargo'];
$nuevaDescripcion = $_POST['I_descripcion'];
$nuevoGrado = $_POST['R_grado'];
$nuevaContrasena = password_hash($_POST['R_contrasena'], PASSWORD_DEFAULT);
$nuevaConfirmacionContrasena = password_hash($_POST['R_confirmacion_contrasena'], PASSWORD_DEFAULT);
// Áreas de interés (si se han seleccionado)
$nuevasAreasInteres = isset($_POST['areasInteres']) ? implode(", ", $_POST['areasInteres']) : "";

// Nombre del archivo de imagen
$nombreImagen = $_FILES['imagen']['name'];
// Ruta donde se guardará la imagen
$rutaImagen = "desarrollo/imagenes/" . $nombreImagen;
// Mover la imagen al directorio de destino
move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen);

// Query para actualizar el registro utilizando consultas preparadas
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
    // Vincular parámetros
    $stmt->bind_param("ssssssssssi", $nuevoNombre, $nuevoCorreo, $nuevoFono, $nuevoCargo, $nuevaDescripcion, $nuevoGrado, $nuevaContrasena, $nuevasAreasInteres, $nombreImagen, $idActualizar);

    if ($stmt->execute()) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error al actualizar registro: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Error en la preparación de la consulta
    echo "Error en la preparación de la consulta: " . $con->error;
}

// Cerrar la conexión
$con->close();
?>
