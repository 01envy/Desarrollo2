<?php
include("conexion.php");
$con = conectar();

// Obtener los datos actualizados del formulario
$nuevoTitulo = $_POST['R_titulo'];
$nuevoAnio = $_POST['R_anio'];
$nuevoLink = $_POST['R_link'];

// Obtener el ID a actualizar
$idActualizar = $_POST['idproyectos'];

// Query para actualizar el registro utilizando consultas preparadas
$sql = "UPDATE proyectos SET titulo=?, anio=?, link=? WHERE idproyectos=?";

$stmt = $con->prepare($sql);

if ($stmt) {
    // Vincular parámetros
    $stmt->bind_param("sssi", $nuevoTitulo, $nuevoAnio, $nuevoLink, $idActualizar);

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
