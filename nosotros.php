<?php
$host="localhost";
$user="root";
$pass="fernando2001";
$bd="profesores";

// Crea la conexión
$conn = new mysqli($host, $user, $pass, $bd);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesa el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    $sql = "INSERT INTO formulario_contacto (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        header("Refresh: 0; url=nosotros.php");
        echo '<script>alert("Registro exitoso");</script>';
    } else {
        echo "Error al registrar datos: " . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <link rel="stylesheet" href="estilosnosotros.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body class="position-relative" data-spy="scroll" data-target="#navabar-scrollspy">
    
    <!--Barra de navegacion-->


    <header class="header sticky-top nav-scrollspy " id="navabar-scrollspy">
        <div class="logo">
            <img src="img/logo-udacorp-txtblanco.png" alt="Logo de la marca">
        </div>
        <nav class="nav-scrollspy" id="navabar-scrollspy">
           <ul class="nav-links text-white">
           </ul>            
        </nav>
        <?php
            session_start();

            if(isset($_SESSION["Correo"])){
                $Nombre_profesor = $_SESSION["Nombre"];

                echo '<a class="btn" href="#"><button>'.$Nombre_profesor.'</button></a>';
            }else{
                echo '<a class="btn" href="#"><button>Iniciar Sesión</button></a>';
            }
        ?>
    </header>


    <!--Carrusel-->

    <div class="overlay">
        <h1 class="titulooverlay">Sobre nosotros</h1>
    </div>
    <div id="myCarousel" class="carousel slide">
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="FotosDIICC/_ALX9325.JPG" class="d-block w-100"  alt="foto_carrusel1">
            </div>
            <div class="carousel-item">
                <img src="FotosDIICC/_ALX9336.JPG" class="d-block w-100" alt="foto_carrusel2">
            </div>
            <div class="carousel-item">
                <img src="FotosDIICC/_ALX9328.JPG" class="d-block w-100" alt="foto_carrusel3">
            </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
            

    <!--Informacion sobre nosotros-->

    <div class="infonosotros">
        <h1 class="tituloquienessomos">¿Quiénes somos?</h1>
        <div class="quienessomos">Bienvenido a la Sección de Profesores de Universidad de Atacama
            En esta sección, nos complace presentarte a nuestro talentoso equipo de profesores que desempeñan un papel crucial en la formación académica y personal de nuestros estudiantes. En Universidad de Atacama, nos enorgullece contar con un grupo diverso y dedicado de educadores comprometidos con la excelencia en la enseñanza, la investigación y el servicio a la comunidad.            
            Nuestra Misión: Inspirar el Conocimiento y Fomentar el Desarrollo Integral 
            En Universidad de Atacama, creemos que la educación va más allá de las aulas. Nuestra misión es inspirar el conocimiento, cultivar el pensamiento crítico y fomentar el desarrollo integral de cada estudiante. Nuestros profesores, con su experiencia y pasión por la enseñanza, son piezas fundamentales en el logro de estos objetivos.  
            Diversidad de Conocimientos y Experiencias  
            Nuestro equipo de profesores abarca una amplia gama de disciplinas y cuenta con una vasta experiencia en sus campos respectivos. Desde expertos en ciencias hasta humanidades, nuestros profesores están comprometidos a proporcionar una educación de calidad que prepare a los estudiantes para los desafíos del mundo actual.
            Compromiso con la Innovación Educativa y la Investigación
            En Universidad de Atacama, abrazamos la innovación educativa y la investigación como motores del progreso. Nuestros profesores están involucrados en proyectos de investigación emocionantes y adoptan enfoques pedagógicos innovadores para garantizar una experiencia educativa dinámica y relevante. 
            Conócenos Mejor
            Explora nuestras páginas individuales para conocer más sobre cada uno de nuestros profesores, sus logros académicos y contribuciones a sus respectivos campos. Estamos emocionados de compartir contigo el excepcional equipo de profesionales que forman parte de Universidad de Atacama.
            Gracias por ser parte de nuestra comunidad educativa.</div>
    </div>

    <!--Preguntas frecuentes-->
    <div class="preguntasfrecuentes">

        <h1 class="titulopreguntas">Preguntas frecuentes</h1>

        <!--Acordeón-->

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <strong>¿Cómo puedo ponerme en contacto con un profesor en especifico?</strong>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Para ponerse en contacto con un profesor específico, puede encontrar la información de contacto en la página individual del profesor. En la sección de perfil de cada profesor, se proporcionan detalles de contacto, como la dirección de correo electrónico y, en algunos casos, el número de teléfono. No dudes en enviar un correo electrónico o llamar para programar una cita o hacer cualquier pregunta relacionada con el curso.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <strong>¿Cómo puedo obtener más información sobre las áreas de investigación de un profesor en particular?</strong>
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Para obtener información detallada sobre las áreas de investigación de un profesor, visite la página individual del profesor. En la sección de perfil, se incluyen detalles sobre las áreas específicas de investigación, proyectos actuales y publicaciones. Si desea obtener más información o discutir oportunidades de investigación, le recomendamos ponerse en contacto directo con el profesor a través de los detalles proporcionados.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <strong> ¿Cuándo y dónde se llevan a cabo las horas de oficina de los profesores?</strong>
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Las horas de oficina de los profesores varían según la disponibilidad individual de cada instructor. Puede encontrar información sobre las horas de oficina en la página del curso o en la sección de perfil del profesor. Además, si tiene alguna pregunta específica sobre las horas de oficina o si necesita programar una reunión en un horario diferente, no dude en ponerse en contacto directo con el profesor a través de los detalles proporcionados en su perfil.
                </div>
              </div>
            </div>
          </div>
    </div>


    <!--Contáctanos-->
    <form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="contactanos">
            <div class="textocontactanos">
                <h2>¿Tienes algún problema?</h2>
                <p>No dudes en escribirnos a través del siguiente formulario</p>
            </div>
            
            <div class="tablacontactanos">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                    <input type="nombre" class="form-control" id="nombre" name="nombre" placeholder="Introduzca su nombre completo">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Describa su problema</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="3"></textarea>
                </div>
                <button type="submit">Enviar</button>
            </div>


        </div>
    </form>


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
                        <a class="text-secondary text-decoration-none" href="nosotros.php">Nosotros</a>
                    </div>
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
    
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    <!--Scripts de boostrap-->
</body>
</html>