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
    $idProducto = $_POST['id'];
    $arrayProducto = array();
    $query = mysqli_query($conexion,"SELECT * FROM `productos_catalogo` WHERE `id_producto` = '$idProducto'");
    $row = mysqli_fetch_assoc($query);
    $jsonProducto = json_encode([
        'Nombre' => $row['Nombre'],
        'Proveedor'=> $row['id_proveedor'] ,
        'Descripccion' => $row['Descripccion'], 
        'Cantidad' => $row['Cantidad'], 
        'Precio' => $row['Precio'],
        'img' => $row['img']
    ]);
    echo $jsonProducto;
?>