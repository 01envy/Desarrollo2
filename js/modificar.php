<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificación por Secciones</title>
    <style>
        body {
    font-family: Arial, sans-serif;
}

.seccion {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 20px;
}

form {
    margin-top: 10px;
}

input[type="submit"] {
    cursor: pointer;
}

    </style>
</head>
<body>

    <div class="seccion" id="seccion1">
        <h2>Sección 1</h2>
        <p>Contenido de la Sección 1.</p>
        <form action="modificar_seccion.php" method="post">
            <input type="hidden" name="seccion_a_modificar" value="seccion1">
            <input type="submit" value="Modificar Sección">
        </form>
    </div>

    <div class="seccion" id="seccion2">
        <h2>Sección 2</h2>
        <p>Contenido de la Sección 2.</p>
        <form action="modificar_seccion.php" method="post">
            <input type="hidden" name="seccion_a_modificar" value="seccion2">
            <input type="submit" value="Modificar Sección">
        </form>
    </div>

</body>
</html>
