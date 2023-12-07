<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Productos</title>
    <meta name="description" content="Roxy">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/barra_paginacion.css">
    <link rel="stylesheet" href="css/productos.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/ajax_pedirProductos.js"></script>
    <script src="js/entrar_detalleProducto.js"></script>
    <script src="js/agregar_carrito.js"></script>

    <?php include 'librerias.php' ?>

</head>
<body >
    <?php include 'navbar.php'; ?>

    <section id="features" class="bg-white">
        <div class="container">
            <div class="section-content">
                <!-- Section Title -->
                <div class="title-wrap mb-5" data-aos="fade-up">
                    <h2 class="section-title">
                        PRODUCTOS </a>
                    </h2>
                </div>
                <!-- End of Section Title -->
                <div class="row">
                    <!-- Features Holder-->
                    <div class="col-md-10 offset-md-1 features-holder">
                        <div class="row">

                        </div>
                    </div>
                    <!-- End of Features Holder-->

                </div>
                <div class="pagination-container">
                    <div class="pagination">
                        <a href="#" class="prev">Anterior</a>
                        <a href="#" class="page active">1</a>
                        <a href="#" class="page">2</a>
                        <a href="#" class="page">3</a>
                        <a href="#" class="page">4</a>
                        <a href="#" class="page">5</a>
                        <a href="#" class="page">6</a>
                        <a href="#" class="page">7</a>
                        <a href="#" class="next">Siguiente</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if(empty($_SESSION['id_cliente'])){
        $session=0;

    }
    else{
        $session=1;
    }

    ?>

<input type="hidden" value="<?php echo $session;?>" id="sesion">
    <?php include 'footer.php'; ?>

    <?php include 'scripts.php';?>
    <script>



    </script>
</body>

</html>