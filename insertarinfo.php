<?php
include("conexion.php");
$con = conectar();

// Recibir datos del formulario
$nombre = $_POST['R_nombre'];
$correo = $_POST['R_correo'];
$fono = $_POST['R_fono'];
$cargo = $_POST['R_cargo'];
$descripcion = $_POST['R_descripcion'];
$grado = $_POST['R_grado'];
$contrasena = $_POST['R_contrasena'];

// Hash de la contraseña (puedes usar una función más segura según tu necesidad)
$hashed_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

// Áreas de interés (si se han seleccionado)
$areasInteres = isset($_POST['areasInteres']) ? implode(", ", $_POST['areasInteres']) : "";

// Nombre del archivo de imagen
$nombreImagen = $_FILES['imagen']['name'];

// Ruta donde se guardará la imagen
$rutaImagen = "imagenes/" . $nombreImagen;

// Mover la imagen al directorio de destino
move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen);

// Query para insertar datos en la base de datos
$sql = "INSERT INTO informacion (nombre, correo, fono, cargo, descripcion, grado, contrasena, areasInteres, imagen)
        VALUES ('$nombre', '$correo', '$fono', '$cargo', '$descripcion', '$grado', '$hashed_contrasena', '$areasInteres', '$rutaImagen')";

// Ejecutar la consulta
if ($con->query($sql) === TRUE) {
    echo "<script>alert('¡Ingreso exitoso!');</script>";
    header("refresh:0;url=panel.php");
} else {
    echo "Error al insertar datos: " . $con->error;
}

// Cerrar la conexión
$con->close();
?>
