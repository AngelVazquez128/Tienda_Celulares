function cerrarPedido(idPedidoCerrar){
    console.log(idPedidoCerrar);

    $.ajax({
        url: "pedido_cerrar.php",
        method: "POST",
        data: {idPedido: idPedidoCerrar},
        success: function (response) {
            if (response == "success") {

                showInformation("Pedido cerrado con éxito",'#10ff10');
                window.location.href="index.php";

            } else {
                showInformation("Error al cerrar el pedido",'#f11f1f');
            }
        },
        error: function () {
            showInformation("Error al realizar la solicitud al servidor",'#f11f1f');
        },
    });

}