<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carrito1.css">
    <title>CARRITO</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <?php include 'librerias.php'; ?>
    <script src="js/actualizar_carrito.js"></script>
    <script src="js/cerrar_pedido.js"></script>
</head>

<script>
    // Obtener la cadena JSON de la URL

</script>
<body>
<?php include 'navbar.php'; ?>

<?php
require "conexionBD.php";
$con=conectarBD();
$id_cliente=$_SESSION['id_cliente'];
$statement = "SELECT
    pedidos_productos.id as id_pedido_producto,
    productos.id as id_producto,
    productos.nombre as nombre_producto,
    productos.codigo as codigo_producto,
    productos.archivo as foto_producto,
    pedidos_productos.cantidad as cantidad_producto,
    pedidos_productos.precio as precio_producto,
    pedidos_productos.cantidad * pedidos_productos.precio AS subtotal,
    pedidos_productos.id_pedido,
    pedidos.id as pedido_cerrar
FROM
    pedidos_productos
INNER JOIN
    productos ON pedidos_productos.id_producto = productos.id
INNER JOIN
    pedidos ON pedidos_productos.id_pedido = pedidos.id
WHERE
    pedidos.id_usuario = $id_cliente AND pedidos.status=0;";

?>

<div class="cart">
    <h1>Carrito de Compras</h1>

    <table>
        <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Costo Unitario</th>
            <th>Subtotal</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $resultadoProductos=$con->query($statement);
        $total=0;
        $idPedidoCerrar=0;
        while($row=$resultadoProductos->fetch_assoc()){
            $idPedido_producto=$row['id_pedido_producto'];
            $idPedido=$row['id_pedido'];
            $idProducto=$row['id_producto'];
            $nombre=$row['nombre_producto'];
            $cantidad=$row['cantidad_producto'];
            $costo=$row['precio_producto'];
            $foto=$row['foto_producto'];
            $subtotal=$cantidad*$costo;
            $idPedidoCerrar=$row['pedido_cerrar'];
            echo '
        <tr>
            <td>
                <img src="ADMIN/'.$foto.'" alt="Producto 1" width="65px">
                <span>' . $nombre .$idPedidoCerrar .'</span>
            </td>
            <td>
                <center>
                '.$cantidad.'
                </center>
            </td>
            <td>$' . $costo . '</td>
            <input type="hidden" name="" value="'.$costo.'" class="precio_unitario">
            <td><div class="subtotal">$' . $subtotal . '</div></td>
            <input class="id_pedido_producto" type="hidden" id="id_pedido_producto" value="'.$idPedido_producto.'">
        </tr>';

            $total=$total+$subtotal;

        }


        ?>

        </tbody>
    </table>

    <div class="cart-total">
        <p>Total: $<?php echo $total; ?></p>
    </div>

    <div class="cart-checkout">
        <button class="checkout" onclick="cerrarPedido('<?php echo $idPedidoCerrar; ?>')">Finalizar</button>
    </div>
</div>

<?php include 'footer.php'; ?>
<?php include 'scripts.php'; ?>
</body>
</html>
