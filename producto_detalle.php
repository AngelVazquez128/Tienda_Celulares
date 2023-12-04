<?php
require "conexionBD.php";
$connection = conectarBD();
$codigoProducto=$_GET['codigoProducto'];
$statement = "SELECT * FROM productos WHERE codigo=$codigoProducto";
$result = $connection->query($statement);
$producto = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DETALLES PRODUCTO</title>
    <?php include 'librerias.php'; ?>
    <script src="js/agregar_carrito.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .product-details {
            display: flex;
            flex-wrap: wrap;
        }

        .product-image {
            flex: 1;
            max-width: 50%;
            padding: 20px;
        }

        .product-info {
            flex: 1;
            max-width: 50%;
            padding: 20px;
        }

        .product-info h2 {
            margin-top: 0;
        }

        .similar-products {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .card {
            display: inline-block;
            width: 22%;
            margin: 10px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<section>
<div class="product-details">
    <div class="product-image">
        <img src="ADMIN/<?= $producto['archivo']?>" alt="Producto">
    </div>
    <div class="product-info">
        <input type="hidden" value="<?php echo $producto['codigo'];?>" id="inputCodigo">
        <input type="hidden" id="id_producto" value="<?=$producto['id']; ?>">
        <h2><b><?= $producto['nombre']?></b></h2>
        <p><b>Costo:</b> $<?= $producto['costo']?></p>
        <p><b>Código:</b> <?php echo $producto['codigo'];?></p>
        <p><b>Stock:</b> <?= $producto['stock']?> unidades</p>
        <p><b>Descripcion:</b> <?= $producto['descripcion']; ?></p>
        <label for="quantity">Cantidad:</label>
            <button class="quantity-btn decrement" style="background-color: #f11f1f;"><span style="color: white">-</span></button>
            <input type="number" class="quantity-input" value="1" min="1" style="width: 10%" id="<?=$producto['id']; ?>">
            <button class="quantity-btn increment" style="background-color: #29e529;"><span style="color: white">+</span></button>
        <button class="btn btn-primary btn-shadow btn-lg" onclick="agregarAlCarrito(<?=$producto['id']; ?>)">Agregar al Carrito</button>
    </div>
</div>
</section>
<section>
<div class="similar-products">
    <h2>Otros productos similares</h2>
    <div class="card"> <!-- Repite este bloque para cada producto similar -->
        <img src="ruta_de_la_imagen_similar.jpg" alt="Producto Similar">
        <p>Nombre del Producto Similar</p>
        <p>Costo: $XX.XX</p>
        <button class="btn btn-primary btn-shadow btn-lg">Agregar al Carrito</button>
    </div>
    <!-- Repite este bloque para cada producto similar -->
    <div class="card"> <!-- Repite este bloque para cada producto similar -->
        <img src="ruta_de_la_imagen_similar.jpg" alt="Producto Similar">
        <p>Nombre del Producto Similar</p>
        <p>Costo: $XX.XX</p>
        <button class="btn btn-primary btn-shadow btn-lg">Agregar al Carrito</button>
    </div>
    <!-- Repite este bloque para cada producto similar -->
    <div class="card"> <!-- Repite este bloque para cada producto similar -->
        <img src="ruta_de_la_imagen_similar.jpg" alt="Producto Similar">
        <p>Nombre del Producto Similar</p>
        <p>Costo: $XX.XX</p>
        <button class="btn btn-primary btn-shadow btn-lg">Agregar al Carrito</button>
    </div>
    <!-- Repite este bloque para cada producto similar -->
    <div class="card"> <!-- Repite este bloque para cada producto similar -->
        <img src="ruta_de_la_imagen_similar.jpg" alt="Producto Similar">
        <p>Nombre del Producto Similar</p>
        <p>Costo: $XX.XX</p>
        <button class="btn btn-primary btn-shadow btn-lg">Agregar al Carrito</button>
    </div>
    <!-- Repite este bloque para cada producto similar -->
</div>
</section>
<?php include 'footer.php'; ?>
<?php include 'scripts.php'; ?>
</body>
</html>
