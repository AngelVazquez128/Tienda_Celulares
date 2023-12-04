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
$statement = "SELECT * FROM empleados WHERE id=$id";
$result = $connection->query($statement);

// Recupera el registro
$row = $result->fetch_assoc();
// Cierra la conexión a la base de datos si es necesario
$nombre = $row['nombre'];
$apellidos = $row['apellidos'];
$correo = $row['correo'];
$pass = $row['pass'];
$rol = $row['rol'];
$estado = $row['status'];

$connection->close();


echo '<script>';
echo 'var nombreEmpleado = "' . $nombre . '";';
echo 'var apellidosEmpleado = "' . $apellidos . '";';
echo 'var correoEmpleado = "' . $correo . '";';
echo 'var passEmpleado = "' . $pass . '";';
echo 'var rolEmpleado = "' . $rol . '";';
echo 'var estadoEmpleado = "' . $estado . '";';
echo '</script>';
?>


<html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?php echo JQUERY; ?>"></script>
    <script src="<?php echo VALIDAR_SI_EXISTE_CORREO; ?>"></script>
    <link rel="stylesheet" href="<?php echo ESTILOS_ALTA_EMPLEADOS; ?>">
    <link rel="stylesheet" href="<?php echo ESTILOS_NAVBAR; ?>">
    <script src="<?php echo VALIDAR_CAMPOS_EDITAR; ?>"></script>

    <title>Edicion de empleados</title>

</head>

<body>
<?php include 'navbar.php' ?>
    <H1>Editar empleado</H1>
    <form action="empleados_actualizar.php" method="post" enctype="multipart/form-data" id="form">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
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
            <input type="email" id="correo" name="correo" >
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
            <input type="submit" value="Editar">
        </div>
    </form>
    <div>
        <a href="empleados_lista.php" class="regresar-link">Regresar al listado</a>
    </div>
    <div id="error">

    </div>

</body>

</html>