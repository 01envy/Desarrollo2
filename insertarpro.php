<?php
include("conexion.php");
$con = conectar();

// Obtener los datos del formulario
$nuevoTitulo = $_POST['R_titulo'];
$nuevoAnio = $_POST['R_anio'];
$nuevoLink = $_POST['R_link'];
// Query para insertar los datos
$sql = "INSERT INTO proyectos (titulo, anio, link) VALUES (?, ?, ?)";

$stmt = $con->prepare($sql);

if ($stmt) {
    // Vincular parámetros
    $stmt->bind_param("sss", $nuevoTitulo, $nuevoAnio, $nuevoLink);

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
