<?php
include("conexion.php");
$con = conectar();

if (isset($_POST['c'])) {
    $termino_busqueda = '%' . $_POST['c'] . '%';
    // Ejemplo: buscar.php
    $query = $_POST['c'];
    // Simula una respuesta
    echo "Consulta: $query";

    // Usar una consulta preparada para evitar la inyección de SQL
    $sql = "SELECT * FROM profesores WHERE id LIKE ? OR nombre LIKE ? OR correo LIKE ? OR cargo LIKE ?";
    $stmt = mysqli_prepare($con, $sql);

    // Asociar los parámetros y ejecutar la consulta
    mysqli_stmt_bind_param($stmt, "ssss", $termino_busqueda, $termino_busqueda, $termino_busqueda, $termino_busqueda);
    mysqli_stmt_execute($stmt);

    $query = mysqli_stmt_get_result($stmt);
} else {
    $sql = "SELECT * FROM profesores";
    $query = mysqli_query($con, $sql);
}

?>

<table class="table mx-auto">
    
    <tbody style="color:white" id="search-results">
        <?php
        if ($query && mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query)) {
                ?>
                <!-- Fila de la tabla para cada resultado -->
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><img src="<?php echo $row['imagen']; ?>" alt="Imagen del profesor"></td>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['correo'] ?></td>
                    <td><?php echo $row['cargo'] ?></td>
                    <td><?php echo $row['contrasena'] ?></td>
                    <td><?php echo $row['descripcion'] ?></td>
                    <td><?php echo $row['areasInteres'] ?></td>
                    <td><a href="actualizar.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></td>
                    <td><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal<?php echo $row['id']; ?>">Eliminar</a></td>
                    <!-- Modal de Confirmación -->
                    <div class="modal fade" id="confirmDeleteModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Seguro que desea eliminar este profesor de forma permanente?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='9'>No se encontraron resultados similares.</td></tr>";
        }
        ?>
    </tbody>
</table>
