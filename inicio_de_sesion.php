<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="stylesFA.css" rel="stylesheet">
    <title>Inicio de sesion Profesores</title>
</head>
<body>
    <!--Barra de navegacion-->
    <nav class="header">
        <div class="logo">
            <img src="img/logo-udacorp-txtblanco.png" alt="Logo de la marca">
        </div>
        <div>
           <ul class="nav-links">

                <li><a href="inicio_de_sesion.php">Bienvenido, Por favor inicie sesion</a></li>

           </ul>            
        </div>
    </nav>
    <!--Formulario de inicio de sesion-->

    <section class="formularioinicio">
        <div class="imagensesion">
            <img src="imginiciosesion/_ALX9328 (2).jpg">
        </div>
        <div class="formulario">
            <h1 class="text-center">Inicio de sesión</h1>

            <form action="ingreso_de_sesion.php" method="POST" class="contenedor_formulario_2 row g-3 needs-validation" onsubmit="return validar_inicio_sesion()" novalidate>

                <div class="mb-4">
                    <label for="I_inicio_usuario">Correo:</label>
                    <input type="text" class="form-control" name="sesion_correo" id="I_inicio_correo" required>
                    <div id="error-correo-sesion" class="text-danger"></div>
                </div>
                <div class="mb-4">
                    <label for="I_inicio_contrasena">Contraseña:</label>
                    <input type="password" class="form-control" name="sesion_contrasena" id="I_inicio_contrasena" required>
                    <div id="error-contra-sesion" class="text-danger"></div>
                </div>

                <button type="submit" class="btn btn-primary d-grid" name="btnIngresar_sesion" onclick="alert('¿Estás seguro de enviar estos datos?')">Iniciar sesión</button>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="text-center">¿No estás registrado? Regístrate <a href="registro.php">Aquí</a></li>
                    <li class="text-center">¿Has olvidado tu contraseña? Restáurala <a href="recuperar_contra.php">Aquí</a></li>
                </ul>
            </form>
        </div>
    </section>
    <!--Seccion copyright-->
    <div class="copyright">
        <p>Creada por alumnos de Ingeniería Civil en Computación e informática 2023</p>
        <p>Departamento de ingeniería y ciencias de la computación</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="js/validacion_boostrap.js"></script>
    <script src="js/validacion_de_campos.js"></script>
</body>
</html>