<?php
session_start();

if(!isset($_SESSION['user'])&&!isset($_SESSION['admin'])){
    header('http://localhost/GlobalWebI/pagar.php');
    die();
}
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('http://localhost/GlobalWebI/pagar.php');
    die();
}

require './conexionPrincipal.php';
$Pregunta = $_POST['pregunta'];
$idProducto = $_GET['id'];
$idUser = $_SESSION['idUser'];
$nombreUser = $_SESSION['user'];
$agregarPregunta = mysqli_query($conexion,"INSERT INTO `preguntas` (`id_pregunta`,`id_producto_cata`,`id_user`,`nombre_user`,`pregunta`)VALUES(NULL,'$idProducto','$idUser','$nombreUser','$Pregunta')");
if ($agregarPregunta == true) {
    echo "<script> alert ('Pregunta realizada correctamente'); window.location='../view/view.Producto.php?id=". $idProducto ."'</script>";
} else {
    echo "Error al realizar al agregar la pregunta: " . mysqli_error($conexion);
}

?>