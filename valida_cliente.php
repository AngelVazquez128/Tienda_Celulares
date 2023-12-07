<?php
include "conexionBD.php";
session_start();
$connection=conectarBD();

$usuario=$_POST['usuario'];
$pass=$_POST['pass'];

$sql="SELECT * FROM clientes 
         WHERE nombre_usuario= '$usuario' AND pass='$pass'";
$resultado=$connection->query($sql);
$num_filas=$resultado->num_rows;
if($num_filas>0){
    $row=$resultado->fetch_assoc();
    $_SESSION['id_cliente']=$row['id'];
    $_SESSION['nombre']=$row['nombre'];
    $_SESSION['nombre_usuario']=$row['nombre_usuario'];
    $_SESSION['password']=$row['pass'];

}
echo $num_filas;

?>