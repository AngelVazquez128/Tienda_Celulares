<?php
require 'conexionBD.php';
$con = conectarBD();
$nombre = $_POST['nombre'];

$file_name=$_FILES['archivo']['name'];
$file_tmp=$_FILES['archivo']['tmp_name'];
$arreglo=explode('.',$file_name);
$len=count($arreglo);
$pos=$len-1;
$ext=$arreglo[$pos];
$dir="archivos/promociones/";
$file_enc=md5_file($file_tmp);

$fileName1='';
if($file_name!=''){
    $fileName1="$file_enc.$ext";
    copy($file_tmp,$dir.$fileName1);
}

$archivo_n = $file_name;
$archivo = "archivos/promociones/".$fileName1;


$sql = "INSERT INTO promociones (nombre,archivo)
    VALUES ('$nombre','$archivo')";
$resultado = $con->query($sql);

$con->close();
header('Location: ' . "promociones_lista.php");
?>