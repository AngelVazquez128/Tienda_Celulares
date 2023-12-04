<?php
require 'conexionBD.php';
$con = conectarBD();
$nombre = $_POST['nombre'];
$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$costo = $_POST['costo'];
$stock = $_POST['stock'];


$file_name=$_FILES['archivo']['name'];
$file_tmp=$_FILES['archivo']['tmp_name'];
$arreglo=explode('.',$file_name);
$len=count($arreglo);
$pos=$len-1;
$ext=$arreglo[$pos];
$dir="archivos/productos/";
$file_enc=md5_file($file_tmp);

$fileName1='';
if($file_name!=''){
    $fileName1="$file_enc.$ext";
    copy($file_tmp,$dir.$fileName1);
}

$archivo_n = $file_name;
$archivo = "archivos/productos/".$fileName1;


$sql = "INSERT INTO productos (nombre,codigo,descripcion,costo,stock,archivo_n,archivo)
    VALUES ('$nombre','$codigo','$descripcion','$costo','$stock','$archivo_n','$archivo')";
$resultado = $con->query($sql);

$con->close();
header('Location: ' . "productos_lista.php");
?>