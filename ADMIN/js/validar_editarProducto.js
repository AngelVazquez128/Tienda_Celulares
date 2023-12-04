$(document).ready(function() {
    $('form').on('submit', function(event) {
        var nombre = $('#nombre').val();
        var codigo = $('#codigo').val();
        var descripcion = $('#descripcion').val();
        var costo = $('#costo').val();
        var stock= $('#stock').val();
        var archivo=$('#archivo')[0];

        if (nombre == "" || codigo == "" || descripcion == ""
            || costo == "" || stock == "") {
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
    $('#nombre').val(nombreProducto);
    $('#codigo').val(codigoProducto);
    $('#descripcion').val(descripcionProducto);
    $('#costo').val(costoProducto);
    $('#stock').val(stockProducto);
});

$(document).ready(function () {
    $('#codigo').on('blur', function () {
        var codigoActual=$('#codigo').val();
        var codigoInicial=codigoProducto;
        if(codigoActual!=codigoInicial){
            verificarCodigo();
        }
    });
});