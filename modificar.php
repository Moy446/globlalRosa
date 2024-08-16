<?php
session_start();
if(!isset($_SESSION['admin'])){{
    echo "<script> alert ('usted no es administrador'); window.location='./index.php'</script> ";
}}
require './view/view.modificar.php'
?>