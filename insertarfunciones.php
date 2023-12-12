<?php
include("conexion.php");
$con = conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['tipo_formulario'])) {
        $tipoFormulario = $_POST['tipo_formulario'];

        switch ($tipoFormulario) {
            case 'form1':
                manejarFormulario1($_POST, $_FILES);
                break;
            case 'form2':
                manejarFormulario2($_POST);
                break;
            case 'form3':
                manejarFormulario3($_POST);
                break;
            case 'form4':
                manejarFormulario4($_POST, $_FILES);
                break;
            default:
                break;
        }
    }
}

function manejarFormulario1($datosFormulario, $datosArchivos) {

    include("conexion.php");
    $con = conectar();
    
    // Recibir datos del formulario
    $nombre = $_POST['R_nombre'];
    $correo = $_POST['R_correo'];
    $fono = $_POST['R_fono'];
    $cargo = $_POST['R_cargo'];
    $descripcion = $_POST['I_descripcion'];
    $grado = $_POST['R_grado'];
    $contrasena = $_POST['R_contrasena'];
    $rut = $_POST['R_rut'];
    
    // Hash de la contraseña (puedes usar una función más segura según tu necesidad)
    $hashed_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    
    // Áreas de interés (si se han seleccionado)
    $areasInteres = isset($_POST['areasInteres']) ? implode(", ", $_POST['areasInteres']) : "";
    
    // Nombre del archivo de imagen
    $nombreImagen = $_FILES['imagen']['name'];
    
    // Ruta donde se guardará la imagen
    $rutaImagen = "desarrollo/imagenes/" . $nombreImagen;
    
    // Mover la imagen al directorio de destino
    move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen);
    
    // Query para insertar datos en la base de datos
    $sql = "INSERT INTO informacion (nombre, correo, fono, cargo, informacion, grado, contrasena, rut, areaInteres, imagen)
            VALUES ('$nombre', '$correo', '$fono', '$cargo', '$descripcion', '$grado', '$hashed_contrasena', '$rut', '$areasInteres', '$nombreImagen')";
    
    // Ejecutar la consulta
    if ($con->query($sql) === TRUE) {
        echo "Datos insertados correctamente";
    } else {
        echo "Error al insertar datos: " . $con->error;
    }
    
    // Cerrar la conexión
    $con->close();

}

function manejarFormulario2($datosFormulario) {
    // Procesa los datos del Formulario proyectos
    $titulo = $datosFormulario['R_nombre'];
    $anio = $datosFormulario['R_correo'];
    $link = $datosFormulario['R_fono'];
    $proyecto = $datosFormulario['R_cargo'];
}

function manejarFormulario3($datosFormulario) {
    // Procesa los datos del Formulario publicaciones
    $titulo = $datosFormulario['R_nombre'];
    $fecha = $datosFormulario['R_correo'];
    $autor = $datosFormulario['R_fono'];
    $revision = $datosFormulario['R_cargo'];
    $descripcion = $datosFormulario['I_descripcion'];
    $grado = $datosFormulario['R_grado'];
}

function manejarFormulario4($datosFormulario, $datosArchivos) {
    // Procesa los datos del Formulario tesis
    $titulo = $datosFormulario['R_nombre'];
    $anio = $datosFormulario['R_correo'];
    $link = $datosFormulario['R_fono'];
    $imagenPerfil = $datosArchivos['inputGroupFile01']['name'];
}
?>
