
function update (carrito) {




        $.ajax({
            url: "carrito_actualiza.php",
            method: "POST",
            data: {carrito: carrito},
            success: function (response) {
                if (response == "success") {

                    alert("Registro Actualizados con éxito");

                } else {
                    alert("Error al Actualizarr el registro");
                }
            },
            error: function () {
                alert("Error al realizar la solicitud al servidor");
            },
        });


}

function updateCarrito(filaActual){
    var fila = $(filaActual).closest("tr");
    //var fila= $(this).parentNode.parentNode;
    var idPedido=fila.find('.id_pedido_producto').val();
    var cantidad=parseFloat(fila.find('.quantity-input').val());
    var precioUnitario=parseFloat(fila.find('.precio_unitario').val());
    var subtotal=precioUnitario*cantidad;
    console.log(subtotal);
    fila.find('.subtotal').text(subtotal);

    console.log(idPedido);
    console.log(cantidad);
    $.ajax({
        url: "carrito_actualiza.php",
        method: "POST",
        data: {idPedido: idPedido, cantidad: cantidad},
        success: function (response) {
            if (response == "success") {

                console.log("Registro Actualizados con éxito");

            } else {
                console.log("Error al Actualizarr el registro");
            }
        },
        error: function () {
            console.log("Error al realizar la solicitud al servidor");
        },
    });
}