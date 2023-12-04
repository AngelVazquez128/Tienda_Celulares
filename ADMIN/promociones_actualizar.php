<?php
require "conexionBD.php";
$con = conectarBD();
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$archivo_n = '';
$archivo = '';
//$passwordEnc = '';

$file_name = '';
$file_tmp = '';

$bandFoto = false;
//$bandPassword = false;


$sql = "UPDATE promociones SET nombre=?";
if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === 0) {
    $bandFoto = true;
    $sql = $sql . ",archivo=?";

    $file_name = $_FILES['archivo']['name'];
    $file_tmp = $_FILES['archivo']['tmp_name'];
    $arreglo = explode('.', $file_name);
    $len = count($arreglo);
    $pos = $len - 1;
    $ext = $arreglo[$pos];
    $dir = "archivos/promociones/";
    $file_enc = md5_file($file_tmp);

    $fileName1 = '';
    if ($file_name != '') {
        $fileName1 = "$file_enc.$ext";
        copy($file_tmp, $dir . $fileName1);
    }

    $archivo_n = $file_name;
    $archivo = "archivos/promociones/" . $fileName1;
}


$sql = $sql . " WHERE id=?";
$stmt = $con->prepare($sql);
if ($bandFoto == false) {
    $stmt->bind_param("si", $nombre, $id);
} else {
    $stmt->bind_param("ssi", $nombre,  $archivo, $id);
}


$stmt->execute();

$stmt->close();
$con->close();


header("Location: promociones_lista.php");