<?php include 'rutas.php';
session_start();
if (!isset($_SESSION['id']) || $_SESSION['id'] === null) {
    header("Location: index.php");
    exit();
}
?>
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
$costo = $row['costo'];
$stock = $row['stock'];
$estado = $row['status'];

$connection->close();


echo '<script>';
echo 'var nombreProducto = "' . $nombre . '";';
echo 'var codigoProducto = "' . $codigo . '";';
echo 'var descripcionProducto = "' . $descripcion . '";';
echo 'var costoProducto = "' . $costo . '";';
echo 'var stockProducto = "' . $stock . '";';
echo 'var estadoProducto = "' . $estado . '";';
echo '</script>';
?>


<html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?php echo JQUERY; ?>"></script>
    <script src="js/validar_codigo.js"></script>
    <link rel="stylesheet" href="<?php echo ESTILOS_ALTA_EMPLEADOS; ?>">
    <link rel="stylesheet" href="<?php echo ESTILOS_NAVBAR; ?>">
    <script src="js/validar_editarProducto.js"></script>

    <title>Edicion de Productos</title>

</head>

<body>
<?php include 'navbar.php' ?>
<H1>Editar Producto</H1>
<form action="productos_actualizar.php" method="post" enctype="multipart/form-data" id="form">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
    </div>

    <div>
        <label for="codigo">Codigo:</label>
        <input type="text" id="codigo" name="codigo">
        <div id="mensaje">

        </div>
    </div>

    <div>
        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" >
    </div>

    <div>
        <label for="costo">Costo:</label>
        <input type="number" id="costo" name="costo">
    </div>

    <div>
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock">
    </div>
    <div>
        <label for="archivo">Archivo:</label>
        <input type="file" name="archivo" id="archivo">
    </div>

    <div>
        <input type="submit" value="Editar">
    </div>
</form>
<div>
    <a href="productos_lista.php" class="regresar-link">Regresar al listado</a>
</div>
<div id="error">

</div>

</body>

</html>