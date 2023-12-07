

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carrito1.css">
    <title>CARRITO</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <?php include 'librerias.php'; ?>
    <script src="js/eliminarProducto_carrito.js"> </script>
    <script src="js/actualizar_carrito.js"></script>
    <link rel="stylesheet" href="css/mensaje_confirmacion.css">
</head>
<body>


<?php include 'navbar.php'; ?>
<?php if (empty($_SESSION['id_cliente'])) {
    echo '<script>window.location.href = "login.php";</script>';
    exit();

}

?>
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
    pedidos_productos.id_pedido

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
            <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $resultadoProductos=$con->query($statement);
        $total=0;
        while($row=$resultadoProductos->fetch_assoc()){
            $idPedido_producto=$row['id_pedido_producto'];
            $idPedido=$row['id_pedido'];
            $idProducto=$row['id_producto'];
            $nombre=$row['nombre_producto'];
            $cantidad=$row['cantidad_producto'];
            $costo=$row['precio_producto'];
            $foto=$row['foto_producto'];
            $subtotal=$cantidad*$costo;
            echo '
        <tr>
            <td>
                <img src="ADMIN/'.$foto.'" alt="Producto 1" width="65px">
                <span>' . $nombre . '</span>
            </td>
            <td>
                <center>

                <input type="number" class="quantity-input" value="' . $cantidad . '" min="1" onblur="updateCarrito(this);">

                </center>
            </td>
            <td>$' . $costo . '</td>
            <input type="hidden" name="" value="'.number_format($costo).'" class="precio_unitario">
            <td>$<div class="subtotal" style="display: inline;">' . number_format($subtotal) . '</div></td>
            <input class="id_pedido_producto" type="hidden" id="id_pedido_producto" value="'.$idPedido_producto.'">
            <td> <div class="eliminar"><button class="remove-item">Eliminar</button></div></td>
        </tr>';

            $total=$total+$subtotal;
            /*
            $datos = array(
                'id' => $idPedido,
                'id_pedido_producto' =>$idPedido_producto,
                'nombre' => $nombre,
                'cantidad' => $cantidad,
                'costo' => $costo,
                'subtotal' => $subtotal,
                'foto' => $foto
            );
            $datos_array[] = $datos;
            */
         }


/*
        $json_datos = json_encode($datos_array);
        $json_datos_url = urlencode($json_datos);
*/
         ?>
        </tbody>
    </table>

    <div class="cart-total">
        <p>Total: $<div id="total" style="display: inline;"><?php echo number_format($total)?></div></p>
        <button class="checkout" onclick='window.location.href="carrito_paso02.php"'>Continuar</button>
    </div>
</div>
<div class="confirmation-box" id="confirmacion">
    <h2>¿Deseas eliminar este registro?</h2>
    <div class="button-container">
        <button class="confirm-button" onclick="respuesta(true)">Sí</button>
        <button class="cancel-button" onclick="respuesta(false)">No</button>
    </div>
</div>
<?php include 'footer.php'; ?>
<?php include 'scripts.php'; ?>
<script src="js/mensaje_confirmacion.js"></script>
</body>
</html>
