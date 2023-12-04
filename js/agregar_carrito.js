function agregarAlCarrito(id_producto) {
    // Realizar operaciones adicionales aquí si es necesario
    var id=id_producto;
    var cantidad= $('#'+id_producto).val();
    var id_cliente=1;
    console.log(id_producto);
    console.log(cantidad);
    console.log(id_cliente);
    // Redirigir a otro archivo PHP

    $.ajax({
        type: "POST",
        url: "scriptAgregaProducto.php",
        data: { id_producto:id,cantidad:cantidad,id_cliente:id_cliente},
        success: function (response) {
            if(response=="Exito"){
                alert("Se agrego correctamente al carrito");
                $('#'+id_producto).val("");
            }

        },
        error: function () {
            console.log('error');
        },
    });

    //window.location.href = 'scriptAgregaProducto.php';
}