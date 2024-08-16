<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/styleCRUD.css"> 
    <link rel="stylesheet" href="./style/style.css"> 
    <link rel="shortcut icon" href="./img/Logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid navContainer">
                <a class="navbar-brand" href="./index.php">
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
            </div>
        </nav>
    </header>
    <div class="contenedor">
        <h3>Eliminar producto</h3>
        <form method="POST" id="eliminarProductoForm">
            <select class="form-select" aria-label="Producto" id="selectProduct">
                <option>Seleccionar algun producto....</option>
                <?php
                    require './php/conexionPrincipal.php';
                    $Resultado = mysqli_query($conexion, "SELECT * FROM `productos_catalogo` ");
    	            while($row = mysqli_fetch_array($Resultado)){
    		        	echo'<option value="'.$row['Nombre'].'" data-id = "'.$row['id_producto'].'">'.$row['Nombre'].'</option>';
	                }
                ?>
            </select>
            <div class="separacion">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Eliminar producto</button>
                </div>
            </div>
        </form>
    </div>

    <div class="contenedor separacion">
        <h3>Eliminar proveedor</h3>
        <form method="POST" id="eliminarProvedorForm">
            <select class="form-select" aria-label="Provedor" id="selectProveedor">
                <option>Seleccionar algun producto....</option>
                <?php
                    require './php/conexionPrincipal.php';
                    $Resultado = mysqli_query($conexion, "SELECT * FROM `provedores` WHERE `id_estatus` = '1'");
    	            while($row = mysqli_fetch_array($Resultado)){
    		        	echo'<option value="'.$row['empresa'].'" data-id = "'.$row['id_provedor'].'">'.$row['empresa'].'</option>';
	                }
                ?>
            </select>
            <div class="separacion">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Eliminar proveedor</button>
                </div>
            </div>
        </form>
    </div>

    <footer>
        <script src="./js/indexSesion.js"></script>
        <script>
            const select = document.querySelector('#selectProduct')
            const selectProvedor = document.querySelector('#selectProveedor')
            seleccionarProducto();
            function seleccionarProducto(){
                select.addEventListener('change',actualizarAction)

                selectProvedor.addEventListener('change',actualizarFormProvedor)
            }
            function actualizarAction(){
                let id = select.options[select.selectedIndex].getAttribute('data-id');
                const formulario = document.querySelector('#eliminarProductoForm');
                formulario.action = './php/eliminarProducto.php?id=' + encodeURIComponent(id);
            }
            function actualizarFormProvedor(){
                let id = selectProvedor.options[selectProvedor.selectedIndex].getAttribute('data-id');
                const formulario = document.querySelector('#eliminarProvedorForm');
                formulario.action = './php/eliminarProveedor.php?id=' + encodeURIComponent(id);
            }
        </script>
    </footer>
    <?php
    if(isset($_SESSION['admin'])){
        echo"<script>
            iniciarAdmin('".$_SESSION['admin']."');
        </script>";
    }
    ?>
</body>
</html>