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
    $idProvedor = $_POST['id'];
    $arrayProducto = array();
    $query = mysqli_query($conexion,"SELECT * FROM `provedores` WHERE `id_provedor` = '$idProvedor'");
    $row = mysqli_fetch_assoc($query);
    $jsonProducto = json_encode([
        'Status' => $row['id_estatus'],
        'Nombre'=> $row['nombre'] ,
        'Empresa' => $row['empresa'], 
        'TipoProducto' => $row['tipo_productos'], 
    ]);
    echo $jsonProducto;
?>