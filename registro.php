<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="stylesFA.css" rel="stylesheet">
    <script src="js/validacion_registro.js"></script>
    <title>Registro de profesores</title>
</head>
<body>
    <!--Barra de navegacion-->
    <nav class="header">
        <div class="logo">
            <img src="img/logo-udacorp-txtblanco.png" alt="Logo de la marca">
        </div>
        <div>
           <ul class="nav-links">
                <li><a href="#">Bievenido, Por favor inicie sesion</a></li>

           </ul>            
        </div>
    </nav>


    <!--Formulario de registro-->
    <section class="formularioregistro">
        <div class="imagensesion">
            <img src="imginiciosesion/_ALX9328 - copia.jpg">
        </div>
        <div class="contenedor_formulario">
            <h1 class="text-center">Registro</h1>
            <form action="insertar_registro.php" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" onsubmit="return validar_registro()" novalidate>
                <div>
                    <label for="I_nombre">Nombre:</label>
                    <input type="text" class="form-control" name="R_nombre" id="I_nombre">
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
                    <textarea class="form-control" aria-label="With textarea" name="R_descripcion" id="I_descripcion"></textarea>
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
                                <input class="form-check-input" type="checkbox" id="I_check1" name="AreasInteres[]" value="Gestión informática">
                                <label class="form-check-label" for="I_check1" value="Gestion_informatica">Gestión informática</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="I_check2" name="AreasInteres[]" value="Ciencia de datos">
                                <label class="form-check-label" for="I_check2" value="Ciencia de datos">Ciencia de datos</label>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="I_check3" name="AreasInteres[]" value="Ingeniería de software">
                                <label class="form-check-label" for="I_check3" value="Ingeniería de software">Ingeniería de software</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="I_check4" name="AreasInteres[]" value="Informática educativa">
                                <label class="form-check-label" for="I_check4" value="Informática educativa">Informática educativa</label>
                            </div>
                        </div>
                    </div>
                    <div id="error-areas" class="text-danger"></div>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="I_imagen">Imagen de perfil:</label>
                    <input type="file" class="form-control" id="I_imagen" name="R_imagen_perfil">
                </div>
                <div id="error-imagen" class="text-danger"></div>
                <button type="submit" class="btn btn-primary" onclick="alert('¿Estas seguro de enviar estos datos?')">Enviar</button>
                <p class="text-center">¿Ya estás registrado? Inicia sesión <a href="inicio_de_sesion.php">Aquí</a></p>
            </form>
        </div>
    </section>
   
    <!--Seccion copyright-->

    <div class="copyright">
        <p>Creada por alumnos de Ingeniería Civil en Computación e informática 2023</p>
        <p>Departamento de ingeniería y ciencias de la computación</p>
    </div>

    <!--Scripts de boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>