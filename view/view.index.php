<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/Logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./style/styleFooter.css">
    <link rel="stylesheet" href="./style/style.css">
    <title>Global Web I</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid navContainer">
                <a class="navbar-brand" href="index.php">
                    <img src="./img/logo.png" alt="Logo.jpg" width="30" height="24">
                    BDTecnology
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav" id="navProductos">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="http://localhost/GlobalWebI/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./view/view.registro.html">Iniciar Sesion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./view/view.crearCuenta.html">Crear Cuenta</a>
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
                                    <a href="./pagar.php" id="Pagar-carrito" class="btn btn-primary boton">Pagar Carrito</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- IMAGEN DE REFERENCIA -->
    <div class="slider">
        <div class="contenido-Slider">
                <h2>Encuentra los componentes que buscabas</h2>
                <p>A los mejores precios</p>
        </div>
    </div>

    <!-- PRODUCTOS -->
    <div class="Productos" id="lista-productos">
        <?php
            require_once './php/conexionPrincipal.php';
            $Resultado = mysqli_query($conexion, "SELECT * FROM `productos_catalogo` WHERE `Cantidad` > 0; ");
            while($row = mysqli_fetch_array($Resultado)){
                echo'            
                <div class="margenes">
                    <div class="centro">
                        <img src="./img/'.$row['img'].'" alt="Producto">
                        <h3>'.$row['Nombre'].'</h3>
                        <p>'.$row['Descripccion'].'</p>
                        <a href="./view/view.Producto.php?id='.$row['id_producto'].'" class="btn btn-primary">'.$row['Precio'].' $</a>
                    </div>
                </div>';
            }
        ?>
	</div>

    <!-- FOOTER -->
    <footer class="Footer">
        <div class="row_search">
            <div class="division_50">
                <ul id="principal" class="menu" style="padding: 0;">
                    <li class="enlace texto_centrado"><h3>Contacto</h3></li>
                    <li class="enlace texto_centrado"><p><span>Nombre:</span> Moises Otero Cabrero</p></li>
                    <li class="enlace texto_centrado"><p><span>Registro:</span> 22310402</p></li>
                    <li class="enlace texto_centrado"><p><span>Carrera:</span> Desarrollo de Software</p></li>
                </ul>
            </div>
            <div class="division_50">
                <ul id="secundaria" class="menu" style="padding: 0;">
                    <li class="enlace texto_centrado"><h3>Escuela</h3></li>
                    <li class="enlace texto_centrado"><p>Centro de Enseñanza Tccnica Industrial</p></li>
                </ul>
            </div>
        </div>
        <script src="./js/indexSesion.js"></script>
        <script src="./js/carrito.js"></script>
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