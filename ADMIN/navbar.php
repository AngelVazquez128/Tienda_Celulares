<nav>
    <h1>Tienda Online</h1>
    <br>
    <a href="bienvenido.php">Inicio</a>
    <a href="empleados_lista.php">Empleados</a>
    <a href="productos_lista.php">Productos</a>
    <a href="promociones_lista.php">Promociones</a>
    <a href="pedidos_lista.php">Pedidos</a>
    <a href="bienvenido.php">Bienvenido <span style="color: #40fc40;"><?php echo $_SESSION['nombre'];
            echo " ";
            echo $_SESSION['apellidos']; ?></span></a>
    <a href="cerrar_sesion.php">Cerrar sesión</a>
    <br>
</nav>