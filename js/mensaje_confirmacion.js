function mostrarConfirmacion() {
    // Muestra la caja de confirmación
    document.getElementById('confirmacion').style.display = 'block';
}

function respuesta(confirmation) {
    // Cierra la caja de confirmación
    document.getElementById('confirmacion').style.display = 'none';

    // Utiliza la respuesta como desees
    var resultado = confirmation;
    console.log(resultado);
}