<?php
include("conexion_horario.php");
include("conexion.php");
$con = conectar();
$con_horario = conectar_horario();
// Verificar la conexión a la base de datos
if (!$con) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

// Inicia la sesión (si aún no está iniciada)
session_start();

// Valores predeterminados
$correo_por_defecto = "andres.alfaro@uda.cl";
$id_profesor_por_defecto = '18';

// Verifica si la sesión está iniciada
if (isset($_SESSION['correo']) && isset($_SESSION['id'])) {
    // La sesión está iniciada, utiliza los valores de la sesión
    $correo_persona = $_SESSION['correo'];
    $id_profesor = $_SESSION['id'];
} else {
    // La sesión no está iniciada, utiliza los valores predeterminados
    $correo_persona = $correo_por_defecto;
    $id_profesor = $id_profesor_por_defecto;
}




// Realizar la consulta SQL para la pestaña 'publicaciones'
$queryPublicaciones = mysqli_query($con, "SELECT * FROM publicaciones WHERE idprofesor IN (SELECT id from informacion where correo='$correo_persona')");

// Verificar si la consulta fue exitosa
if (!$queryPublicaciones) {
    die("Error en la consulta 'publicaciones': " . mysqli_error($con));
}

// Realizar la consulta SQL para la pestaña 'tesis'
$queryTesis = mysqli_query($con, "SELECT * FROM tesis WHERE idprofesor IN (SELECT id from informacion where correo='$correo_persona')");

// Verificar si la consulta fue exitosa
if (!$queryTesis) {
    die("Error en la consulta 'tesis': " . mysqli_error($con));
}

$consulta = "SELECT * FROM informacion WHERE correo = '$correo_persona'";
$resultado = mysqli_query($con, $consulta);

if ($resultado) {
    $profesor = mysqli_fetch_assoc($resultado);

    //Se guardan en variables los distintos datos
    $Nombre = $profesor['nombre'];
    $Correo = $profesor['correo'];
    $Fono = $profesor['fono'];
    $Cargo = $profesor['cargo'];
    $Descripcion = $profesor['descripcion'];
    $Grado = $profesor['grado'];
    $Areas = $profesor['areasInteres'];
    $Imagen_perfil = $profesor['imagen'];
} else {
    echo "Error en la consulta: " . mysqli_error($con);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academico</title>
    <link rel="stylesheet" href="estilosindex.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="position-relative" data-spy="scroll" data-target="#navabar-scrollspy">

    <!--Barra de navegacion-->

    <header class="header sticky-top navbar nav-scrollspy" id="navabar-scrollspy">
        <div class="logo">
            <img src="img/logo-udacorp-txtblanco.png" alt="Logo de la marca">
        </div>
        <nav class="nav-scrollspy" id="navabar-scrollspy">
            <ul class="nav-links text-white">
                <li class="nav-item">
                    <a class="nav-link text-reset" href="#informacionpersonal">Informacion personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-reset" href="#proyectos">Proyectos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-reset" href="#articulos">publicaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-reset" href="#horario">Horario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-reset" href="#tesis">Tesis</a>
                </li>
                <li class="nav-item">
                    <?php
                    session_start();

                    if (isset($_SESSION["correo"])) {
                        $Nombre_profesor = $_SESSION["nombre"];

                        echo '<div class="btn-group">';
                        echo '  <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">';
                        echo $Nombre_profesor;
                        echo '  </button>';
                        echo '  <ul class="dropdown-menu">';
                        echo '    <li><a class="dropdown-item" style="color: black" href="index.php">Home</a></li>';
                        echo '    <li><a class="dropdown-item" style="color: black" href="panel.php">Mi panel</a></li>';
                        echo '    <li><a class="dropdown-item" style="color: black" href="miperfil.php">Mi perfil</a></li>';
                        echo '    <li><a class="dropdown-item" style="color: black" href="logout.php">Cerrar sesion</a></li>';
                        echo '  </ul>';
                        echo '</div>';
                    } else {
                        echo '<a class="btn" href="inicio_de_sesion.php"><button>Iniciar Sesión</button></a>';
                    }
                    ?>
                </li>
            </ul>
        </nav>
    </header>

    <!--Div para el scrollspy-->



    <!--Informacion personal-->
    <div id="informacionpersonal"></div>
    <div class="infopersonal pt-5 mt-5">

        <!--Recuadro de foto de perfil-->
        <div class="fotodeperfil">
            <div class="cajafoto">
                <div class="imagencaja">
                    <!--Se coloca una condicion para mostrar un mensaje el caso de q no cargaron los datos desde la BD-->
                    <?php echo isset($Imagen_perfil) ? "<img src='$Imagen_perfil'>" : "<p>Imagen no disponible</p>"; ?>
                </div>
                <div class="contenidocaja">
                    <h5 class="titulocaja">Informacion de contacto</h5>
                    <div class="informacioncaja">
                        <p>Correo: <?php echo isset($Correo) ? $Correo : 'Correo no disponible'; ?></p>
                        <p>Fono: <?php echo isset($Fono) ? $Fono : 'Fono no disponible'; ?></p>
                    </div>
                </div>
            </div>
        </div>


        <div class="datospersonales">
            <h1 class="nombreacademico"><?php echo isset($Nombre) ? $Nombre : 'Nombre no disponible'; ?></h1>
            <h4 class="cargoacademico"><?php echo isset($Cargo) ? $Cargo : 'Cargo no disponible'; ?></h4>
            <div class="descripcion">
                <p><?php echo isset($Descripcion) ? $Descripcion : 'Descripción no disponible'; ?></p>
                <p><strong>Grado académico:</strong><?php echo isset($Grado) ? $Grado : 'Grado no disponible'; ?></p>
                <p><strong>Áreas de interés:</strong><?php echo isset($Areas) ? $Areas : 'Áreas no disponibles'; ?></p>
            </div>
        </div>
    </div>

    <!--Proyectos-->
    <div id="proyectos" class=" pt-5 mt-5"></div>
    <div class="articulos">
        <h2>Proyectos</h2>


            <table class="table mx-auto">
                    <thead class="table-success table-striped">
                        <tr>
                            
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

    <!--Publicaciones-->
    <div id="articulos" class=" pt-5 mt-5"></div>

    <div class="articulos">
        <h2>Publicaciones</h2>



        <table class="table mx-auto">
            <thead class="table-success table-striped">
                <tr>
                    <th>Archivo</th>
                    <th>Titulo</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($queryPublicaciones)) {
                ?>
                    <tr>
                        <td><?php $imagen = $row['archivo'];
                            echo isset($Imagen_perfil) ? "<img src='$imagen' width='100' height='100'>" : "<p>Imagen no disponible</p>"; ?></td>
                        <td><?php echo $row['titulo'] ?></td>
                        <td><?php echo $row['fecha'] ?></td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <!--Horario-->
    <div id="horario" class="pt-5 "></div>
    <div class="horario ">

        <h2>Horario</h2>

        <div class="recuadrohorario">
            <?php
            // Verificar la conexión
            if ($con_horario->connect_error) {
                die('Error de conexión: ' . $con_horario->connect_error);
            }
            
            // Recuperar el horario de la base de datos
            $consulta = $con_horario->query("SELECT * FROM horario WHERE id_profesor = $id_profesor");
            $horario_db = array();

            while ($fila = $consulta->fetch_assoc()) {
                $dia = $fila['dia_semana'];
                $hora_inicio = date('H:i', strtotime($fila['hora_inicio']));
                // Almacenar el rango de horas ocupadas
                $hora_fin = date('H:i', strtotime($fila['hora_inicio'] . ' +1 hour 30 minutes'));
                $horario_db[$dia][$hora_inicio] = $hora_fin;
            }

            $con_horario->close();
            ?>
                
            <form action="guardar_horario.php" method="post" id="horarioForm">
                <input type="hidden" name="id_profesor" value="<?php echo $id_profesor; ?>">

                <table>
                    <tr>
                        <th></th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miércoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                    </tr>
                    <?php
                    $horas = array("09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00");

                    foreach ($horas as $hora) {
                        echo "<tr>
                                <td>$hora - " . date('H:i', strtotime("$hora +1 hour 30 minutes")) . "</td>";
                    
                        for ($i = 1; $i <= 5; $i++) {
                            $dia_actual = dia_semana($i);
                            $hora_fin = date('H:i', strtotime("$hora +1 hour 30 minutes"));
                            $clase_ocupado = isset($horario_db[$dia_actual][$hora]) ? 'ocupado' : '';
                            $checked = isset($horario_db[$dia_actual][$hora]) ? 'checked' : '';
                            echo "<td class='$clase_ocupado'><input type='checkbox' name='horario[$hora][$dia_actual]' value='1' $checked></td>";
                        }
                    
                        echo "</tr>";
                    }

                    function dia_semana($numero_dia)
                    {
                        $dias_semana = array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
                        return $dias_semana[$numero_dia - 1];
                    }

                    ?>
                </table>
                <input type="submit" value="Guardar" class="botonestabla">
                
            </form>
            <button id="btnModificar" class="botonestabla">bloquear celdas</button>

            <script>
    document.addEventListener("DOMContentLoaded", function () {
    var formulario = document.getElementById('horarioForm');
    var btnModificar = document.getElementById('btnModificar');

    btnModificar.addEventListener("click", function (event) {
        var checkboxes = formulario.querySelectorAll('input[type="checkbox"]');

        checkboxes.forEach(function (checkbox) {
            // Alternar el estado de la casilla
            checkbox.disabled = !checkbox.disabled;
        });
    });
});
</script>


        </div>
    </div>




    <!--Tesis-->
    <div id="tesis" class=" pt-5 mt-5"></div>
    <div class="tesis">

        <h2>Tesis</h2>
        <table class="table mx-auto">
            <thead class="table-success table-striped">
                <tr>
                    <th>Titulo</th>
                    <th>Año</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($queryTesis)) { ?>
                    <tr>
                        <td><?php echo $row['titulo'] ?></td>
                        <td><?php echo $row['anio'] ?></td>
                        <td><?php $link = $row['link'];
                            echo "<a href=\"$link\">$link</a>"; ?></td>
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

        <div class="container-fluid">
            <div class="row p-3 p-md-5 text-secondary">

                <!-- Columna 1 -->
                <div class="col-xs-12 col-md-6 col-lg-3 mb-3 mb-md-0">
                    <img src="img/logo-udacorporativo.png" class="img-fluid" alt="Logo UDA">
                </div>

                <!-- Columna 2 -->
                <div class="col-xs-12 col-md-6 col-lg-3 mb-3 mb-md-0">
                    <p class="h5">Enlaces</p>

                    <div class="mb-2 enlacesfooter">
                        <a class="text-secondary text-decoration-none" href="nosotros.php">Nosotros</a>
                    </div>
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

                    <!-- Otros enlaces... -->
                </div>

                <!-- Columna 3 -->
                <div class="col-xs-12 col-md-6 col-lg-3 mb-3 mb-md-0">
                    <p class="h5">Links</p>

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

                    <!-- Otros enlaces... -->
                </div>

                <!-- Columna 4 -->
                <div class="col-xs-12 col-md-6 col-lg-3">
                    <p class="h5">Contactos</p>
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

    </div>

    <!--Scripts de boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>