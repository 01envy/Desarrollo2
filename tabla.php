<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Horario de Atención</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Horario de Atención</h2>

        <?php

        include("conexion.php");
        $con = conectar();

        // Verificar la conexión
        if ($con->connect_error) {
            die('Error de conexión: ' . $con->connect_error);
        }

        // Recuperar el horario de la base de datos
        $consulta = $con->query("SELECT * FROM horario");
        $horario_db = array();

        while ($fila = $consulta->fetch_assoc()) {
            $dia = $fila['dia_semana'];
            $hora_inicio = date('H:i', strtotime($fila['hora_inicio']));
            // Almacenar el rango de horas ocupadas
            $hora_fin = date('H:i', strtotime($fila['hora_inicio'] . ' +1 hour 30 minutes'));
            $horario_db[$dia][$hora_inicio] = $hora_fin;

        }
        $con->close();
        ?>

        <form action="guardar_horario.php" method="post">
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
                //ciclo for para recorrer array de uno en uno
                foreach ($horas as $hora) {
                    echo "<tr>
                            <td>$hora - " . date('H:i', strtotime("$hora +1 hour 30 minutes")) . "</td>";
                
                    // Mostrar checkbox para cada día de la semana
                    for ($i = 1; $i <= 5; $i++) {
                        $dia_actual = dia_semana($i);
                        $hora_fin = date('H:i', strtotime("$hora +1 hour 30 minutes"));
                        $clase_ocupado = isset($horario_db[$dia_actual][$hora]) ? 'ocupado' : '';
                        echo "<td class='$clase_ocupado'><input type='checkbox' name='horario[$hora][$dia_actual]' value='1'></td>";
                    }
                
                    echo "</tr>";
                }
                
                ?>
            </table>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>

<?php
// Función para obtener el nombre del día de la semana
function dia_semana($numero_dia) {
    $dias_semana = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    return $dias_semana[$numero_dia - 1];
}
?>
