// La función buscarTabla() se encarga de realizar una búsqueda dinámica en la tabla de profesores
function buscarTabla() {
    // Obtiene el valor del campo de entrada para buscar por nombre y lo convierte a mayúsculas
    var inputNombre, tabla, tr, i;
    inputNombre = document.getElementById("inputBuscarNombre").value.toUpperCase();
    
    // Obtiene la referencia a la tabla de profesores
    tabla = document.getElementById("tablaProfesores");
    
    // Obtiene un array de todas las filas (tr) de la tabla
    tr = tabla.getElementsByTagName("tr");

    // Itera sobre cada fila de la tabla
    for (i = 0; i < tr.length; i++) {
        // Obtiene la referencia a la celda (td) correspondiente al nombre en cada fila
        var tdNombre = tr[i].getElementsByTagName("td")[2];

        // Verifica si la celda de nombre existe en la fila actual
        if (tdNombre) {
            // Compara el contenido de la celda (nombre) en mayúsculas con el valor de búsqueda
            if (tdNombre.textContent.toUpperCase().indexOf(inputNombre) > -1) {
                // Si el nombre coincide con la búsqueda, muestra la fila
                tr[i].style.display = "";
            } else {
                // Si el nombre no coincide, oculta la fila
                tr[i].style.display = "none";
            }
        }
    }
}

// La función buscarTabla() se encarga de realizar una búsqueda dinámica en la tabla de proyectos
function buscarTablaproyectos() {
    // Obtiene el valor del campo de entrada para buscar por título y lo convierte a mayúsculas
    var inputTitulo, tabla, tr, i;
    inputTitulo = document.getElementById("inputBuscarTitulo").value.toUpperCase();
    
    // Obtiene la referencia a la tabla de proyectos
    tabla = document.getElementById("tablaProyectos");
    
    // Obtiene un array de todas las filas (tr) de la tabla
    tr = tabla.getElementsByTagName("tr");

    // Itera sobre cada fila de la tabla
    for (i = 0; i < tr.length; i++) {
        // Obtiene la referencia a la celda (td) correspondiente al título en cada fila
        var tdTitulo = tr[i].getElementsByTagName("td")[1]; // Cambiado a índice 1 para representar la columna del título

        // Verifica si la celda de título existe en la fila actual
        if (tdTitulo) {
            // Compara el contenido de la celda (título) en mayúsculas con el valor de búsqueda
            if (tdTitulo.textContent.toUpperCase().indexOf(inputTitulo) > -1) {
                // Si el título coincide con la búsqueda, muestra la fila
                tr[i].style.display = "";
            } else {
                // Si el título no coincide, oculta la fila
                tr[i].style.display = "none";
            }
        }
    }
}

function buscarTablapublicaciones() {
    var inputTitulo, tabla, tr, i;
    inputTitulo = document.getElementById("inputBuscarTituloPublicaciones").value.toUpperCase();
    
    tabla = document.getElementById("tablaPublicaciones");

    tr = tabla.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        var tdTitulo = tr[i].getElementsByTagName("td")[1];

        if (tdTitulo) {
            if (tdTitulo.textContent.toUpperCase().indexOf(inputTitulo) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function buscarTablatesis() {
    var inputTitulo, tabla, tr, i;
    inputTitulo = document.getElementById("inputBuscarTituloTesis").value.toUpperCase();
    
    tabla = document.getElementById("tablaTesis");

    tr = tabla.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        var tdTitulo = tr[i].getElementsByTagName("td")[1];

        if (tdTitulo) {
            if (tdTitulo.textContent.toUpperCase().indexOf(inputTitulo) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}