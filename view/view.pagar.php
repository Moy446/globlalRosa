<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./style/stylePagar.css">
    <link rel="shortcut icon" href="./img/Logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar</title>
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
            </div>
        </nav>
    </header>
        <div class="container">
            <table class="table table-striped" id="tablaPagar">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="d-grid gap-2 col-6 mx-auto">
                <h2 id="txtTotal">Total a pagar: </h2>
                <button class="btn btn-primary boton" id="btnPagar">Pagar</button>
            </div>
        </div>
    <footer>
        <script src="./js/indexSesion.js"></script>
        <script src="./js/pagar.js"></script>
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