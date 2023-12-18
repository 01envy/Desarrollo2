<?php
include("conexion.php");
$con = conectar();
// Obtener el ID del registro a eliminar
$idEliminar = $_GET['id']; 

// Query para eliminar el registro
$sql = "DELETE FROM informacion WHERE id = $idEliminar";

// Ejecutar la consulta
if ($con->query($sql) === TRUE) {
    echo "Registro eliminado correctamente";
} else {
    echo "Error al eliminar registro: " . $con->error;
}

// Cerrar la conexión
$con->close();
?>
