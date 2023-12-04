<?php

// Definir las credenciales como constantes
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'empresa01');

function conectarBD() {
    // Establecer la conexión
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Comprobar la conexión
    if ($conn->connect_error) {
        die('Error de conexión: ' . $conn->connect_error);
    }

    return $conn;
}
// No olvides cerrar la conexión al finalizar tus operaciones
//$conn->close();

?>
