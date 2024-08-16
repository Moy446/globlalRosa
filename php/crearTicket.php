<?php
session_start();

if(!isset($_SESSION['user'])&&!isset($_SESSION['admin'])){
    header('http://localhost/GlobalWebI/index.php');
    die();
}
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('http://localhost/GlobalWebI/index.php');
    die();
}
require './conexionPrincipal.php';
$datos = json_decode(file_get_contents("php://input"), true);
$precioTotal=0;
$idProducto =0;
$idProductos =[];
$nombreUser = "";
if(!isset($_SESSION['user'])){
    $nombreUser = $_SESSION['admin'];
}else{
    $nombreUser = $_SESSION['user'];
}
foreach ($datos['datos'] as $elemento) {
    $idProducto = $elemento['id'];
    $cantidad = $elemento['Cantidad'];
    $precio =$elemento['Precio'];
    $precioTotal = intval($cantidad)*floatval($precio);
    $cantidadQuery = mysqli_query($conexion, "SELECT `Cantidad` FROM `productos_catalogo` WHERE `id_producto` = '$idProducto'; ");
    if ($row = mysqli_fetch_assoc($cantidadQuery)) {
        $cantidadActual = $row['Cantidad'];
    }
    $cantidadTotal = $cantidadActual - $cantidad;
    if($cantidadTotal <0 ){
        $cantidadTotal =0;
    }
    $queryProductos = mysqli_query($conexion, "UPDATE `productos_catalogo` SET `Cantidad` = '$cantidadTotal' WHERE `id_producto` = '$idProducto';");
    $idProductos[] = $idProducto;
}
$idProductosString = implode(',', $idProductos);

$nombrePDF = $_SESSION['pdf'];
$query = mysqli_query($conexion, "SELECT * FROM `detalle_de_compra` WHERE `nombre_PDF` = '$nombrePDF'");
    while($row = mysqli_fetch_assoc($query)){
        $idCompra = $row['id_compra'];
    }
$ticketInsert = mysqli_query($conexion, "INSERT INTO `ticket_de_compra` (`id_ticket`,`id_compra`, `id_productos`, `nombre_user`, `precioTotal`, `fechaCompra`) VALUES (NULL,'$idCompra', '$idProductosString', '$nombreUser', '$precioTotal', NOW());");
echo 'Se realizo la compra correctamente';
?>