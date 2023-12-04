<?php
require "conexionBD.php";
$connection = conectarBD();
$numPagina=$_POST['numeroPagina'];
if($numPagina==1){
    $numPagina=0;
}
if($numPagina>1){
    $numPagina=$numPagina-1;
    $numPagina=$numPagina*9;
}

$statement = "SELECT * FROM productos 
         WHERE status=1 AND eliminado = 0 
         LIMIT 9 OFFSET $numPagina";
$result = $connection->query($statement);
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Cierra la conexión
$connection->close();
header('Content-Type: application/json');
echo json_encode($data);
?>