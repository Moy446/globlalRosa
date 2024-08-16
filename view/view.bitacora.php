<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./style/stylePagar.css">
    <link rel="shortcut icon" href="./img/Logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitacora</title>
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
                        <th>Id cambio</th>
                        <th>Id administrador</th>
                        <th>Tabla del cambio</th>
                        <th>Tipo de cambio</th>
                        <th>Fecha cuando se realizo</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require './php/conexionPrincipal.php';
                        $queryBitacora = mysqli_query($conexion, "SELECT * FROM `bitacora`");
                        while($row = mysqli_fetch_array($queryBitacora)){
                            echo'
                                <tr>
                                    <td>'.$row['id_cambio'].'</td>
                                    <td>'.$row['id_admin'].'</td>
                                    <td>'.$row['Tabla'].'</td>
                                    <td>'.$row['Tipo_cambio'].'</td>
                                    <td>'.$row['fecha'].'</td>
                                </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    <footer>
        <script src="./js/indexSesion.js"></script>
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