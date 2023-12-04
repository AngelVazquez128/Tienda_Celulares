<?php
require "conexionBD.php";
$connection = conectarBD();
$statement = "SELECT * FROM productos WHERE status=1 AND eliminado = 0 ORDER BY RAND() LIMIT 6  ";
$result = $connection->query($statement);

$sql="SELECT * FROM promociones WHERE status=1 AND eliminado=0 ORDER BY RAND() LIMIT 1";
$resPromocion=$connection->query($sql);
$promocion=$resPromocion->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="description" content="Roxy">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/productos.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/entrar_detalleProducto.js"></script>
    <script src="js/agregar_carrito.js"></script>

    <?php include 'librerias.php' ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        #banner {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            overflow: hidden;
            position: relative;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #banner img {
            width: 100%;
            height: auto;
            display: block;
        }

        #banner .promo-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
        }

        #banner .promo-text h2 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        #banner .promo-text p {
            font-size: 1.2em;
        }
    </style>
</head>
<body >
<?php include 'navbar.php'; ?>



<section id="features" class="bg-white">
    <div class="container">
        <div class="section-content">
            <!-- Section Title -->
            <div class="title-wrap mb-5" data-aos="fade-up">
                <h2 class="section-title">
                    HOME </a>
                </h2>
            </div>
            <div id="banner">
                <!-- Aquí se cargará la imagen de la base de datos -->
                <img src="ADMIN/<?php echo $promocion['archivo'];?>" alt="Promoción Especial">
            </div>
            <!-- End of Section Title -->
            <div class="row">
                <!-- Features Holder-->
                <div class="col-md-10 offset-md-1 features-holder">
                    <div class="row" >

                        <!-- Features Item -->
                        <?php         while ($row = $result->fetch_assoc()) {
                            echo '
                            <div class="col-md-4 col-sm-12 text-center mt-4" > <!--COLUMNA UNO-->
                            <input type="hidden" value="'.$row['codigo'].'" id="inputCodigo">
                            <input type="hidden" id="id_producto" value="'.$row['id'].'">
                            <div class="product-card" >
                            <div class="shadow rounded feature-item p-4 mb-4" data-aos="fade-up" onclick="redirigir('.$row['codigo'].')">
                                <div class="my-4">
                                   <img src="ADMIN/'.$row['archivo'].'" alt="">
                                </div>
                                <h4>' . $row['nombre'] . '</h4>
                                <p><b>Codigo:</b> '. $row['codigo'].'<br><b>Precio:</b> $'.$row['costo'].'</p>
                                
                            </div>
                            <input type="number" placeholder="cantidad" id="'.$row['id'].'" value="" min="1" >   <br><br>
                            <button class="btn btn-primary btn-shadow btn-lg" onclick="agregarAlCarrito('.$row['id'].')">Agregar al Carrito</button>
                            </div>

                        </div>
                        <br><br><br><br>
                        ';
                        }?>

                        <!-- End of Feature Item -->
                    </div>
                </div>
                <!-- End of Features Holder-->
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

<?php include 'scripts.php';?>
<script src="js/entrar_detalleProducto.js"></script>
</body>

</html>