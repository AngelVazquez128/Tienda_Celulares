<?php
require "conexionBD.php";
$con=conectarBD();
$id=$_POST['id'];
$sql="DELETE FROM pedidos_productos WHERE id=$id";
$result=$con->query($sql);
if($result === TRUE){
    echo "success";
}
else{
    echo "error";
}
?>
