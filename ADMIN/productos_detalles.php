
<?php
require "conexionBD.php";
$connection = conectarBD();
$id = $_GET['id'];
$statement = "SELECT * FROM productos WHERE id=$id";
$result = $connection->query($statement);

// Recupera el registro
$row = $result->fetch_assoc();
// Cierra la conexión a la base de datos si es necesario
$nombre = $row['nombre'];
$codigo = $row['codigo'];
$descripcion = $row['descripcion'];
$costo=$row['costo'];
$stock=$row['stock'];


if ($row['status'] == 1) {
    $estado = "Activo";
} else {
    $estado = "Inactivo";
}
$foto=$row['archivo'];
$connection->close();
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
    <h1>Detalles del Producto</h1>

    <img src="<?php echo $foto ?>"
         alt="Foto del Registro">
    <p><strong>Nombre:</strong>
        <?php echo $nombre ?>
    </p>
    <p><strong>Codigo:</strong>
        <?php echo $codigo ?>
    </p>
    <p><strong>Descripcion:</strong>
        <?php echo $descripcion ?>
    </p>
    <p><strong>Costo:</strong>
        <?php echo $costo ?>
    </p>
    <p><strong>Stock:</strong>
        <?php echo $stock ?>
    </p>
    <p><strong>Estado:</strong>
        <?php echo $estado ?>
    </p>
    <a href="productos_lista.php" class="enlace">Regresar al Listado</a>

</div>
</body>

</html>