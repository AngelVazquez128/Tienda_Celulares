<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="description" content="Roxy">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/productos.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
    <script src="js/verificar_cliente.js"></script>

<?php include 'librerias.php' ?>
</head>
<body>
<form method="post" id="form1">
    <h2>Iniciar sesión</h2>
    <label for="email">Usuario:</label>
    <input type="text" id="correo" name="correo">

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password">

    <div class="error-message" id="error-message"></div>
    <br>
    <button type="submit" onclick="verificarCliente(event);">Iniciar sesión</button>
</form>
<?php include 'scripts.php' ?>
</body>

</html>
