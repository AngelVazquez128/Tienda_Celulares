
<?php
require "conexionBD.php";
$connection = conectarBD();
$id = $_GET['id'];
$statement = "SELECT
    pedidos_productos.id as id_pedido_producto,
    productos.id as id_producto,
    productos.nombre as nombre_producto,
    productos.codigo as codigo_producto,
    productos.archivo as foto_producto,
    pedidos_productos.cantidad as cantidad_producto,
    pedidos_productos.precio as precio_producto,
    pedidos_productos.cantidad*pedidos_productos.precio AS subtotal
FROM
    pedidos_productos
INNER JOIN
    productos ON pedidos_productos.id_producto = productos.id
WHERE
    pedidos_productos.id_pedido = $id;";


?>
<?php include 'rutas.php';
session_start();
if (!isset($_SESSION['id']) || $_SESSION['id'] === null) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Detalles del Empleado</title>
    <link rel="stylesheet" href="<?php echo ESTILOS_DETALLES_EMPLEADOS; ?>">
    <link rel="stylesheet" href="<?php echo ESTILOS_NAVBAR; ?>">
    <script src="<?php echo JQUERY; ?>"></script>

</head>

<body>
<?php include 'navbar.php' ?>
<br>
<div class="container">
    <h1>Productos del pedido</h1>
    <?php

    $result = $connection->query($statement);
    while($row = $result->fetch_assoc()) {
        $nombre = $row['nombre_producto'];
        $codigo = $row['codigo_producto'];
        $cantidad=$row['cantidad_producto'];
        $costo=$row['precio_producto'];
        $subtotal=$row['subtotal'];

        $foto=$row['foto_producto'];

        echo "
    
    
    <p><strong>Nombre:</strong>
         $nombre 
    </p>
    <p><strong>Codigo:</strong>
       $codigo
    </p>
    <p><strong>Cantidad:</strong>
        $cantidad
    </p>
    <p><strong>Costo:</strong>
        $costo
    </p>
    <p><strong>Subtotal:</strong>
        $subtotal
    </p>
    <hr>
    
    ";
    }
    $connection->close();
    ?>
    <a href="pedidos_lista.php" class="enlace">Regresar al Listado</a>

</div>
</body>

</html>