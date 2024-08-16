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
    <title>Agregar Producto</title>
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
        <h3>Agregar un producto</h3>
        <form action="./php/agregarProducto.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre del producto</label>
                <input type="text" class="form-control" id="NombreProducto" name="nombre" placeholder="Nombre del producto" required>
            </div>
            <div class="mb-3">
                <label for="Descripccion" class="form-label">Descripccion Producto</label>
                <textarea class="form-control" name="descripccion" id="DescripccionProducto" rows="3"></textarea>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="Cantidad" class="col-form-label">Cantidad</label>
                </div>
                <div class="col-auto">
                    <input type="number" id="CantidadProducto" name="cantidad" class="form-control" aria-describedby="Cantidad" required>
                </div>
                <div class="col-auto">
                    <label for="Precio" class="col-form-label">Precio</label>
                </div>
                <div class="col-auto">
                    <input type="number" id="PrecioProducto" name="precio" class="form-control" aria-describedby="Precio" required>
                </div>
                <div class="col-auto">
                    <label for="formFile" class="form-label">Seleccionar la imagen</label>
                </div>
                <div class="col-auto">
                    <input class="form-control" type="file" id="formFile" name="imagen" required>    
                </div>
            </div>
            <div class="row g-3 align-items-center separacion">
                <div class="col-auto">
                    <label for="Provedor" class="form-label">Seleccionar proveedor</label>
                </div>
                <div class="col-auto">
                    <select class="form-select" name="proveedor" id="provedorAgregar">
                        <option value="">seleccionar Provedor</option>
                        <?php
                            require './php/conexionPrincipal.php';
                            $empresa="";
                            $queryProvedores = mysqli_query($conexion, "SELECT `id_provedor`, `empresa` FROM `provedores`");
                            while($row = mysqli_fetch_array($queryProvedores)){
                                echo'<option value="'.$row['id_provedor'].'" empresa="'.$row['empresa'].'">'.$row['id_provedor'].'</option>';
                            }
                        ?>
                    </select>    
                </div>
                <div class="col-auto">
                    <label for="Provedor" class="form-label" id="provedorEmpresa"></label>
                </div>
            </div>
            <div class="separacion">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Agregar Producto</button>
                </div>
            </div>
        </form>
    </div>

    <div class="contenedor separacion">
        <h3>Agregar Provedor</h3>
        <form action="./php/agregarProveedor.php" method="POST">
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre del proveedor</label>
                <input type="text" class="form-control" id="NombreProveedor" name="nombre" placeholder="Nombre del proveedor" required>
            </div>
            <div class="mb-3">
                <label for="Descripccion" class="form-label">Tipos de productos que provee</label>
                <textarea class="form-control" name="tiposProductos" id="TiposProductos" rows="3" required></textarea>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="Precio" class="col-form-label">Nombre de la empresa del proveedor</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" id="EmpresaProveedor" name="empresa" placeholder="Empresa Proveedor" required>
                </div>

                <div class="col-auto">
                    <label for="Provedor" class="form-label">Seleccionar estatus proveedor</label>
                </div>
                <div class="col-auto">
                    <select class="form-select" name="proveedor" id="provedorStatus">
                        <option value="">seleccionar Estatus</option>
                        <?php
                            require './php/conexionPrincipal.php';
                            $empresa="";
                            $queryProvedores = mysqli_query($conexion, "SELECT `id_status`, `nombre` FROM `estatus_provedor`");
                            while($row = mysqli_fetch_array($queryProvedores)){
                                echo'<option value="'.$row['id_status'].'" status="'.$row['nombre'].'">'.$row['id_status'].'</option>';
                            }
                        ?>
                    </select>    
                </div>
                <div class="col-auto">
                    <label for="Provedor" class="form-label" id="nombreStatus"></label>
                </div>
            </div>
            
            <div class="separacion">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Agregar Provedor</button>
                </div>
            </div>
        </form>
    </div>

    <footer>
        <script src="./js/indexSesion.js"></script>
        <script>
            const select = document.querySelector('#provedorAgregar')
            const selectProveedor = document.querySelector('#provedorStatus');
            seleccionarProvedor();
            function seleccionarProvedor(){
                select.addEventListener('change',mostrarEmpresa)

                selectProveedor.addEventListener('change',mostrarStatus)
            }
            function mostrarEmpresa(){
                const option = select.options[select.selectedIndex];
                const empresa = option.getAttribute('empresa');
                const label = document.querySelector("#provedorEmpresa");
                label.innerHTML = "Empresa: "+empresa;
                
            }
            function mostrarStatus(){
                const option = selectProveedor.options[selectProveedor.selectedIndex];
                const status = option.getAttribute('status');
                const label = document.querySelector("#nombreStatus");
                label.innerHTML = "Estatus: "+status;
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