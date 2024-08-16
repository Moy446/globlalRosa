<?php
session_start();
if(!isset($_SESSION['admin'])){{
    header('http://localhost/GlobalWebI/index.php');
    die();
}}
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('http://localhost/GlobalWebI/index.php');
    die();
}
require './conexionPrincipal.php';
$Nombre = $_POST['nombre'];
$TiposProductos = $_POST['tiposProductos'];
$Empresa = $_POST['empresa'];
$Estatus = $_POST['proveedor'];

$agregarProveedor = mysqli_query($conexion,"INSERT INTO `provedores` (`id_provedor`, `id_estatus`, `nombre`, `empresa`, `tipo_productos`) VALUES (NULL,'$Estatus','$Nombre','$Empresa','$TiposProductos')");
if ($agregarProveedor == true) {
    echo "<script> alert ('Se agrego correctamente el proveedor'); window.location='http://localhost/GlobalWebI/index.php'</script>";
} else {
    echo "Error al realizar al agregar la pregunta: " . mysqli_error($conexion);
}
?>