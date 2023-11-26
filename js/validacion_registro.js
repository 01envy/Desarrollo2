//Validacion del registro, en donde se consigue el valor que esta dentro de los inputs, guardandolo en variables para validar. 
//Si hay un error salta un mensaje debajo del input correspondiente antes de enviar el formulario.
function validar_registro() {
    // Variables que guardan el valor de los inputs
    var registro_nombre = document.getElementById('I_nombre').value;
    var registro_correo = document.getElementById('I_correo').value;
    var registro_fono = document.getElementById('I_fono').value;
    var registro_cargo = document.getElementById('I_cargo').value;
    var registro_descripcion = document.getElementById('I_descripcion').value;
    var registro_grado = document.getElementById('I_grado').value;


    // Variables que guardan el mensaje de error
    var mensajeErrorNombre = '';
    var mensajeErrorCorreo = '';
    var mensajeErrorFono = '';
    var mensajeErrorCargo = '';
    var mensajeErrorDescripcion = '';
    var mensajeErrorGrado= '';
    var mensajeErrorAreas = '';

    // Condiciones para la validación (separados por que son mensajes diferentes)
    if (registro_nombre === '') {
        mensajeErrorNombre = 'Por favor, ingrese su nombre';
    }

    if (registro_correo === '') {
        mensajeErrorCorreo = 'Por favor, ingrese su correo';
    }else if (!/^\S+@\S+\.\S+$/.test(registro_correo)) {
        mensajeErrorCorreo = 'Ingrese una dirección de correo electrónico válida';
    }

    if (registro_fono === '') {
        mensajeErrorFono = 'Por favor, ingrese su fono';
    } else if (!/^\d+$/.test(registro_fono)) {
        mensajeErrorFono = 'El número de teléfono debe contener solo dígitos';
    }

    if(registro_cargo===''){
        mensajeErrorCargo = 'Por favor, ingrese su cargo';
    }

    if(registro_descripcion===''){
        mensajeErrorDescripcion = 'Por favor, ingrese su descripción';
    }
    if(registro_grado===''){
        mensajeErrorGrado = 'Por favor, ingrese su grado académico'
    }

    var areasInteres = document.querySelectorAll('input[name="AreasInteres[]"]:checked');
    if (areasInteres.length === 0) {
        mensajeErrorAreas = 'Seleccione al menos un área de interés';
    }

    // Funciones para mostrar el mensaje de error en la pagina
    document.getElementById('error-nombre').innerHTML = mensajeErrorNombre;
    document.getElementById('error-correo').innerHTML = mensajeErrorCorreo;
    document.getElementById('error-fono').innerHTML = mensajeErrorFono;
    document.getElementById('error-cargo').innerHTML = mensajeErrorCargo;
    document.getElementById('error-descripcion').innerHTML = mensajeErrorDescripcion;
    document.getElementById('error-grado').innerHTML = mensajeErrorGrado;
    document.getElementById('error-areas').innerHTML = mensajeErrorAreas;

    // Si alguna variable de mensaje de error tiene contenido, retorna falso; si no, retorna verdadero y envía el formulario
    if (mensajeErrorNombre !== '' || mensajeErrorCorreo !== '' || mensajeErrorFono !== '' || mensajeErrorCargo !== '' || 
    mensajeErrorDescripcion !== '' || mensajeErrorGrado !== '' || mensajeErrorAreas !== '') {
        return false;
    }else{
        return true;
    }

}