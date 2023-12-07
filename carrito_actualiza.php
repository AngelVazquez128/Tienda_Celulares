<?php
require "conexionBD.php";
$con=conectarBD();
$idPedido=$_POST['idPedido'];
$cantidad=$_POST['cantidad'];

// Ahora $datosArray contiene la información enviada desde el cliente
// Puedes acceder a los datos como un array
$sql="UPDATE pedidos_productos SET cantidad=? WHERE id=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("ii", $cantidad, $idPedido);
if($stmt->execute()){
    echo "success";
}
else{
    echo "error";
}

// Cerrar la conexión
//$stmt->close();
//$con->close();
?>