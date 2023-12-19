<?php
// Verificar si se recibió el ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "ID a eliminar: " . $id;

    // Aquí puedes agregar el código de eliminación
    // ...

} else {
    echo "ID no proporcionado";
}
?>

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
    header("refresh:0;url=panel.php");
} else {
    echo "Error al eliminar registro: " . $con->error;
}

// Cerrar la conexión
$con->close();
?>

