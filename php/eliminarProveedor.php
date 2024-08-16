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
    $id= $_GET['id'];
    $query = mysqli_query($conexion,"DELETE FROM `provedores` WHERE `id_provedor` = '$id'");
    if ($query) {
        echo "<script> alert ('Se elimino correctamente el proveedor'); window.location='http://localhost/GlobalWebI/index.php'</script> ";
    } else {
        echo "Error al realizar la eliminacion del producto: " . mysqli_error($conexion);
    }
?>