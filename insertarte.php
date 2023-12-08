<?php
include("conexion.php");
$con = conectar();

// Obtener los datos del formulario
$nuevoTitulo = $_POST['R_titulo'];
$nuevoAnio = $_POST['R_anio'];
$nuevoLink = $_POST['R_link'];

// Query para insertar los datos
$sql = "INSERT INTO tesis (titulo, anio, link) VALUES ('$nuevoTitulo', '$nuevoAnio', '$nuevoLink')";

$stmt = $con->prepare($sql);

if ($stmt) {
    // Vincular parámetros
    $stmt->bind_param("ssss", $nuevoTitulo, $nuevoAnio, $nuevoLink);

    if ($stmt->execute()) {
        echo "Datos insertados correctamente";
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
