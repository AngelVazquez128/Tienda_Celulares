
<?php
require "conexionBD.php";
$connection = conectarBD();
$id = $_GET['id'];
$statement = "SELECT * FROM empleados WHERE id=$id";
$result = $connection->query($statement);

// Recupera el registro
$row = $result->fetch_assoc();
// Cierra la conexión a la base de datos si es necesario
$nombre = $row['nombre'] ." ". $row['apellidos'];
$correo = $row['correo'];
if ($row['rol'] == 1) {
    $rol = "Gerente";
} else {
    $rol = "Ejecutivo";
}
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
        <h1>Detalles del Empleado</h1>

        <img src="<?php echo $foto ?>"
            alt="Foto del Registro">
        <p><strong>Nombre:</strong>
            <?php echo $nombre ?>
        </p>
        <p><strong>Correo:</strong>
            <?php echo $correo ?>
        </p>
        <p><strong>Rol:</strong>
            <?php echo $rol ?>
        </p>
        <p><strong>Estado:</strong>
            <?php echo $estado ?>
        </p>
        <a href="empleados_lista.php" class="enlace">Regresar al Listado</a>

    </div>
</body>

</html>