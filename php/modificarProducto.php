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
    $id = $_GET['id'];
    $Nombre =$_POST['nombre'];
    $Descripcion =$_POST['descripccion'];
    $Cantidad =$_POST['cantidad'];
    $Precio =$_POST['precio'];
    $Provedor =$_POST['proveedor'];

    $update = mysqli_query($conexion,"UPDATE `productos_catalogo` SET `id_proveedor`='$Provedor',`Nombre` = '$Nombre', `Descripccion` = '$Descripcion', `Cantidad` = '$Cantidad', `Precio` = '$Precio' WHERE `id_producto` = '$id';");
    if ($update) {
        echo "<script> alert ('Se modifico correctamente el producto'); window.location='http://localhost/GlobalWebI/index.php'</script> ";
    } else {
        echo "Error al realizar la actualización: " . mysqli_error($conexion);
    }
?>