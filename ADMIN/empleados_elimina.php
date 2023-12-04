<?php
    require "conexionBD.php";
    $con= conectarBD();
    $id = $_POST['id'];
    $sql="UPDATE empleados SET eliminado=1 WHERE id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id); // "i" significa que es un entero
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "success";
    } else {
        echo "error";
    }
    $stmt->close();
    $con->close();
?>