<?php
include("conexion.php");
$con = conectar();


// Verificar la conexión a la base de datos
if (!$con) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

// Realizar la consulta SQL para la pestaña 'informacion'
$queryInformacion = mysqli_query($con, "SELECT * FROM informacion");

// Verificar si la consulta fue exitosa
if (!$queryInformacion) {
    die("Error en la consulta 'informacion': " . mysqli_error($con));
}

// Realizar la consulta SQL para la pestaña 'proyectos'
$queryProyectos = mysqli_query($con, "SELECT * FROM proyectos");

// Verificar si la consulta fue exitosa
if (!$queryProyectos) {
    die("Error en la consulta 'proyectos': " . mysqli_error($con));
}

// Realizar la consulta SQL para la pestaña 'publicaciones'
$queryPublicaciones = mysqli_query($con, "SELECT * FROM publicaciones");

// Verificar si la consulta fue exitosa
if (!$queryPublicaciones) {
    die("Error en la consulta 'publicaciones': " . mysqli_error($con));
}

// Realizar la consulta SQL para la pestaña 'tesis'
$queryTesis = mysqli_query($con, "SELECT * FROM tesis");

// Verificar si la consulta fue exitosa
if (!$queryTesis) {
    die("Error en la consulta 'tesis': " . mysqli_error($con));
}

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

        <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#tabla1">Informacion</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#tabla2" >Proyectos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab3" data-bs-toggle="tab" href="#tabla3" >Publicaciones</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab4" data-bs-toggle="tab" href="#tabla4" >Tesis</a>
    </li>
</ul>

<!--a-->
    

    <div class="tab-content mt-2">
        <!-- Informacion -->
        <div class="col-md-8">
            <input type="text" id="buscar" name="buscar" placeholder="Buscar...">
        </div>
        <div class="tab-pane fade show active" id="tabla1">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ingresarModal1">Ingresar datos</button>
            <!-- Modal para ingresar datos en la tabla 'informacion' -->
            <div class="modal fade" id="ingresarModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ingresar Datos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Agrega aquí el formulario para ingresar datos -->
                            <form action="insertarinfo.php" method="POST" enctype="multipart/form-data" class="form1 row g-3 needs-validation" onsubmit="return validar_registro()" novalidate>

                                <div>
                                    <label for="I_nombre">Nombre:</label>
                                    <input type="text" class="form-control" name="R_nombre" id="I_nombre" required>
                                    <div id="error-nombre" class="text-danger"></div>
                                </div>
                                <div>
                                    <label for="I_correo">Correo:</label>
                                    <input type="email" class="form-control" name="R_correo" id="I_correo">
                                    <div id="error-correo" class="text-danger"></div>
                                </div>
                                <div>
                                    <label for="I_fono">Fono:</label>
                                    <input type="text" class="form-control" name="R_fono" id="I_fono">
                                    <div id="error-fono" class="text-danger"></div>
                                </div>
                                <div>
                                    <label for="I_cargo">Cargo:</label>
                                    <input type="text" class="form-control" name="R_cargo" id="I_cargo">
                                    <div id="error-cargo" class="text-danger"></div>
                                </div>
                                <div>
                                    <label for="I_descripcion">Descripción:</label>
                                    <textarea class="form-control" aria-label="With textarea" name="R_descripcion"id="I_descripcion"></textarea>
                                    <div id="error-descripcion" class="text-danger"></div>
                                </div>
                                <div>
                                    <label for="I_grado">Grado académico:</label>
                                    <input type="text" class="form-control" name="R_grado" id="I_grado">
                                    <div id="error-grado" class="text-danger"></div>
                                </div>
                                <div class="col-6">
                                    <label for="I_nombre">Contraseña:</label>
                                    <input type="password" class="form-control" name="R_contrasena" id="I_contrasena">
                                    <div id="error-contrasena" class="text-danger"></div>
                                </div>
                                <div class="col-6">
                                    <label for="I_nombre">Confirmacion de contraseña:</label>
                                    <input type="password" class="form-control" name="R_confirmacion_contrasena" id="I_confirmacion_contrasena">
                                    <div id="error-confirmacion-contra" class="text-danger"></div>
                                </div>
                                <div class="container">
                                    <label>Areas de interes:</label>
                                    <div class="row align-items-start">
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="I_check1" name="areasInteres[]"value="Gestión informática">
                                                <label class="form-check-label" for="I_check1">Gestión informática</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="I_check2" name="areasInteres[]"value="Ciencia de datos">
                                                <label class="form-check-label" for="I_check2">Ciencia de datos</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="I_check3" name="areasInteres[]"value="Ingeniería de software">
                                                <label class="form-check-label" for="I_check3">Ingeniería de software</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="I_check4" name="areasInteres[]" value="Informática educativa">
                                                <label class="form-check-label" for="I_check4">Informática educativa</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="error-areas" class="text-danger"></div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">Imagen de perfil:</label>
                                    <input type="file" class="form-control" id="inputGroupFile01" name="imagen">
                                </div>
                                <button type="submit" class="btn btn-primary" onclick="alert('¿Estas seguro de enviar estos datos?')">Enviar</button>
                                <p class="text-center">¿Ya estás registrado? Inicia sesión <a href="inicio_de_sesion.html">Aquí</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table mx-auto">
                <thead class="table-success table-striped">
                    <tr>
                        <th>Id</th>
                        <th>imagen</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>cargo</th>
                        <th>Contraseña</th>
                        <th>Informacion</th>
                        <th>Area</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody style="color:white">
                    <?php
                        while ($row = mysqli_fetch_array($queryInformacion)) {
                    ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><img style="width:100px" src="imagenes/<?php echo $row['imagen']; ?>" alt="Imagen de perfil"></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['correo'] ?></td>
                        <td><?php echo $row['cargo'] ?></td>
                        <td><?php echo $row['contrasena'] ?></td>
                        <td><?php echo $row['descripcion'] ?></td>
                        <td><?php echo $row['areasInteres'] ?></td>
                        <td><button type="button" class="btn btn-info" data-bs-toggle="modal"data-bs-target="#editModal2<?php echo $row['id']; ?>">Editar</button></td>
                        <div class="modal fade" id="editModal2<?php echo $row['id']; ?>" tabindex="-1"aria-labelledby="editModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel<?php echo $row['id']; ?>">Editar:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                                    </div>
                                    <div style="color:black" class="modal-body">
                                    <!--formulario de actualizar-->
                                        <form action="actualizarinfo.php" method="POST" enctype="multipart/form-data">

                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?? ''; ?>">

                                        <label for="R_nombre">Nombre:</label>
                                        <input type="text" class="form-control mb-3" name="R_nombre" placeholder="Nombre" value="<?php echo $row['nombre'] ?? ''; ?>">

                                        <label for="R_correo">Correo:</label>
                                        <input type="email" class="form-control mb-3" name="R_correo" placeholder="Correo" value="<?php echo $row['correo'] ?? ''; ?>">

                                        <label for="R_fono">Fono:</label>
                                        <input type="text" class="form-control mb-3" name="R_fono" placeholder="Fono" value="<?php echo $row['fono'] ?? ''; ?>">

                                        <label for="R_cargo">Cargo:</label>
                                        <input type="text" class="form-control mb-3" name="R_cargo" placeholder="Cargo" value="<?php echo $row['cargo'] ?? ''; ?>">

                                        <label for="I_descripcion">Descripción:</label>
                                        <textarea class="form-control mb-3" name="I_descripcion" placeholder="Descripción"><?php echo $row['descripcion'] ?? ''; ?></textarea>

                                        <label for="R_grado">Grado académico:</label>
                                        <input type="text" class="form-control mb-3" name="R_grado" placeholder="Grado académico" value="<?php echo $row['grado'] ?? ''; ?>">

                                        <label for="R_contrasena">Contraseña:</label>
                                        <input type="password" class="form-control mb-3" name="R_contrasena" placeholder="Contraseña">

                                        <label for="R_confirmacion_contrasena">Confirmación de contraseña:</label>
                                        <input type="password" class="form-control mb-3" name="R_confirmacion_contrasena" placeholder="Confirmación de contraseña">

                                        <div class="container">
                                            <label>Áreas de interés:</label>
                                            <div class="row align-items-start">
                                                <div class="col-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="I_check1" name="areasInteres[]" value="Gestión informática" <?php echo in_array('Gestión informática', explode(', ', $row['areasInteres'])) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="I_check1">Gestión informática</label>
                                                </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="I_check2" name="areasInteres[]" value="Ciencia de datos"<?php echo in_array('Ciencia de datos', explode(', ', $row['areasInteres'])) ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="I_check2">Ciencia de datos</label>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="I_check3" name="areasInteres[]" value="Ingeniería de software"<?php echo in_array('Ingeniería de software', explode(', ', $row['areasInteres'])) ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="I_check3">Ingeniería de software</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="I_check4" name="areasInteres[]" value="Informática educativa"<?php echo in_array('Informática educativa', explode(', ', $row['areasInteres'])) ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="I_check4">Informática educativa</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="error-areas" class="text-danger"></div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupFile01">Imagen de perfil:</label>
                                            <input type="file" class="form-control" id="inputGroupFile01" name="imagen" value="imagenes/<?php echo $row['imagen']; ?>">
                                        </div>
                                        <img src="imagenes/<?php echo $row['imagen']; ?>" alt="Imagen de perfil actual" class="mb-3" width="100">
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('¿Estás seguro de enviar estos datos?')">Actualizar</button>
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
                        <td><a class="btn btn-danger" data-bs-toggle="modal"data-bs-target="#confirmDeleteModal<?php echo $row['id']; ?>">Eliminar</a></td>
                        <div class="modal fade" id="confirmDeleteModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="confirmDeleteModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Seguro que desea eliminar de forma permanente?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <a href="eliminarinfo.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a>
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ingresarModal2">Ingresar Proyecto</button>
            <!-- Modal para ingresar datos en la tabla 'informacion' -->
            <div class="modal fade" id="ingresarModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ingresar Datos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Agrega aquí el formulario para ingresar datos -->
                            <form action="insertarpro.php" method="POST" class="row g-3 needs-validation" onsubmit="return validar_registro()" novalidate>
                                <div>
                                    <label for="I_nombre">Titulo:</label>
                                    <input type="text" class="form-control" name="R_titulo" id="I_nombre required">
                                    <div id="error-nombre" class="text-danger"></div>
                                </div>
                                <div>
                                    <label for="I_correo">Año:</label>
                                    <input type="text" class="form-control" name="R_anio" id="I_correo">
                                    <div id="error-correo" class="text-danger"></div>
                                </div>
                                <div>
                                    <label for="I_fono">Link:</label>
                                    <input type="text" class="form-control" name="R_link" id="I_fono">
                                    <div id="error-fono" class="text-danger"></div>
                                </div>
                                <button type="submit" class="btn btn-primary" onclick="alert('¿Estás seguro de enviar estos datos?')">Enviar</button>
                                <p class="text-center">¿Ya estás registrado? Inicia sesión <a href="inicio_de_sesion.html">Aquí</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table mx-auto">
                <thead class="table-success table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Año</th>
                        <th>Link</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody style="color:white">
                    <?php

                        while ($row = mysqli_fetch_array($queryProyectos)) {
                            ?>
                    <tr>
                        <td><?php echo $row['idproyectos'] ?></td>
                        <td><?php echo $row['titulo'] ?></td>
                        <td><?php echo $row['anio'] ?></td>
                        <td><?php echo $row['link'] ?></td>
                        <td><?php echo $row['proyectos'] ?></td>

                        <td><button type="button" class="btn btn-info" data-bs-toggle="modal"data-bs-target="#editModal<?php echo $row['Id']; ?>">Editar</button></td>
                        <div class="modal fade" id="editModal<?php echo $row['Id']; ?>" tabindex="-1"aria-labelledby="editModalLabel<?php echo $row['Id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel3<?php echo $row['id']; ?>">Editar:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                                    </div>
                                    <div style="color:black" class="modal-body">
                                    <!--formulario de actualizar-->
                                    <form action="actualizarpro.php" method="POST">
                                        <input type="hidden" name="idproyectos" value="<?php echo $row['idproyectos']; ?>">
                                        <label>Titulo</label>
                                        <input type="text" class="form-control mb-3" name="R_titulo" placeholder="Titulo" value="<?php echo $row['titulo']; ?>">
                                        <label>Año</label>
                                        <input type="text" class="form-control mb-3" name="R_anio" placeholder="Año" value="<?php echo $row['anio']; ?>">
                                        <label>Link</label>
                                        <input type="text" class="form-control mb-3" name="R_link" placeholder="url" value="<?php echo $row['link']; ?>">
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
                        <td><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal<?php echo $row['idproyectos']; ?>">Eliminar</a></td>
                        <div class="modal fade" id="confirmDeleteModal<?php echo $row['idproyectos']; ?>" tabindex="-1" aria-labelledby="confirmDeleteModalLabel<?php echo $row['idproyectos']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Seguro que desea eliminar de forma permanente?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <a href="eliminarpro.php?id=<?php echo $row['idproyectos']; ?>" class="btn btn-danger">Eliminar</a>
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

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ingresarModal3">Ingresar Publicacion</button>
            <!-- Modal para ingresar datos en la tabla 'informacion' -->
            <div class="modal fade" id="ingresarModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ingresar Datos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Agrega aquí el formulario para ingresar datos -->
                            <form action="insertarpu.php" method="POST"enctype="multipart/form-data" class="row g-3 needs-validation" onsubmit="return validar_registro()" novalidate>
                                <div>
                                    <label for="R_titulo">Título:</label>
                                    <input type="text" class="form-control" name="R_titulo" id="I_nombre" required>
                                    <div id="error-nombre" class="text-danger"></div>
                                </div>
                                <div>
                                    <label for="I_correo">Fecha:</label>
                                    <input type="email" class="form-control" name="R_fecha" id="I_correo">
                                    <div id="error-correo" class="text-danger"></div>
                                </div>
                                <div>
                                    <label for="I_fono">Autor:</label>
                                    <input type="text" class="form-control" name="R_autor" id="I_fono">
                                    <div id="error-fono" class="text-danger"></div>
                                </div>
                                <div>
                                    <label for="I_cargo">Revision:</label>
                                    <input type="text" class="form-control" name="R_revision" id="I_cargo">
                                    <div id="error-cargo" class="text-danger"></div>
                                </div>
                                <div>
                                    <label for="I_descripcion">Acceso:</label>
                                    <textarea class="form-control" aria-label="With textarea"name="R_acceso" id="I_acceso"></textarea>
                                    <div id="error-descripcion" class="text-danger"></div>
                                </div>
                                <div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01">Archivo:</label>
                                    <input type="file" class="form-control" id="inputGroupFile01" name="archivo">
                                </div>
                                </div>
                                <button type="submit" class="btn btn-primary" onclick="alert('¿Estás seguro de enviar estos datos?')">Enviar</button>
                                <p class="text-center">¿Ya estás registrado? Inicia sesión <a href="inicio_de_sesion.html">Aquí</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody style="color:white">
                    <?php
                        while ($row = mysqli_fetch_array($queryPublicaciones)) {
                            ?>
                    <tr>
                        <td><?php echo $row['idpublicaciones'] ?></td>
                        <td><?php echo $row['titulo'] ?></td>
                        <td><?php echo $row['fecha'] ?></td>
                        <td><?php echo $row['autor'] ?></td>
                        <td><?php echo $row['revision'] ?></td>
                        <td><?php echo $row['acceso'] ?></td>
                        <td><?php echo $row['archivo'] ?></td>
                        <td><button type="button" class="btn btn-info" data-bs-toggle="modal"data-bs-target="#editModal<?php echo $row['idpublicaciones']; ?>">Editar</button></td>
                        <div class="modal fade" id="editModal<?php echo $row['idpublicaciones']; ?>" tabindex="-1"aria-labelledby="editModalLabel<?php echo $row['idpublicaciones']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel<?php echo $row['id']; ?>">Editar Publicación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Formulario de actualización -->
                                        <form action="actualizarpu.php" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="idpublicaciones" value="<?php echo $row['idpublicaciones']; ?>">
                                            <label for="R_titulo">Título:</label>
                                            <input type="text" class="form-control" name="R_titulo" value="<?php echo $row['titulo']; ?>">
                                            
                                            <label for="R_fecha">Fecha:</label>
                                            <input type="text" class="form-control" name="R_fecha" value="<?php echo $row['fecha']; ?>">
                                            
                                            <label for="R_autor">Autor:</label>
                                            <input type="text" class="form-control" name="R_autor" value="<?php echo $row['autor']; ?>">
                                            
                                            <label for="R_revision">Revisión:</label>
                                            <input type="text" class="form-control" name="R_revision" value="<?php echo $row['revision']; ?>">
                                            
                                            <label for="R_acceso">Acceso:</label>
                                            <textarea class="form-control" name="R_acceso"><?php echo $row['acceso']; ?></textarea>

                                            <label for="R_archivo">Archivo:</label>
                                            <input type="file" class="form-control" name="archivo">
                                            
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                            <a href="panel.php" class="btn btn-primary">Volver</a>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--eliminar-->
                        <td><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal<?php echo $row['idpublicaciones']; ?>">Eliminar</a></td>
                        <div class="modal fade" id="confirmDeleteModal<?php echo $row['idpublicaciones']; ?>" tabindex="-1" aria-labelledby="confirmDeleteModalLabel<?php echo $row['idpublicaciones']; ?>" aria-hidden="true">
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
                                        <a href="eliminarpu.php?id=<?php echo $row['idpublicaciones']; ?>"class="btn btn-danger">Eliminar</a>
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

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ingresarModal4">Ingresar Tesis</button>
            <!-- Modal para ingresar datos en la tabla 'informacion' -->
            <div class="modal fade" id="ingresarModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ingresar Datos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Agrega aquí el formulario para ingresar datos -->
                            <form action="insertarte.php" method="POST" class="row g-3 needs-validation" onsubmit="return validar_registro()" novalidate>
                                <div>
                                    <label for="I_nombre">Titulo:</label>
                                    <input type="text" class="form-control" name="R_titulo" id="I_nombre required">
                                    <div id="error-nombre" class="text-danger"></div>
                                </div>
                                <div>
                                    <label for="I_correo">Año:</label>
                                    <input type="date" class="form-control" name="R_anio" id="I_correo">
                                    <div id="error-correo" class="text-danger"></div>
                                </div>
                                <div>
                                    <label for="I_fono">Link:</label>
                                    <input type="text" class="form-control" name="R_link" id="I_fono">
                                    <div id="error-fono" class="text-danger"></div>
                                </div>
                                <button type="submit" class="btn btn-primary" onclick="alert('¿Estas seguro de enviar estos datos?')">Enviar</button>
                                <p class="text-center">¿Ya estás registrado? Inicia sesión <a href="inicio_de_sesion.html">Aquí</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table mx-auto">
                <thead class="table-success table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Año</th>
                        <th>Link</th>
                        <th>Imagen</th>

                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        while ($row = mysqli_fetch_array($queryTesis)) {?>
                    <tr>
                        <td><?php echo $row['idtesis'] ?></td>
                        <td><?php echo $row['titulo'] ?></td>
                        <td><?php echo $row['anio'] ?></td>
                        <td><?php echo $row['link'] ?></td>
                        <td><?php echo $row['imagen'] ?></td>
                        <td><button type="button" class="btn btn-info" data-bs-toggle="modal"data-bs-target="#editModal<?php echo $row['idtesis']; ?>">Editar</button></td>
                        <div class="modal fade" id="editModal<?php echo $row['idtesis']; ?>" tabindex="-1"aria-labelledby="editModalLabel<?php echo $row['idtesis']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel<?php echo $row['id']; ?>">Editar:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close"></button>
                                    </div>
                                    <div style="color:black" class="modal-body">
                                    <!--formulario de actualizar-->
                                        <form action="actualizarte.php" method="POST">

                                            <input type="hidden" name="idtesis" value="<?php echo $row['idtesis'] ?? ''; ?>">

                                            <div class="mb-3">
                                                <label for="titulo" class="form-label">Titulo:</label>
                                                <input type="text" class="form-control" name="titulo" placeholder="Titulo" value="<?php echo $row['titulo'] ?? ''; ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="anio" class="form-label">Año:</label>
                                                <input type="text" class="form-control" name="anio" placeholder="Año" value="<?php echo $row['anio'] ?? ''; ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="link" class="form-label">Link:</label>
                                                <input type="text" class="form-control" name="link" placeholder="Link" value="<?php echo $row['link'] ?? ''; ?>">
                                            </div>

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
                        <td><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal<?php echo $row['idtesis']; ?>">Eliminar</a></td>
                        <div class="modal fade" id="confirmDeleteModal<?php echo $row['idtesis']; ?>" tabindex="-1" aria-labelledby="confirmDeleteModalLabel<?php echo $row['idtesis']; ?>" aria-hidden="true">
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
                                        <a href="eliminarte.php?id=<?php echo $row['idtesis']; ?>"class="btn btn-danger">Eliminar</a>
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
                        <a class="text-secondary text-decoration-none" href="#">facebook</a>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script>
$(document).ready(function () {
    $('#buscar').on('input', function () {
        var query = $(this).val();

        if (query !== '') {
            $.ajax({
                type: "POST",
                url: "buscar.php",
                
                data: {
                    c: query
                },
                success: function (data) {
                    $('#search-results').html(data);
                }
            });
        } else {
            $.ajax({
                type: "POST",
                url: "buscar.php",
                data: {
                    c: ''
                },
                success: function (data) {
                    $('#search-results').html(data);
                }
            });
        }
    });
});



</script>

</html>