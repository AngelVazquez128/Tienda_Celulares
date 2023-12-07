function verificarCliente(event){
    var correo=$('#correo').val();
    var password=$('#password').val();
   // alert(correo+password);
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: "valida_cliente.php",
        data: { usuario: correo, pass: password },
        success: function (response) {

            if (response == 0) {
               // alert(response);
                $("#error-message").html("Usuario no encontrado");
                //$("#correo").val("");

                setTimeout(function () {
                    $("#error-message").html(""); // Limpia el contenido del div después de 5 segundos
                }, 5000);

                console.log("cayo aqui");
            } else {
                console.log("cayo l");

                showInformation("Usuario admitido",'#10ff10');
                window.location.href = 'index.php';
            }
        },
        error: function () {
            alert("Error");
            $("#error-message").html("Error al verificar. Intenta de nuevo.");
            event.preventDefault();
        },
    });
}