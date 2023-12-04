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
    <title>Productos</title>
    <link rel="stylesheet" href="<?php echo ESTILOS_LISTA_EMPLEADOS; ?>">
    <link rel="stylesheet" href="<?php echo ESTILOS_TABLA; ?>">
    <link rel="stylesheet" href="<?php echo ESTILOS_BIENVENIDO; ?>">
    <link rel="stylesheet" href="<?php echo ESTILOS_NAVBAR; ?>">
    <script src="<?php echo JQUERY; ?>"></script>
    <script src="js/eliminar_fila_productos.js"></script>
</head>

<body>
<?php include 'navbar.php' ?>
<br>
<center>
    <div >
        <a href="productos_alta.php" class='insertar-btn' >Crear Nuevo registro</a>
    </div>

</center>
<br>
<?php
require "conexionBD.php";
$connection = conectarBD();
$statement = "SELECT * FROM productos WHERE status=1 AND eliminado=0 ";
$result = $connection->query($statement);
if ($result->num_rows > 0) {
    // Mostrar los registros
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Codigo</th>
                <th>Costo</th>
                <th>Stock</th>
                <th>Eliminar</th>
                <th>Detalles</th>
                <th>Editar</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nombre"] . "</td>
                <td>" . $row["codigo"] . "</td>
                <td>" . $row["costo"] . "</td>
                <td>" . $row["stock"] . "</td>
                <td>  <button class='eliminar' data-id='" . $row['id'] . "'>Eliminar</button></td>
                <td>  <a class='ver-detalles-btn' href='productos_detalles.php?id=" . $row['id'] . "'>Ver Detalles</a></td>
                <td>  <a class='editar-btn' href='productos_editar.php?id=" . $row['id'] . "'>Editar</a></td>
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