function agregarAlCarrito(id_producto) {
    // Realizar operaciones adicionales aquí si es necesario
    var id=id_producto;
    var cantidad= $('#'+id_producto).val();

    if(cantidad!="" && cantidad!=0){
        $.ajax({
            type: "POST",
            url: "scriptAgregaProducto.php",
            data: { id_producto:id,cantidad:cantidad},
            success: function (response) {

                console.log(response);
                if(response=="Exito"){
                    showInformation("Se agrego correctamente al carrito",'#10ff10');
                    $('#'+id_producto).val("");
                }

            },
            error: function () {
                console.log('error');
            },
        });
    }
    else{
        showInformation("Ingresa la cantidad     ",'#f11f1f');
    }
    console.log(id_producto);
    console.log(cantidad);

    // Redirigir a otro archivo PHP



    //window.location.href = 'scriptAgregaProducto.php';
}