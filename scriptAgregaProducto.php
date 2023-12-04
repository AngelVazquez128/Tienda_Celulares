<?php
session_start();
require "conexionBD.php";
$con = conectarBD();
$id_producto = $_REQUEST['id_producto'];
//$id_producto = 7;
$cantidad = $_REQUEST['cantidad'];
//$cantidad = 1;
$id_cliente = $_REQUEST['id_cliente'];
//$id_cliente = 2;


//validar si existe pedido abierto para el usuario logueado
$sql = "SELECT * FROM pedidos 
         WHERE id_usuario=$id_cliente AND status=0";

$resultado = $con->query($sql);
$num = $resultado->num_rows;

if ($num == 0) {
    $fecha = date('Y-m-d h:i:s');
    $sql = "INSERT INTO pedidos (fecha,id_usuario) 
            VALUES ('$fecha',$id_cliente) ";
    $res = $con->query($sql);
    $id_pedido = $con->insert_id;
} else {
    $row=$resultado->fetch_assoc();
    $id_pedido = $row['id'];

}

//obtener precio de producto
$sql = "SELECT * FROM productos WHERE id=$id_producto";
$resultado = $con->query($sql);
$row = $resultado->fetch_assoc();
$precio = $row['costo'];


//validar si ya se pidio un producto igual
$sql = "SELECT * FROM pedidos_productos
	        WHERE id_producto = $id_producto AND id_pedido = $id_pedido";
$res = $con->query($sql);
$num = $res->num_rows;

if ($num == 0) {
//insertar producto
    $sql = "INSERT INTO pedidos_productos(id_pedido,id_producto,cantidad,precio)
VALUES ($id_pedido,$id_producto,$cantidad,'$precio')";
} else {
    $sql = "UPDATE pedidos_productos SET cantidad=cantidad+$cantidad 
                         WHERE id_producto = $id_producto AND id_pedido = $id_pedido";
}
$resultadoFinal=$con->query($sql);

$con->close();

if($resultadoFinal==TRUE){
    echo "Exito";

}
else{
    echo "Fallo";
}
?>