$(document).ready(function() {

    // Manejar clic en enlaces de página
    $('.page').on('click', function(e) {
        e.preventDefault();

        // Obtener el valor de la página clickeada
        var numPagina = $(this).text();
        console.log('Página clickeada:', numPagina);

        $('.page').removeClass('active');
        $(this).addClass('active');
        $.ajax({
            type: "POST",
            url: "respuestaAjax_productos.php",
            data: { numeroPagina:numPagina },
            success: function (response) {
                var container = $('.row .features-holder .row');
                container.empty();
               generarProductosHTML(response);
            },
            error: function () {
                console.log('error');
            },
        });
    });

});

function generarProductosHTML(data){
    var container = document.querySelector('.row .features-holder .row'); // Modificado para seleccionar por clase 'row'
    console.log("cayo aca");
    data.forEach(function(item) {
        var productoHTML = `
            <div class="col-md-4 col-sm-12 text-center mt-4" >
            <input type="hidden" value="${item.codigo}" id="inputCodigo">
            <input type="hidden" id="id_producto" value="${item.id}">
                <div class="product-card">
                    <div class="shadow rounded feature-item p-4 mb-4" data-aos="fade-up" onclick="redirigir(${item.codigo})">
                        <div class="my-4">
                            <img src="ADMIN/${item.archivo}" alt="">
                        </div>
                        <h4>${item.nombre}</h4>
                        <p><b>Codigo:</b> ${item.codigo}<br><b>Precio:</b> $${ new Intl.NumberFormat().format(item.costo)}</p>
                    </div>
                    <div class="btn_cantidad">
                    <input type="number" placeholder="cantidad" id="${item.id}" value="" min="1" >   <br><br>
                    <button class="btn btn-primary btn-shadow btn-lg" onclick="agregarAlCarrito(${item.id})">Agregar al Carrito</button>
                    </div>                    
                </div>

            </div>
        `;

        // Agregar el HTML al contenedor
        container.innerHTML += productoHTML;

        var sessionValue=$('#sesion').val();
        console.log(sessionValue);
        if(sessionValue==0){
            console.log('si entra al final');
            $('.btn_cantidad').hide();
        }
    });
}

$(document).ready(function(){
    $.ajax({
        type: "POST",
        url: "respuestaAjax_productos.php",
        data: { numeroPagina:1},
        success: function (response) {
            generarProductosHTML(response);
        },
        error: function () {
            console.log('error');
        },
    });

});



    function activarBotones(){
        var sessionValue=$('#sesionActiva').val();
        console.log(sessionValue);
        if(sessionValue==false){
            $('#btn_cantidad').hide();
        }
    }

