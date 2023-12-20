<?php
include("conexion.php");
$con = conectar();

// Obtener los datos actualizados del formulario
$nuevoTitulo = $_POST['titulo'];
$nuevoAnio = $_POST['anio'];
$nuevoLink = $_POST['link'];
$nuevoId = $_POST['idtesis'];

// Query para actualizar el registro utilizando consultas preparadas
$sql = "UPDATE tesis SET titulo=?, anio=?, link=? WHERE idtesis=?";

$stmt = $con->prepare($sql);

if ($stmt) {
    // Vincular parámetros
    $stmt->bind_param("sssi", $nuevoTitulo, $nuevoAnio, $nuevoLink, $nuevoId);

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
