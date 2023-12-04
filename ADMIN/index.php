<?php include 'rutas.php';
session_start();
if (isset($_SESSION['nombre'])) {
    header("Location: bienvenido.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ESTILOS_LOGIN; ?>">
    <script src="<?php echo VALIDAR_EXISTE_USUARIO; ?>"></script>
    <script src="<?php echo JQUERY; ?>"></script>
    <title>Iniciar sesión</title>
</head>
<body>
    <form action="bienvenido.php" method="post" id="form1">
        <h2>Iniciar sesión</h2>
        <label for="email">Correo electrónico:</label>
        <input type="email" id="correo" name="correo">

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password">

        <div class="error-message" id="error-message"></div>
        <br>
        <button type="submit" onclick="verificarUsuario(event);">Iniciar sesión</button>
    </form>
</body>
</html>

