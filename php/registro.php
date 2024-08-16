<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "
http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns= "http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset= utf-8"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro completado</title>
</head>
<body>
    <?php
    if ($_POST){
        $User= $_POST['usua'];
        $contra=$_POST['contra'];

        require 'conexionPrincipal.php';
            $Administrador = mysqli_query($conexion, "SELECT `id_admin` FROM `administracion`WHERE `User` = '$User' AND `Pass` = '$contra';");
            $Resultado = mysqli_query($conexion, "SELECT `id_user` FROM `user`WHERE `User` = '$User' AND `Pass` = '$contra';");
            if(mysqli_num_rows ($Administrador) == 1){
                $_SESSION["admin"] = "$User";
                $row = mysqli_fetch_row($Administrador);
                $_SESSION["idUser"] = $row[0];
                echo "<script> alert ('Bienvenido $User'); window.location='../index.php'</script> ";
            }
            else if (mysqli_num_rows ($Resultado)==1){
                $_SESSION["user"] = "$User";
                $row = mysqli_fetch_row($Resultado);
                $_SESSION["idUser"] = $row[0];
                echo "<script> alert ('Bienvenido $User'); window.location='../index.php'</script> ";
            }
            else{
                echo "<script> alert ('El usuario no existe'); window.location='../view/view.registro.html'</script>";
            }
        mysqli_close($conexion);
    }
    else{
        echo "No se ejecuto el post";
    }
    ?>

</body>
</html>
