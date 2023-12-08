<?php
include("conexion.php");
$con = conectar();

// Obtener los datos del formulario
$nuevoTitulo = $_POST['R_titulo'];
$nuevaFecha = $_POST['R_fecha'];
$nuevoAutor = $_POST['R_autor'];
$nuevaRevision = $_POST['R_revision'];
$nuevoAcceso = $_POST['R_acceso'];

// Procesar el archivo
$nombreArchivo = $_FILES['archivo']['name'];
$rutaArchivo = "archivos/" . $nombreArchivo;
move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaArchivo);

// Query para insertar los datos
$sql = "INSERT INTO publicaciones (titulo, fecha, autor, revision, acceso, archivo) VALUES ('$nuevoTitulo','$nuevaFecha','$nuevoAutor','$nuevaRevision','$nuevoAcceso','$rutaArchivo')";

$stmt = $con->prepare($sql);

if ($stmt) {
    // Vincular parámetros
    $stmt->bind_param("ssssss", $nuevoTitulo, $nuevaFecha, $nuevoAutor, $nuevaRevision, $nuevoAcceso, $rutaArchivo);

    if ($stmt->execute()) {
        echo "<script>alert('¡Inicio de sesión exitoso!');</script>";
        header("refresh:0;url=panel.php");
    } else {
        echo "Error al insertar datos: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Error en la preparación de la consulta
    echo "Error en la preparación de la consulta: " . $con->error;
}

// Cerrar la conexión
$con->close();
?>
