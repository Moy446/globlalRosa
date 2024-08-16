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
    $Nombre = $_POST['nombre'];
    $TiposProductos = $_POST['tiposProductos'];
    $Empresa = $_POST['empresa'];
    $Estatus = $_POST['proveedor'];

    $update = mysqli_query($conexion,"UPDATE `provedores` SET `id_estatus`='$Estatus',`nombre` = '$Nombre', `empresa` = '$Empresa', `tipo_productos` = '$TiposProductos' WHERE `id_provedor` = '$id';");
    if ($update) {
        echo "<script> alert ('Se modifico correctamente el provedor'); window.location='http://localhost/GlobalWebI/index.php'</script> ";
    } else {
        echo "Error al realizar la actualización: " . mysqli_error($conexion);
    }
?>