<?php include 'rutas.php';
session_start();
if (!isset($_SESSION['id']) || $_SESSION['id'] === null) {
    header("Location: index.php");
    exit();
}
?>
<html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="<?php echo JQUERY; ?>"></script>
    <script src="js/validar_producto.js"></script>
    <script src="js/validar_codigo.js"></script>
    <link rel="stylesheet" href="<?php echo ESTILOS_ALTA_EMPLEADOS; ?>">
    <link rel="stylesheet" href="<?php echo ESTILOS_NAVBAR; ?>">
    <title>Alta de promociones</title>
</head>

<body>
<?php include 'navbar.php' ?>
<H1>Alta de promociones</H1>
<form action="promociones_salva.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
    </div>

    <div>
        <label for="archivo">Archivo:</label>
        <input type="file" name="archivo" id="archivo">
    </div>

    <div>
        <input type="submit" value="Registrar">
    </div>
    <div id="error">

    </div>
</form>
<div>
    <a href="promociones_lista.php" class="regresar-link">Regresar al listado</a>
</div>


</body>

</html>