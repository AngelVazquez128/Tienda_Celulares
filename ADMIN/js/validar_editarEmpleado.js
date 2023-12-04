$(document).ready(function () {
    $('#form').on('submit', function (event) {
        var nombre = $('#nombre').val();
        var apellido = $('#apellidos').val();
        var correo = $('#correo').val();
        var rol = $('#rol').val();

        if (nombre == "" || apellido == "" || correo == "" || rol == "0") {
            $('#error').html("error, faltan campos por llenar");

            setTimeout(function () {
                $('#error').html('');
            }, 5000);

            event.preventDefault(); // Evitar que se envíe el formulario
        }
        else {
            $(this).submit(); // Enviamos el formulario
        }
    });
});

$(document).ready(function () {
    $('#nombre').val(nombreEmpleado);
    $('#apellidos').val(apellidosEmpleado);
    $('#correo').val(correoEmpleado);
    $('#rol').val(rolEmpleado);
});

$(document).ready(function () {
    $('#correo').on('blur', function () {
        var correoActual=$('#correo').val();
        var correoInicial=correoEmpleado;
        if(correoActual!=correoInicial){
            verificarCorreo();
        }
    });
});