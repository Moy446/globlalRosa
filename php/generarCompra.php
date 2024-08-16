<?php
    session_start();

    if(!isset($_SESSION['user'])){
        echo 'prueba';
        header('http://localhost/GlobalWebI/index.php');
        die();
    }
    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        echo 'prueba1';
        header('http://localhost/GlobalWebI/index.php');
        die();
    }
    require './conexionPrincipal.php';
    $datos = json_decode(file_get_contents("php://input"), true);
    foreach ($datos['datos'] as $elemento) {
        $cantidad = $elemento['Cantidad'];
        $precio =$elemento['Precio'];
        $precioTotal = intval($cantidad)*floatval($precio);
    }
    $idUser = $_SESSION["idUser"];
    $nombreUser = $_SESSION['user'];
    $nombrePDF = $_SESSION['pdf'];
    $queryDatosUser = mysqli_query($conexion, "SELECT * FROM `user` WHERE `id_user` = '$idUser'");
    while ($row = mysqli_fetch_assoc($queryDatosUser)){
        $correo = $row['email'];
    }
    $queryDetalleCompra = mysqli_query($conexion, "INSERT INTO `detalle_de_compra` (`id_compra`, `id_users`, `nombre_user`, `email`, `total`, `nombre_PDF`) VALUES (NULL,'$idUser','$nombreUser','$correo','$precioTotal','$nombrePDF')");
    echo 'Se realizo la compra correctamente';
?>