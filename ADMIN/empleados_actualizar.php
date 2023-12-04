<?php
require "conexionBD.php";
$con = conectarBD();
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$pass = $_POST['password'];
$rol = $_POST['rol'];
$archivo_n = '';
$archivo = '';
$passwordEnc = '';

$file_name = '';
$file_tmp = '';

$bandFoto = false;
$bandPassword = false;


$sql = "UPDATE empleados SET nombre=?,apellidos=?,correo=?,rol=?";
if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === 0) {
        $bandFoto = true;
        $sql = $sql . ",archivo_n=?,archivo=?";

        $file_name = $_FILES['archivo']['name'];
        $file_tmp = $_FILES['archivo']['tmp_name'];
        $arreglo = explode('.', $file_name);
        $len = count($arreglo);
        $pos = $len - 1;
        $ext = $arreglo[$pos];
        $dir = "archivos/";
        $file_enc = md5_file($file_tmp);

        $fileName1 = '';
        if ($file_name != '') {
                $fileName1 = "$file_enc.$ext";
                copy($file_tmp, $dir . $fileName1);
        }

        $archivo_n = $file_name;
        $archivo = "archivos/" . $fileName1;
}
if ($pass != '') {
        $bandPassword = true;
        $passwordEnc = md5($pass);
        $sql = $sql . ",pass=?";
}

$sql = $sql . " WHERE id=?";
$stmt = $con->prepare($sql);
if ($bandFoto == false && $bandPassword == false) {
        $stmt->bind_param("sssii", $nombre, $apellidos, $correo, $rol, $id);
} else if ($bandFoto == false && $bandPassword == true) {
        $stmt->bind_param("sssisi", $nombre, $apellidos, $correo, $rol, $passwordEnc, $id);
} else if ($bandFoto == true && $bandPassword == false) {
        $stmt->bind_param("sssissi", $nombre, $apellidos, $correo, $rol, $archivo_n, $archivo, $id);
} else if ($bandFoto == true && $bandPassword == true) {
        $stmt->bind_param("sssisssi", $nombre, $apellidos, $correo, $rol, $archivo_n, $archivo, $passwordEnc, $id);
}


$stmt->execute();

$stmt->close();
$con->close();



header("Location: empleados_lista.php");

?>