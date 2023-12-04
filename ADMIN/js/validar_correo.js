function verificarCorreo() {
  var correo = $("#correo").val();

  $.ajax({
    type: "POST",
    url: "empleados_correo.php",
    data: { correo: correo },
    success: function (response) {
      if (response == "existe") {
        $("#mensaje").html("Este correo electrónico ya existe");
        $("#correo").val("");
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
