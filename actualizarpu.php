<?php
include("conexion.php");
$con = conectar();

// Obtener los datos actualizados del formulario
$nuevoTitulo = $_POST['R_titulo'];
$nuevaFecha = $_POST['R_fecha'];
$nuevoAutor = $_POST['R_autor'];
$nuevaRevision = $_POST['R_revision'];
$nuevoAcceso = $_POST['R_acceso'];
$idActualizar = $_POST['idpublicaciones'];

// Procesar el archivo
$nombreArchivo = $_FILES['archivo']['name'];
$rutaArchivo = "archivos/" . $nombreArchivo;
move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaArchivo);

// Query para actualizar el registro utilizando consultas preparadas
$sql = "UPDATE publicaciones SET titulo=?, fecha=?, autor=?, revision=?, acceso=?, archivo=? WHERE idpublicaciones=?";

$stmt = $con->prepare($sql);

if ($stmt) {
    // Vincular parámetros
    $stmt->bind_param("ssssssi", $nuevoTitulo, $nuevaFecha, $nuevoAutor, $nuevaRevision, $nuevoAcceso, $rutaArchivo, $idActualizar);

    if ($stmt->execute()) {
        echo "Registro actualizado correctamente";
        header("refresh:0;url=panel.php");
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
