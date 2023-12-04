<?php
require "conexionBD.php";
$con = conectarBD();

$correo = $_POST['correo'];

$sql = "SELECT * FROM empleados WHERE correo = ? and status=1 AND eliminado=0";
$stmt = $con->prepare($sql);
$stmt->bind_param('s', $correo); // 's' indica que es una cadena
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