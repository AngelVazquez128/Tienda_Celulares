<?php
require 'conexionBD.php';
$con = conectarBD();
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$rol = $_POST['rol'];



$file_name=$_FILES['archivo']['name'];
$file_tmp=$_FILES['archivo']['tmp_name'];
$arreglo=explode('.',$file_name);
$len=count($arreglo);
$pos=$len-1;
$ext=$arreglo[$pos];
$dir="archivos/";
$file_enc=md5_file($file_tmp);

$fileName1='';
if($file_name!=''){
    $fileName1="$file_enc.$ext";
    copy($file_tmp,$dir.$fileName1);
}

$archivo_n = $file_name;
$archivo = "archivos/".$fileName1;
$passwordEnc = md5($password);

$sql = "INSERT INTO empleados (nombre,apellidos,correo,pass,rol,archivo_n,archivo)
    VALUES ('$nombre','$apellidos','$correo','$passwordEnc','$rol','$archivo_n','$archivo')";
$resultado = $con->query($sql);

$con->close();
header('Location: ' . "empleados_lista.php");
?>