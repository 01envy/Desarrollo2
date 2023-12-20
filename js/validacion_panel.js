function validar_ingreso_tesis() {
    var registro_titulo = document.getElementById('I_titulo_tesis').value;
    var registro_anio = document.getElementById('I_anio_tesis').value;
    var registro_link = document.getElementById('I_link_tesis').value;

    var mensajeErrorTitulo = '';
    var mensajeErrorAnio = '';
    var mensajeErrorLink = '';

    if (registro_titulo === '') {
        mensajeErrorTitulo = 'Por favor, ingrese el título';
    }

    if (registro_anio === '') {
        mensajeErrorAnio = 'Por favor, ingrese el año';
    }

    if (registro_link === '') {
        mensajeErrorLink = 'Por favor, ingrese el link';
    }

    document.getElementById('error-titulo-tesis').innerHTML = mensajeErrorTitulo;
    document.getElementById('error-anio-tesis').innerHTML = mensajeErrorAnio;
    document.getElementById('error-link-tesis').innerHTML = mensajeErrorLink;

    if (mensajeErrorTitulo !== '' || mensajeErrorAnio !== '' || mensajeErrorLink !== '') {
        return false;
    } else {
        return true;
    }
}