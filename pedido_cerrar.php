<?php
require "conexionBD.php";
$con=conectarBD();
$idPedido=$_POST['idPedido'];
$sql="UPDATE pedidos SET status=1 WHERE id=$idPedido";
$result=$con->query($sql);
if($result){
    echo "success";
}
else{
    echo "error";
}

?>