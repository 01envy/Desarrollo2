<?php
session_start();
include("conexion.php");
$con = conectar();

// Obtener los datos del formulario

$nuevoTitulo = $_POST['R_titulo'];
$nuevoAnio = $_POST['R_anio'];
$nuevoLink = $_POST['R_link'];
$idprofesor=$_SESSION['id'];
// Query para insertar los datos
$sql = "INSERT INTO proyectos (titulo, anio, link,idprofesor) VALUES (?, ?, ?,?)";


$stmt = $con->prepare($sql);

if ($stmt) {
    // Vincular parámetros

    $stmt->bind_param("ssss", $nuevoTitulo, $nuevoAnio, $nuevoLink,$idprofesor);


    if ($stmt->execute()) {
        echo "<script>alert('¡Ingreso exitoso!');</script>";
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
