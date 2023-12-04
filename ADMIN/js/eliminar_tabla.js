$(document).ready(function () {
  $(".eliminar").click(function () {
    var idRegistro = $(this).data("id");
    var fila = $(this).closest("tr");
    var respuesta = confirm("¿Deseas eliminar este registro?");
    if (respuesta) {
      $.ajax({
        url: "empleados_elimina.php",
        method: "POST",
        data: { id: idRegistro },
        success: function (response) {
          if (response == "success") {
            fila.remove();
            alert("Registro eliminado con éxito");
          } else {
            alert("Error al eliminar el registro");
          }
        },
        error: function () {
          alert("Error al realizar la solicitud al servidor");
        },
      });
    }
  });
});
