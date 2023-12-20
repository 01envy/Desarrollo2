<?php
    session_start(); // Inicia la sesión

    // Verifica si hay un correo de usuario en la sesión
    $recu_correo = isset($_SESSION['Recuperacion_correo']) ? $_SESSION['Recuperacion_correo'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="stylesFA.css" rel="stylesheet">
    <title>Recuperacion de contraseña</title>
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
            <h1 class="text-center">Restablecer contraseña</h1>
            <form action="restablecer_contrasena.php" method="POST" class="contenedor_formulario_2 row g-3 needs-validation" onsubmit="return validar_restablecer_contrasena()" novalidate>
                <input type="hidden" name="recu_correo" value="<?php echo $recu_correo; ?>">
                <div class="col-12">
                    <label for="I_recuperacion_contrasena">Ingrese su nueva contraseña:</label>
                    <input type="password" class="form-control" name="recuperacion_contrasena" id="I_recuperacion_contrasena" required>
                    <div id="error-recuperacion-contrasena" class="text-danger"></div>
                </div>
                <div class="col">
                    <label for="I_recuperacion_confirmacion_contra">Ingrese la confirmación de la nueva contraseña:</label>
                    <input type="password" class="form-control" name="recuperacion_confirmacion_contrasena" id="I_recuperacion_confirmacion_contra" required>
                    <div id="error-recuperacion-confirmacion" class="text-danger"></div>
                </div>
                <button type="submit" class="btn btn-primary d-grid" name="btnIngresar_sesion">Restablecer</button>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="text-center">¿No estás registrado? Regístrate <a href="registro.php">Aquí</a></li>
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