<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/Logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css%22%3E">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../style/normalize.css">
    <link rel="stylesheet" type="text/css" href="../style/styleFooter.css">
	<link rel="stylesheet" type="text/css" href="../style/styleCompra.css">
    <link rel="stylesheet" type="text/css" href="../style/carrito.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <title>Agregar producto</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid navContainer">
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/logo.png" alt="Logo.jpg" width="30" height="24">
                    BDTecnology
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav" id="navProductos">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="http://localhost/GlobalWebI/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../view/view.registro.html">Iniciar Sesion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../view/view.crearCuenta.html">Crear Cuenta</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex">
                    <div class="submenu">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <div id="carrito">
                            <div class="acomodo_carrito">
                                <table id="lista-carrito" class="u-full-width">
                                    <thead>
                                        <tr>
                                            <th>Imagen</th>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <div class="row_search">
                                    <a href="#" id="vaciar-carrito" class="btn btn-secondary boton">Vaciar Carrito</a>
                                    <a href="http://localhost/GlobalWebI/pagar.php" id="Pagar-carrito" class="btn btn-primary boton">Pagar Carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="contenedor_carrito">
        <?php
            if (isset($_GET['id'])){
                $id = $_GET['id'];
                require '../php/conexionPrincipal.php';
                $Resultado = mysqli_query($conexion, "SELECT * FROM `productos_catalogo` WHERE `id_producto` = '$id';");
                while($row = mysqli_fetch_array($Resultado)){
                echo'<div class="contCarrito">
                        <div class="division_40">
                            <img src="../img/'.$row['img'].'" alt="Producto" style="width: 100%;height: 400px;">
                        </div>
                        <div class="division_60" id="Producto">
                            <h2>'.$row['Nombre'].'</h3>
                            <p id="descripccion">'.$row['Descripccion'].'</p>
                            <br>
                            <h3>'.$row['Precio'].'$</h3>
                            <p>Cantidad <input type="number" name = "Cantidad" size ="3" max = "'.$row['Cantidad'].'" min = "1"value="1" ></p>
                            <br>';
                            echo'<a href="#"><input type="submit" class="btn btn-primary referencia" value = "Agregar al carrito" data-id="'.$_GET['id'].'"></a>';
                            
                        echo'</div>
                </div>';
                }
            }
        ?>
        
        <hr>

        <div class="preguntasProducto textoCentrado">
            <h2>Preguntas acerca del producto</h3>
        </div>
        <div class="pregutas">
            <?php
            $queryPreguntas = mysqli_query($conexion, "SELECT * FROM `preguntas` WHERE `id_producto_cata` = '$id'");
            while($row = mysqli_fetch_array($queryPreguntas)){
                echo'
                <div class="separacionPregunta">
                    <div class="mb-3">
                        <label for="NombreUser" class="form-label">'.$row['nombre_user'].'</label>
                        <textarea class="form-control" rows="3">'.$row['pregunta'].'</textarea>
                    </div>
                </div>
                ';
            }
            ?>
            <form action="../php/agregarPregunta.php?id=<?php echo $id?>" method="POST">
                <div class="separacionPregunta centrarBoton">
                    <h5>Escribe tu pregunta</h5>
                    <div class="mb-3">
                        <textarea class="form-control" id="preguntaPersonal" rows="3" name="pregunta" required></textarea>
                    </div>
                    <button class="btn3" type="submit">Subir Pregunta</button>
                </div>
            </form>
        </div>
    </div>


<!-- <?php
	// if(isset($_POST['btnAgregar'])){
	// 	$id = $_GET['id'];
	// 	$Cantidad = $_POST['Cantidad'];
    //     $conexion = mysqli_connect("proyectosinformaticatnl.ceti.mx","bdtecnology","74649e1eb") or die ("Error en la conexion de la base de datos ");
	// 	mysqli_select_db($conexion,"bdtecnology") or die ("Error en la base de datos");
	// 	$Resultado = mysqli_query($conexion, "SELECT * FROM bdtecnology.`Productos` WHERE `ID_p` = '$id';");			
	// 	while($row = mysqli_fetch_array($Resultado)){
	// 		$nombre = $row['Nombre_p'];
	// 		$Precio = $row['Precio_p'];
	// 	}
    // 	$SubTotal = $Precio*$Cantidad;
	//     $fechaHora = date("F_j_Y");
	//     $pedido = array();
    // 	$ruta= "Json/".$_SESSION['usua'].$fechaHora."_pedido.json";
	//     if (file_exists($ruta)){
    //     	$archivo = file_get_contents($ruta);
    // 	    $pedido = json_decode($archivo,true);
	//         $pedido[]=array('id'=>$id,'nombre'=>$nombre,'precio'=>$Precio,'cantidad'=>$Cantidad,'subtotal'=>$SubTotal);
    //     	$json_string = json_encode($pedido);
    //     	echo $json_string;
    // 	    $file = $ruta;
	//         file_put_contents($file,$json_string);
    //     	echo "<script> alert ('Se agrego correctamente al carrito'); window.location='index.php'</script>";
    // 	}
	//     else{
    //     	$pedido[]=array('id'=>$id,'nombre'=>$nombre,'precio'=>$Precio,'cantidad'=>$Cantidad,'subtotal'=>$SubTotal);
	//         $json_string = json_encode($pedido);
    // 	    echo $json_string;
    //     	$file = $ruta;
    // 	    file_put_contents($file,$json_string);
	//         echo "<script> alert ('Se agrego correctamente al carrito'); window.location='index.php'</script>";
    // 	}
	// }
?> -->
    <footer>
        <script src="../js/indexSesion.js"></script>
        <script src="../js/carrito.js"></script>
    </footer>
    <?php
        if(isset($_SESSION['user'])){
            echo"<script>
                iniciarSesion('".$_SESSION['user']."');
            </script>";
        }
        if(isset($_SESSION['admin'])){
            echo"<script>
                iniciarAdmin('".$_SESSION['admin']."');
            </script>";
        }
    ?>
</body>
</html>