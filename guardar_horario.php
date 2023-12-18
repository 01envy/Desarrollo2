<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    include("conexion_horario.php");
    $con = conectar_horario();

    // Verificar la conexión
    if ($con->connect_error) {
        die('Error de conexión: ' . $con->connect_error);
    }
    $resultado = $con->query("TRUNCATE TABLE horario");
    if (!$resultado) {
        die('Error al truncar la tabla: ' . $con->error);
    }
    
    // Obtener el horario enviado por el formulario
    $horario = $_POST['horario'];

    // Limpiar la tabla antes de guardar el nuevo horario
    $con->query("TRUNCATE TABLE horario");

    // Guardar el nuevo horario
    foreach ($horario as $hora => $dias) {
        foreach ($dias as $dia => $valor) {
            if ($valor == 1) {
                $con->query("INSERT INTO horario (dia_semana, hora_inicio, hora_fin) VALUES ('$dia', '$hora:00:00', '$hora:59:59')");
            }
        }
    }

    // Cerrar la conexión
    $con->close();

    // Redirigir a la página principal
    header("Location: index.php");
    exit();
    
}
?>
