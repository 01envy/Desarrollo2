<?php
// Verificar si se recibió el ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "ID a eliminar: " . $id;

} else {
    echo "ID no proporcionado";
}
?>

<?php
include("conexion.php");
$con = conectar();
// Obtener el ID del registro a eliminar
$idEliminar = $_GET['id'];

echo "ID a eliminar: " . $idEliminar;
// Query para eliminar el registro
$sql = "DELETE FROM tesis WHERE idtesis = $idEliminar";

// Ejecutar la consulta
if ($con->query($sql) === TRUE) {
    echo "Registro eliminado correctamente";
    header("refresh:0;url=panel.php");
} else {
    echo "Error al eliminar registro: " . $con->error;
}

// Cerrar la conexión
$con->close();
?>
