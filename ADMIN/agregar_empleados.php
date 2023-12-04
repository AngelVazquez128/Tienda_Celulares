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
    <script src="<?php echo VALIDAR_NO_ESTE_VACIO_EMPLEADO; ?>"></script>
    <script src="<?php echo VALIDAR_SI_EXISTE_CORREO; ?>"></script>
    <link rel="stylesheet" href="<?php echo ESTILOS_ALTA_EMPLEADOS; ?>">
    <link rel="stylesheet" href="<?php echo ESTILOS_NAVBAR; ?>">
    <title>Alta de empleados</title>
</head>

<body>
<?php include 'navbar.php' ?>
    <H1>Alta de empleados</H1>
    <form action="empleados_inserta.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre">
        </div>

        <div>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos">
        </div>

        <div>
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" onBlur="verificarCorreo();">
            <div id="mensaje">

            </div>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <label for="rol">Rol:</label>
            <select id="rol" name="rol">
                <option value="0">Selecciona</option>
                <option value="1">Gerente</option>
                <option value="2">Ejecutivo</option>
            </select>
        </div>

        <div>
            <label for="archivo">Archivo:</label>
            <input type="file" name="archivo" id="archivo">
        </div>

        <div>
            <input type="submit" value="Registrar">
        </div>
    </form>
    <div>
        <a href="empleados_lista.php" class="regresar-link">Regresar al listado</a>
    </div>
    <div id="error">

    </div>

</body>

</html>