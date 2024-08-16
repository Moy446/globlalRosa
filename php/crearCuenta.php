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
        require 'conexionPrincipal.php';
        $Nombre = $_POST['nombre'];
        $Apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $correo= $_POST['correo'];
        $User =$_POST['usuario'];
        $contra=$_POST['contra'];
        $contraR=$_POST['contraR'];
        if ($contraR == $contra){
            $Resultado = mysqli_query($conexion, "INSERT INTO `user` (`Nombre`, `Apellidos`, `email`, `edad`,`User`,`Pass`) VALUES ('$Nombre', '$Apellido', '$correo', '$edad','$User','$contra');");
            if ($Resultado==true){
                echo "<script> alert ('Usuario registrado correctamente'); window.location='../view/view.registro.html'</script>";
            }
            else{
                echo "Error en la consulta";
            }
        }
        else{
            echo "Las contraseñas son diferentes";
        }
        mysqli_close($conexion);
    }
    else{
        echo "Hubo un error al crear el usuario, intentelo mas tarde por favor";
    }
    ?>

</body>
</html>