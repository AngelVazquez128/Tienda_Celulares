function verificarUsuario(event) {
  var correo = $("#correo").val();
  var password = $("#password").val();

  if (correo == "" || password == "") {
    $("#error-message").html("Faltan campos por llenar");
    setTimeout(function () {
      $("#error-message").html(""); // Limpia el contenido del div después de 5 segundos
    }, 5000);
    event.preventDefault();
  } else {
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: "valida_usuario.php",
      data: { correo: correo, password: password },
      success: function (response) {
        if (response == 0) {
          $("#error-message").html("Usuario no encontrado");
          //$("#correo").val("");
          
          setTimeout(function () {
            $("#error-message").html(""); // Limpia el contenido del div después de 5 segundos
          }, 5000);
          
          console.log("cayo aqui");
          return false;
        } else {
          window.location.href = 'bienvenido.php';
        }
      },
      error: function () {
        $("#error-message").html("Error al verificar. Intenta de nuevo.");
        event.preventDefault();
      },
    });
    
  }
}
