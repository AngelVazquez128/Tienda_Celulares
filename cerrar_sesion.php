<?php
session_start();

// Cierra la sesión
session_destroy();
header("Location: index.php");
?>