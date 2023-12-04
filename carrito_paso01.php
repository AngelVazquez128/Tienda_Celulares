<?php
require "conexionBD.php";
$con=conectarBD();
$id_cliente=1;
$statement = "SELECT
    pedidos_productos.id as id_pedido_producto,
    productos.id as id_producto,
    productos.nombre as nombre_producto,
    productos.codigo as codigo_producto,
    productos.archivo as foto_producto,
    pedidos_productos.cantidad as cantidad_producto,
    pedidos_productos.precio as precio_producto,
    pedidos_productos.cantidad * pedidos_productos.precio AS subtotal,
    pedidos_productos.id_pedido
FROM
    pedidos_productos
INNER JOIN
    productos ON pedidos_productos.id_producto = productos.id
INNER JOIN
    pedidos ON pedidos_productos.id_pedido = pedidos.id
WHERE
    pedidos.id_usuario = $id_cliente;";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carrito1.css">
    <title>CARRITO</title>
    <?php include 'librerias.php'; ?>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="cart">
    <h1>Carrito de Compras</h1>

    <table>
        <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Costo Unitario</th>
            <th>Subtotal</th>
            <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $resultadoProductos=$con->query($statement);
        $total=0;
        while($row=$resultadoProductos->fetch_assoc()){
            $idPedido=$row['id_pedido'];
            $nombre=$row['nombre_producto'];
            $cantidad=$row['cantidad_producto'];
            $costo=$row['precio_producto'];
            $subtotal=$cantidad*$costo;
            echo '
        <tr>
            <td>
                <img src="producto1.jpg" alt="Producto 1">
                <span>' . $nombre . '</span>
            </td>
            <td>
                <center>
                <button class="quantity-btn decrement" style="background-color: #f11f1f;"><span style="color: white">-</span></button>
                <input type="number" class="quantity-input" value="' . $cantidad . '" min="1">
                <button class="quantity-btn increment" style="background-color: #29e529;"><span style="color: white">+</span></button>
                </center>
            </td>
            <td>$' . $costo . '</td>
            <td>$' . $subtotal . '</td>
            <td><button class="remove-item">Eliminar</button></td>
        </tr>';

            $total=$total+$subtotal;
            $datos = array(
                'id' => $idPedido,
                'nombre' => $nombre,
                'cantidad' => $cantidad,
                'costo' => $costo,
                'subtotal' => $subtotal
            );
            $datos_array[] = $datos;
         }
        $json_datos = json_encode($datos_array);
        $json_datos_url = urlencode($json_datos);

         ?>
        </tbody>
    </table>

    <div class="cart-total">
        <p>Total: $<?php echo $total?></p>
        <button class="checkout" onclick='window.location.href="carrito_paso02.php?datosJson=<?php echo $json_datos_url; ?>"'>Continuar</button>
    </div>
</div>
<?php include 'footer.php'; ?>
<?php include 'scripts.php'; ?>
</body>
</html>
