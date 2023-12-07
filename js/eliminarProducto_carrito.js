$(document).ready(function () {
    $(".eliminar").click(function () {
        var idRegistro = $(this).data("id");
        var fila = $(this).closest("tr");
        //var fila= $(this).parentNode.parentNode;
        var idProducto = fila.find('.id_pedido_producto').val();

        var subtotal = parseFloat(fila.find('.subtotal').text());
        console.log("subtotal: " + subtotal);

        var total = parseFloat($('#total').text());         //ERRORR IMPORTANTE
        total = total - subtotal;
        console.log("total: " + total);
        if(total==0){
           $('.cart-total').hide();
        }
        $('#total').text(total);



        console.log(fila);
        console.log(idProducto);



            $.ajax({
                url: "productos_elimina.php",
                method: "POST",
                data: {id: idProducto},
                success: function (response) {
                    if (response == "success") {
                        fila.animate({
                            opacity: 0,
                            marginLeft: '-100%'

                        }, 3000, function () {
                            // Una vez completada la animación, eliminamos la fila del DOM
                            fila.remove();
                        });
                        showInformation("Registro eliminado con éxito",'#10ff10');

                    } else {
                        showInformation("Error al eliminar el registro",'#f11f1f');
                    }
                },
                error: function () {
                    showInformation("Error al realizar la solicitud al servidor",'#f11f1f');
                },
            });

    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Código a ejecutar cuando la página se ha cargado completamente
    if($('#total').text()==0){
        $('.cart-total').hide();
    }
});