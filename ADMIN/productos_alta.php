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
    <title>Alta de productos</title>
</head>

<body>
<?php include 'navbar.php' ?>
<H1>Alta de productos</H1>
<form action="productos_salva.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
    </div>

    <div>
        <label for="codigo">Codigo:</label>
        <input type="text" id="codigo" name="codigo" onblur="verificarCodigo();">
        <div id="mensaje">

        </div>
    </div>

    <div>
        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion">
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
        <input type="submit" value="Registrar">
    </div>
    <div id="error">

    </div>
</form>
<div>
    <a href="productos_lista.php" class="regresar-link">Regresar al listado</a>
</div>


</body>

</html>