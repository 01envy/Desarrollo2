<?php
include("conexion.php");
$con = conectar();

// Obtener los datos del formulario
$nuevoTitulo = $_GET['R_titulo'];
$nuevoAnio = $_GET['R_anio'];
$nuevoLink = $_GET['R_link'];
$nuevoProyecto = $_GET['R_proyectos'];

// Query para insertar los datos
$sql = "INSERT INTO proyectos (titulo, anio, link, proyectos) VALUES (?, ?, ?, ?)";

$stmt = $con->prepare($sql);

if ($stmt) {
    // Vincular parámetros
    $stmt->bind_param("ssss", $nuevoTitulo, $nuevoAnio, $nuevoLink, $nuevoProyecto);

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
