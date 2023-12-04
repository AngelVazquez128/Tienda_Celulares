<?php include 'rutas.php';
session_start();
if (!isset($_SESSION['id']) || $_SESSION['id'] === null) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="<?php echo ESTILOS_LISTA_EMPLEADOS; ?>">
    <link rel="stylesheet" href="<?php echo ESTILOS_TABLA; ?>">
    <link rel="stylesheet" href="<?php echo ESTILOS_BIENVENIDO; ?>">
    <link rel="stylesheet" href="<?php echo ESTILOS_NAVBAR; ?>">
    <script src="<?php echo JQUERY; ?>"></script>
    <script src="js/eliminar_fila_promociones.js"></script>
</head>

<body>
<?php include 'navbar.php' ?>
<br>
<center>
    <div >
        <a href="promociones_alta.php" class='insertar-btn' >Crear Nuevo registro</a>
    </div>

</center>
<br>
<?php
require "conexionBD.php";
$connection = conectarBD();
$statement = "SELECT * FROM pedidos WHERE status=0";
$result = $connection->query($statement);
if ($result->num_rows > 0) {
    // Mostrar los registros
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>FECHA</th>
                <th>ID USUARIO</th>
                <th>Detalles</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["fecha"] . "</td>
                <td>" . $row["id_usuario"] . "</td>
                <td>  <a class='ver-detalles-btn' href='pedidos_detalles.php?id=" . $row['id'] . "'>Ver Detalles</a></td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron registros.";
}

$connection->close();
?>
</body>

</html>