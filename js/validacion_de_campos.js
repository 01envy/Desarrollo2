function validar_inicio_sesion() {
    var sesion_correo = document.getElementById('I_inicio_correo').value;
    var sesion_contrasena = document.getElementById('I_inicio_contrasena').value;

    var mensajeErrorSesionCorreo = '';
    var mensajeErrorSesionContra = '';

    if (sesion_correo === '') {
        mensajeErrorSesionCorreo = "Por favor ingrese su correo.";
    }
    if (sesion_contrasena === '') {
        mensajeErrorSesionContra = "Por favor ingrese su contraseña.";
    }

    document.getElementById('error-correo-sesion').innerHTML = mensajeErrorSesionCorreo;
    document.getElementById('error-contra-sesion').innerHTML = mensajeErrorSesionContra;

    if (mensajeErrorSesionCorreo !== '' || mensajeErrorSesionContra !== '') {
        return false;
    } else {
        return true;
    }
}

function validar_correo_recuperacion(){
    var recuperacion_correo = document.getElementById('I_recuperacion_correo').value;

    var mensajeErrorRecuperacionCorreo = '';

    if(recuperacion_correo === ''){
        mensajeErrorRecuperacionCorreo = 'Por favor ingrese su correo.';
    }

    document.getElementById('error-contra-recuperacion').innerHTML = mensajeErrorRecuperacionCorreo;

    if(mensajeErrorRecuperacionCorreo !== ''){
        return false;
    }else{
        return true;
    }
}

function validar_restablecer_contrasena() {
    var nueva_contrasena = document.getElementById('I_recuperacion_contrasena').value;
    var confirmar_contrasena = document.getElementById('I_recuperacion_confirmacion_contra').value;

    var mensajeErrorContrasena = '';
    var mensajeErrorConfirmacion = '';

    if (nueva_contrasena === '') {
        mensajeErrorContrasena = "Por favor ingrese su nueva contraseña.";
    }
    if (confirmar_contrasena === '') {
        mensajeErrorConfirmacion = "Por favor ingrese la confirmación de la nueva contraseña.";
    } else if (confirmar_contrasena !== nueva_contrasena) {
        mensajeErrorConfirmacion = "Las contraseñas no coinciden.";
    }

    document.getElementById('error-recuperacion-contrasena').innerHTML = mensajeErrorContrasena;
    document.getElementById('error-recuperacion-confirmacion').innerHTML = mensajeErrorConfirmacion;

    if (mensajeErrorContrasena !== '' || mensajeErrorConfirmacion !== '') {
        return false;
    } else {
        return true;
    }
}