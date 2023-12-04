<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carrito1.css">
    <title>CARRITO</title>
    <?php include 'librerias.php'; ?>
</head>

<script>
    // Obtener la cadena JSON de la URL
    var datosJsonUrl = '<?php echo isset($_GET['datosJson']) ? rawurlencode($_GET['datosJson']) : ''; ?>';

    // Decodificar la cadena JSON
    try {
        var datosArray = JSON.parse(decodeURIComponent(datosJsonUrl));

        // Mostrar los datos en la consola
        console.log('Datos Recibidos:');
        for (var i = 0; i < datosArray.length; i++) {
            console.log('Nombre:', datosArray[i].nombre);
            console.log('Cantidad:', datosArray[i].cantidad);
            console.log('Costo:', datosArray[i].costo);
            console.log('Subtotal:', datosArray[i].subtotal);
            console.log('-----');
        }
    } catch (error) {
        console.error('Error al analizar la cadena JSON:', error);
    }
</script>
<body>
<?php include 'navbar.php'; ?>
<div class="cart">
    <h1>Carrito de Compras</h1>

    <table>
        <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Costo Unitario</th>
            <th>Subtotal</th>

        </tr>
        </thead>
        <tbody>
        <?php $datosJson = isset($_GET['datosJson']) ? $_GET['datosJson'] : '';

        // Decodificar la cadena JSON
        $datosArray = json_decode(urldecode($datosJson), true);

        // Verificar si la decodificación fue exitosa
        if ($datosArray !== null) {
            foreach ($datosArray as $datos){
                echo '<tr>';
            echo '<td>';
                echo '<img src="producto1.jpg" alt="Producto 1">';
                echo'<span>'.$datos['nombre'].'</span>';
            echo '</td>';
            echo '<td>'.$datos['cantidad'].'</td>';
            echo '<td>'.$datos['costo'].'</td>';
            echo '<td>'.$datos['subtotal'].'</td>';
        echo '</tr>';
            }
        }?>

        </tbody>
    </table>

    <div class="cart-total">
        <p>Total: $50.00</p>
    </div>

    <div class="cart-checkout">
        <button class="checkout">Finalizar</button>
    </div>
</div>

<?php include 'footer.php'; ?>
<?php include 'scripts.php'; ?>
</body>
</html>
