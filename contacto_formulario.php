<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CONTACTO</title>
    <meta name="description" content="Roxy">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include 'librerias.php' ?>

</head>
<body data-target="#navbar" class="static-layout">
<?php include 'navbar.php'; ?>

<section id="reservation" class="bg-white section-content">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 offset-lg-1 mb-5 mb-lg-0" data-aos="fade-right">
                <div class="bg-white p-5 shadow">
                    <div class="heading-section text-center">
                        <h2 class="mb-4">
                            Contact Us
                        </h2>
                    </div>
                    <form method="post" name="contact-us" action="contacto_envia.php">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo">
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea class="form-control" id="mensaje" name="mensaje" rows="6"
                                          placeholder="Mensaje"></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="submit">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- End of Reservation Section -->
<?php include 'footer.php';?>
    <!-- External JS -->
<?php include 'scripts.php' ?>


</body>
</html>
