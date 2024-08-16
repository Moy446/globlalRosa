<?php
    $conexion = mysqli_connect("localhost","root","") or die ("Error en la conexion de la base de datos ");
    mysqli_select_db($conexion,"bdtecnology") or die ("Error en la base de datos");
?>