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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>
    <!--Barra de navegacion-->
    <header class="header">
            <div class="logo">
                <img src="img/logo-udacorp-lineablanca.png" alt="Logo de la marca">
            </div>
            <nav>
            <ul class="nav-links">
                    <li><a class="nav-link" href="#">Boton 1</a></li>
                    <li><a class="nav-link" href="#">Boton 2</a></li>
                    <li><a class="nav-link" href="#">Boton 3</a></li>
            </ul>            
            </nav>
            <a class="btn" href="#"><button>Nombre</button></a>
        </header>
<body>
    <div class="grid-container">
        <?php if (isset($_GET['success']) && $_GET['success'] === 'true') : ?>
        <div class="alert alert-success">La actualización se ha realizado con éxito.</div>
        <?php elseif (isset($_GET['success']) && $_GET['success'] === 'false') : ?>
        <div class="alert alert-danger">Error: La actualización ha fallado.</div>
        <?php endif; ?>
        
        <ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#tabla1" data-modal-id="ingresarModal">Informacion</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#tabla2" data-modal-id="ingresarModal">Proyectos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab3" data-bs-toggle="tab" href="#tabla3" data-modal-id="ingresarModal">Publicaciones</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab4" data-bs-toggle="tab" href="#tabla4" data-modal-id="ingresarModal">Tesis</a>
    </li>
</ul>
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#ingresarModal" data-modal-id="ingresarModal">Ingresar Datos</button>
<button type="button" class="btn btn-info edit-button" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['Id']; ?>" data-modal-id="editModal<?php echo $row['Id']; ?>">Editar</button>

<!-- Modal de ingreso de datos -->
<div class="modal fade" id="ingresarModal" tabindex="-1" aria-labelledby="ingresarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ingresarModalLabel">Ingresar Datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <input type="text" name="nombre" placeholder="Nombre del usuario" required/>
                    <br />
                    <input type="email" name="correo" placeholder="Correo electronico" required/>
                    <br />
                    <input type="password" name="contrasena" placeholder="Contraseña" required/>
                    <br />
                    <input type="submit" value="Agregar Usuario"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--a-->
        <div class="col-md-8">
            <input type="text" class="form-control mb-3" id="buscar" placeholder="Buscar">
        </div>
    </div>
    <div class="tab-content mt-2">
        <!-- Informacion -->
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
                                            <input type="hidden" name="Id"value="<?php echo $row['Id'] ?? ''; ?>">
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
                                            <input type="hidden" name="Id"value="<?php echo $row['Id'] ?? ''; ?>">
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
                                            <input type="hidden" name="Id"value="<?php echo $row['Id'] ?? ''; ?>">
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
    <!--Footer-->
    <div class="footer">
        <div class= "container-fluid ml-5 ms-5">
            <div class="row p-5 bg-white text-secondary">
    
                <!--Columna1-->
                <div class="col-xs-12 col-md-6 col-lg-3">
                    <img src="img/logo-udacorporativo.png" width="300" height="94">
                </div>
                <!--Columna 2-->
                <div class="col-xs-12 col-md-6 col-lg-3">
                    <p class="h3">Informacion</p>
                    <div class="mb-2 enlacesfooter">
                        <a class="text-secondary text-decoration-none" href="#">Académicos</a>
                    </div>
                    <div class="mb-2 enlacesfooter">
                        <a class="text-secondary text-decoration-none" href="#">Noticias</a>
                    </div>
                    <div class="mb-2 enlacesfooter">
                        <a class="text-secondary text-decoration-none" href="#">Eventos</a>
                    </div>
                    <div class="mb-2 enlacesfooter">
                        <a class="text-secondary text-decoration-none" href="#">Publicaciones</a>
                    </div>
                </div>
                <!--Columna 3-->
                <div class="col-xs-12 col-md-6 col-lg-3">
                    <p class="h3">Links</p>
                    <div class="mb-2 enlacesfooter">
                        <a class="text-secondary text-decoration-none" href="#">Intranet Alumnos</a>
                    </div>
                    <div class="mb-2 enlacesfooter">
                        <a class="text-secondary text-decoration-none" href="#">Intranet Académicos</a>
                    </div>
                    <div class="mb-2 enlacesfooter">
                        <a class="text-secondary text-decoration-none" href="#">Moodle</a>
                    </div>
                    <div class="mb-2 enlacesfooter">
                        <a class="text-secondary text-decoration-none" href="#">Biblioteca</a>
                    </div>
                    <div class="mb-2 enlacesfooter">
                        <a class="text-secondary text-decoration-none" href="#">FSCU</a>
                    </div>
                    <div class="mb-2 enlacesfooter">
                        <a class="text-secondary text-decoration-none" href="#">Facultad de Ingenieria</a>
                    </div>
                    <div class="mb-2 enlacesfooter">
                        <a class="text-secondary text-decoration-none" href="#">Instagram</a>
                    </div>
                </div>
    
                <!--Columna 4-->
                <div class="col-xs-12 col-md-6 col-lg-3">
                    <p class="h3">Contactos</p>
                    <div class="mb-2">
                        <p>Ubícanos en<br>Copiapó, Av. Copayapu 485</p>
                    </div>
                    <div class="mb-2">
                        <p>(52) 2 255555</p>
                    </div>
                    <div class="mb-2">
                        <p>anakarina.pena@uda.cl</p>
                    </div>
                </div>
                
    
            </div>
    
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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