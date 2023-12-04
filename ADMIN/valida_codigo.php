<?php
require "conexionBD.php";
$con = conectarBD();

$codigo = $_POST['codigo'];

$sql = "SELECT * FROM productos WHERE codigo = ? and status=1 AND eliminado=0";
$stmt = $con->prepare($sql);
$stmt->bind_param('s', $codigo); // 's' indica que es una cadena
// Ejecutar consulta
$stmt->execute();

// Obtener resultados
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "existe";
}

$stmt->close();
$con->close();
?>