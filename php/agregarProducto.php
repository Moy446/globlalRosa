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
$nombre =$_POST['nombre'];
$provedor = $_POST['proveedor'];
$descripccion =$_POST['descripccion'];
$cantidad =$_POST['cantidad'];
$precio =$_POST['precio'];

$nombreImagen = $_FILES["imagen"]["name"];
$tipoimagen = $_FILES["imagen"]["type"];
$extensionesPermitidas = array("jpeg", "jpg", "png");
$extension = pathinfo($nombreImagen, PATHINFO_EXTENSION);
if (in_array($extension, $extensionesPermitidas)){
    $ruta = '../img/';
    $destino = $ruta.$nombreImagen;
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino);
    $AgregarProducto = mysqli_query($conexion,"INSERT INTO `productos_catalogo` (`id_producto`,`id_proveedor`, `Nombre`, `Descripccion`, `Cantidad`, `Precio`,`img`) VALUES (NULL,'$provedor' ,'$nombre', '$descripccion', '$cantidad', '$precio','$nombreImagen');");
    if ($AgregarProducto == true) {
        echo "<script> alert ('Se agrego correctamente el producto'); window.location='http://localhost/GlobalWebI/index.php'</script> ";
    }else{
        echo "Error al agregar el producto: " . mysqli_error($conexion);
    }
}else{
    echo "<script> alert ('Vuelva a intentar'); window.location='http://localhost/GlobalWebI/agregar.php'</script> ";
}

?>