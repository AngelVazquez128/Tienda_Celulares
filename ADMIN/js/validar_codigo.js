function verificarCodigo() {
    var codigoProducto = $("#codigo").val();

    $.ajax({
        type: "POST",
        url: "valida_codigo.php",
        data: { codigo: codigoProducto },
        success: function (response) {
            if (response == "existe") {
                $("#mensaje").html("Este codigo ya existe");
                $("#codigo").val("");
                setTimeout(function() {
                    $("#mensaje").html(""); // Limpia el contenido del div después de 5 segundos
                }, 5000);

            }
        },
        error: function () {
            $("#mensaje").html("Error al verificar. Intenta de nuevo.");
        },

    });

}