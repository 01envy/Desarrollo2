<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    include("conexion_horario.php");
    $con = conectar_horario();

    // Verificar la conexión
    if ($con->connect_error) {
        die('Error de conexión: ' . $con->connect_error);
    }

    // Obtener el horario enviado por el formulario
    $horario = $_POST['horario'];
    $idprofesor = $_SESSION['id'];

    // Obtener horario actual de la base de datos
    $consulta_db = $con->prepare("SELECT * FROM horario WHERE id_profesor = ?");
    $consulta_db->bind_param("i", $idprofesor);
    $consulta_db->execute();
    $resultado_db = $consulta_db->get_result();

    $horario_db = array();

    while ($fila = $resultado_db->fetch_assoc()) {
        $dia = $fila['dia_semana'];
        $hora_inicio_db = date('H:i', strtotime($fila['hora_inicio']));
        $horario_db[$dia][$hora_inicio_db] = $fila['id']; // Almacenar el ID para la eliminación
    }

    // Eliminar registros de la base de datos si están desmarcados en el formulario
    foreach ($horario_db as $dia => $horas) {
        foreach ($horas as $hora_inicio_db => $id_registro) {
            // Verificar si la casilla está desmarcada en el formulario
            $casilla_desmarcada = !isset($horario[$hora_inicio_db][$dia]) || $horario[$hora_inicio_db][$dia] !== '1';

            if ($casilla_desmarcada) {
                // Si la casilla está desmarcada, eliminar el registro correspondiente
                $con->query("DELETE FROM horario WHERE id = $id_registro");
            }
        }
    }

    // Guardar o actualizar el horario
    foreach ($horario as $hora => $dias) {
        foreach ($dias as $dia => $valor) {
            // Evitar inyección de SQL utilizando consultas preparadas
            $stmt_insert_update = $con->prepare("INSERT INTO horario (id_profesor, dia_semana, hora_inicio, hora_fin) VALUES (?, ?, ?, ?) 
                ON DUPLICATE KEY UPDATE hora_inicio = VALUES(hora_inicio), hora_fin = VALUES(hora_fin)");

            $stmt_insert_update->bind_param("ssss", $idprofesor, $dia, $hora_inicio, $hora_fin);

            $hora_inicio = $hora . ':00:00';
            $hora_fin = $hora . ':59:59';

            $stmt_insert_update->execute();

            $stmt_insert_update->close();
        }
    }

    // Cerrar la conexión
    $con->close();

    // Redirigir a la página principal con un mensaje de éxito
    header("Location: index.php?mensaje=Horario guardado exitosamente");
    exit();
}
?>
