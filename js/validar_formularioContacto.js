function validarForm(){
    var nombre=$('#nombre').val();
    var apellidos=$('#apellidos').val();
    var correo=$('#correo').val();
    var mensaje=$('#mensaje').val();

    if(nombre=="" || apellidos=="" ||correo==""|| mensaje==""){
        document.getElementById("miFormulario").addEventListener("submit", function(event) {
            // Detener el evento submit
            event.preventDefault();
            showInformation("Faltan campos por llenar",'#f11f1f');
        });

    }
    else{

    }

}