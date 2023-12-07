<?php
require "conexionBD.php";
$connection = conectarBD();
$codigoProducto=$_GET['codigoProducto'];
$statement = "SELECT * FROM productos WHERE codigo=$codigoProducto";
$result = $connection->query($statement);
$producto = mysqli_fetch_assoc($result);

$sql="SELECT * FROM productos WHERE status=1 AND eliminado=0
ORDER BY RAND() LIMIT 4;";
$resultSimilares=$connection->query($sql);
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
        <p><b>Costo:</b> $<?= number_format($producto['costo'])?></p>
        <p><b>Código:</b> <?php echo $producto['codigo'];?></p>
        <p><b>Stock:</b> <?= $producto['stock']?> unidades</p>
        <p><b>Descripcion:</b> <?= $producto['descripcion']; ?></p>
        <div class="btn_cantidad">
        <label for="quantity">Cantidad:</label>

            <input type="number" class="quantity-input" value="1" min="1" style="width: 10%" id="<?=$producto['id']; ?>">
        <button class="btn btn-primary btn-shadow btn-lg" onclick="agregarAlCarrito(<?=$producto['id']; ?>)">Agregar al Carrito</button>
        </div>
    </div>
</div>
</section>

<?php ?>

<section>
<div class="similar-products">
    <h2>Otros productos similares</h2>
    <?php while($similar = $resultSimilares->fetch_assoc()){
        echo '    <div class="card"> <!-- Repite este bloque para cada producto similar -->
        <img src="ADMIN/'.$similar['archivo'].'" alt="Producto Similar">
        <p>'.$similar['nombre'].'</p>
        <p>Costo: $'.$similar['costo'].'</p>
        <center>
        <input type="number" class="quantity-input" value="1" min="1" style="width: 25%" id="'.$similar['id'].'">
        </center>
        <br>
        <button class="btn btn-primary btn-shadow btn-lg" onclick="agregarAlCarrito('.$similar['id'].')">Agregar al Carrito</button>
    </div>';

    }
    ?>


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
<?php include 'scripts.php'; ?>
<script>
    var sessionValue=$('#sesion').val();
    console.log(sessionValue);
    if(sessionValue==0){
        console.log('si entra al final');
        $('.btn_cantidad').hide();
    }
</script>
</body>
</html>
