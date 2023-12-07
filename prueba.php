<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mensaje_confirmacion.css">
</head>
<body>

<!-- Botón para activar la caja de confirmación -->
<button onclick="mostrarConfirmacion()">Mostrar Confirmación</button>

<div class="confirmation-box" id="confirmacion">
    <h2>¿Deseas eliminar este registro?</h2>
    <div class="button-container">
        <button class="confirm-button" onclick="respuesta(true)">Sí</button>
        <button class="cancel-button" onclick="respuesta(false)">No</button>
    </div>
</div>

<script src="js/mensaje_confirmacion.js"></script>

</body>
</html>
