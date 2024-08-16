<?php
session_start();
if(!isset($_SESSION['user'])&&!isset($_SESSION['admin'])){{
    echo "<script> alert ('Inicia sesion primero'); window.location='./view/view.registro.html'</script> ";
}}
require './view/view.pagar.php'
?>