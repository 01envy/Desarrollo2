<?php
include("conexion.php");
$con = conectar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PAGINA ALUMNO</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div class="grid-container">
        <?php if (isset($_GET['success']) && $_GET['success'] === 'true') : ?>
        <div class="alert alert-success">La actualización se ha realizado con éxito.</div>
        <?php elseif (isset($_GET['success']) && $_GET['success'] === 'false') : ?>
        <div class="alert alert-danger">Error: La actualización ha fallado.</div>
        <?php endif; ?>
        <div class="col-md-3">
            <h1>Ingrese datos</h1>
            <div class="modal fade" id="ingresarModal" tabindex="-1" aria-labelledby="ingresarModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ingresarModalLabel">Ingresar Datos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="insertar.php" method="POST">
                                <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                                <input type="text" class="form-control mb-3" name="apellido" placeholder="Apellido">
                                <input type="text" class="form-control mb-3" name="usuario" placeholder="Usuario">
                                <input type="text" class="form-control mb-3" name="email" placeholder="Email">
                                <input type="text" class="form-control mb-3" name="contrasena" placeholder="Contraseña">
                                <input type="text" class="form-control mb-3" name="direccion" placeholder="direccion">
                                <input type="text" class="form-control mb-3" name="fecha"placeholder="fecha nacimiento">
                                <input type="text" class="form-control mb-3" name="sexo" placeholder="Sexo">
                                <button type="submit" class="btn btn-primary">Ingresar</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#tabla1">Informacion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#tabla2">Proyectos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab3" data-bs-toggle="tab" href="#tabla3">Publicaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab4" data-bs-toggle="tab" href="#tabla4">Tesis</a>
            </li>
        </ul>
        <div class="col-md-8">
            <input type="text" class="form-control mb-3" id="buscar" placeholder="Buscar">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"data-bs-target="#ingresarModal">Ingresar Datos</button>
        </div>
    </div>
    <div class="tab-content mt-2">
        <!-- Publicaciones -->
        <div class="tab-pane fade show active" id="tabla1">
            <table class="table mx-auto">
                <thead class="table-success table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>cargo</th>
                        <th>Contraseña</th>
                        <th>Informacion</th>
                        <th>rut</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody style="color:white">
                    <?php
                        while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $row['Id'] ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['apellido'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['cargo'] ?></td>
                        <td><?php echo $row['contrasena'] ?></td>
                        <td><?php echo $row['informacion'] ?></td>
                        <td><?php echo $row['rut'] ?></td>
                        <td><button type="button" class="btn btn-info" data-bs-toggle="modal"data-bs-target="#editModal<?php echo $row['Id']; ?>">Editar</button></td>
                        <div class="modal fade" id="editModal<?php echo $row['Id']; ?>" tabindex="-1"aria-labelledby="editModalLabel<?php echo $row['Id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel<?php echo $row['Id']; ?>">Editar:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                                    </div>
                                    <div style="color:black" class="modal-body">
                                    <!--formulario de actualizar-->
                                        <form action="update.php" method="POST">
                                            <input type="hidden" name="cod_estudiante"value="<?php echo $row['Id'] ?? ''; ?>">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control mb-3" name="nombre"placeholder="Nombre" value="<?php echo $row['nombre'] ?? ''; ?>">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                            <a href="panel.php" class="btn btn-primary">Volver</a>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--eliminar-->
                        <td><a class="btn btn-danger" data-bs-toggle="modal"data-bs-target="#confirmDeleteModal<?php echo $row['Id']; ?>">Eliminar</a>
                        </td>
                        <div class="modal fade" id="confirmDeleteModal<?php echo $row['Id']; ?>"tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Seguro que desea eliminar de forma permanente?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Cancelar</button>
                                        <a href="delete.php?id=<?php echo $row['Id']; ?>"class="btn btn-danger">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <?php
                        }
                        ?>
                </tbody>
            </table>
        </div>
        <!-- Proyectos-->
        <div class="tab-pane fade" id="tabla2">
            <table class="table mx-auto">
                <thead class="table-success table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Año</th>
                        <th>Link</th>
                        <th>Proyectos</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody style="color:white">
                    <?php
                        while ($row = mysqli_fetch_array($query)) {
                            ?>
                    <tr>
                        <td><?php echo $row['Id'] ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['apellido'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['cargo'] ?></td>
                        <td><?php echo $row['contrasena'] ?></td>
                        <td><?php echo $row['informacion'] ?></td>
                        <td><?php echo $row['rut'] ?></td>
                        <td><button type="button" class="btn btn-info" data-bs-toggle="modal"data-bs-target="#editModal<?php echo $row['Id']; ?>">Editar</button></td>
                        <div class="modal fade" id="editModal<?php echo $row['Id']; ?>" tabindex="-1"aria-labelledby="editModalLabel<?php echo $row['Id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel<?php echo $row['Id']; ?>">Editar:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                                    </div>
                                    <div style="color:black" class="modal-body">
                                    <!--formulario de actualizar-->
                                        <form action="update.php" method="POST">
                                            <input type="hidden" name="cod_estudiante"value="<?php echo $row['Id'] ?? ''; ?>">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control mb-3" name="nombre"placeholder="Nombre" value="<?php echo $row['nombre'] ?? ''; ?>">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                            <a href="panel.php" class="btn btn-primary">Volver</a>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--eliminar-->
                        <td><a class="btn btn-danger" data-bs-toggle="modal"data-bs-target="#confirmDeleteModal<?php echo $row['Id']; ?>">Eliminar</a>
                        </td>
                        <div class="modal fade" id="confirmDeleteModal<?php echo $row['Id']; ?>"tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Seguro que desea eliminar de forma permanente?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Cancelar</button>
                                        <a href="delete.php?id=<?php echo $row['Id']; ?>"class="btn btn-danger">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <?php
                        }
                        ?>
                </tbody>
            </table>
        </div>
        <!-- Publicaciones -->
        <div class="tab-pane fade" id="tabla3">
            <table class="table mx-auto">
                <thead class="table-success table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Fecha</th>
                        <th>Autor</th>
                        <th>Revision</th>
                        <th>Acceso</th>
                        <th>Archivo</th>
                        <th>Publicaciones</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody style="color:white">
                    <?php
                        while ($row = mysqli_fetch_array($query)) {
                            ?>
                    <tr>
                        <td><?php echo $row['Id'] ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['apellido'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['cargo'] ?></td>
                        <td><?php echo $row['contrasena'] ?></td>
                        <td><?php echo $row['informacion'] ?></td>
                        <td><?php echo $row['rut'] ?></td>
                        <td><button type="button" class="btn btn-info" data-bs-toggle="modal"data-bs-target="#editModal<?php echo $row['Id']; ?>">Editar</button></td>
                        <div class="modal fade" id="editModal<?php echo $row['Id']; ?>" tabindex="-1"aria-labelledby="editModalLabel<?php echo $row['Id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel<?php echo $row['Id']; ?>">Editar:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                                    </div>
                                    <div style="color:black" class="modal-body">
                                    <!--formulario de actualizar-->
                                        <form action="update.php" method="POST">
                                            <input type="hidden" name="cod_estudiante"value="<?php echo $row['Id'] ?? ''; ?>">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control mb-3" name="nombre"placeholder="Nombre" value="<?php echo $row['nombre'] ?? ''; ?>">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                            <a href="panel.php" class="btn btn-primary">Volver</a>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--eliminar-->
                        <td><a class="btn btn-danger" data-bs-toggle="modal"data-bs-target="#confirmDeleteModal<?php echo $row['Id']; ?>">Eliminar</a>
                        </td>
                        <div class="modal fade" id="confirmDeleteModal<?php echo $row['Id']; ?>"tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Seguro que desea eliminar de forma permanente?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Cancelar</button>
                                        <a href="delete.php?id=<?php echo $row['Id']; ?>"class="btn btn-danger">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <?php
                        }
                        ?>
                </tbody>
            </table>
        </div>
        <!-- Tesis -->
        <div class="tab-pane fade" id="tabla4">
            <table class="table mx-auto">
                <thead class="table-success table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Año</th>
                        <th>Link</th>
                        <th>Imagen</th>
                        <th>Tesis</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_array($query)) {?>
                    <tr>
                        <td><?php echo $row['Id'] ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['apellido'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['cargo'] ?></td>
                        <td><?php echo $row['contrasena'] ?></td>
                        <td><?php echo $row['informacion'] ?></td>
                        <td><?php echo $row['rut'] ?></td>
                        <td><button type="button" class="btn btn-info" data-bs-toggle="modal"data-bs-target="#editModal<?php echo $row['Id']; ?>">Editar</button></td>
                        <div class="modal fade" id="editModal<?php echo $row['Id']; ?>" tabindex="-1"aria-labelledby="editModalLabel<?php echo $row['Id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel<?php echo $row['Id']; ?>">Editar:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                                    </div>
                                    <div style="color:black" class="modal-body">
                                    <!--formulario de actualizar-->
                                        <form action="update.php" method="POST">
                                            <input type="hidden" name="cod_estudiante"value="<?php echo $row['Id'] ?? ''; ?>">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control mb-3" name="nombre"placeholder="Nombre" value="<?php echo $row['nombre'] ?? ''; ?>">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                            <a href="panel.php" class="btn btn-primary">Volver</a>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--eliminar-->
                        <td><a class="btn btn-danger" data-bs-toggle="modal"data-bs-target="#confirmDeleteModal<?php echo $row['Id']; ?>">Eliminar</a>
                        </td>
                        <div class="modal fade" id="confirmDeleteModal<?php echo $row['Id']; ?>"tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Seguro que desea eliminar de forma permanente?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Cancelar</button>
                                        <a href="delete.php?id=<?php echo $row['Id']; ?>"class="btn btn-danger">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <?php
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#buscar').on('input', function() {
        var query = $(this).val();

        if (query !== '') {
            $.ajax({
                type: "POST",
                url: "buscar.php",
                data: {
                    c: query
                },
                success: function(data) {
                    $('tbody').html(data);
                }
            });
        } else {
            $.ajax({
                type: "POST",
                url: "buscar.php",
                data: {
                    c: ''
                },
                success: function(data) {
                    $('tbody').html(data);
                }
            });
        }
    });
});
</script>

</html>