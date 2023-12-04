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
$statement = "SELECT * FROM promociones WHERE id=$id";
$result = $connection->query($statement);

// Recupera el registro
$row = $result->fetch_assoc();
// Cierra la conexión a la base de datos si es necesario
$nombre = $row['nombre'];
$estado = $row['status'];

$connection->close();


echo '<script>';
echo 'var nombrePromocion = "' . $nombre . '";';
echo 'var estadoPromocion= "' . $estado . '";';
echo '</script>';
?>


<html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?php echo JQUERY; ?>"></script>
    <script src="#"></script>
    <link rel="stylesheet" href="<?php echo ESTILOS_ALTA_EMPLEADOS; ?>">
    <link rel="stylesheet" href="<?php echo ESTILOS_NAVBAR; ?>">
    <script src="js/validar_editarPromocion.js"></script>

    <title>Edicion de Promociones</title>

</head>

<body>
<?php include 'navbar.php' ?>
<H1>Editar Promocion</H1>
<form action="promociones_actualizar.php" method="post" enctype="multipart/form-data" id="form">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
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
    <a href="promociones_lista.php" class="regresar-link">Regresar al listado</a>
</div>
<div id="error">

</div>

</body>

</html>